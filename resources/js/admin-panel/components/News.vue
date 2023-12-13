<template>
    <div class="p-8 text-slate-700">
        <h3 class="mb-3 leading-10 text-3xl">All News <router-link to="/news/create" class="py-1 leading-5 px-3 text-sm text-slate-100 rounded bg-slate-700 hover:bg-slate-600">Add</router-link></h3>
        <table class="w-full text-sm" v-if="news">
            <thead>
                <tr>
                    <th class="py-4 border px-2 text-center font-bold text-slate-500">#</th>
                    <th class="py-4 border px-2 font-bold text-slate-500">Title</th>
                    <th class="py-4 border px-2 text-center font-bold text-slate-500">Categories</th>
                    <th class="py-4 border px-2 text-center font-bold text-slate-500">Views</th>
                    <th class="py-4 border px-2 text-center font-bold text-slate-500">Status</th>
                    <th class="py-4 border px-2 text-center font-bold text-slate-500">Date</th>
                </tr>
            </thead>
            <tbody>
                <tr class="hover:bg-slate-100 cursor-pointer" @click="$router.push(`/news/edit/${item.id}`)" v-for="(item, index) in news.data" :key="index">
                    <td class="py-4 border px-2 text-center">{{ 1 + +index }}</td>
                    <td class="py-4 border px-2">{{ item.title }}</td>
                    <td class="py-3.5 border px-2">
                        <div class="flex gap-2">
                            <span class="rounded bg-slate-200 px-1.5 leading-6" v-for="(item, index) in item.categories.split(',')" :key="index">{{ item }}</span>
                        </div>
                    </td>
                    <td class="py-4 border px-2 text-center">{{ Math.floor(Math.random()*266) }}</td>
                    <td class="py-4 border px-2 text-center">
                        <span v-if="item.status == 'publish'" class="py-2 px-1.5 text-xs bg-green-100 border border-green-200 text-green-500 rounded">Published</span>
                        <span v-else class="py-2 px-1.5 text-xs bg-orange-100 border border-orange-200 text-orange-500 rounded">Draft</span>
                    </td>
                    <td class="py-4 border px-2 text-center">{{ date(item.created_at) }}</td>
                </tr>
            </tbody>
        </table>
        <section v-if="news && news.last_page > 1" class="flex py-3">
            <ul class="flex mx-auto border rounded-lg overflow-hidden">
                <li>
                    <span v-if="news.current_page == 1" class="block px-3 py-2 text-sm border-r text-neutral-400 cursor-default">
                        <i class="fa-solid fa-angles-left"></i>
                    </span>
                    <button type="button" v-else @click="fetchData(1)" class="block px-3 py-2 text-sm border-r hover:bg-amber-300">
                        <i class="fa-solid fa-angles-left"></i>
                    </button>
                </li>
                <li>
                    <span v-if="news.current_page == 1" class="block px-3 py-2 text-sm border-r text-neutral-400 cursor-default">
                        <i class="fa-solid fa-angle-left"></i>
                    </span>
                    <button type="button" v-else @click="fetchData(news.current_page-1)" class="block px-3 py-2 text-sm border-r hover:bg-amber-300">
                        <i class="fa-solid fa-angle-left"></i>
                    </button>
                </li>
                <li v-for="(item, index) in (Math.min(news.last_page, Math.max(1, news.current_page - 2) + 4) - Math.max(1, Math.min(news.last_page, Math.max(1, news.current_page - 2) + 4) - 4) + 1)" :key="index">
                    <span v-if="(index + Math.max(1, Math.min(news.last_page, Math.max(1, news.current_page - 2) + 4) - 4)) == news.current_page" class="block px-3 py-2 text-sm border-r bg-amber-300 cursor-default">
                        {{ index + Math.max(1, Math.min(news.last_page, Math.max(1, news.current_page - 2) + 4) - 4) }}
                    </span>
                    <button type="button" v-else class="block px-3 py-2 text-sm border-r hover:bg-amber-300" @click="fetchData(index + Math.max(1, Math.min(news.last_page, Math.max(1, news.current_page - 2) + 4) - 4))">
                        {{ index + Math.max(1, Math.min(news.last_page, Math.max(1, news.current_page - 2) + 4) - 4) }}
                    </button>
                </li>
                <li>
                    <span v-if="news.current_page == news.last_page" class="block px-3 py-2 text-sm border-r text-neutral-400 cursor-default">
                        <i class="fa-solid fa-angle-right"></i>
                    </span>
                    <button type="button" v-else @click="fetchData(news.current_page + 1)" class="block px-3 py-2 text-sm border-r hover:bg-amber-300">
                        <i class="fa-solid fa-angle-right"></i>
                    </button>
                </li>
                <li>
                    <span v-if="news.current_page == news.last_page" class="block px-3 py-2 text-sm border-r text-neutral-400 cursor-default">
                        <i class="fa-solid fa-angles-right"></i>
                    </span>
                    <button type="button" v-else @click="fetchData(news.last_page)" class="block px-3 py-2 text-sm border-r hover:bg-amber-300">
                        <i class="fa-solid fa-angles-right"></i>
                    </button>
                </li>
            </ul>
        </section>
    </div>
</template>
<script>
export default {
    name: "News",
    data() {
        return {
            news: null
        }
    },
    methods: {
        async fetchData(page = 1, per_page = 25){
            this.news = null;
            await fetch(`/news?per_page=${per_page}&page=${page}`, {
                headers: {
                    "Content-Type": "application/json",
                    "Accept": "application/json"
                }
            })
            .then(r=>r.json())
            .then(r=>(this.news=r));
        },
        date(date){
            let d = new Date(date)
            return (d.getDate()<10?"0"+d.getDate():d.getDate()) + "/" + (d.getMonth() + 1) + "/" + d.getFullYear()
        }
    },
    mounted() {
        this.fetchData();
    },
}
</script>