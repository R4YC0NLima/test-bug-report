import { createRouter, createWebHistory } from 'vue-router'
import Home from '../views/Home.vue'
import Login from "@/views/Login";
import Guard from '@/services/middleware'
import LayoutAuth from '@/layouts/Auth'
import LayoutDefault from '@/layouts/Default'
import Register from "@/views/Register";

const routes = [
    {
        path: '/', component: LayoutDefault,
        beforeEnter: Guard.redirectIfNotAuthenticated,
        children: [
            {path: '', name: 'index', component: Home},
        ]
    },
    {
        path: '/login', component: LayoutAuth,
        beforeEnter: Guard.redirectIfAuthenticated,
        children: [
            { path: '', name: 'login', component: Login },
        ],
    },
    {
        path: '/register', component: LayoutAuth,
        beforeEnter: Guard.redirectIfAuthenticated,
        children: [
            { path: '', name: 'register', component: Register },
        ],
    },
    {
        path: '/',
        name: 'Home',
        component: Home
    },
]


const router = createRouter({
    history: createWebHistory(process.env.BASE_URL),
    routes: routes
})


export default router
