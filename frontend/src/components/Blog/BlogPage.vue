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
            v-for="(item, index) in this.$data.items"
            :key="index"
          >
            <v-card
              class="mb-5"
              max-width="374"
              elevation="3"
              @click="handleClick"
            >
              <template slot="progress">
                <v-progress-linear
                  color="deep-purple"
                  height="10"
                  indeterminate
                ></v-progress-linear>
              </template>
              <v-img
                height="250"
                src="http://d1j8r0kxyu9tj8.cloudfront.net/files/1638764763zRl8n8Y3NFFIRCn.png"
              ></v-img>
            </v-card>
            <h3>TECHNOLOGY: EVM AND NON-EVM?</h3>
          </v-col>
        </v-layout>
      </v-row>
    </v-container>
  </v-container>
</template>

<script>
import router from '@/router'

export default {
  name: 'BlogPage',
  data() {
    return {
      email: '',
      password: '',
      items: [
        {
          image:
            'http://d1j8r0kxyu9tj8.cloudfront.net/files/1638764763zRl8n8Y3NFFIRCn.png',
          title: 'Blog',
        },
        {
          image:
            'http://d1j8r0kxyu9tj8.cloudfront.net/files/1638764763zRl8n8Y3NFFIRCn.png',
          title: 'Blog',
        },
        {
          image:
            'http://d1j8r0kxyu9tj8.cloudfront.net/files/1638764763zRl8n8Y3NFFIRCn.png',
          title: 'Blog',
        },
        {
          image:
            'http://d1j8r0kxyu9tj8.cloudfront.net/files/1638764763zRl8n8Y3NFFIRCn.png',
          title: 'Blog',
        },
        {
          image:
            'http://d1j8r0kxyu9tj8.cloudfront.net/files/1638764763zRl8n8Y3NFFIRCn.png',
          title: 'Blog',
        },
        {
          image:
            'http://d1j8r0kxyu9tj8.cloudfront.net/files/1638764763zRl8n8Y3NFFIRCn.png',
          title: 'Blog',
        },
        {
          image:
            'http://d1j8r0kxyu9tj8.cloudfront.net/files/1638764763zRl8n8Y3NFFIRCn.png',
          title: 'Blog',
        },
        {
          image:
            'http://d1j8r0kxyu9tj8.cloudfront.net/files/1638764763zRl8n8Y3NFFIRCn.png',
          title: 'Blog',
        },
        {
          image:
            'http://d1j8r0kxyu9tj8.cloudfront.net/files/1638764763zRl8n8Y3NFFIRCn.png',
          title: 'Blog',
        },
        {
          image:
            'http://d1j8r0kxyu9tj8.cloudfront.net/files/1638764763zRl8n8Y3NFFIRCn.png',
          title: 'Blog',
        },
        {
          image:
            'http://d1j8r0kxyu9tj8.cloudfront.net/files/1638764763zRl8n8Y3NFFIRCn.png',
          title: 'Blog',
        },
      ],
    }
  },
  methods: {
    handleClick: () => {
      router.push('/blog/upload/1')
    },
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
