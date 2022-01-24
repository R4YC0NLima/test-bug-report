<template>
    <div class="min-h-screen flex flex-col justify-between pt-4">
        <div class="container max-w-6xl mx-auto px-4">
            <div class=' w-full'>
                <div class="flex items-center justify-end">
                    <button @click.prevent="btnRefresh" class="text-white bg-green-800 font-medium px-3 py-2 rounded mr-2">Atualizar</button>
                    <button href="#my-work" class="text-white bg-green-800 font-medium px-3 py-2 rounded">Novo Bug</button>
                </div>
                <div class="rounded-xl relative z-10 overflow-hidden border border-primary border-opacity-full shadow shadow-2xl py-8 px-6 sm:p-10 lg:py-8 lg:px-4 xl:p-10 mb-10">
                    <form method="POST">
                        <div class="shadow overflow-hidden sm:rounded-md">
                            <div class="px-4 py-5 bg-white sm:p-6">
                                <div class="md:flex md:items-center mb-6">
                                    <div class="md:w-full">
                                        <label class="block text-gray-500 font-bold md:text-left mb-1 md:mb-0 pr-4" for="inline-full-name">
                                            Nome
                                        </label>
                                        <input
                                            type="text" v-model="formData.name"
                                            class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                                        >
                                    </div>
                                </div>
                                <div class="md:flex md:items-center mb-6">
                                    <div class="md:w-full">
                                        <label class="block text-gray-500 font-bold md:text-left mb-1 md:mb-0 pr-4" for="inline-full-name">
                                            Email
                                        </label>
                                        <input
                                            type="email" v-model="formData.email"
                                            class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                                            id="inline-full-name">
                                    </div>
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="classifications" class="block text-sm font-medium text-gray-700">Administrador</label>
                                    <select id="classifications" v-model="formData.admin" name="country" autocomplete="country-name" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        <option value="0">Não</option>
                                        <option value="1">Sim</option>
                                    </select>
                                </div>
                                <div class="md:flex md:items-center mb-6">
                                    <div class="md:w-full">
                                        <label class="block text-gray-500 font-bold md:text-left mb-1 md:mb-0 pr-4" for="inline-full-name">
                                            Senha
                                        </label>
                                        <input
                                            type="password" v-model="formData.password"
                                            class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                                        >
                                    </div>
                                </div>
                            </div>
                            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                <button type="submit" @click.prevent="handleSubmit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Enviar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
import {onMounted, reactive, ref} from 'vue'
import axios from 'axios'

export default {
    name: "UserNew",
    emits: ['btnRefresh', 'getData'],
    setup () {
        const data      = ref([])
        const formData  = reactive({
            name    : '',
            email   : '',
            admin   : 0,
            password: '',
        })
        const loading   = ref(false)
        const error     = ref(null)

        function btnRefresh() {
            loading.value = true

            return axios.get('/boot-system')
                        .then((response) => {
                            data.value = response.data
                        })
                        .catch(err => {
                            error.value = err
                        })
                        .finally(() => {
                            loading.value = false
                        })
        }

        function handleSubmit() {
            return axios.post('/register', {...formData})
            .then((response) => {
                console.log(response)
            })
        }

        onMounted(() => {
            btnRefresh()
        })

        return {
            handleSubmit,
            formData,
            data,
            btnRefresh,
            loading,
             error
        }
    }


}
</script>

<style scoped>

</style>
