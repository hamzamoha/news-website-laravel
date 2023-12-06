<template>
    <div class="p-8 text-slate-700 font-semibold">
        <div class="grid md:grid-cols-3 gap-5">
            <div class="md:col-span-2">
                <div class="relative mb-3">
                    <input v-model="news.title" autocomplete="off" type="text" id="title" class="peer relative z-[1] block h-12 pt-2 px-2 leading-10 w-full text-sm bg-transparent placeholder:text-transparent rounded border outline-none" placeholder="Title" />
                    <label for="title" class="absolute text-slate-600 left-1 text-sm duration-300 px-1 peer-placeholder-shown:leading-5 -translate-y-1.5 text-xs top-2 bg-white peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:text-base peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:text-xs peer-focus:-translate-y-1.5">Title</label>
                </div>
                <div class="relative mb-3">
                    <picture-input ref="pictureInput" height="315" width="560" accept="image/*" button-class="btn" :custom-strings="{drag: 'Drag or Upload Image'}">
                    </picture-input>
                </div>
                <div class="relative mb-3">
                    <div class="py-3 text-2xl">Content</div>
                    <textarea class="hidden" v-model="news.content"></textarea>
                    <div class="editor"></div>
                </div>
            </div>
            <div>
                <div class="relative mb-3">
                    <h4 class="text-xl pb-2">Tags</h4>
                    <vue3-tags-input @on-tags-changed="(t)=>news.tags = t.join(',')" placeholder="input tags" />
                </div>
                <div class="relative mb-3">
                    <h4 class="text-xl pb-2">Category</h4>
                    <vue3-tags-input :duplicate-select-item="false" :tags="news.categories" @on-tags-changed="(t)=>news.categories = t" @on-select="(t)=>news.categories.push(t)" placeholder="input tags" :select-items="categories" :select="true">
                        <template #select-item="tag">
                            {{ tag.text }}
                        </template>
                        <template #item="{ tag, index }">
                            {{ tag.text }}
                        </template>
                        <template #no-data>
                            No Data
                        </template>
                    </vue3-tags-input>
                </div>
                <div class="relative mb-3 text-lg">
                    <label for="video"><input v-model="news.video" type="checkbox" name="video" id="video"> Add to Videos?</label>
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
import PictureInput from 'vue-picture-input'
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
    components: {Vue3TagsInput,PictureInput},
    data() {
        return {
            news: {
                title: "",
                content: "",
                categories: [],
                tags: "",
                image: "",
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
}
</script>