<template>
  <v-container fluid class="pa-16">
    <v-container>
      <v-row class="mb-1" justify="center" align="center">
        <span class="page-name">Blogs</span>
      </v-row>
      <v-row class="mb-10">
        <div class="search-field-container">
          <v-text-field
            class="search-field"
            outlined
            label="Search"
            prepend-inner-icon="mdi-magnify"
          ></v-text-field>
        </div>
      </v-row>
      <v-row>
        <v-layout justify-start wrap>
          <v-col
            xs="12"
            md="6"
            lg="4"
            xl="3"
            mb-6
            v-for="(item, index) in this.$data.blogs"
            :key="index"
          >
            <v-card
              class="mx-2 mb-2"
              max-width="374"
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
              <v-img height="250" :src="item.image_url"></v-img>
            </v-card>
            <h3 class="mx-2">{{ item.title.en }}</h3>
          </v-col>
          <v-spacer></v-spacer>
        </v-layout>
      </v-row>
    </v-container>
  </v-container>
</template>

<script>
import router from '@/router'
import { getBlogs } from '../../services/Api/privateApi.js'

export default {
  name: 'BlogPage',

  data() {
    return {
      blogs: [],
    }
  },

  methods: {
    handleClick: (id) => {
      router.push(`/blog/upload/${id}`)
    },
    getListBlogs: async function () {
      try {
        const response = await getBlogs()
        this.blogs = response.data.blogs
      } catch {
        console.log('error')
      }
    },
  },

  mounted: function () {
    this.getListBlogs()
  },
}
</script>

<style scoped>
.page-name {
  font-size: 2.5rem;
  font-weight: bold;
  color: #000;
}

.search-field {
  width: 50%;
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
