import Vue from 'vue'
import VueRouter from 'vue-router'
import ListBlogs from '../components/ListBlogs/ListBlogs.vue'
import BlogUpload from '../components/BlogUpload/BlogUpload.vue'

Vue.use(VueRouter)

const routes = [
  {
    path: '/blog',
    name: 'Blog',
    component: ListBlogs,
  },
  {
    path: '/blog/upload/:id',
    name: 'Blog Upload Update',
    component: BlogUpload,
  },
  {
    path: '/blog/upload/',
    name: 'Blog Upload Create',
    component: BlogUpload,
  },
]

const router = new VueRouter({
  mode: 'history',
  base: '/manage/',
  routes,
})

export default router
