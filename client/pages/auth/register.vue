<template>
  <div class="flex min-h-screen bg-white">
    <div class="max-w-lg mx-auto my-24 px-4 py-5 shadow-none">
      <div class="text-left p-0 font-sans">
          <h1 class=" text-gray-800 text-3xl font-medium">Create an account for free</h1>
      </div>
      <form action="#" method="POST" class="p-0" @submit.prevent="register()" @keydown="error = null">
        <div class="mt-5">
          <input type="text" v-model="form.name" class="block w-full p-2 border rounded border-gray-300 focus:outline-none focus:ring-1 focus:ring-gray-400 focus:border-transparent " placeholder="Name">
        </div>
        <div class="mt-5">
          <input type="email" v-model="form.email" class="block w-full p-2 border rounded border-gray-300 focus:outline-none focus:ring-1 focus:ring-gray-400 focus:border-transparent " placeholder="Email">
        </div>
        <div class="mt-5">
          <input type="password" v-model="form.password" class="block w-full p-2 border rounded border-gray-300 focus:outline-none focus:ring-1 focus:ring-gray-400 focus:border-transparent  " placeholder="Password">
        </div>
        <div v-if="error" class="text-center text-red-500 mt-5 font-medium text-lg">
          {{ error }}
        </div>
        <div class="mt-5">
          <button class="py-3 bg-green-500 text-white w-full rounded hover:bg-green-600">Register</button>
        </div>
      </form>
      <NuxtLink to="/auth/login">
        <span class="block  p-5 text-center text-gray-800  text-xs ">Already have an account?</span>
      </NuxtLink>        
    </div>

    <div v-if="error">
      {{ error }}
    </div>

  </div>
</template>

<script>
export default {
  auth: 'guest',

  data() {
    return {
      form: {
        name: '',
        email: '',
        password: ''
      },
      error: null,
    }
  },

  methods: {
    async register () {
      try {
        const response = await this.$axios.post('api/auth/register', this.form)
        this.$auth.setUserToken(response.data.access_token)
        this.$router.push({name: 'index'})
      } catch(e) {
        this.error = e.response.data.message
      }      
    }
  }
}
</script>