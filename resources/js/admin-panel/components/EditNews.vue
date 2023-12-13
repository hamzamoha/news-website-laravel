<template>
    <div class="px-8 py-4 text-slate-700 font-semibold" v-if="news">
        <div class="text-right pb-4">
            <button @click="deletePost()" class="leading-6 py-2 px-4 rounded mx-1 bg-red-600 hover:bg-red-500 outline-none active:bg-red-600 text-slate-100" type="button">Delete</button>
            <button @click="draft()" :disabled="saving" class="leading-6 py-2 px-4 rounded mx-1 bg-slate-500 hover:bg-slate-400 outline-none active:bg-slate-500 text-slate-100" type="button">
                <i v-if="saving" class="fa-solid fa-spinner fa-spin"></i>
                <span v-else>Save</span>
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
                    <div class="editor1"></div>
                </div>
            </div>
            <div>
                <div class="relative mb-3">
                    <h4 class="text-xl pb-2">Tags</h4>
                    <vue3-tags-input v-if="temp_tags" :tags="temp_tags" @on-tags-changed="tagsChanged" placeholder="input tags" />
                </div>
                <div class="relative mb-3">
                    <h4 class="text-xl pb-2">Category</h4>
                    <vue3-tags-input :duplicate-select-item="false" v-if="temp_cats" :tags="temp_cats" @on-tags-changed="categoriesChanged" @on-select="categoriesSelected" placeholder="input tags" :select-items="categories" :select="true">
                        <template #select-item="tag">
                            {{ tag.text }}
                        </template>
                        <template #item="{ tag, index }">
                            {{ tag.text.replace(/\w\S*/g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();}) }}
                        </template>
                        <template #no-data>
                            No Data
                        </template>
                    </vue3-tags-input>
                </div>
                <div class="relative mb-3 text-lg">
                    <label for="video"><input @change="onChange('video')" :checked="news.video==1" type="checkbox" name="video" id="video"> Add to Videos?</label>
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
import { watch, ref } from "vue"
import Vue3TagsInput from 'vue3-tags-input'
const watchdog = new window.CKSource.EditorWatchdog()
window.watchdog = watchdog
watchdog.setCreator((element, config) => {
    return CKSource.Editor
        .create(element, config)
        .then(editor => {
            return editor
        })
});
watchdog.setDestructor(editor => {
    return editor.destroy()
});
watchdog.on('error', (error) => {});
const newsRef = ref(null)
export default {
    name: "Edit News",
    components: {Vue3TagsInput},
    data() {
        return {
            csrf_token: document.querySelector("meta[name='csrf-token']").getAttribute("content"),
            send_image: false,
            news: null,
            temp_tags: null,
            temp_cats: null,
            temp_timeout: null,
            preview_url: null,
            saving: false,
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
        this.fetchData()
        watch(newsRef, async (newNews, oldNews) => {if(newNews)setTimeout(() => {
            this.initContent()
        }, 1000)})
    },
    methods: {
        showFile() {
            console.log(this.$refs.imageinput.file)
        },
        initContent(){
            watchdog
            .create(document.querySelector('.editor1'), {
                extraPlugins: [ /* SimpleUploadAdapterPlugin */ ],
                initialData: this.news.content
            })
            .then(() => {
                watchdog.editor.model.document.on('change:data', async () => {
                    this.news.content = watchdog.editor.getData()
                    if(this.temp_timeout) await clearTimeout(this.temp_timeout);
                    this.temp_timeout = setTimeout(() => {
                        this.onChange('content')
                    }, 2000)
                });
            })
            .catch((error)=>{console.log(error);});
        },
        async fetchData(){
            this.news = null;
            await fetch(`/news/api/${this.$route.params.id}`, {
                headers: {
                    "Accept": "application/json"
                }
            })
            .then(r=>r.json())
            .then(r=>{newsRef.value=this.news=r;this.temp_tags=r.tags&&r.tags!=''?r.tags.split(","):[];this.temp_cats=r.categories&&r.categories!=""?r.categories.split(",").map(e=>({text: e})):[]});
        },
        async save(data){
            this.saving = true
            const formData = new FormData()
            Object.keys(data).forEach(key => {
                formData.append(key, data[key])
            })
            return await fetch(`/news/${this.news.id}`, {
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
                    this.news.image = this.news.image + "?" + new Date().getTime()
                    setTimeout(() => {
                        this.$refs.imageInput.value = ""
                        this.preview_url = null
                    }, 500);
                }
                else {
                    await this.save({"image": "delete"})
                    this.preview_url = null
                }
            }
            else await this.save({[key]: this.news[key]})
        },
        async deletePost(){
            await this.save({"_method": "DELETE"})
            this.$router.push("/news")
        },
        async draft(){
            await this.save({"status": "draft"})
            this.$router.push("/news")
        },
        async publish(){
            await this.save({"status": "publish"})
            this.$router.push("/news")
        },
        tagsChanged(t){this.temp_tags=t;this.news.tags=t.join(',');this.save({tags: t.join(',').toLocaleLowerCase()})},
        async categoriesChanged(t){this.temp_cats=t;this.news.categories=t.map(e=>e.text).join(',').toLocaleLowerCase();this.save({categories: this.news.categories});return t;},
        async categoriesSelected(t){await this.temp_cats.push(t);this.news.categories=this.temp_cats.map(e=>e.text).join(',');this.save({categories: this.news.categories})},
        async imageDroped(event){
            this.$refs.imageInput.files = event.dataTransfer.files
            await this.onChange("image")
        }
    }
}
</script>