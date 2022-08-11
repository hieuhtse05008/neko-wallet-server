<template>
  <v-container fluid class="container-content primary">
    <v-container>
      <v-layout align-center justify-center>
        <v-col xs="12" sm="8" md="6" lg="4">
          <v-sheet class="login-form secondary rounded-lg pa-5">
            <v-form ref="form" v-model="valid" lazy-validation>
              <div class="pb-2">Email address</div>
              <v-text-field
                v-model="email"
                required
                type="email"
                dense
                outlined
                full-width
                @keyup.enter="handleSubmit"
                :rules="emailValidation"
              ></v-text-field>
              <div class="pb-2">Password</div>
              <v-text-field
                v-model="password"
                required
                dense
                outlined
                full-width
                @keyup.enter="handleSubmit"
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
        <v-col v-if="width > 600" xs="0" sm="4" md="6" lg="8">
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
    document.title = 'Login'
  },
  computed: {
    width: function () {
      return this.$vuetify.breakpoint.width
    },
  },
  watch: {
    width: function () {
      console.log(this.width)
    },
  },
  methods: {
    handleSubmit: async function () {
      try {
        const result = await login(this.email, this.password)
        localStorage.setItem('token', result.data.token)
        router.push('/blog')
      } catch {
        console.log('Login failed')
        this.message = 'Email or password is incorrect'
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

.login-form {
  width: 90%;
  margin: auto;
}
</style>
