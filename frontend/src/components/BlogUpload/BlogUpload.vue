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
                {{ current_locale.name }}
              </v-btn>
            </template>
            <v-list>
              <v-list-item
                v-for="(item, index) in locales"
                v-bind:key="index"
                @click="() => handleClickLocale(item.id)"
              >
                <v-list-item-title>{{ item.name }}</v-list-item-title>
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
          <v-text-field
            class=""
            outlined
            dense
            v-model="form.title[current_locale.id]"
            @input="handleChangeTitle"
          ></v-text-field>
        </v-col>
      </v-row>

      <v-row class="mb-10">
        <v-col cols="12" class="pa-0 mb-2">
          <h4>Description</h4>
        </v-col>
        <v-col cols="12" class="pa-0">
          <v-textarea
            class=""
            outlined
            dense
            v-model="form.description[current_locale.id]"
          ></v-textarea>
        </v-col>
      </v-row>

      <!-- <v-row class="mb-10">
        <v-col cols="12" class="pa-0 mb-2">
          <h4>Image</h4>
        </v-col>
        <v-col cols="12" class="pa-0">
          <v-file-input
            chips
            accept="image/png, image/jpeg, image/bmp"
            placeholder="Pick an avatar"
            v-model="url"
            @change="previewImage"
          ></v-file-input>
          <v-img v-if="form.image_url" :src="form.image_url" />
        </v-col>
      </v-row> -->

      <v-row class="mb-10">
        <v-col cols="12" class="pa-0 mb-2">
          <h4>Slug</h4>
        </v-col>
        <v-col cols="12" class="pa-0">
          <v-text-field
            class=""
            outlined
            dense
            :value="form.slug[current_locale.id]"
          ></v-text-field>
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
            v-model="form.content[current_locale.id]"
            :config="editorConfig"
          ></ckeditor>
        </v-col>
      </v-row>

      <v-row class="mb-10">
        <v-col cols="12" class="pa-0 mb-2">
          <h4>Tags</h4>
        </v-col>
        <v-col cols="12" class="pa-0">
          <v-text-field
            class=""
            outlined
            dense
            v-model="form.tags"
          ></v-text-field>
        </v-col>
        <v-col cols="12" class="pa-0">
          <v-btn
            class="mr-1 text-none px-2"
            color="primary"
            dark
            v-for="(item, index) in form.tags.split(',')"
            :key="index"
          >
            #{{ item }}
          </v-btn>
        </v-col>
      </v-row>

      <v-row class="mb-10">
        <v-col cols="12" class="pa-0 mb-2">
          <h4>Category</h4>
        </v-col>
        <v-col cols="12" class="pa-0">
          <v-menu offset-y>
            <template v-slot:activator="{ on, attrs }">
              <v-btn
                class="text-none"
                color="primary"
                dark
                v-bind="attrs"
                v-on="on"
              >
                {{ currentCategory?.name }}
              </v-btn>
            </template>
            <v-list>
              <v-list-item
                v-for="(item, index) in allCategories"
                :key="index"
                @click="() => handleChangeBlogGroups(item, 'category')"
              >
                <v-list-item-title>{{ item.name }}</v-list-item-title>
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
              <v-btn
                class="text-none"
                color="primary"
                dark
                v-bind="attrs"
                v-on="on"
              >
                {{ currentKind?.name }}
              </v-btn>
            </template>
            <v-list>
              <v-list-item
                v-for="(item, index) in allKinds"
                :key="index"
                @click="() => handleChangeBlogGroups(item, 'kind')"
              >
                <v-list-item-title>{{ item.name }}</v-list-item-title>
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
              <v-btn
                class="text-none"
                color="primary"
                dark
                v-bind="attrs"
                v-on="on"
              >
                {{ currentStatus.name }}
              </v-btn>
            </template>
            <v-list>
              <v-list-item
                v-for="(item, index) in statuses"
                :key="index"
                @click="() => handleChangeStatus(item)"
              >
                <v-list-item-title>{{ item.name }}</v-list-item-title>
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
import { getBlogDetail, getBlogGroups } from '../../services/Api/privateApi'
import { LOCALES, AVAILABLE_LOCALES, STATUSES } from '../../utils/constants'

const defaultLocaleObject = (function () {
  let obj = {}
  AVAILABLE_LOCALES.forEach(function (item) {
    obj[item] = ''
  })
  return obj
})()

export default {
  data() {
    return {
      form: {
        id: this.$route.params.id,
        status: 'draft',
        image_url: '',
        type: '',
        title: defaultLocaleObject,
        description: defaultLocaleObject,
        slug: defaultLocaleObject,
        content: defaultLocaleObject,
        tags: '',
        blog_groups: [],
      },
      current_locale: {
        id: 'en',
        name: 'English',
      },
      locales: LOCALES,
      all_blog_groups: [],
      statuses: STATUSES,
      editor: ClassicEditor,
      editorConfig: {
        // Configure the editor toolbar
      },
    }
  },
  methods: {
    getBlog: async function () {
      try {
        const result = (await getBlogDetail(this.form.id)).data.blog
        this.form = {
          ...result,
          content: (function () {
            let obj = {}
            AVAILABLE_LOCALES.forEach(function (item) {
              obj[item] = result.content[item] ? result.content[item] : ''
            })
            return obj
          })(),
          tags: result.tags ? result.tags : '',
        }
      } catch (error) {
        console.log(error)
      }
    },

    getBlogGroups: async function () {
      try {
        const result = await getBlogGroups()
        this.all_blog_groups = [...result.data.blog_groups]
      } catch (error) {
        console.log(error)
      }
    },

    handleClickLocale: function (id) {
      this.current_locale = this.locales.filter((e) => e.id === id)[0]
    },

    handleChangeTitle: function () {
      this.form.slug[this.current_locale.id] = this.removeAccents(
        this.form.title[this.current_locale.id]
      )
        .toLowerCase()
        .replace(/[^a-z0-9 ]/gi, '')
        .replace(/ /gi, '-')
    },

    handleChangeBlogGroups: function (item, type) {
      // Delete old blog_groups
      const index = this.form.blog_groups.findIndex((e) => e.type === type)
      this.form.blog_groups.splice(index, 1)

      // Add new blog_groups
      this.form.blog_groups.push(item)
    },

    handleChangeStatus: function (item) {
      this.form.status = item.key
    },

    removeAccents: function (str) {
      var AccentsMap = [
        'aàảãáạăằẳẵắặâầẩẫấậ',
        'AÀẢÃÁẠĂẰẲẴẮẶÂẦẨẪẤẬ',
        'dđ',
        'DĐ',
        'eèẻẽéẹêềểễếệ',
        'EÈẺẼÉẸÊỀỂỄẾỆ',
        'iìỉĩíị',
        'IÌỈĨÍỊ',
        'oòỏõóọôồổỗốộơờởỡớợ',
        'OÒỎÕÓỌÔỒỔỖỐỘƠỜỞỠỚỢ',
        'uùủũúụưừửữứự',
        'UÙỦŨÚỤƯỪỬỮỨỰ',
        'yỳỷỹýỵ',
        'YỲỶỸÝỴ',
      ]
      for (var i = 0; i < AccentsMap.length; i++) {
        var re = new RegExp('[' + AccentsMap[i].substr(1) + ']', 'g')
        var char = AccentsMap[i][0]
        str = str.replace(re, char)
      }
      return str
    },
    // previewImage() {
    //   if (this.form.image_url) {
    //     console.log(
    //       this.form.image_url,
    //       URL.createObjectURL(this.form.image_url)
    //     )
    //     return (this.url = URL.createObjectURL(this.form.image_url))
    //   }
    //   this.url = null
    // },
  },
  mounted() {
    this.getBlogGroups()
    this.form.id && this.getBlog()
  },
  computed: {
    currentCategory: function () {
      return this.form.blog_groups.find((e) => e.type === 'category')
    },
    allCategories: function () {
      return this.all_blog_groups.filter((e) => e.type === 'category')
    },
    currentKind: function () {
      return this.form.blog_groups.find((e) => e.type === 'kind')
    },
    allKinds: function () {
      return this.all_blog_groups.filter((e) => e.type === 'kind')
    },
    currentStatus: function () {
      return this.statuses.find((e) => e.key === this.form.status)
    },
  },
  watch: {
    form: {
      handler: function () {
        console.log(this.form)
      },
      deep: true,
    },
  },
}
</script>
<style>
.ck-editor__editable_inline {
  min-height: 300px;
}
</style>
