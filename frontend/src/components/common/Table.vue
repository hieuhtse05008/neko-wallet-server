<template>
  <div>
    <v-card class="table" outlined elevation="1">
      <v-card-title>
        <h3>{{ title }}</h3>
      </v-card-title>
      <v-data-table
        :headers="headers"
        :items="items"
        :items-per-page="pagination.limit"
        hide-default-footer
        :loading="loading"
        @click:row="onSelectRow"
      >
        <template v-for="(_, name) in $scopedSlots" #[name]="data">
          <slot :name="name" v-bind="data"></slot>
        </template>
      </v-data-table>
    </v-card>
    <v-pagination
      class="mb-4"
      v-if="pagination.totalPage > 1"
      v-model="localPagination.page"
      :length="pagination.totalPage"
      @input="onChange"
      circle
    ></v-pagination>
  </div>
</template>

<script>
export default {
  // eslint-disable-next-line vue/multi-word-component-names
  name: 'Table',
  props: {
    title: {
      type: String,
      default: '',
    },
    headers: {
      type: Array,
      required: true,
    },
    items: {
      type: Array,
      required: true,
    },
    onChange: {
      type: Function,
      required: true,
    },
    pagination: {
      type: {
        page: Number,
        totalPage: Number,
        limit: Number,
      },
      required: true,
    },
    loading: {
      type: Boolean,
      default: false,
    },
    onSelectRow: {
      type: Function,
      default: () => {},
    },
  },
  data() {
    return {
      localPagination: {
        page: this.pagination.page,
        totalPage: this.pagination.totalPage,
        limit: this.pagination.limit,
      },
    }
  },
  watch: {
    pagination: {
      handler() {
        this.localPagination = {
          page: this.pagination.page,
          totalPage: this.pagination.totalPage,
          limit: this.pagination.limit,
        }
      },
      deep: true,
    },
  },
}
</script>

<style scoped>
.table {
  margin-bottom: 20px;
}

.v-data-table >>> tr {
  cursor: pointer;
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

<style>
.v-data-table__mobile-row__cell {
  max-width: 40vw !important;
  overflow: hidden !important;
  text-overflow: ellipsis !important;
  white-space: nowrap !important;
}
</style>
