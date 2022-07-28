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
                    <!-- <ckeditor
                      class="editor"
                      :editor="editor"
                      v-model="form.content[current_locale.id]"
                      :config="editorConfig"
                    ></ckeditor> -->
                    <!-- <editor
                      api-key="zmiwpg2nlm7n7wrd9jtcaown05jejazf05thfo7z5ynj9mma"
                      :init="{
                        menubar: false,
                        plugins: [
                          'advlist autolink lists link image charmap print preview anchor',
                          'searchreplace visualblocks code fullscreen media',
                          'insertdatetime media table paste code help wordcount nonbreaking autoresize',
                        ],
                        toolbar:
                          'formatselect | fontsizeselect | fontselect | alignGroup | bold italic underline strikethrough link removeFormat | undo redo  searchreplace | forecolor backcolor blockquote code | indent outdent | bullist numlist |image table media',
                        toolbar_groups: {
                          alignGroup: {
                            icon: 'align-left',
                            tooltip: 'Alignment',
                            items: 'alignleft aligncenter alignright alignjustify',
                          },
                        },
                        autoresize_min_height: 500,
                      }"
                      v-model="form.content[current_locale.id]"
                    /> -->
                    <div>
            <textarea
                name="content"
                id="editor"
                disabled
                class="w-100"
                v-model="form.content[current_locale.id]"
            >
            </textarea>
                    </div>
                </v-col>
            </v-row>

            <v-row class="mb-10">
                <v-col cols="12" class="pa-0 mb-2">
                    <h4>Tags (split by " , ")</h4>
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
                                <v-icon right> mdi-menu-down</v-icon>
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
                            <v-list-item>
                                <v-btn
                                    class="btn-add-blog-group text-none"
                                    color="primary"
                                    @click="
                    () =>
                      handleOpenDialogCreateBlogGroup(
                        'Create category',
                        'category'
                      )
                  "
                                >
                                    <v-icon left> mdi-plus-thick</v-icon>
                                    Add
                                </v-btn>
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
                                <v-icon right> mdi-menu-down</v-icon>
                            </v-btn>
                        </template>
                        <v-list>
                            <v-list-item
                                v-for="(item, index) in allKinds"
                                class="pr-20"
                                :key="index"
                                @click="() => handleChangeBlogGroups(item, 'kind')"
                            >
                                <v-list-item-title>{{ item.name }}</v-list-item-title>
                            </v-list-item>
                            <v-list-item>
                                <v-btn
                                    class="btn-add-blog-group text-none"
                                    color="primary"
                                    @click="
                    () => handleOpenDialogCreateBlogGroup('Create kind', 'kind')
                  "
                                >
                                    <v-icon left> mdi-plus-thick</v-icon>
                                    Add
                                </v-btn>
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
                                <v-icon right> mdi-menu-down</v-icon>
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

            <v-row class="mb-10 justify-end">
                <v-btn
                    class="text-none mx-1"
                    color="primary"
                    dark
                    @click="handleOpenDialogPreview"
                >
                    Preview
                </v-btn>
                <v-btn class="text-none" color="primary" dark @click="handleSubmitBlog">
                    Save
                </v-btn>
            </v-row>

            <v-row justify="center">
                <v-dialog
                    content-class="dialog-create-blog-group"
                    v-model="dialogCreateBlogGroup.visible"
                    max-width="400px"
                    transition="dialog-top-transition"
                >
                    <v-card>
                        <v-card-title>
                            <span class="text-h5">{{ dialogCreateBlogGroup.title }}</span>
                        </v-card-title>
                        <v-card-text class="py-0">
                            <v-container>
                                <v-row>
                                    <v-col cols="12">
                                        <v-text-field
                                            v-model="dialogCreateBlogGroup.content"
                                            outlined
                                            dense
                                        ></v-text-field>
                                    </v-col>
                                </v-row>
                            </v-container>
                        </v-card-text>
                        <v-card-actions>
                            <v-spacer></v-spacer>
                            <v-btn
                                color="primary"
                                elevation="0"
                                @click="handleSubmitBlogGroup"
                            >
                                Save
                            </v-btn>
                            <v-btn elevation="0" @click="handleCloseDialogCreateBlogGroup">
                                Close
                            </v-btn>
                        </v-card-actions>
                    </v-card>
                </v-dialog>
            </v-row>

            <v-row justify="center">
                <v-dialog
                    content-class="dialog-preview-blog"
                    v-model="dialogPreviewVisible"
                    transition="dialog-top-transition"
                >
                    <v-card>
                        <v-card-title>
                            <span class="text-h5">{{ form.title[current_locale.id] }}</span>
                        </v-card-title>
                        <v-card-text class="py-0 m-0">
                            <div v-html="form.content[current_locale.id]"></div>
                        </v-card-text>
                        <v-card-actions>
                            <v-spacer></v-spacer>
                            <v-btn elevation="0" @click="handleCloseDialogPreview">
                                Close
                            </v-btn>
                        </v-card-actions>
                    </v-card>
                </v-dialog>
            </v-row>
        </v-container>
    </v-container>
</template>
<script src="https://nekoinvest.io/js/ckeditor.js"></script>

<script>
import {LOCALES, AVAILABLE_LOCALES, STATUSES} from '../../utils/constants';
import {
    getBlogDetail,
    createBlogDetail,
    getBlogGroups,
    updateBlogDetail,
    createBlogGroup,
} from '../../services/Api/authApi';

let editor;

const defaultLocaleObject = (function () {
    let obj = {}
    AVAILABLE_LOCALES.forEach(function (item) {
        obj[item] = ''
    })
    return obj
})()

const defaultSelect = {
    id: null,
    name: 'None',
}

export default {
    data() {
        return {
            form: {
                id: this.$route.params.id,
                status: 'draft',
                image_url: '',
                type: null,
                editor: null,
                title: {...defaultLocaleObject},
                description: {...defaultLocaleObject},
                slug: {...defaultLocaleObject},
                content: {...defaultLocaleObject},
                tags: '',
                blog_groups: [
                    {
                        ...defaultSelect,
                        type: 'category',
                    },
                    {
                        ...defaultSelect,
                        type: 'kind',
                    },
                ],
            },
            current_locale: {
                id: 'en',
                name: 'English',
            },
            locales: LOCALES,
            all_blog_groups: [],
            statuses: STATUSES,
            dialogCreateBlogGroup: {
                title: '',
                content: '',
                visible: false,
                type: '',
            },
            dialogPreviewVisible: false,
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
                    blog_groups:
                        result.blog_groups.length > 0
                            ? result.blog_groups
                            : [...this.form.blog_groups],
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
        handleSubmitBlog: async function () {
            try {
                if (this.form.id) {
                    await updateBlogDetail({
                        ...this.form,
                        category_id: this.currentCategory.id,
                        kind_id: this.currentKind.id,
                    })
                    window.location.reload()
                } else {
                    const result = await createBlogDetail({
                        ...this.form,
                        category_id: this.currentCategory.id,
                        kind_id: this.currentKind.id,
                    })
                    window.location.assign(`/blog/upload/${result.data.blog.id}`)
                }
            } catch (error) {
                console.log(error)
            }
        },

        handleOpenDialogCreateBlogGroup: function (title, type) {
            this.dialogCreateBlogGroup.visible = true
            this.dialogCreateBlogGroup.title = title
            this.dialogCreateBlogGroup.type = type
        },

        handleCloseDialogCreateBlogGroup: function () {
            this.dialogCreateBlogGroup.visible = false
        },

        handleOpenDialogPreview: function () {
            this.dialogPreviewVisible = true
        },

        handleCloseDialogPreview: function () {
            this.dialogPreviewVisible = false
        },

        handleSubmitBlogGroup: async function () {
            try {
                const result = await createBlogGroup({
                    name: this.dialogCreateBlogGroup.content,
                    type: this.dialogCreateBlogGroup.type,
                })
                this.all_blog_groups.push(result.data.blog_group)
                this.handleCloseDialogCreateBlogGroup()
                this.dialogCreateBlogGroup.content = ''
            } catch (error) {
                console.log(error)
            }
        },
    },
    mounted() {
        this.getBlogGroups()
        this.form.id && this.getBlog()
    },
    created() {
        setTimeout(
            function () {
                ClassicEditor.create(document.querySelector('#editor'), {
                    toolbar: [
                        'heading',
                        '|',
                        'alignment',
                        '|',
                        'bold',
                        'italic',
                        'underline',
                        'strikethrough',
                        'link',
                        'removeFormat',
                        '|',
                        'undo',
                        'redo',
                        'findAndReplace',
                        '|',
                        'fontsize',
                        'fontColor',
                        'fontBackgroundColor',
                        'blockQuote',
                        'code',
                        '|',
                        'outdent',
                        'indent',
                        '|',
                        'bulletedList',
                        'numberedList',
                        '|',
                        'uploadImage',
                        'insertTable',
                        'mediaEmbed',
                        '|',

                        // 'fontfamily',
                    ],
                    image: {
                        // You need to configure the image toolbar, too, so it uses the new style buttons.
                        toolbar: [
                            'imageTextAlternative',
                            '|',
                            'imageStyle:block',
                            'imageStyle:alignLeft',
                            'imageStyle:alignRight',
                            'imageStyle:inline',
                            'imageStyle:side',
                            'imageStyle:alignCenter',
                            'imageStyle:alignBlockLeft',
                            'imageStyle:alignBlockRight',
                            'resizeImage:50',
                            'resizeImage:75',
                            'resizeImage:original',
                        ],
                    },
                    extraPlugins: [MyCustomUploadAdapterPlugin],
                })
                    .then((e) => {
                        editor = e
                        this.editor = e
                    })
                    .catch((error) => {
                        console.error(error)
                    })
            }.bind(this),
            500
        )
    },
    computed: {
        currentCategory: function () {
            return this.form.blog_groups.find((e) => e.type === 'category')
        },
        allCategories: function () {
            return [
                {...defaultSelect, type: 'category'},
                ...this.all_blog_groups.filter((e) => e.type === 'category'),
            ]
        },
        currentKind: function () {
            return this.form.blog_groups.find((e) => e.type === 'kind')
        },
        allKinds: function () {
            return [
                {...defaultSelect, type: 'kind'},
                ...this.all_blog_groups.filter((e) => e.type === 'kind'),
            ]
        },
        currentStatus: function () {
            const _currentStatus = this.statuses.find(
                (e) => e.key === this.form.status
            )
            return _currentStatus ? _currentStatus : this.statuses[0]
        },
    },
}

class MyUploadAdapter {
    constructor(loader) {
        // The file loader instance to use during the upload.
        this.loader = loader;
    }

    // Starts the upload process.
    upload() {
        return this.loader.file
            .then(file => new Promise((resolve, reject) => {
                this._initRequest();
                this._initListeners(resolve, reject, file);
                this._sendRequest(file);
            }));
    }

    // Aborts the upload process.
    abort() {
        if (this.xhr) {
            this.xhr.abort();
        }
    }

    // Initializes the XMLHttpRequest object using the URL passed to the constructor.
    _initRequest() {
        const xhr = this.xhr = new XMLHttpRequest();

        // Note that your request may look different. It is up to you and your editor
        // integration to choose the right communication channel. This example uses
        // a POST request with JSON as a data structure but your configuration
        // could be different.
        xhr.open('POST', 'https://colorme.vn/api/v3/upload-image-public', true);
        xhr.responseType = 'json';
    }

    // Initializes XMLHttpRequest listeners.
    _initListeners(resolve, reject, file) {
        const xhr = this.xhr;
        const loader = this.loader;
        const genericErrorText = `Couldn't upload file: ${file.name}.`;

        xhr.addEventListener('error', () => reject(genericErrorText));
        xhr.addEventListener('abort', () => reject());
        xhr.addEventListener('load', () => {
            const response = xhr.response;

            // This example assumes the XHR server's "response" object will come with
            // an "error" which has its own "message" that can be passed to reject()
            // in the upload promise.
            //
            // Your integration may handle upload errors in a different way so make sure
            // it is done properly. The reject() function must be called when the upload fails.
            if (!response || response.error) {
                return reject(response && response.error ? response.error.message : genericErrorText);
            }

            // If the upload is successful, resolve the upload promise with an object containing
            // at least the "default" URL, pointing to the image on the server.
            // This URL will be used to display the image in the content. Learn more in the
            // UploadAdapter#upload documentation.
            console.log('response resolve', response)
            resolve({
                default: response.link
            });
        });

        // Upload progress when it is supported. The file loader has the #uploadTotal and #uploaded
        // properties which are used e.g. to display the upload progress bar in the editor
        // user interface.
        if (xhr.upload) {
            xhr.upload.addEventListener('progress', evt => {
                if (evt.lengthComputable) {
                    loader.uploadTotal = evt.total;
                    loader.uploaded = evt.loaded;
                }
            });
        }
    }

    // Prepares the data and sends the request.
    _sendRequest(file) {
        // Prepare the form data.
        const data = new FormData();

        data.append('upload', file);

        // Important note: This is the right place to implement security mechanisms
        // like authentication and CSRF protection. For instance, you can use
        // XMLHttpRequest.setRequestHeader() to set the request headers containing
        // the CSRF token generated earlier by your application.

        // Send the request.
        this.xhr.send(data);
    }
}

// ...

function MyCustomUploadAdapterPlugin(editor) {
    editor.plugins.get('FileRepository').createUploadAdapter = (loader) => {
        // Configure the URL to the upload script in your back-end here!
        return new MyUploadAdapter(loader);
    };
}
</script>

<style>
.btn-add-blog-group {
    width: 100%;
}

.dialog-create-blog-group {
    align-self: flex-start;
}
</style>
