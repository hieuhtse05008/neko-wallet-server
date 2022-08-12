const { defineConfig } = require('@vue/cli-service')
module.exports = defineConfig({
  transpileDependencies: ['vuetify'],
  publicPath: '/manage',
  outputDir: '../public/manage',
})
