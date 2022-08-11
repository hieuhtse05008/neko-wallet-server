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
      <v-list-item link>
        <v-list-item-icon>
          <v-icon>mdi-folder</v-icon>
        </v-list-item-icon>
        <v-list-item-title>My Files</v-list-item-title>
      </v-list-item>
      <v-list-item link>
        <v-list-item-icon>
          <v-icon>mdi-account-multiple</v-icon>
        </v-list-item-icon>
        <v-list-item-title>Shared with me</v-list-item-title>
      </v-list-item>
      <v-list-item link>
        <v-list-item-icon>
          <v-icon>mdi-star</v-icon>
        </v-list-item-icon>
        <v-list-item-title>Starred</v-list-item-title>
      </v-list-item>
    </v-list>
  </v-navigation-drawer>
</template>

<script>
import { getProfile } from '@/services/Api/authApi'

export default {
  name: 'SideBar',
  data() {
    return {
      id: null,
      name: null,
      email: null,
      avatar_url: null,
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
  },
  mounted: function () {
    this.getProfile()
  },
}
</script>
