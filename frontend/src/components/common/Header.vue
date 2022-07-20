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
    <v-btn color="primary" dark @click="handleLogout"> Logout </v-btn>
  </v-app-bar>
</template>

<script>
import { logout } from '../../services/Api/privateApi'
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
}
</style>
