<template>
    <div class="min-h-screen flex flex-col justify-between pt-4">
        <div class="container max-w-6xl mx-auto px-4">
            <div class='overflow-x-auto w-full'>
                <div class="flex items-center justify-end">
                    <button @click.prevent="btnRefresh" class="text-white bg-green-800 font-medium px-3 py-2 rounded mr-2">Refresh</button>
                    <router-link to="/user/novo" class="text-white bg-green-800 font-medium px-3 py-2 rounded">Novo Usuário</router-link>
                </div>
                <div class="bg-white rounded-xl relative z-10 overflow-hidden border border-primary border-opacity-full shadow shadow-2xl py-8 px-6 sm:p-10 lg:py-8 lg:px-4 xl:p-10 mb-10">
                    <table class="min-w-full">
                        <thead>
                        <tr>
                            <th class="px-6 py-3 text-xs font-medium leading-3 tracking-wider text-center text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                #
                            </th>
                            <th class="px-6 py-3 text-xs font-medium leading-3 tracking-wider text-center text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                Nome
                            </th>
                            <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-center text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                Email
                            </th>
                            <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-center text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                Admin
                            </th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50"></th>
                            <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-center text-gray-500 uppercase border-b border-gray-200 bg-gray-50">

                            </th>
                        </tr>
                        </thead>

                        <tbody class="bg-white">
                        <tr v-if="getData.length < 1">
                            <td colspan="6" class="text-center"><h5>Sem registros!</h5></td>
                        </tr>
                        <tr v-for="(user, index) in getData" :key="index">
                            <td class="px-6 py-4 border-b border-gray-200 whitespace-nowrap">
                                <div class="flex users-center">
                                    <div class="ml-4">
                                        <div class="text-sm text-center font-medium leading-5 text-gray-900">
                                            {{ user.id }}
                                        </div>
                                    </div>
                                </div>
                            </td>

                            <td class="px-6 py-4 border-b border-gray-200 whitespace-nowrap">
                                <div class="text-sm text-center leading-5 text-gray-900">
                                    {{ user.name }}
                                </div>
                            </td>
                            <td class="px-6 py-4 border-b border-gray-200 whitespace-nowrap">
                                <div class="text-sm text-center leading-5 text-gray-900">
                                    {{ user.email }}
                                </div>
                            </td>

                            <td class="px-6 py-4 border-b text-center border-gray-200 whitespace-nowrap">
                                {{ user.admin === 1 ? 'Administrador' : 'Usuário' }}
                            </td>
                            <td class="px-6 py-4 border-b border-gray-200 whitespace-nowrap">
                                <span class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">
                                  {{ user.status }}
                                </span>
                            </td>

                            <td class="px-6 py-4 text-sm font-medium leading-5 text-right border-b border-gray-200 whitespace-nowrap">
                                <button class="px-4 py-1 text-sm text-white bg-red-400 rounded mr-2" @click.prevent="onDelete(user.id)">Remover</button>
<!--                                <router-link :to="{ name: 'userUpdate', params: { id: user.id } }" class="px-4 py-1 text-sm text-white bg-blue-400 rounded">Atualizar</router-link>-->
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
import {computed, onMounted} from 'vue'
import {useStore} from "vuex";
import axios from 'axios'

export default {
    name: "User",
    emits: ['btnRefresh', 'getData'],
    setup () {
        const store     = useStore()
        const getData   = computed(() => store.state.user.data)

        onMounted(() => {
            btnRefresh()
        })

        function btnRefresh() {
            store.dispatch('user/SET_USER')
        }

        function onDelete(id) {
            axios
                .delete("users/" + id)
                .then(() => {
                    btnRefresh()
                })
                .catch((error) => {
                    console.log(error);
                });
        }

        return {
            getData,
            btnRefresh,
            onDelete,
        }
    }


}
</script>

<style scoped>

</style>
