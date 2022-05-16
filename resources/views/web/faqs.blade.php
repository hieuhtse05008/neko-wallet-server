@extends('web.layout.master-v2')
@section('meta')
    <title>FAQs</title>
@endsection
@section('content')
    <section id="faq" v-cloak class="d-none-transition">
        <div class="container my-5">
            <div
                class="align-items-center bg-gray d-flex rounded-3  text-truncate search-wrap border border-secondary px-3 py-3 ">
                <i class="far fa-search me-2" @click="onChangeSearch"></i>

                <input placeholder="Search for answer" value="" v-model="search" @change="onChangeSearch"
                       class="border-0 bg-transparent text-white w-100"
                       type="search" style="">
            </div>
        </div>

        </div>
        <div class="container my-5 d-none-transition" v-if="!toggleQuestion">
            <h1>How can we help you?</h1>
        </div>
        <div class="container d-none-transition" v-if="!toggleQuestion">
            <div class="d-flex mb-3">
                <div class="">
                    <h4 class=" d-none-transition">Frequently asked questions</h4>
                </div>
            </div>
            <div class="row ">
                <div class="col-12  d-none-transition" v-for="item in _questions" @click="showQuestion(item)">
                    <div class="border border-gray rounded px-4 py-3 mb-3 pointer">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>@{{item['question']}}</div>
                            <div><i class="far fa-chevron-right"></i></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container d-none-transition" v-if="toggleQuestion">
            <div aria-label="breadcrumb" class="my-5">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item pointer"><a href="#">Neko</a></li>
                    <li class="breadcrumb-item pointer" aria-current="page" @click="toggleQuestion = false;">FAQs</li>
                </ol>
            </div>
            <div class="border border-gray rounded bg-gray py-5 px-5">
                <h1 class="mb-5">@{{ currentQuestion['question'] }}</h1>
                <p>
                    @{{ currentQuestion['answer'] }}
                </p>
                <div class="mt-5">
                    <h5 class="mb-3">Related articles</h5>
                    <ul>
                        <li v-for="item in relatedQuestions" class="pointer py-1" @click="showQuestion(item)">
                            @{{ item['question'] }}
                        </li>
                    </ul>

                </div>
            </div>
        </div>
        <div class="container my-5 pb-5">
            <h4>Can’t find what you’re looking for?</h4>
            <div class="my-4"></div>
            <a class="border border-white rounded px-3 py-2" href="mailto:info@nekowallet.io">Contact us: info@nekowallet.io</a>

        </div>
    </section>

@endsection
@push('scripts')
    <script src="/js/vue.js"></script>
    <script>
        const faq = new Vue({
            el: '#faq',
            data: {
                questions: {!! collect($questions) !!},
                currentQuestion: {!! collect($questions) !!}[0],
                toggleQuestion: false,
                search: ''
            },
            mounted: function () {
                console.log(this.questions)
            },
            methods: {
                showQuestion: function (question) {
                    this.currentQuestion = question;
                    this.toggleQuestion = true;
                },
                onChangeSearch: function (e) {
                    this.toggleQuestion = false;
                    console.log(e, this.search);

                },
            },
            computed: {
                _questions: function () {
                    return [...this.questions.filter(({question, answer}) => {
                        if (this.search.length < 2) return true;
                        const s1 = question.toLowerCase();
                        const s2 = answer.toLowerCase();
                        const s3 = this.search.toLowerCase();
                        return s1.includes(s3) || s2.includes(s3);
                    })];
                },
                relatedQuestions: function () {
                    const max = this.questions.length - 4;
                    const start = Math.floor(Math.random() * max + 1);
                    return this.questions.filter(({question}) => question !== this.currentQuestion.question).slice(start, start + 3);
                }
            }
        });
    </script>
@endpush
@section('styles')
    <style>
        #faq {
            min-height: 75vh;

        }
    </style>
@endsection
