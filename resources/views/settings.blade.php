<x-app-layout>
    @slot('page_title', 'Settings')
    <x-themes.app.header class="bg-primary text-light">
        @slot('page_title', 'Settings')
        @slot('right')
            <a class="headerButton" href="#">
                <ion-icon class="icon" name="notifications-outline"></ion-icon>
                {{-- <span class="badge badge-danger">0</span> --}}
            </a>
            <a class="headerButton" href="#">
                <img alt="image" class="imaged w32" src="{{ asset('assets/guest') }}/img/sample/avatar/avatar1.jpg">
                {{-- <span class="badge badge-danger">0</span> --}}
            </a>
        @endslot
    </x-themes.app.header>

    <div id="appCapsule">
        ...
    </div>
</x-app-layout>