<!-- iOS - Add to Home Screen -->
<div class="modal inset fade action-sheet ios-add-to-home" id="ios-add-to-home-screen" role="dialog" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add to Home Screen</h5>
                <a class="close-button" data-bs-dismiss="modal" href="#">
                    <ion-icon name="close"></ion-icon>
                </a>
            </div>

            <div class="modal-body">
                <div class="action-sheet-content text-center">
                    <div class="mb-1">
                        <img alt="image" class="imaged w64 mb-2" src="{{ asset('assets/img/icon/192x192.png') }}">
                    </div>
                    <div>
                        Install <strong>{{ config('app.name') }}</strong> on your iPhone's home screen.
                    </div>
                    <div>
                        Tap <ion-icon name="share-outline"></ion-icon> and Add to homescreen.
                    </div>
                    <div class="mt-2">
                        <button class="btn btn-primary btn-block" data-bs-dismiss="modal">CLOSE</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- Android - Add to Home Screen -->
<div class="modal inset fade action-sheet android-add-to-home" id="android-add-to-home-screen" role="dialog"
    tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add to Home Screen</h5>
                <a class="close-button" data-bs-dismiss="modal" href="#">
                    <ion-icon name="close"></ion-icon>
                </a>
            </div>
            <div class="modal-body">
                <div class="action-sheet-content text-center">
                    <div class="mb-1">
                        <img alt="image" class="imaged w64 mb-2" src="{{ asset('assets/img/icon/192x192.png') }}">
                    </div>
                    <div>
                        Install <strong>{{ config('app.name') }}</strong> on your Android's home screen.
                    </div>
                    <div>
                        Tap <ion-icon name="ellipsis-vertical"></ion-icon> and Add to homescreen.
                    </div>
                    <div class="mt-2">
                        <button class="btn btn-primary btn-block" data-bs-dismiss="modal">CLOSE</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
