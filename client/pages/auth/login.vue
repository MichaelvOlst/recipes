<template>
  <div class="flex min-h-screen bg-white">
    <div class="w-96 max-w-lg mx-auto my-24 px-4 py-5 shadow-none">
      <div class="text-center p-0 font-sans">
          <h1 class="text-gray-800 text-3xl font-medium">Login</h1>
      </div>
      <form action="#" method="POST" class="p-0" @submit.prevent="login()" @keydown="errors = null">
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
          <button class="py-3 bg-green-500 text-white w-full rounded hover:bg-green-600">Login</button>
        </div>
      </form>
      <NuxtLink to="/auth/register">
        <span class="block  p-5 text-center text-gray-800  text-xs ">Don't have an account yet?</span>
      </NuxtLink>            
    </div>
  </div>
</template>


<script>
export default {
  auth: 'guest',

  data() {
    return {
      form: {
        email: '',
        password: ''
      },
      error: null,
    }
  },

  methods: {
    async login () {
      try {
        const response = await this.$axios.post('api/auth/login', this.form)
        await this.$auth.setUserToken(response.data.access_token)
        this.$router.push('/')
      } catch(e) {
        this.error = e.response.data.message
      }
    }
  }
}
</script>