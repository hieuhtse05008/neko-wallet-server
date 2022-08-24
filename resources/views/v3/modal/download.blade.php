<div class="modal fade" id="modalDownload" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="modalDownloadLabel" aria-hidden="true">
    <div class="modal-dialog m-0">
                <div class="modal-content border-0 w-100 h-100">
{{--                    <div class="modal-header">--}}
{{--                        <h5 class="modal-title" id="modalDownloadLabel">Modal title</h5>--}}
{{--                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>--}}
{{--                    </div>--}}
                    <div class="modal-body d-flex flex-column">
                    <div class="m-auto d-flex flex-column justify-content-center align-items-center">
                        <div class="fs-80 text-gradient text-center mb-5">Your Ultimate Metaverse Wallet awaits</div>
                        <div class="my-5 py-5 d-flex justify-content-around w-100">
                            <div class="card text-center">
                                <div class="card-body p-5">
                                    <img src="/images/v3/web/apple_qr.png" width="150" height="150" class="mt-4">
                                    <h5 class="card-title">Download on App Store</h5>
                                    <div class="mb-4">Scan the QR code above, or search for<br>
                                        Neko wallet in the App Store</div>
                                </div>
                            </div>
                            <div class="card text-center">
                                <div class="card-body p-5">
                                    <img src="/images/v3/web/google_qr.png" width="150" height="150" class="mt-4">
                                    <h5 class="card-title">Download on Google Play</h5>
                                    <div class="mb-4">Scan the QR code above, or search for<br>
                                        Neko wallet in the Google Play</div>
                                </div>
                            </div>
                        </div>

                        <button type="button" class="btn btn-secondary fs-1 p-4 position-relative rounded-circle mt-5" data-bs-dismiss="modal">
                            <i class="center fa-times fal position-absolute"></i>
                        </button>

                    </div>
                    </div>
{{--                    <div class="modal-footer">--}}
{{--                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>--}}
{{--                        <button type="button" class="btn btn-primary">Understood</button>--}}
{{--                    </div>--}}
                </div>

    </div>
</div>
<style>
    #modalDownload .modal-content{
        background: rgba(0, 0, 0, 0.5);
        backdrop-filter: blur(80px);
    }
    #modalDownload .modal-dialog {
        width: 100vw;
        height: 100vh;
        max-width: unset;
    }
    #modalDownload .card {
        border-radius: 20px;
    }

</style>
