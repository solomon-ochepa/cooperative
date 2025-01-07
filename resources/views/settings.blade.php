<x-app-layout>
    @slot('title', 'Settings')
    <x-themes.app.header class="bg-primary text-light">
        @slot('title', 'Settings')
        @slot('back', '')
        @slot('right')
            <a class="headerButton" href="#">
                <ion-icon class="icon" name="notifications-outline"></ion-icon>
                {{-- <span class="badge badge-danger">0</span> --}}
            </a>
            <a class="headerButton" href="#">
                <img alt="image" class="imaged w32" src="{{ asset('assets/app') }}/img/sample/avatar/avatar1.jpg">
                {{-- <span class="badge badge-danger">0</span> --}}
            </a>
        @endslot
    </x-themes.app.header>

    <div id="appCapsule">
        @php $user = auth()->user(); @endphp
        <div class="section mt-3 text-center">
            <div class="avatar-section">
                <a href="#">
                    <img alt="avatar" class="imaged w100 rounded"
                        src="{{ asset('assets/app') }}/img/sample/avatar/avatar1.jpg">
                    <span class="button">
                        <ion-icon name="camera-outline"></ion-icon>
                    </span>
                </a>
            </div>
        </div>

        <div class="listview-title mt-1">Profile</div>
        <ul class="listview image-listview text inset">
            <li>
                <div class="item">
                    <div class="in">
                        <div class="">
                            Name
                        </div>
                        <div class="ms-2">
                            <span class="">{{ $user->name }} ({{ $user->username }})</span>
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <div class="item">
                    <div class="in">
                        <div class="">
                            Email
                        </div>
                        <div class="ms-2">
                            <span class="">{{ $user->email }}</span>
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <div class="item">
                    <div class="in">
                        <div class="">
                            Phone
                        </div>
                        <div class="ms-2">
                            <span class="">{{ $user->phone }}</span>
                        </div>
                    </div>
                </div>
            </li>
            {{-- <li>
                <div class="item">
                    <div class="in">
                        <div class="">
                            Roles
                        </div>
                        <div class="ms-2">
                            <span class="">{{ $user->roles }}</span>
                        </div>
                    </div>
                </div>
            </li> --}}
            <li>
                <div class="item">
                    <div class="in">
                        <div class="">
                            Registration
                        </div>
                        <div class="ms-2">
                            <span class="">{{ $user->created_at->calendar() }}</span>
                        </div>
                    </div>
                </div>
            </li>
        </ul>

        <div class="listview-title mt-1">Theme</div>
        <ul class="listview image-listview text inset no-line">
            <li>
                <div class="item">
                    <div class="in">
                        <div>
                            Dark Mode
                        </div>
                        <div class="form-check form-switch ms-2">
                            <input class="form-check-input dark-mode-switch" id="darkmodeSwitch" type="checkbox">
                            <label class="form-check-label" for="darkmodeSwitch"></label>
                        </div>
                    </div>
                </div>
            </li>
        </ul>

        <div class="listview-title mt-1"></div>
        <ul class="listview image-listview text inset no-line">
            @can('admin.index')
                <li>
                    <x-a class="item" route='admin'>
                        <div class="icon-box bg-primary">
                            <ion-icon name="desktop"></ion-icon>
                        </div>
                        <div class="in">
                            <div>
                                Admin
                            </div>
                        </div>
                    </x-a>
                </li>
            @endcan
        </ul>
    </div>
</x-app-layout>
