import {createApp} from 'vue'
import { createRouter, createWebHashHistory } from "vue-router"
import CKEditor from '@ckeditor/ckeditor5-vue';

import App from './admin-panel/App.vue'
import Dashboard from "./admin-panel/components/Dashboard.vue"
import Comments from "./admin-panel/components/Comments.vue"
import News from "./admin-panel/components/News.vue"
import Profile from "./admin-panel/components/Profile.vue"
import Settings from "./admin-panel/components/Settings.vue"
import CreateNews from "./admin-panel/components/CreateNews.vue"

const router = createRouter({
    history: createWebHashHistory(),
    linkActiveClass: "active",
    routes: [
        {
            path: '/',
            alias: '/*',
            component: Dashboard,
        },
        {
            path: '/news',
            alias: '/news/*',
            component: News,
        },
        {
            path: '/news/create',
            alias: '/news/create/*',
            component: CreateNews
        },
        {
            path: '/comments',
            alias: '/comments/*',
            component: Comments,
        },
        {
            path: '/profile',
            alias: '/profile/*',
            component: Profile,
        },
        {
            path: '/settings',
            alias: '/settings/*',
            component: Settings,
        }
    ]
})

const app = createApp(App);
app.config.globalProperties.titleCase = (s) => (s.toLowerCase().split(' ').map((w)=>(w.replace(w[0],w[0].toUpperCase()))).join(' '))
app.use(router)
app.use(CKEditor)
app.mount("body")