import Vue from 'vue'
import VueRouter from 'vue-router'
import BlogPage from '../components/Blog/BlogPage.vue'
import LoginPage from '../components/Login/LoginPage.vue'

Vue.use(VueRouter)

const routes = [
  {
    path: '/blog',
    name: 'Blog',
    component: BlogPage,
  },
  {
    path: '/login',
    name: 'Login',
    component: LoginPage,
  },
]

const router = new VueRouter({
  mode: 'history',
  //   base: process.env.BASE_URL,
  routes,
})

export default router
