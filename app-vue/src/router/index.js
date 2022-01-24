import { createRouter, createWebHistory } from 'vue-router'
import Home from '../views/Home.vue'
import Login from "@/views/Login";
import Guard from '@/services/middleware'
import LayoutAuth from '@/layouts/Auth'
import LayoutDefault from '@/layouts/Default'
import Register from "@/views/Register";

import Bug from "@/views/Bug/Index";
import BugNew from "@/views/Bug/New";
import BugUpdate from "@/views/Bug/Update";

import User from "@/views/User/Index";
import UserNew from "@/views/User/New";
import UserUpdate from "@/views/User/Update";

const routes = [
    {
        path: '/', component: LayoutDefault,
        beforeEnter: Guard.redirectIfNotAuthenticated,
        children: [
            {path: '', name: 'index', component: Home},
            {path: '/bug/listar', name: 'bug', component: Bug},
            {path: '/bug/novo', name: 'bugNew', component: BugNew},
            {path: '/bug/:id/editar', name: 'bugUpdate', component: BugUpdate,  props: true},

            {path: '/user/listar', name: 'user', component: User},
            {path: '/user/novo', name: 'userNew', component: UserNew},
            {path: '/user/:id/editar', name: 'userUpdate', component: UserUpdate,  props: true},
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
]


const router = createRouter({
    history: createWebHistory(process.env.BASE_URL),
    routes: routes
})


export default router
