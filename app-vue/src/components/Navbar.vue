<template>
    <nav class="bg-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex-shrink-0">
                    <router-link to="/">
                        <div class="flex-shrink-0 flex items-center">
                            <img class="block lg:hidden h-8 w-auto" src="https://tailwindui.com/img/logos/workflow-mark-indigo-500.svg" alt="Workflow">
                            <img class="hidden lg:block h-8 w-auto" src="https://tailwindui.com/img/logos/workflow-logo-indigo-500-mark-white-text.svg" alt="Workflow">
                        </div>
                    </router-link>
                    <!--                    <router-link to="/" class=""><img src="/img/logo.webp" width="50" height="50" alt="Logo"></router-link>-->
                </div>
                <div class="flex items-center">
                    <div class="hidden md:block">
                        <div class="ml-10 flex items-baseline space-x-6">
                            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                            <router-link to="/" :exact-active-class="active ? 'bg-gray-900' : ''" class="text-white px-3 py-2 rounded-md text-sm font-medium">
                                Inicio
                            </router-link>
                            <router-link to="/bug/listar" :exact-active-class="active ? 'bg-gray-900' : ''" class="text-white px-3 py-2 rounded-md text-sm font-medium">
                                Bugs
                            </router-link>
                            <a @click.prevent="logout" class="text-white px-3 py-2 rounded-md text-sm font-medium" role="menuitem" tabindex="-1">Sair</a>
                        </div>
                    </div>

                </div>
                <div class="-mr-2 flex md:hidden">
                    <!-- Mobile menu button -->
                    <div class="flex justify-center items-center">
                        <button type="button" @click="showMenu = !showMenu" aria-controls="mobile-menu" aria-expanded="false">
                            <span class="sr-only">Open main menu</span>
                            <!--
                              Heroicon name: outline/menu
                              Menu open: "hidden", Menu closed: "block"
                            -->

                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mobile menu, show/hide based on menu state. -->
        <div class="md:hidden" v-if="showMenu" id="mobile-menu">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                <router-link to="/" :exact-active-class="active ? 'bg-gray-900' : ''" class=" text-white block px-3 py-2 rounded-md text-base font-medium">
                    Home
                </router-link>
                <router-link to="/bug/listar" :exact-active-class="active ? 'bg-gray-900' : ''" class=" text-white block px-3 py-2 rounded-md text-base font-medium">
                    Bugs
                </router-link>
                <a @click.prevent="logout" class="text-white block px-3 py-2 rounded-md text-base font-medium" role="menuitem" tabindex="-1">Sair</a>
            </div>
        </div>
    </nav>
</template>
<script>
import {mapGetters, mapActions} from 'vuex'
import axios from "axios";
import Cookie from "@/services/cookie";
import router from "../router";
export default {
    name: "NavBar",
    data() {
        return {
            isOpenMenuUser: false,
            showMenu: false,
            active: 1
        }
    },
    computed: {
        ...mapGetters({
            'user': 'user/getUser',
        }),
    },
    methods: {
        logout() {
            axios.get('me/logout')
                .then(() => {
                    Cookie.deleteToken();
                    Cookie.removeCookie();
                    router.push({ name: 'login' });
                });
        }
    }
}
</script>

<style scoped>
</style>
