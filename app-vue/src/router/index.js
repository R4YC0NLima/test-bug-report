import Vue from 'vue'
import { createRouter, createWebHistory } from 'vue-router'
import Home from '../views/Home.vue'
import Login from "@/views/Login";
import Guard from '@/services/middleware'
import LayoutAuth from '@/layouts/Auth'
import LayoutDefault from '@/layouts/Default'
import Register from "@/views/Register";

import Bug from "@/views/Bug/Index";
import BugNew from "@/views/Bug/New";
import BugShow from "@/views/Bug/Show";
import BugUpdate from "@/views/Bug/Update";

import User from "@/views/User/Index";
import UserNew from "@/views/User/New";
import UserUpdate from "@/views/User/Update";

import store from '@/store'

const routes = [
    {
        path: '/', component: LayoutDefault,
        beforeEnter: Guard.redirectIfNotAuthenticated,
        children: [
            {
                path: '',
                name: 'index',
                component: Home,
                meta: {
                    title: 'Home'
                }
            },
            {
                path: '/bug/listar',
                name: 'bug',
                component: Bug,
                meta: {
                    title: 'Listar Bugs'
                }
            },
            {
                path: '/bug/novo',
                name: 'bugNew',
                component: BugNew,
                meta: {
                    title: 'Novo Bug'
                }
            },
            {
                path: '/bug/:id/ver',
                name: 'bugShow',
                component: BugShow,  props: true
            },
            {
                path: '/bug/:id/editar',
                name: 'bugUpdate',
                component: BugUpdate,
                props: true,
                meta: {
                    title: 'Atualizar Bug'
                }
            },

            {
                path: '/usuario/listar',
                name: 'user',
                component: User,
                meta: {
                    title: 'Listar Usuários',
                    requiresAuth: true
                }
            },
            {
                path: '/usuario/novo',
                name: 'userNew',
                component: UserNew,
                meta: {
                    title: 'Novo Usuário',
                    requiresAuth: true
                }
            },
            {
                path: '/usuario/:id/editar',
                name: 'userUpdate',
                component: UserUpdate,
                props: true,
                meta: {
                    title: 'Editar Usuários',
                    requiresAuth: true
                }
            },
        ]
    },
    {
        path: '/login', component: LayoutAuth,
        beforeEnter: Guard.redirectIfAuthenticated,
        children: [
            {
                path: '',
                name: 'login',
                component: Login,
                meta: {
                    title: 'Login'
                }
            },
        ],
    },
    {
        path: '/register', component: LayoutAuth,
        beforeEnter: Guard.redirectIfAuthenticated,
        children: [
            {
                path: '',
                name: 'register',
                component: Register,
                meta: {
                    title: 'Cadastrar-se'
                }
            },
        ],
    },
]


const router = createRouter({
    history: createWebHistory(process.env.BASE_URL),
    routes: routes
})

router.beforeEach((to, _from, next) => {
    if (to.matched.some(record => record.meta.requiresAuth)) {
        if (store.state.user.user.admin) {
            next();
        } else {
            next('/login');
        }
    } else {
        next();
    }
});


export default router
