<template>
    <div :class="'flex min-h-screen group' + (sidebar?' active':'')">
        <div class="w-[250px] group-[.active]:w-14 bg-slate-700 transition-all">
            <ul>
                <li>
                    <router-link active-class="bg-slate-800" to="/" class="h-14 whitespace-nowrap overflow-hidden text-slate-300 text-sm outline-none transition-all hover:bg-slate-800 block p-5 leading-4">
                        <span class="h-4 mr-5 w-4 inline-block leading-4 text-center">
                            <i class="fa-solid fa-gauge fa-sm"></i>
                        </span>
                        <span>Dashboard</span>
                    </router-link>
                </li>
                <li>
                    <router-link active-class="bg-slate-800" to="/news" class="h-14 whitespace-nowrap overflow-hidden text-slate-300 text-sm outline-none transition-all hover:bg-slate-800 block p-5 leading-4">
                        <span class="h-4 mr-5 w-4 inline-block leading-4 text-center">
                            <i class="fa-regular fa-newspaper fa-sm"></i>
                        </span>
                        <span>News</span>
                    </router-link>
                </li>
                <li>
                    <router-link active-class="bg-slate-800" to="/comments" class="h-14 whitespace-nowrap overflow-hidden text-slate-300 text-sm outline-none transition-all hover:bg-slate-800 block p-5 leading-4">
                        <span class="h-4 mr-5 w-4 inline-block leading-4 text-center">
                            <i class="fa-solid fa-comments fa-sm"></i>
                        </span>
                        <span>Comments</span>
                    </router-link>
                </li>
                <li>
                    <router-link active-class="bg-slate-800" to="/profile" class="h-14 whitespace-nowrap overflow-hidden text-slate-300 text-sm outline-none transition-all hover:bg-slate-800 block p-5 leading-4">
                        <span class="h-4 mr-5 w-4 inline-block leading-4 text-center">
                            <i class="fa-solid fa-user fa-sm"></i>
                        </span>
                        <span>Profile</span>
                    </router-link>
                </li>
                <li>
                    <router-link active-class="bg-slate-800" to="/settings" class="h-14 whitespace-nowrap overflow-hidden text-slate-300 text-sm outline-none transition-all hover:bg-slate-800 block p-5 leading-4">
                        <span class="h-4 mr-5 w-4 inline-block leading-4 text-center">
                            <i class="fa-solid fa-gear fa-sm"></i>
                        </span>
                        <span>Settings</span>
                    </router-link>
                </li>
                <form method="POST" action="/admin/logout">
                    <input type="hidden" name="_token" :value="csrf_token">
                    <button class="h-14 w-full text-left whitespace-nowrap overflow-hidden text-red-500 text-sm outline-none transition-all hover:bg-slate-800 block p-5 leading-4">
                        <span class="h-4 mr-5 w-4 inline-block leading-4 text-center">
                            <i class="fa-solid fa-right-from-bracket"></i>
                        </span>
                        <span>Logout</span>
                    </button>
                </form>
            </ul>
        </div>
        <div class="flex-1">
            <nav class="flex text-slate-800 bg-white shadow-md h-14 items-center">
                <button @click="sidebar=!sidebar" type="button" class="hover:bg-slate-100 mr-3 transition-all leading-10 py-2 w-14 text-center"><i class="fa-solid fa-list-ul fa-sm"></i></button>
                <div class="leading-10 py-2 px-2 text-sm">
                    <div v-if="$route && ($route.path != '/')">
                        <router-link to="/" class="transition-all hover:text-slate-400">Dashboard</router-link>
                        <span class="px-2">/</span>
                        <span>{{ $route.matched[0].components?.default.name }}</span>
                    </div>
                    <div v-else>
                        <span class="">Dashboard</span>
                    </div>
                </div>
                <div class="ml-auto h-14 py-2 pr-2 flex gap-4">
                    <a target="_blank" href="/" class="leading-8 my-1 px-2 rounded bg-slate-600 text-slate-100 font-semibold hover:bg-slate-500 block">View Website</a>
                    <button class="block"><img class="block w-10 h-10 rounded-full object-cover" src="" alt=""></button>
                </div>
            </nav>
        <router-view />
        </div>
    </div>
</template>
<script>
import "../../css/ckeditor-tailwind-reset.css"
export default {
    name: "App",
    data() {
        return {
            sidebar: false,
            csrf_token: document.querySelector("meta[name='csrf-token']").getAttribute("content")
        }
    },
}
</script>