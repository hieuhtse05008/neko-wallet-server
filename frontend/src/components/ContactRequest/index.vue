<template>
  <v-container fluid class="container-content">
    <v-container>
      <Table
        title="Contact request form"
        :headers="headers"
        :items="items"
        :pagination="pagination"
        :onChange="onChangePage"
        :loading="loading"
      />
    </v-container>
  </v-container>
</template>

<script>
import { getContactRequests } from '../../services/Api/authApi'
import Table from '../common/Table.vue'
export default {
  name: 'UserRequests',
  components: {
    Table,
  },
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
      pagination: {
        page: 1,
        totalPage: 1,
        limit: 10,
      },
      loading: true,
    }
  },
  mounted() {
    this.getContactRequests()
  },
  computed: {},
  methods: {
    onChangePage: function (page) {
      this.pagination.page = page
      this.getContactRequests()
    },
    getContactRequests: async function () {
      this.loading = true
      try {
        const res = await getContactRequests(
          this.pagination.limit,
          this.pagination.page
        )
        this.items = res.data.contact_requests.items
        this.pagination.totalPage = res.data.contact_requests.meta.total_pages
        this.pagination.page = res.data.contact_requests.meta.current_page
      } catch (error) {
        console.log(error)
      }
      this.loading = false
    },
  },
}
</script>

<style scoped>
.container-content {
  padding-top: 50px;
  padding-bottom: 50px;
}
</style>
