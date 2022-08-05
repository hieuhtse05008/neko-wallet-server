<template>
  <v-app-bar
    class="app-bar"
    app
    absolute
    dense
    color="secondary"
    elevate-on-scroll
    scroll-target="#main"
  >
    <v-row class="p-5">
      <v-col cols="6">
        <v-toolbar-title class="title">
          <a href="/login">
            <img
              width="100"
              height="28"
              src="https://nekoinvest.io/images/logo/long-orange-text-black-neko.svg"
              alt=""
            />
          </a>
        </v-toolbar-title>
      </v-col>
      <v-col cols="6" class="text-right">
        <v-btn color="primary" dark @click="handleLogout"> Logout </v-btn>
      </v-col>
    </v-row>
  </v-app-bar>
</template>

<script>
import { logout } from '../../services/Api/authApi'
import router from '@/router'

export default {
  // eslint-disable-next-line vue/multi-word-component-names
  name: 'Header',
  methods: {
    handleLogout: async function () {
      try {
        logout()
      } catch (error) {
        console.log(error)
      }
      localStorage.removeItem('token')
      router.push('/login')
    },
  },
}
</script>

<style>
.v-toolbar__content {
  justify-content: end;
  padding: 10px;
}
.app-bar {
  height: 60px !important;
  padding: 10px 80px 0 80px;
}
</style>
