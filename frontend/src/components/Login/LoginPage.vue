<template>
  <v-container fluid class="primary pa-16">
    <v-container>
      <v-layout align-center justify-center>
        <v-col cols="4">
          <v-sheet class="secondary rounded-lg pa-12">
            <v-form ref="form" v-model="valid" lazy-validation>
              <div class="pb-2">Email address</div>
              <v-text-field
                v-model="email"
                required
                type="email"
                dense
                outlined
                full-width
                :rules="emailValidation"
              ></v-text-field>
              <div class="pb-2">Password</div>
              <v-text-field
                v-model="password"
                required
                dense
                outlined
                full-width
                :rules="passwordValidation"
                :append-icon="showPassword ? 'mdi-eye' : 'mdi-eye-off'"
                :type="showPassword ? 'text' : 'password'"
                @click:append="showPassword = !showPassword"
              ></v-text-field>
              <span class="message">{{ message }}</span>
              <v-btn
                color="primary"
                class="mt-5"
                @click="handleSubmit"
                width="100%"
                :disabled="!valid"
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
import {
  emailValidation,
  passwordValidation,
} from '../../validation/validateFormLogin'

export default {
  name: 'LoginPage',
  data() {
    return {
      email: '',
      password: '',
      emailValidation,
      passwordValidation,
      showPassword: false,
      valid: true, // if all fields are valid return true
      message: '', // error message when login fails
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
        this.message = 'Email or password is incorrect';
      }
    },
  },
}
</script>

<style scoped>
.v-text-field--outlined >>> fieldset {
  border-color: #ced4da;
}

.message {
  color: red;
  font-size: 12px;
}
</style>
