<template>
  <v-navigation-drawer permanent expand-on-hover app>
    <v-list>
      <v-list-item class="px-2">
        <v-list-item-avatar>
          <v-img :src="avatar_url"></v-img>
        </v-list-item-avatar>
      </v-list-item>

      <v-list-item link>
        <v-list-item-content>
          <v-list-item-title class="text-h6"> {{ name }} </v-list-item-title>
          <v-list-item-subtitle>{{ email }}</v-list-item-subtitle>
        </v-list-item-content>
      </v-list-item>
    </v-list>

    <v-divider></v-divider>

    <v-list nav dense>
      <v-list-item
        :class="currentItemIndex === index ? 'selected' : ''"
        :key="index"
        v-for="(item, index) in NavItems"
        @click="() => handleClickItem(`/${item.path}`, index)"
        link
      >
        <v-list-item-icon>
          <v-icon>{{ item.icon }}</v-icon>
        </v-list-item-icon>
        <v-list-item-title>{{ item.name }}</v-list-item-title>
      </v-list-item>
    </v-list>
  </v-navigation-drawer>
</template>

<script>
import { getProfile } from '@/services/Api/authApi'
import router from '@/router'
export default {
  name: 'SideBar',
  data() {
    return {
      id: null,
      name: null,
      email: null,
      avatar_url: null,
      currentItemIndex: 0,
      NavItems: [
        {
          path: 'blog',
          name: 'Blogs',
          icon: 'mdi-folder',
        },
        {
          path: 'contact-requests',
          name: 'Contact Requests',
          icon: 'mdi-account-arrow-up',
        },
      ],
    }
  },
  methods: {
    async getProfile() {
      try {
        const result = await getProfile()
        this.id = result.data.user.id
        this.name = result.data.user.name
        this.email = result.data.user.email
        this.avatar_url = result.data.user.avatar_url
          ? result.data.user.avatar_url
          : 'https://www.w3schools.com/howto/img_avatar.png'
      } catch {
        console.log('get profile error')
      }
    },
    handleClickItem(path, index) {
      this.currentItemIndex = index
      router.push(path)
    },
  },
  mounted: function () {
    this.getProfile()
  },
}
</script>

<style scoped>
.selected {
  background-color: #e0e0e0;
}
</style>
