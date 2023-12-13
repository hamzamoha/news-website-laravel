<template>
    <div class="p-8 text-slate-700 text-sm">
        <h4 class="text-3xl pb-3">Recent Comments</h4>
        <table class="w-full text-sm" v-if="comments">
            <thead>
                <tr>
                    <th class="py-3 border text-center px-1">#</th>
                    <th class="py-3 border px-1">Comment</th>
                    <th class="py-3 border text-center px-1">Author</th>
                    <th class="py-3 border px-1">Post</th>
                    <th class="py-3 border text-center px-1">Replies</th>
                    <th class="py-3 border text-center px-1">Date</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(item, index) in comments.data" :key="index">
                    <td class="py-3 border text-center px-1">{{(comments.current_page - 1)*comments.per_page + 1 + index}}</td>
                    <td class="py-3 border px-1">{{ item.content }}</td>
                    <td class="py-3 border text-center px-1">{{ item.name }}</td>
                    <td class="py-3 border px-1" v-html="item.post.title.substr(0,30) + '...'"></td>
                    <td class="py-3 border text-center px-1">{{ Math.floor(Math.random()*3) }}</td>
                    <td class="py-3 border text-center px-1">{{ date(item.created_at) }}</td>
                </tr>
            </tbody>
        </table>
        <section v-if="comments && comments.last_page > 1" class="flex py-3">
            <ul class="flex mx-auto border rounded-lg overflow-hidden">
                <li>
                    <span v-if="comments.current_page == 1" class="block px-3 py-2 text-sm border-r text-neutral-400 cursor-default">
                        <i class="fa-solid fa-angles-left"></i>
                    </span>
                    <button type="button" v-else @click="fetchData(1)" class="block px-3 py-2 text-sm border-r hover:bg-amber-300">
                        <i class="fa-solid fa-angles-left"></i>
                    </button>
                </li>
                <li>
                    <span v-if="comments.current_page == 1" class="block px-3 py-2 text-sm border-r text-neutral-400 cursor-default">
                        <i class="fa-solid fa-angle-left"></i>
                    </span>
                    <button type="button" v-else @click="fetchData(comments.current_page-1)" class="block px-3 py-2 text-sm border-r hover:bg-amber-300">
                        <i class="fa-solid fa-angle-left"></i>
                    </button>
                </li>
                <li v-for="(item, index) in (Math.min(comments.last_page, Math.max(1, comments.current_page - 2) + 4) - Math.max(1, Math.min(comments.last_page, Math.max(1, comments.current_page - 2) + 4) - 4) + 1)" :key="index">
                    <span v-if="(index + Math.max(1, Math.min(comments.last_page, Math.max(1, comments.current_page - 2) + 4) - 4)) == comments.current_page" class="block px-3 py-2 text-sm border-r bg-amber-300 cursor-default">
                        {{ index + Math.max(1, Math.min(comments.last_page, Math.max(1, comments.current_page - 2) + 4) - 4) }}
                    </span>
                    <button type="button" v-else class="block px-3 py-2 text-sm border-r hover:bg-amber-300" @click="fetchData(index + Math.max(1, Math.min(comments.last_page, Math.max(1, comments.current_page - 2) + 4) - 4))">
                        {{ index + Math.max(1, Math.min(comments.last_page, Math.max(1, comments.current_page - 2) + 4) - 4) }}
                    </button>
                </li>
                <li>
                    <span v-if="comments.current_page == comments.last_page" class="block px-3 py-2 text-sm border-r text-neutral-400 cursor-default">
                        <i class="fa-solid fa-angle-right"></i>
                    </span>
                    <button type="button" v-else @click="fetchData(comments.current_page + 1)" class="block px-3 py-2 text-sm border-r hover:bg-amber-300">
                        <i class="fa-solid fa-angle-right"></i>
                    </button>
                </li>
                <li>
                    <span v-if="comments.current_page == comments.last_page" class="block px-3 py-2 text-sm border-r text-neutral-400 cursor-default">
                        <i class="fa-solid fa-angles-right"></i>
                    </span>
                    <button type="button" v-else @click="fetchData(comments.last_page)" class="block px-3 py-2 text-sm border-r hover:bg-amber-300">
                        <i class="fa-solid fa-angles-right"></i>
                    </button>
                </li>
            </ul>
        </section>
    </div>
</template>
<script>
export default {
    name: "Comments",
    data() {
        return {
            comments: null,
        }
    },
    methods: {
        async fetchData(page = 1, per_page = 25){
            this.comments = null;
            await fetch(`/comments?per_page=${per_page}&page=${page}`, {
                headers: {
                    "Content-Type": "application/json",
                    "Accept": "application/json"
                }
            })
            .then(r=>r.json())
            .then(r=>(this.comments=r));
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