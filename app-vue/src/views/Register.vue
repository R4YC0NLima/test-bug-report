<template>
<div class="bg-white font-family-karla h-screen">
  <div class="w-full flex flex-wrap">

    <!-- Image Section -->
    <div class="w-1/2 shadow-2xl">
      <img class="object-cover w-full h-screen hidden md:block" src="@/assets/img/nlw.png" alt="Background" />
    </div>

    <!-- Register Section -->
    <div class="w-full md:w-1/2 flex flex-col">

      <div class="flex justify-center md:justify-start pt-12 md:pl-12 md:-mb-12">
        <a href="#" class="bg-black text-white font-bold text-xl p-4" alt="Logo">Logo</a>
      </div>

      <div class="flex flex-col justify-center md:justify-start my-auto pt-8 md:pt-0 px-8 md:px-24 lg:px-32">
        <p class="text-center text-3xl">Junte-se a nós.</p>
        <form @submit.prevent="registerUser" class="flex flex-col pt-3 md:pt-8">
          <div class="flex flex-col pt-4">
            <label for="name" class="text-lg">Name</label>
            <input type="text" id="name" v-model="form.name" placeholder="John Smith" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline" />
          </div>

          <div class="flex flex-col pt-4">
            <label for="email" class="text-lg">Email</label>
            <input type="email" id="email" v-model="form.email" placeholder="your@email.com" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline" />
          </div>

          <div class="flex flex-col pt-4">
            <label for="password" class="text-lg">Password</label>
            <input type="password" id="password" v-model="form.password" placeholder="Password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline" />
          </div>

<!--          <div class="flex flex-col pt-4">-->
<!--            <label for="confirm-password" class="text-lg">Confirm Password</label>-->
<!--            <input type="password" id="confirm-password" placeholder="Password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline" />-->
<!--          </div>-->
          <button class="bg-black text-white font-bold text-lg hover:bg-gray-700 p-2 mt-8" id="submit"  type="submit" :disabled="loading">
            <span v-if="loading">Cadastrando....</span>
            <span v-else>Cadastrar</span>
          </button>
        </form>
        <div class="text-center pt-12 pb-12">
          <p>Você já tem conta? <router-link to="/login" class="underline font-semibold">Entre aqui.</router-link></p>
        </div>
      </div>

    </div>
  </div>
</div>
</template>

<script>
import axios from 'axios'
export default  {
  name: "Register",
  data() {
    return {
      loading: false,
      form: {
        name: '',
        email: '',
        password: ''
      }
    }
  },
  methods: {
    registerUser() {
      this.loading = true
      this.onSubmit()
    },
    onSubmit () {
      axios
          .post("/register", this.form)
          .then(() => {
            alert('Usuário cadastrado com sucesso')
            console.log('Usuário cadastrado com sucesso')
          })
          .catch((error) => {
            console.log(error);
          })
          .finally(() => this.loading = false);
    }
  },
}
</script>
