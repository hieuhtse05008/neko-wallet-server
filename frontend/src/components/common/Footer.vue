<template>
  <v-container fluid class="accent pa-10">
    <v-container>
      <v-row class="footer">
        <v-col cols="12" sm="4" md="3">
          <v-img
            src="https://nekoinvest.io/images/no_padding_light.png"
            width="50"
          ></v-img>
        </v-col>
        <v-col cols="6" sm="4" md="3" class="text-list">
          <p>Home</p>
          <p>Blog</p>
          <p>Litepaper</p>
        </v-col>
        <v-col cols="6" sm="4" md="3" class="text-list">
          <p>How to buy</p>
          <p>Branch assets</p>
          <p>Check my spot</p>
        </v-col>
        <v-col cols="12" sm="12" md="3">
          <v-row justify="center">
            <v-col cols="3"
              ><v-img
                src="https://d1j8r0kxyu9tj8.cloudfront.net/files/1574313896PGEvFscFfP5Uoow.jpg"
              ></v-img
            ></v-col>
            <v-col cols="3"
              ><v-img
                src="https://d1j8r0kxyu9tj8.cloudfront.net/files/1574313896PGEvFscFfP5Uoow.jpg"
              ></v-img
            ></v-col>
          </v-row>
        </v-col>
      </v-row>
    </v-container>
  </v-container>
</template>

<script>
export default {
  // eslint-disable-next-line vue/multi-word-component-names
  name: 'Footer',
}
</script>

<style scoped>
.text-list {
  color: #fff;
}
</style>
