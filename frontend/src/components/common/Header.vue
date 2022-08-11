<template>
  <v-app-bar
    class="app-bar"
    ref="appBar"
    app
    absolute
    dense
    color="secondary"
    elevate-on-scroll
    scroll-target="#main"
  >
    <v-row>
      <v-col class="pa-0" cols="6">
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
      <v-col cols="6" class="text-right pa-0">
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
  mounted: function () {
    this.$refs.appBar.$el
      .querySelector('.v-toolbar__content')
      .classList.add('container')
  },
}
</script>

<style>
.v-toolbar__content {
  width: 90%;
  padding: 0 !important;
}
.app-bar {
  height: 60px !important;
  display: flex;
  align-items: center;
  justify-content: center;
  position: fixed !important;
}
</style>
