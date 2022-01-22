<template>
    <div class="min-h-screen flex flex-col justify-between pt-4">
        <div class="container max-w-6xl mx-auto px-4">
            <div class='overflow-x-auto w-full'>
                <div class="flex items-center justify-end">
                    <button @click.prevent="btnRefresh" class="text-white bg-green-800 font-medium px-3 py-2 rounded mr-2">Atualizar</button>
                    <router-link to="/bug/novo" class="text-white bg-green-800 font-medium px-3 py-2 rounded">Novo Bug</router-link>
                </div>
                <div class="bg-white rounded-xl relative z-10 overflow-hidden border border-primary border-opacity-full shadow shadow-2xl py-8 px-6 sm:p-10 lg:py-8 lg:px-4 xl:p-10 mb-10">
                    <table class="min-w-full">
                        <thead>
                        <tr>
                            <th class="px-6 py-3 text-xs font-medium leading-3 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                Titulo
                            </th>
                            <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                Descrição
                            </th>
                            <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                Tipo
                            </th>
                            <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                Status
                            </th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50"></th>
                            <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">

                            </th>
                        </tr>
                        </thead>

                        <tbody class="bg-white">
                        <tr v-for="(item, index) in getData" :key="index">
                            <td class="px-6 py-4 border-b border-gray-200 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="ml-4">
                                        <div class="text-sm font-medium leading-5 text-gray-900">
                                            {{ item.id }}
                                        </div>
                                    </div>
                                </div>
                            </td>

                            <td class="px-6 py-4 border-b border-gray-200 whitespace-nowrap">
                                <div class="text-sm leading-5 text-gray-900">
                                    {{ item.title }}
                                </div>
                            </td>
                            <td class="px-6 py-4 border-b border-gray-200 whitespace-nowrap">
                                <div class="text-sm leading-5 text-gray-900">
                                    {{ item.description }}
                                </div>
                            </td>

                            <td class="px-6 py-4 border-b border-gray-200 whitespace-nowrap">
                                {{ item.type }}
                            </td>
                            <td class="px-6 py-4 border-b border-gray-200 whitespace-nowrap">
                    <span class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">
                      {{ item.status }}
                    </span>
                            </td>

                            <td class="px-6 py-4 text-sm font-medium leading-5 text-right border-b border-gray-200 whitespace-nowrap">
                                <!--                        <a href="#" class="px-4 py-1 text-sm text-white bg-blue-400 rounded mr-2" @click.prevent="copyURL(this.domain + item.code)">Copiar</a>-->
                                <a href="#" class="px-4 py-1 text-sm text-white bg-yellow-400 rounded" @click.prevent="onDelete(item.id)">Remover</a>
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

export default {
    name: "Bug",
    emits: ['btnRefresh', 'getData'],
    setup () {
        const store     = useStore()
        const getData   = computed(() => store.state.bug.data)

        onMounted(() => {
            btnRefresh()
        })
        function btnRefresh() {
            store.dispatch('bug/SET_BUG')
        }

        return {
            getData,
            btnRefresh
        }
    }


}
</script>

<style scoped>

</style>
