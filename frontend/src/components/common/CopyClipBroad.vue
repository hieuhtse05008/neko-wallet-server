<template>
  <v-tooltip top>
    <template v-slot:activator="{ on, attrs }">
      <span v-bind="attrs" v-on="on" @click="handleClipBoard">{{ text }}</span>
    </template>
    <span class="text-tooltip">{{ copied ? 'Copied' : 'Copy' }}</span>
  </v-tooltip>
</template>

<script>
import { clipboard } from '@/utils/helpers'

export default {
  name: 'CopyClipBroad',
  props: {
    text: {
      type: String,
      default: '',
    },
  },
  data() {
    return {
      copied: false,
    }
  },
  methods: {
    handleClipBoard() {
      clipboard(this.text)
      this.copied = true
      setTimeout(() => {
        this.copied = false
      }, 1000)
    },
  },
}
</script>

<style scoped>
.text-tooltip {
  font-size: 12px;
}
</style>
