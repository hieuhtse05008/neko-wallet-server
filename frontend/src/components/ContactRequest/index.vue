<template>
  <v-container fluid class="container-content">
    <v-container>
      <v-card outlined elevation="5">
        <v-card-title>
          <h3>Contact Requests Table</h3>
        </v-card-title>
        <v-data-table
          :headers="headers"
          :items="items"
          :items-per-page="5"
          hide-actions
          class="elevation-1"
        >
        </v-data-table>
      </v-card>
    </v-container>
  </v-container>
</template>

<script>
import { getContactRequests } from '../../services/Api/authApi'
export default {
  name: 'UserRequests',
  data() {
    return {
      headers: [
        {
          text: 'ID',
          align: 'start',
          value: 'id',
        },
        { text: 'Name', value: 'name' },
        { text: 'Company', value: 'company' },
        { text: 'Email', value: 'email' },
        { text: 'Content', value: 'content' },
        { text: 'Date', value: 'created_at' },
      ],
      items: [],
    }
  },
  mounted() {
    this.getContactRequests()
  },
  computed: {},
  watch: {},
  methods: {
    getContactRequests: async function () {
      try {
        const res = await getContactRequests()
        this.items = res.data.contact_requests
      } catch (error) {
        console.log(error)
      }
    },
  },
}
</script>

<style scoped>
.container-content {
  padding-top: 50px;
  padding-bottom: 50px;
}

@media screen and (min-width: 600px) {
  .v-data-table >>> td {
    word-wrap: break-word;
    max-width: 100px;
    padding-top: 10px !important;
    padding-bottom: 10px !important;
  }
}
</style>
