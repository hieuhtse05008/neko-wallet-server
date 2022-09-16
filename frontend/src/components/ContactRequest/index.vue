<template>
  <v-container fluid class="container-content">
    <v-container>
      <v-row class="mb-1" justify="center" align="center">
        <div class="page-name">Contact request form</div>
      </v-row>
      <v-row>
        <v-col class="col-12">
          <Table
            :headers="headers"
            :items="items"
            :pagination="pagination"
            :onChange="onChangePage"
            :loading="loading"
          >
            <template
              v-for="(customColumn, index) in ['name', 'email', 'company']"
              v-slot:[`item.${customColumn}`]="{ item }"
            >
              <v-row :key="index" justify="center" align="center">
                <v-col class="col-12">
                  <CopyClipBroad :text="item[customColumn]" />
                </v-col>
              </v-row>
            </template>
          </Table>
        </v-col>
      </v-row>
    </v-container>
  </v-container>
</template>

<script>
import { getContactRequests } from '../../services/Api/authApi'
import Table from '../common/Table.vue'
import CopyClipBroad from '../common/CopyClipBroad.vue'
export default {
  name: 'UserRequests',
  components: {
    Table,
    CopyClipBroad,
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

<style>
.container-content {
  padding-top: 50px;
  padding-bottom: 50px;
}
</style>
