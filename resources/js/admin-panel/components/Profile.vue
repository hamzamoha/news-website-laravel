<template>
    <div class="p-8 text-slate-700 font-semibold">
        <div class="pt-28 mt-20 px-10 relative max-w-screen-lg mx-auto border border-slate-600">
            <div class="absolute bg-white group/image -top-20 left-1/2 -translate-x-1/2 border-slate-600 border-2 w-40 h-40 rounded-full overflow-hidden">
                <img v-if="preview_url" class="w-full h-full object-cover block" :src="preview_url" alt="">
                <img v-else class="w-full h-full object-cover block" :src="user.photo" alt="">
                <div class="hidden group-hover/image:block absolute inset-0 w-full h-full">
                    <input @change="handleChange($event)" type="file" name="image" id="image" class="hidden">
                    <label class="flex w-full h-full justify-center items-center text-center bg-slate-950 bg-opacity-30 text-slate-100 text-3xl cursor-pointer" for="image"><i class="fa-solid fa-camera"></i></label>
                </div>
            </div>
            <div class="grid sm:grid-cols-2 gap-2">
                <form autocomplete="off">
                    <h4 class="pb-2 text-2xl text-center">Your Informations</h4>
                    <div class="mb-3 h-12 rounded border p-2 relative">
                        <div class="text-xs text-slate-500 font-medium leading-3">Name</div>
                        <input v-if="editable.name == 1" type="text" v-model="user.name" class="h-5 border-none outline-none w-full bg-transparent leading-5 text-sm p-0 m-0 block">
                        <div v-else class="leading-5">{{ user.name }}</div>
                        <button @click="()=>{if(editable.name)save('name');else editable.name=true}" class="absolute top-0 right-0 h-12 w-12 text-slate-600">
                            <i v-if="editable.name == 1" class="fa-solid fa-check fa-sm"></i>
                            <i v-else-if="editable.name == -1" class="fa-solid fa-spinner fa-spin fa-sm"></i>
                            <i v-else class="fa-solid fa-pen fa-xs"></i>
                        </button>
                    </div>
                    <div class="mb-3 h-12 rounded border p-2 relative">
                        <div class="text-xs text-slate-500 font-medium leading-3">Email</div>
                        <input v-if="editable.email == 1" type="email" v-model="user.email" class="h-5 border-none outline-none w-full bg-transparent leading-5 text-sm p-0 m-0 block">
                        <div v-else class="leading-5">{{ user.email }}</div>
                        <button @click="()=>{if(editable.email)save('email');else editable.email=true}" class="absolute top-0 right-0 h-12 w-12 text-slate-600">
                            <i v-if="editable.email == 1" class="fa-solid fa-check fa-sm"></i>
                            <i v-else-if="editable.email == -1" class="fa-solid fa-spinner fa-spin fa-sm"></i>
                            <i v-else class="fa-solid fa-pen fa-xs"></i>
                        </button>
                    </div>
                    <div class="mb-3 h-12 rounded border p-2 relative">
                        <div class="text-xs text-slate-500 font-medium leading-3">Username</div>
                        <input v-if="editable.username == 1" type="text" v-model="user.username" class="h-5 border-none outline-none w-full bg-transparent leading-5 text-sm p-0 m-0 block">
                        <div v-else class="leading-5">{{ user.username }}</div>
                        <button @click="()=>{if(editable.username)save('username');else editable.username=true}" class="absolute top-0 right-0 h-12 w-12 text-slate-600">
                            <i v-if="editable.username == 1" class="fa-solid fa-check fa-sm"></i>
                            <i v-else-if="editable.username == -1" class="fa-solid fa-spinner fa-spin fa-sm"></i>
                            <i v-else class="fa-solid fa-pen fa-xs"></i>
                        </button>
                    </div>
                </form>
                <form autocomplete="off">
                    <h4 class="pb-2 text-2xl text-center">Password</h4>
                    <div class="relative mb-3">
                        <input v-model="password.current_password" autocomplete="off" type="password" id="current_password" class="peer block relative z-[1] h-12 pt-2 px-2 leading-10 w-full text-sm bg-transparent placeholder:text-transparent rounded border outline-none" placeholder="Current Password" />
                        <label for="current_password" class="absolute text-slate-400 left-1 text-sm duration-300 px-1 peer-placeholder-shown:leading-5 -translate-y-1.5 text-xs top-2 bg-white peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:text-base peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:text-xs peer-focus:-translate-y-1.5">Current Password</label>
                    </div>
                    <div class="relative mb-3">
                        <input v-model="password.new_password" autocomplete="off" type="password" id="new_password" class="peer relative z-[1] block h-12 pt-2 px-2 leading-10 w-full text-sm bg-transparent placeholder:text-transparent rounded border outline-none" placeholder="New Password" />
                        <label for="new_password" class="absolute text-slate-400 left-1 text-sm duration-300 px-1 peer-placeholder-shown:leading-5 -translate-y-1.5 text-xs top-2 bg-white peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:text-base peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:text-xs peer-focus:-translate-y-1.5">New Password</label>
                    </div>
                    <div class="relative mb-3">
                        <input v-model="password.new_password_confirmation" autocomplete="off" type="password" id="new_password_confirmation" class="peer relative z-[1] block h-12 pt-2 px-2 leading-10 w-full text-sm bg-transparent placeholder:text-transparent rounded border outline-none" placeholder="Confirm New Password" />
                        <label for="new_password_confirmation" class="absolute text-slate-400 left-1 text-sm duration-300 px-1 peer-placeholder-shown:leading-5 -translate-y-1.5 text-xs top-2 bg-white peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:text-base peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:text-xs peer-focus:-translate-y-1.5">Confirm New Password</label>
                    </div>
                    <div class="text-center pb-3">
                        <button type="button" class="py-2 px-4 rounded bg-slate-700 hover:bg-slate-600 text-slate-100">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name: "Profile",
    data() {
        return {
            csrf_token: document.querySelector("meta[name='csrf-token']").getAttribute("content"),
            user: {
                name: "John Malkovich",
                email: "johnmalkivich@zfone.de",
                username: "john",
                photo: "https://source.unsplash.com/random/200x200?beautiful,girl,face,profile,picture,photo&sig=195"
            },
            editable: {
                name: 0,
                email: 0,
                username: 0
            },
            password: {
                current_password: '',
                new_password: '',
                new_password_confirmation: ''
            },
            preview_url: null
        }
    },
    methods: {
        handleChange($event) {
            if($event.target.files.length > 0)
                this.preview_url = window.URL.createObjectURL($event.target.files[0])
            else 
                this.preview_url = null
        },
        async fetchData(){
            await fetch(`/admin/profile`, {
                headers: {
                    "Content-Type": "application/json",
                    "Accept": "application/json"
                }
            })
            .then(r=>r.json())
            .then(r=>(this.user=r))
        },
        async save(key){
            if(this.editable[key] === undefined) return;
            this.editable[key] = -1
            await fetch(`/admin`, {
                method: "PUT",
                headers: {
                    "Content-Type": "application/json",
                    "Accept": "application/json",
                    'X-CSRF-TOKEN': this.csrf_token
                },
                body: JSON.stringify({
                    [key]: this.user[key]
                })
            })
            .then(r=>r.json())
            .then(r=>{this.editable[key]=0;this.user=r})
        }
    },
    mounted() {
        this.fetchData()
    }
}
</script>