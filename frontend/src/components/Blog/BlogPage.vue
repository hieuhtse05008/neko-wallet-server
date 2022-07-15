<template>
  <v-container fluid class="primary pa-16">
    <v-container>
      <div>Ba Trong</div>
    </v-container>
  </v-container>
</template>

<script>
export default {
  name: 'BlogPage',
  data() {
    return {
      email: '',
      password: '',
    }
  },
  methods: {},
}
</script>

<style scoped>
.v-text-field--outlined >>> fieldset {
  border-color: #ced4da;
}
</style>
