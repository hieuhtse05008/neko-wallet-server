<style>
    #modal-check-my-spot .link-icon {
        width: 44px;
        height: 44px;
        line-height: 44px;
    }

    #form-check-my-spot button, #modal-check-my-spot button {
        height: 48px;

    }

    #form-check-my-spot input {

        width: 413px;
        max-width: 80vw;
    }
</style>

<div class="modal fade" id="modal-check-my-spot" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content border-0 rounded-7">
            <div class="modal-body p-5">
                <button type="button" class="btn-close end-0 me-3 position-absolute top-0" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                <div class="d-flex justify-content-center mb-4">
                    <img src="/images/no_padding_light.png  " width="95" height="100">
                </div>

                <form class="mt-5 d-flex justify-content-center flex-wrap" id="form-check-my-spot">
                    <div class="text-center mb-4">
                        Let’s check where you are in the queue!
                    </div>
                    <input id="input-check-my-spot" placeholder="Enter your email"
                           class="flex-grow-1 rounded mb-3 inp-main" type="email" style="" required>
                    <div class="me-3"></div>
                    <button class="btn btn-main px-3 text-center">
                        Check
                    </button>
                </form>
                <div id="check-my-spot"
                    class="d-none"
                >
                    <div class="text-center bg-gray p-3 mb-4 rounded-7">
                        <div class="fw-bold" style="font-size: 24px;">You’re the <span id="my-spot" class="text-main"></span>!</div>
                        <div class="text-center mb-3">
                            <div>There are <b id="count-ahead">100,000</b> People ahead of you.</div>
                            <div>And <b id="count-behind">100,000</b> People behind you.</div>
                        </div>
                    </div>
                    <div class="text-center mb-4">
                        <div class="fw-bold">Interested in priority access?</div>
                        Get access sooner by referring your friends.<br>
                        The more friends that join, the sooner you’ll get access.
                    </div>

                    <div class="mb-4 d-flex justify-content-center flex-wrap" id="form-share-ref">
                        <input readonly id="input-share-ref-spot" placeholder="Url here"
                               class="flex-grow-1 inp-main mb-3 rounded" type="text" style="">
                        <div class="me-3"></div>
                        <button onclick="
                            document.getElementById('text-copy-ref-spot').innerText = 'Copied!';
                            document.getElementById('input-share-ref-spot').select();
                            document.execCommand('copy');
                        " class="btn btn-main px-3 text-center">
                            <i class="fal fa-copy"></i>
                            <span id="text-copy-ref-spot">Copy link</span>
                        </button>
                    </div>

                    <div class="text-center mb-4">
                        <div class="text-center mb-3">
                            Or share to your social
                        </div>
                        <div class="d-flex justify-content-center align-items-center flex-wrap p-3">
                            <div class="me-3">
                                <a class="rounded-circle text-white d-flex"
                                   style="background: #1DA0F1;"
                                   href="https://twitter.com/Neko_Invest"><i
                                        class="fab fa-twitter link-icon"></i></a></div>
                            {{--                                <div class="me-3">--}}
                            {{--                                    <a class="rounded-circle text-white d-flex"--}}
                            {{--                                       style="background: #2CA5E0;"--}}
                            {{--                                       href="https://t.me/nekoinvest">--}}
                            {{--                                        <i class="fab fa-telegram-plane link-icon"></i>--}}
                            {{--                                    </a>--}}
                            {{--                                </div>--}}
                            {{--                                <div>--}}
                            {{--                                    <a class="rounded-circle text-white d-flex"--}}
                            {{--                                       style="background: #7289da;"--}}
                            {{--                                       href="https://discord.gg/nhZsK6Xarz"><i--}}
                            {{--                                            class="fab fa-discord  link-icon"></i>--}}
                            {{--                                    </a>--}}
                            {{--                                </div>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $('#form-check-my-spot').on('submit', function (e) {
        e.preventDefault();
        const email = $('#input-check-my-spot').val();
        $.post(`/register-early-access`, {email, _token, }).then(res => {
            console.log(res);
            if (res.info) {
                $('#input-share-ref-spot').val(`https://www.nekoinvest.io/?ref=${res.info.code}`);

                $('#my-spot').text((`${res.register_count}`).replace(/\B(?=(\d{3})+(?!\d))/g, ","));
                $('#count-ahead').text((`${res.register_count - 1}`).replace(/\B(?=(\d{3})+(?!\d))/g, ","));
                $('#count-behind').text((`${res.total_register - res.register_count}`).replace(/\B(?=(\d{3})+(?!\d))/g, ","));
                // $('#modal-check-my-spot').modal('show');
                $('#check-my-spot').removeClass('d-none');
                $('#form-check-my-spot').addClass('d-none');


            }
        });
    });
</script>
