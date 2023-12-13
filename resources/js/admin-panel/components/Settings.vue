<template>
    <div class="p-8 text-slate-700 font-semibold">
        <div class="w-[700px] mx-auto max-w-full">
            <div class="my-4 grid sm:grid-cols-2 gap-4">
                <div>
                    <label class="text-sm text-slate-500 block" for="website_title">Website Title</label>
                    <div v-if="editable.website_title" class="relative">
                        <input v-model="settings.website_title" class="block w-full leading-6 py-1.5 px-2 outline-none text-sm bg-slate-200 rounded" type="text" name="website_title" id="website_title" placeholder="Website Title">
                        <button @click="editable.website_title=false" class="absolute right-0 top-0 h-9 w-9 leading-9 text-center"><i class="fa-solid fa-check"></i></button>
                    </div>
                    <div v-else class="text-lg leading-9 text-slate-600">{{ settings.website_title }} <button @click="editable.website_title=true"><i class="fa-solid fa-pen"></i></button></div>
                </div>
                <div>
                    <div class="text-sm text-slate-500">Logo</div>
                    <img class="py-1" src="/images/logo.png" alt="">
                </div>
            </div>
            <div class="my-4">
                <label class="text-sm text-slate-500 block" for="description">Description</label>
                <div v-if="editable.description" class="relative my-1">
                    <textarea rows="2" v-model="settings.description" class="block w-full px-2 h-16 leading-8 outline-none text-sm bg-slate-200 rounded" type="text" name="description" id="description" placeholder="Description"></textarea>
                    <button @click="editable.description=false" class="absolute right-0 bottom-0 h-8 w-8 leading-8 text-center"><i class="fa-solid fa-check"></i></button>
                </div>
                <div v-else class="text-sm h-16 leading-8 text-slate-600 my-1">{{ settings.description }} <button @click="editable.description=true"><i class="fa-solid fa-pen"></i></button></div>
            </div>
            <div class="my-4">
                <label class="text-sm text-slate-500 block" for="keywords">Keywords</label>
                <div v-if="editable.keywords" class="relative">
                    <input v-model="settings.keywords" class="block w-full leading-6 py-1.5 px-2 outline-none text-sm bg-slate-200 rounded" type="text" name="keywords" id="keywords" placeholder="Keywords">
                    <button @click="editable.keywords=false" class="absolute right-0 top-0 h-9 w-9 leading-9 text-center"><i class="fa-solid fa-check"></i></button>
                </div>
                <div v-else class="leading-9 text-slate-600">{{ settings.keywords }} <button @click="editable.keywords=true"><i class="fa-solid fa-pen"></i></button></div>
            </div>
            <div class="border-b-2 py-3">
                <h3 class="text-3xl text-slate-600">Social Media</h3>
            </div>
            <div class="grid sm:grid-cols-2 gap-3 my-3">
                <div class="relative">
                    <input v-model="settings.social_media.facebook" class="block w-full leading-6 py-1.5 pl-10 pr-1 outline-none text-sm focus:bg-slate-100 bg-slate-200 rounded" type="text" name="facebook" id="facebook" placeholder="Facebook Link">
                    <div class="absolute left-0 top-0 h-9 w-9 leading-9 text-slate-500 text-center"><i class="fa-brands fa-facebook-f fa-sm"></i></div>
                </div>
                <div class="relative">
                    <input v-model="settings.social_media.x" class="block w-full leading-6 py-1.5 pl-10 pr-1 outline-none text-sm focus:bg-slate-100 bg-slate-200 rounded" type="text" name="x" id="x" placeholder="X Link">
                    <div class="absolute left-0 top-0 h-9 w-9 leading-9 text-slate-500 text-center"><i class="fa-brands fa-x-twitter"></i></div>
                </div>
            </div>
            <div class="grid sm:grid-cols-2 gap-3 my-3">
                <div class="relative">
                    <input v-model="settings.social_media.instagram" class="block w-full leading-6 py-1.5 pl-10 pr-1 outline-none text-sm focus:bg-slate-100 bg-slate-200 rounded" type="text" name="instagram" id="instagram" placeholder="Instagram Link">
                    <div class="absolute left-0 top-0 h-9 w-9 leading-9 text-slate-500 text-center"><i class="fa-brands fa-instagram"></i></div>
                </div>
                <div class="relative">
                    <input v-model="settings.social_media.tiktok" class="block w-full leading-6 py-1.5 pl-10 pr-1 outline-none text-sm focus:bg-slate-100 bg-slate-200 rounded" type="text" name="tiktok" id="tiktok" placeholder="Tiktok Link">
                    <div class="absolute left-0 top-0 h-9 w-9 leading-9 text-slate-500 text-center"><i class="fa-brands fa-tiktok"></i></div>
                </div>
            </div>
            <div class="text-center my-3">
                <button type="button" class="py-2 px-4 text-sm rounded bg-slate-600 hover:bg-slate-500 text-slate-100">Save</button>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name: "Settings",
    data() {
        return {
            settings: {
                website_title: 'Men News',
                description: "",
                keywords: "",
                social_media: {
                    facebook: "",
                    x: "",
                    instagram: "",
                    youtube: "",
                    tiktok: ""
                }
            },
            editable: {
                website_title: false,
                description: false,
                keywords: false,
                social_media: {
                    facebook: false,
                    x: false,
                    instagram: false,
                    youtube: false,
                    tiktok: false
                }
            }
        }
    },
}
</script>