import Vue from 'vue'
import VueRouter from 'vue-router'
import ListBlogs from '../components/ListBlogs/ListBlogs.vue'
import BlogUpload from '../components/BlogUpload/BlogUpload.vue'
import ContactRequest from '../components/ContactRequest/index.vue'

Vue.use(VueRouter)

const routes = [
  {
    path: '*',
    name: 'Blogs',
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
  {
    path: '/contact-requests',
    name: 'Contact Requests',
    component: ContactRequest,
  },
]

const router = new VueRouter({
  mode: 'history',
  base: '/manage',
  routes,
})

export default router
