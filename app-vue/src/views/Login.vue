<template>
    <div class="bg-white font-family-karla h-screen">
        <div class="w-full flex flex-wrap">
            <!-- Image Section -->
            <div class="w-1/2 shadow-2xl">
                <img class="object-cover w-full h-screen hidden md:block" src="@/assets/img/nlw.png">
            </div>

            <!-- Login Section -->
            <div class="w-full md:w-1/2 flex flex-col">

                <div class="flex justify-center md:justify-start pt-12 md:pl-12 md:-mb-24">
                    <a href="#" class="bg-black text-white font-bold text-xl p-4">Logo</a>
                </div>

                <div class="flex flex-col justify-center md:justify-start my-auto pt-8 md:pt-0 px-8 md:px-24 lg:px-32">
                    <p class="text-center text-3xl">Bem vindo!</p>
                    <form class="flex flex-col pt-3 md:pt-8" @submit.prevent="onSubmit">
                        <div class="flex flex-col pt-4">
                            <label for="email" class="text-lg">Email</label>
                            <input type="email" id="email" v-model="formData.email" placeholder="your@email.com" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline">
                        </div>

                        <div class="flex flex-col pt-4">
                            <label for="password" class="text-lg">Password</label>
                            <input type="password" id="password" v-model="formData.password" placeholder="Password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline">
                        </div>

                        <input type="submit" value="Log In" class="bg-black text-white font-bold text-lg hover:bg-gray-700 p-2 mt-8">
                    </form>
                    <div class="text-center pt-12 pb-12">
                        <p>Não tem conta? <router-link to="/register" class="underline font-semibold">Cadastre-se aqui.</router-link></p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios'
import { mapActions } from 'vuex';
import Cookie from "@/services/cookie";
export default  {
    name: "Login",
    data() {
        return {
            formData: {
                email: '',
                password: ''
            }
        }
    },
    methods: {

        onSubmit () {

            if (this.formData.password.length > 0) {
                  // axios.get('/sanctum/csrf-cookie').then(response => {
                    axios.post('login', this.formData)
                        .then(response => {
                            const token = `${response.data.token_type} ${response.data.access_token}`;
                            Cookie.setToken(token);
                            this.SET_USER(response.data.data);
                            this.$router.push({ name: 'index' });
                        })
                        .catch(function (error) {
                            console.error(error);
                        });
                // })
            }
        },
        ...mapActions('user', ['SET_USER']),
    },
}
</script>
