<template>
    <div class="px-8 py-4 text-slate-700 font-semibold">
        <div class="text-right pb-4">
            <button @click="draft()" class="leading-6 py-2 px-4 rounded mx-1 bg-slate-500 hover:bg-slate-400 outline-none active:bg-slate-500 text-slate-100" type="button">
                <i v-if="saving" class="fa-solid fa-spinner fa-spin"></i>
                <span v-else>Save as Draft</span>
            </button>
            <button @click="publish()" class="leading-6 py-2 px-4 rounded mx-1 bg-amber-600 hover:bg-amber-500 outline-none active:bg-amber-600 text-slate-100" type="button">Publish</button>
        </div>
        <div class="grid md:grid-cols-3 gap-5">
            <div class="md:col-span-2">
                <div class="relative mb-3">
                    <input v-model="news.title" @change="onChange('title')" autocomplete="off" type="text" id="title" class="peer relative z-[1] block h-12 pt-2 px-2 leading-10 w-full text-sm bg-transparent placeholder:text-transparent rounded border outline-none" placeholder="Title" />
                    <label for="title" class="absolute text-slate-600 left-1 text-sm duration-300 px-1 peer-placeholder-shown:leading-5 -translate-y-1.5 text-xs top-2 bg-white peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:text-base peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:text-xs peer-focus:-translate-y-1.5">Title</label>
                </div>
                <div class="relative mb-3 flex flex-wrap gap-3 justify-center">
                    <div class="max-w-full md:max-w-full w-[350px]" v-if="news.image&&news.image!=''">
                        <div class="relative pt-[56.25%] bg-slate-200">
                            <div class="group/preview absolute inset-0 h-full w-full">
                                <img class="h-full w-full block object-cover" :src="news.image" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="max-w-full md:max-w-full w-[350px]" @drop.prevent="imageDroped" @dragenter.prevent @dragover.prevent>
                        <div class="relative pt-[56.25%] bg-slate-200">
                            <label for="image">
                                <div v-if="preview_url" class="group/preview absolute inset-0 h-full w-full">
                                    <img class="h-full w-full block object-cover" :src="preview_url" alt="">
                                    <div class="group-hover/preview:flex absolute inset-0 hidden items-center justify-center text-center h-full w-full bg-black bg-opacity-30 text-4xl text-slate-200"><i class="fa-solid fa-camera"></i></div>
                                </div>
                                <div v-else class="absolute block inset-0 flex h-full w-full items-center justify-center text-center">
                                    <p class="px-2 text-2xl">Drop Your Image Here</p>
                                </div>
                            </label>
                            <input type="file" id="image" name="image" class="hidden" @change="onChange('image')" ref="imageInput">
                        </div>
                    </div>
                </div>
                <div class="relative mb-3">
                    <div class="py-3 text-2xl">Content</div>
                    <textarea class="hidden" @change="onChange('content')" v-model="news.content"></textarea>
                    <div class="editor"></div>
                </div>
            </div>
            <div>
                <div class="relative mb-3">
                    <h4 class="text-xl pb-2">Tags</h4>
                    <vue3-tags-input v-if="temp_tags" :tags="temp_tags" @on-tags-changed="tagsChanged" placeholder="Tags" />
                </div>
                <div class="relative mb-3">
                    <h4 class="text-xl pb-2">Category</h4>
                </div>
                <div class="relative mb-3 text-lg">
                    <label for="video"><input @change="onChange('video')" v-model="news.video" type="checkbox" name="video" id="video"> Add to Videos?</label>
                </div>
            </div>
        </div>
    </div>
</template>
<style>
.ck.ck-toolbar.ck-toolbar_grouping>.ck-toolbar__items {
    flex-wrap: wrap !important;
}
</style>
<script>
import Vue3TagsInput from 'vue3-tags-input'
const watchdog = new window.CKSource.EditorWatchdog();
window.watchdog = watchdog;
watchdog.setCreator((element, config) => {
    return CKSource.Editor
        .create(element, config)
        .then(editor => {
            return editor;
        });
});
watchdog.setDestructor(editor => {
    return editor.destroy();
});
watchdog.on('error', (error) => {});
export default {
    name: "Create News",
    components: {Vue3TagsInput},
    data() {
        return {
            csrf_token: document.querySelector("meta[name='csrf-token']").getAttribute("content"),
            send_image: false,
            temp_tags: [],
            temp_cats: null,
            saving: false,
            news: {
                title: "",
                content: "",
                categories: [],
                tags: "",
                video: false
            },
            categories: [
                {
                    id: 1,
                    text: "HTML"
                },
                {
                    id: 2,
                    text: "CSS"
                },
                {
                    id: 3,
                    text: "JS"
                }
            ],
        }
    },
    mounted() {
        watchdog
            .create(document.querySelector('.editor'), {
                extraPlugins: [ /* SimpleUploadAdapterPlugin */ ],
            })
            .then(() => {
                watchdog.editor.model.document.on('change:data', () => {
                    this.content = watchdog.editor.getData();
                });
            })
            .catch((error)=>{});
    },
    methods: {
        async save(data){
            this.saving = true
            const formData = new FormData()
            Object.keys(data).forEach(key => {
                formData.append(key, data[key])
            })
            return await fetch("/news/"+(this.news?.id?this.news.id:""), {
                method: "POST",
                headers: {
                    "Accept": "application/json",
                    'X-CSRF-TOKEN': this.csrf_token
                },
                body: formData
            }).then(r=>r.json()).then(async r=>{
                if(r.status && r.status == 'success'){
                    this.news = r.post;
                    this.temp_tags=this.news.tags&&this.news.tags!=""?this.news.tags.split(","):[]
                    return true
                }
                return false
            }).catch(e=>{
                console.log(e)
                return false
            }).finally(()=>{this.saving=false})
        },
        async onChange(key){
            if(key == 'video') await this.save({video: this.news.video?1:0})
            if(key == 'image'){
                if(this.$refs.imageInput.files.length>0){
                    this.preview_url = window.URL.createObjectURL(this.$refs.imageInput.files[0])
                    await this.save({image: this.$refs.imageInput.files[0]})
                }
                else {
                    await this.save({"image": "delete"})
                    this.preview_url = null
                }
            }
            else await this.save({[key]: this.news[key]})
        },
        async imageDroped(event){
            this.$refs.imageInput.files = event.dataTransfer.files
            await this.onChange("image")
        },
        async draft(){
            await this.save({status: "draft"})
            this.$router.push("/news")
        },
        async publish(){
            await this.save({status: "publish"})
            this.$router.push("/news")
        },
        tagsChanged(t){this.temp_tags=t;this.news.tags=t.join(',');this.save({tags: t.join(',').toLocaleLowerCase()})},
    }
}
</script>