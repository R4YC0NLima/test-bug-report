<template>
    <div class="min-h-screen flex flex-col justify-between pt-4">
        <div class="container max-w-6xl mx-auto px-4">
            <div class='overflow-x-auto w-full'>
                <div class="bg-white rounded-xl relative z-10 overflow-hidden border border-primary border-opacity-full shadow shadow-2xl py-8 px-6 sm:p-10 lg:py-8 lg:px-4 xl:p-10 mb-10">
                    <table class="min-w-full">
                        <thead>
                        <tr>
                            <th class="px-6 py-3 text-xs font-medium leading-3 tracking-wider text-center text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                Titulo
                            </th>
                            <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-center text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                Descrição
                            </th>
                            <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-center text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                Tipo
                            </th>
                            <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-center text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                Status
                            </th>
                            <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-center text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                Usuario
                            </th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50"></th>
                            <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-center text-gray-500 uppercase border-b border-gray-200 bg-gray-50">

                            </th>
                        </tr>
                        </thead>
                        <tbody class="bg-white">
                        <tr v-if="bugs.length < 1">
                            <td colspan="6" class="text-center"><h5>Sem registros!</h5></td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 border-b text-center border-gray-200 whitespace-nowrap">
                                <div class="text-sm leading-5 text-gray-900">
                                    {{ bugs.title }}
                                </div>
                            </td>
                            <td class="px-6 py-4 border-b border-gray-200 text-center whitespace-nowrap">
                                <div class="text-sm leading-5 text-gray-900">
                                    {{ bugs.description }}
                                </div>
                            </td>

                            <td class="px-6 py-4 border-b border-gray-200 text-center whitespace-nowrap">
                                {{ bugs.type }}
                            </td>
                            <td class="px-6 py-4 border-b border-gray-200 text-center whitespace-nowrap">
                                <span :class="`inline-flex px-2 text-xs font-semibold leading-5 text-white bg-${bugs.status?.color}-800 rounded-full`">
                                  {{ bugs.status?.name }}
                                </span>
                            </td>
                            <td class="px-6 py-4 border-b border-gray-200 text-center whitespace-nowrap">
                                <span class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">
                                  {{ bugs.user?.name }}
                                </span>
                            </td>

<!--                            <td class="px-6 py-4 text-sm font-medium leading-5 text-right border-b border-gray-200 whitespace-nowrap">-->
<!--                                &lt;!&ndash;                        <a href="#" class="px-4 py-1 text-sm text-white bg-blue-400 rounded mr-2" @click.prevent="copyURL(this.domain + bug.code)">Copiar</a>&ndash;&gt;-->
<!--                                <a href="#" class="px-4 py-1 text-sm text-white bg-red-400 rounded mr-2" @click.prevent="onDelete(bug.id)">Remover</a>-->
<!--                                <router-link :to="{ name: 'bugShow', params: { id: bug.id } }" class="px-4 py-1 text-sm text-white bg-blue-400 rounded">Ver</router-link>-->
<!--                                <router-link :to="{ name: 'bugUpdate', params: { id: bug.id } }" class="px-4 py-1 text-sm text-white bg-blue-400 rounded">Atualizar</router-link>-->
<!--                            </td>-->
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
import {computed, onMounted, reactive} from 'vue'
import {useStore} from "vuex";
import axios from 'axios'

export default {
    name: "BugShow",
    emits: ['getData'],
    props: {
        id: {
            require: true,
            type: Object
        }
    },
    setup (props) {
        const store     = useStore()
        const getData   = computed(() => store.state.bug.data)
        const bugs      = reactive({})

        onMounted(() => {
            getBug()
        })

        function getBug() {
            axios.get('bugs/' + props.id).then((response) => {
                // bugs.values = response.data
                bugs.title          = response.data.title
                bugs.description    = response.data.description
                bugs.type           = response.data.title
                bugs.status         = response.data.status
                bugs.user           = response.data.user
            })
        }

        function onDelete() {
            axios
                .delete("bugs/" + id)
                .then(() => {
                    btnRefresh()
                })
                .catch((error) => {
                    console.log(error);
                });
        }

        return {
            getData,
            bugs,
            getBug,
            onDelete,
        }
    }


}
</script>

<style scoped>

</style>
