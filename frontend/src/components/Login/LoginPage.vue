<template>
  <v-container fluid class="primary pa-16">
    <v-container>
      <v-layout align-center justify-center>
        <v-col cols="4">
          <v-sheet class="secondary rounded-xl pa-12">
            <v-form ref="form">
              <div class="pb-2">Email address</div>
              <v-text-field
                v-model="email"
                required
                dense
                outlined
                full-width
              ></v-text-field>
              <div class="pb-2">Password</div>
              <v-text-field
                v-model="password"
                required
                dense
                outlined
                full-width
              ></v-text-field>

              <v-btn
                color="primary"
                class="mt-5"
                @click="handleSubmit"
                width="100%"
              >
                Login
              </v-btn>
            </v-form>
          </v-sheet>
        </v-col>

        <v-col cols="8">
          <v-img src="https://nekoinvest.io/images/full_model_neko.png"></v-img>
        </v-col>
      </v-layout>
    </v-container>
  </v-container>
</template>

<script>
import router from '@/router'
import { login } from '../../services/Api/publicApi'

export default {
  name: 'LoginPage',
  data() {
    return {
      email: '',
      password: '',
    }
  },
  mounted() {
    if (localStorage.getItem('token')) {
      router.push('/blog')
    }
  },
  methods: {
    handleSubmit: async function () {
      try {
        const result = await login(this.email, this.password)
        localStorage.setItem('token', result.data.token)
        router.push('/blog')
      } catch {
        console.log('Login failed')
      }
    },
  },
}
</script>

<style scoped>
.v-text-field--outlined >>> fieldset {
  border-color: #ced4da;
}
</style>
