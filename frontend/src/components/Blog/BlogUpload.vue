<template>
  <v-container fluid class="pa-16">
    <v-container class="pa-30">
      <v-row class="mb-10">
        <v-col cols="12" class="pa-0 mb-2">
          <h4>Language</h4>
        </v-col>
        <v-col cols="12" class="pa-0">
          <v-menu offset-y>
            <template v-slot:activator="{ on, attrs }">
              <v-btn color="primary" dark v-bind="attrs" v-on="on">
                Language
              </v-btn>
            </template>
            <v-list>
              <v-list-item v-for="(item, index) in items" v-bind:key="index">
                <v-list-item-title>{{ item.label }}</v-list-item-title>
              </v-list-item>
            </v-list>
          </v-menu>
        </v-col>
      </v-row>

      <v-row class="mb-10">
        <v-col cols="12" class="pa-0 mb-2">
          <h4>Title</h4>
        </v-col>
        <v-col cols="12" class="pa-0">
          <v-text-field class="" outlined dense></v-text-field>
        </v-col>
      </v-row>

      <v-row class="mb-10">
        <v-col cols="12" class="pa-0 mb-2">
          <h4>Description</h4>
        </v-col>
        <v-col cols="12" class="pa-0">
          <v-textarea class="" outlined dense></v-textarea>
        </v-col>
      </v-row>

      <v-row class="mb-10">
        <v-col cols="12" class="pa-0 mb-2">
          <h4>Image</h4>
        </v-col>
        <v-col cols="12" class="pa-0">
          <v-file-input
            :rules="rules"
            chips
            accept="image/png, image/jpeg, image/bmp"
            placeholder="Pick an avatar"
            v-model="image"
            @change="previewImage"
          ></v-file-input>
          <v-img v-if="url" :src="url" />
        </v-col>
      </v-row>

      <v-row class="mb-10">
        <v-col cols="12" class="pa-0 mb-2">
          <h4>Slug</h4>
        </v-col>
        <v-col cols="12" class="pa-0">
          <v-text-field class="" outlined dense></v-text-field>
        </v-col>
      </v-row>

      <v-row class="mb-10">
        <v-col cols="12" class="pa-0 mb-2">
          <h4>Content</h4>
        </v-col>
        <v-col cols="12" class="pa-0">
          <ckeditor
            class="editor"
            :editor="editor"
            v-model="editorData"
            :config="editorConfig"
          ></ckeditor>
        </v-col>
      </v-row>

      <v-row class="mb-10">
        <v-col cols="12" class="pa-0 mb-2">
          <h4>Category</h4>
        </v-col>
        <v-col cols="12" class="pa-0">
          <v-menu offset-y>
            <template v-slot:activator="{ on, attrs }">
              <v-btn color="primary" dark v-bind="attrs" v-on="on">
                Language
              </v-btn>
            </template>
            <v-list>
              <v-list-item v-for="(item, index) in items" v-bind:key="index">
                <v-list-item-title>{{ item.label }}</v-list-item-title>
              </v-list-item>
            </v-list>
          </v-menu>
        </v-col>
      </v-row>

      <v-row class="mb-10">
        <v-col cols="12" class="pa-0 mb-2">
          <h4>Kind</h4>
        </v-col>
        <v-col cols="12" class="pa-0">
          <v-menu offset-y>
            <template v-slot:activator="{ on, attrs }">
              <v-btn color="primary" dark v-bind="attrs" v-on="on">
                Language
              </v-btn>
            </template>
            <v-list>
              <v-list-item v-for="(item, index) in items" v-bind:key="index">
                <v-list-item-title>{{ item.label }}</v-list-item-title>
              </v-list-item>
            </v-list>
          </v-menu>
        </v-col>
      </v-row>

      <v-row class="mb-10">
        <v-col cols="12" class="pa-0 mb-2">
          <h4>Status</h4>
        </v-col>
        <v-col cols="12" class="pa-0">
          <v-menu offset-y>
            <template v-slot:activator="{ on, attrs }">
              <v-btn color="primary" dark v-bind="attrs" v-on="on">
                Language
              </v-btn>
            </template>
            <v-list>
              <v-list-item v-for="(item, index) in items" v-bind:key="index">
                <v-list-item-title>{{ item.label }}</v-list-item-title>
              </v-list-item>
            </v-list>
          </v-menu>
        </v-col>
      </v-row>
    </v-container>
  </v-container>
</template>

<script>
import ClassicEditor from '@ckeditor/ckeditor5-build-classic'

export default {
  data() {
    return {
      items: [
        {
          label: 'Vietnamese',
          value: '1',
        },
        {
          label: 'English',
          value: '2',
        },
      ],
      image: null,
      url: null,
      editor: ClassicEditor,
      editorData: '<p>Content of the editor.</p>',
      editorConfig: {
        // The configuration of the editor.
      },
    }
  },
  methods: {
    previewImage() {
      if (this.image) return (this.url = URL.createObjectURL(this.image))
      this.url = null
    },
  },
}
</script>
<style>
.ck-editor__editable_inline {
  min-height: 300px;
}
</style>
