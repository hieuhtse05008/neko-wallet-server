@extends('web.layout.master')

@section('content')
    <div id="upload-blog" class="py-5">
        <div class="container">
            <div class="mb-3">
                <label class="fw-bold mb-2">Title</label>
                <div>
                    <input required v-model="form.title" class="inp-main rounded-3 w-100" @input="changeTitle">
                </div>
            </div>
            <div class="mb-3">
                <label class="fw-bold mb-2">Description</label>
                <div>
                    <textarea style="min-height: 300px" required v-model="form.description" class="inp-main rounded-3 w-100"></textarea>
                </div>
            </div>
            <div class="mb-3">
                <label class="fw-bold mb-2">Slug</label>
                <div>
                    <input required v-model="form.slug" class="inp-main rounded-3 w-100" placeholder="">
                </div>
            </div>
            <div class="my-5 rounded-3 shadow-sm" v-cloak>
                <div v-if="isUploadingImage" class="progress">
                    <div class="progress-bar bg-main" role="progressbar" :style="{width:   `${percent}%`}"
                         :aria-valuenow="percent" aria-valuemin="0" aria-valuemax="100">
                        @{{ percent }}/100%
                    </div>
                </div>

                <div v-if="!isUploadingImage && form.image_url"
                     class="pointer"
                     @click="onChangeImage">
                    <img class="w-100 rounded-3"
                         :src="form.image_url" alt="..."/>
                </div>
                <div style="height: 300px;border: 1px dashed lightgray;
                                    background: #eee; "
                     class="d-flex align-items-center justify-content-center rounded-3 pointer"
                     v-if="!isUploadingImage && (form.image_url == '' || !form.image_url)"
                     @click="onChangeImage">
                    Click to choose an image
                </div>
            </div>

            <div class="mb-3">
                <label class="fw-bold mb-2">Tags</label>
                <div>
                    <input v-model="form.tags" class="inp-main rounded-3 w-100" placeholder="Split by &#34;,&#34;">
                </div>
                <div class="mb-3"></div>
                <div class="d-flex flex-wrap" v-cloak>
                    <div v-for="tag in form.tags.split(',')"
                         class="bg-main border-0 btn btn-sm btn-xs mb-2 me-2 rounded shadow-sm text-white">
                        #@{{ tag.trim() }}
                    </div>
                </div>
            </div>

            <div class="mb-3" v-cloak>
                <label class="fw-bold mb-2">Content</label>
                <div>
                    <textarea name="content_en" id="editor" disabled class="w-100" v-model="form.content_en">
                        @{{form.content_en}}
                    </textarea>
                </div>
            </div>

            <div v-for="key in Object.keys(errors)" v-cloak>
                <div v-for="error in errors[key]" class="alert alert-danger py-1 mt-3" role="alert">
                    <i class="fas fa-exclamation-triangle"></i>
                    @{{ error }}
                </div>
            </div>
            <div class="d-flex justify-content-end">
                <button class="btn btn-main mt-5 mb-3" v-if="form.content_en"
                        data-bs-toggle="modal" data-bs-target="#modalPreviewBlog">
                    Preview
                </button>
                <div class="btn btn-main mt-5 ms-2 mb-3" @click="submitBlog" disabled="isSaving">
                    <div class="spinner-border bg-main" role="status" style="width: 16px; height: 16px;"
                         v-if="isSaving">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    @{{ !isSaving ? 'Save' : 'Saving' }}
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="modalPreviewBlog" tabindex="-1" aria-labelledby="modalPreviewBlogLabel"
                 aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header border-0">
                            <h5 class="modal-title" id="modalPreviewBlogLabel"></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="px-3">
                                <div class="ck-content" v-html="form.content_en"></div>
                            </div>
                        </div>
                        <div class="modal-footer border-0">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="/js/ckeditor.js"></script>

    <script>
        let editor;
        const defaultBLog = {!! $blog!!};
        var uploadBLog = new Vue({
            el: '#upload-blog',
            data() {
                return {
                    editor: null,
                    percent: 0,
                    isSaving: false,
                    isUploadingImage: false,
                    errors: {},
                    form: {
                        id: '',
                        'title': '',
                        'description': '',
                        'image_url': '',
                        'status': '',
                        'type': '',
                        'slug': '',
                        ...defaultBLog,
                        'tags': defaultBLog.tags || '',
                        'content_en': defaultBLog.content_en || '',
                    }
                };
            },
            methods: {
                initEditor: function () {

                },
                submitBlogError: function (res) {

                    this.isSaving = false;
                    this.errors = res.responseJSON.errors;

                },
                submitBlogSuccess: function (res) {
                    this.isSaving = false;
                    console.log(res.status, res);
                    if (res.status) {
                        alert('Blog is saved successfully!');
                        this.errors = {};
                    }
                },
                submitBlog: function () {
                    this.isSaving = true;

                    let url = `/api/v1/blogs/${this.form.id}`;
                    const parameters = [
                        `/api/v1/blogs/${this.form.id}`,
                        {
                            ...this.form,
                            content_en: editor.getData(),
                        },
                    ];
                    console.log(parameters);
                    if (this.form.id) {
                        $.put(...parameters).then(this.submitBlogSuccess).catch(this.submitBlogError);
                    } else {
                        $.post(...parameters).then(this.submitBlogSuccess).catch(this.submitBlogError);
                    }
                    console.log(url)
                },
                onChangeImage: function () {
                    var input = document.createElement("input");
                    input.type = "file";
                    input.value = "";
                    input.accept = ".jpg,.png";
                    input.onchange = function (e) {
                        const file = e.target.files[0];
                        if (file.size > 5 * 1000 * 1000) {
                            alert("The image's size must be less than 5 Mb");
                            return 0
                        }
                        this.percent = 0;
                        this.isUploadingImage = true;
                        const url = "https://colorme.vn/api/v3/upload-image-public";

                        let formdata = new FormData();
                        formdata.append("image", file);
                        let ajax = new XMLHttpRequest();
                        ajax.addEventListener("load", function (e) {
                            console.log('success', e, this)
                            this.form.image_url = JSON.parse(e.currentTarget.response).link;
                            this.isUploadingImage = false;
                        }.bind(this), false);
                        ajax.upload.addEventListener("progress", function (event) {
                            let percent = (event.loaded / event.total) * 100;
                            this.percent = Math.round(percent);
                            console.log('progress', this)
                        }.bind(this), false);
                        ajax.open("POST", url);
                        ajax.send(formdata);

                    }
                    input.onchange = input.onchange.bind(this);
                    input.click();
                },
                removeAccents: function (str) {
                    var AccentsMap = [
                        "aàảãáạăằẳẵắặâầẩẫấậ",
                        "AÀẢÃÁẠĂẰẲẴẮẶÂẦẨẪẤẬ",
                        "dđ", "DĐ",
                        "eèẻẽéẹêềểễếệ",
                        "EÈẺẼÉẸÊỀỂỄẾỆ",
                        "iìỉĩíị",
                        "IÌỈĨÍỊ",
                        "oòỏõóọôồổỗốộơờởỡớợ",
                        "OÒỎÕÓỌÔỒỔỖỐỘƠỜỞỠỚỢ",
                        "uùủũúụưừửữứự",
                        "UÙỦŨÚỤƯỪỬỮỨỰ",
                        "yỳỷỹýỵ",
                        "YỲỶỸÝỴ"
                    ];
                    for (var i = 0; i < AccentsMap.length; i++) {
                        var re = new RegExp('[' + AccentsMap[i].substr(1) + ']', 'g');
                        var char = AccentsMap[i][0];
                        str = str.replace(re, char);
                    }
                    return str;
                },
                changeTitle: function () {
                    this.form.slug = this.removeAccents(this.form.title)
                        .toLowerCase()
                        .replace(/[^a-z0-9 ]/gi, '')
                        .replace(/ /gi, '-');
                },
            },
            created() {
                console.log('created', this.form);
                const _this = this;
                setTimeout(function () {
                    ClassicEditor.create(document.querySelector('#editor'), {
                        extraPlugins: [MyCustomUploadAdapterPlugin],
                    }).then(e => {
                        editor = e;
                        _this.editor = e;
                    }).catch(error => {
                        console.error(error);
                    });

                }, 500);

            },

        });

    </script>
    <script>
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
@endpush


@section('styles')
    <style>
        #editor, .ck-blurred.ck.ck-content.ck-editor__editable.ck-rounded-corners.ck-editor__editable_inline,
        .ck.ck-content.ck-editor__editable.ck-rounded-corners.ck-editor__editable_inline.ck-focused {
            min-height: 80vh;
        }
    </style>
@endsection

@section('meta')
    <meta name="robots" content="noindex, follow">
@endsection
