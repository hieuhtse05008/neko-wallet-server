<template>
  <v-app id="app">
    <SideBar :drawer="drawer" @change="(value) => (drawer = value)" />
    <div class="main">
      <Header @clickDrawer="handleClickDrawer" />
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
  data() {
    return {
      drawer: false,
    }
  },
  methods: {
    handleClickDrawer() {
      this.drawer = !this.drawer
    },
  },
}
</script>

<style scoped>
.main {
  padding-left: 56px;
}

@media (max-width: 960px) {
  .main {
    padding-left: 0;
  }
}
</style>
