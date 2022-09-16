<template>
  <v-container fluid class="pa-0 pt-16 container-content">
    <v-container>
      <v-row class="mb-1" justify="center" align="center">
        <div class="page-name">Blogs</div>
      </v-row>
      <v-row class="mb-10">
        <div class="search-field-container">
          <v-text-field
            class="search-field"
            outlined
            label="Search"
            v-model="params.search"
            @keyup.enter="handleSearch"
            prepend-inner-icon="mdi-magnify"
          ></v-text-field>
        </div>
      </v-row>

      <v-row>
        <v-col class="col-12">
          <Table
            :headers="headers"
            :items="blogs"
            :pagination="{
              page: params.page,
              totalPage: totalPage,
              limit: params.limit,
            }"
            :onChange="handleOnChangePage"
            :loading="loading"
            :onSelectRow="handleSelectRow"
          >
            <template v-slot:[`item.image_url`]="{ item }">
              <img width="100" height="60" :src="item.image_url" alt="" />
            </template>
          </Table>
        </v-col>
      </v-row>
    </v-container>
  </v-container>
</template>

<script>
import router from '@/router'
import Table from '../common/Table.vue'
import { getBlogs } from '../../services/Api/authApi.js'
import { QUANTITY_CARD } from '../../utils/constants'

export default {
  name: 'BlogPage',
  components: {
    Table,
  },
  data() {
    return {
      blogs: [],
      headers: [
        { text: 'ID', value: 'id' },
        { text: 'Image', value: 'image_url' },
        { text: 'Title', value: 'title' },
        { text: 'Description', value: 'description' },
        { text: 'Author', value: 'author' },
      ],
      params: {
        search: null,
        page: 1,
        limit: QUANTITY_CARD,
      },
      totalPage: 0,
      loading: true,
    }
  },

  methods: {
    handleClick: (id) => {
      router.push(`/blog/upload/${id}`)
    },
    getListBlogs: async function () {
      this.loading = true
      try {
        const response = await getBlogs(this.params)
        this.blogs = response.data.blogs.items.map((item) => {
          return {
            id: item.id,
            image_url: item.image_url,
            title: item.title.en,
            description: item.description.en,
          }
        })
        this.params.page = response.data.blogs.meta.current_page
        this.totalPage = response.data.blogs.meta.total_pages
      } catch {
        console.log('error')
      }
      this.loading = false
    },
    handleSearch: async function () {
      try {
        if (this.params.search === '') this.params.search = null
        this.params.page = 1
        await this.getListBlogs()
      } catch {
        console.log('error')
      }
    },
    handleOnChangePage: async function (page) {
      this.params.page = page
      await this.getListBlogs()
    },
    handleSelectRow: function (item) {
      this.$router.push(`/blog/upload/${item.id}`)
    },
  },

  mounted: function () {
    this.getListBlogs()
    document.title = 'List Blog'
  },
}
</script>

<style scoped>
.search-field {
  width: 70vw;
  height: 50px;
  margin: 0 auto;
}

.search-field-container {
  width: 100%;
}

.v-text-field fieldset {
  border: 1px solid red !important;
}
</style>
