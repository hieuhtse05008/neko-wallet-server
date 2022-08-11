<template>
  <v-app id="app">
    <Header />
    <router-view />
    <Footer />
  </v-app>
</template>

<script>
import Header from './components/common/Header.vue'
import Footer from './components/common/Footer.vue'
import './style.css'

export default {
  name: 'App',
  components: {
    Header,
    Footer,
  },
}
</script>

<style></style>
