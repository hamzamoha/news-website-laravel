<template>
    <div class="p-8 text-slate-700 text-sm">
        <h4 class="text-3xl pb-3">Recent Comments</h4>
        <table class="w-full">
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
                <tr v-for="(item, index) in 16" :key="index">
                    <td class="py-3 border text-center px-1">{{item}}</td>
                    <td class="py-3 border px-1">That was Awesome</td>
                    <td class="py-3 border text-center px-1">Jake</td>
                    <td class="py-3 border px-1">How to write your own ...</td>
                    <td class="py-3 border text-center px-1">{{ Math.floor(Math.random()*3) }}</td>
                    <td class="py-3 border text-center px-1">2012</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
<script>
export default {
    name: "Comments",
}
</script>