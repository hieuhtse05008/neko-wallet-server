<template>
  <v-app id="app">
    <SideBar />
    <div class="main">
      <Header />
      <router-view />
      <Footer />
    </div>
  </v-app>
</template>

<script>
import Header from './components/common/Header.vue'
import Footer from './components/common/Footer.vue'
import SideBar from './components/common/SideBar.vue'
import './style.css'

export default {
  name: 'App',
  components: {
    Header,
    SideBar,
    Footer,
  },
}
</script>

<style scoped>
.main {
  padding-left: 56px;
}
</style>
