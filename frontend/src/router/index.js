import Vue from 'vue'
import VueRouter from 'vue-router'
import ListBlogs from '../components/ListBlogs/ListBlogs.vue'
// import LoginPage from '../components/Login/LoginPage.vue'
import BlogUpload from '../components/BlogUpload/BlogUpload.vue'

Vue.use(VueRouter)

const routes = [
  {
    path: 'manage/blog',
    name: 'Blog',
    component: ListBlogs,
  },
  {
    path: 'manage/blog/upload/:id',
    name: 'Blog Upload Update',
    component: BlogUpload,
  },
  {
    path: 'manage/blog/upload/',
    name: 'Blog Upload Create',
    component: BlogUpload,
  },
  //   {
  //     path: '/login',
  //     name: 'Login',
  //     component: LoginPage,
  //   },
]

const router = new VueRouter({
  mode: 'history',
  routes,
})

export default router
