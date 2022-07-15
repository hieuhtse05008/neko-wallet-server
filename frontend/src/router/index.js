import Vue from 'vue'
import VueRouter from 'vue-router'
import BlogPage from '../components/Blog/BlogPage.vue'
import LoginPage from '../components/Login/LoginPage.vue'
import BlogUpload from '../components/Blog/BlogUpload.vue'

Vue.use(VueRouter)

const routes = [
  {
    path: '/blog',
    name: 'Blog',
    component: BlogPage,
  },
  {
    path: '/blog/upload/:id',
    name: 'Blog Upload',
    component: BlogUpload,
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
