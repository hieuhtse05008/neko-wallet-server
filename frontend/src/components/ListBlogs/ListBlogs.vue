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

      <v-row class="mb-5" v-if="!loading">
        <v-layout justify-start wrap>
          <v-col
            xs="12"
            sm="6"
            md="4"
            lg="3"
            xl="2.4"
            v-for="(item, index) in this.$data.blogs"
            :key="index"
          >
            <v-card
              class="mx-2 mb-2"
              elevation="3"
              @click="() => handleClick(item.id)"
            >
              <template slot="progress">
                <v-progress-linear
                  color="deep-purple"
                  height="10"
                  indeterminate
                ></v-progress-linear>
              </template>
              <v-img :src="item.image_url"></v-img>
            </v-card>
            <h3 class="mx-2">{{ item.title.en }}</h3>
          </v-col>
          <v-spacer></v-spacer>
        </v-layout>
      </v-row>

      <v-row class="mb-5" v-if="loading">
        <v-layout justify-start wrap>
          <v-col
            xs="12"
            sm="6"
            md="4"
            lg="3"
            xl="2.4"
            v-for="(item, index) in new Array(params.limit).fill(0)"
            :key="index"
          >
            <v-skeleton-loader
              class="mx-2 mb-2"
              type="card"
              min-width="150"
            ></v-skeleton-loader>
          </v-col>
          <v-spacer></v-spacer>
        </v-layout>
      </v-row>

      <v-row class="mb-5" justify="center" align="center">
        <v-pagination
          v-model="params.page"
          :length="totalPage"
          circle
          @input="getListBlogs"
        ></v-pagination>
      </v-row>
    </v-container>
  </v-container>
</template>

<script>
import router from '@/router'
import { getBlogs } from '../../services/Api/authApi.js'
import { QUANTITY_CARD } from '../../utils/constants'

export default {
  name: 'BlogPage',

  data() {
    return {
      blogs: [],
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
    sleep: function (ms) {
      return new Promise((resolve) => setTimeout(resolve, ms))
    },
    getListBlogs: async function () {
      this.loading = true
      try {
        const response = await getBlogs(this.params)
        this.blogs = response.data.blogs.items
        this.params.page = response.data.blogs.meta.current_page
        this.totalPage = response.data.blogs.meta.total_pages
        await this.sleep(1000)
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
  },

  mounted: function () {
    this.getListBlogs()
    document.title = 'List Blog'
  },
}
</script>

<style scoped>
.page-name {
  font-size: 2rem;
  font-weight: bold;
  color: #000;
}

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
