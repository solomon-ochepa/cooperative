<x-app-layout>
    @slot('title', 'Dashboard')
    <x-themes.app.header class="bg-primary text-light">
        @slot('title', config('app.name'))
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
        <!-- Wallet Card -->
        <livewire:account::wallet />

        <!-- Transactions -->
        <livewire:transaction::recent />

        <!-- Stats -->
        <livewire:account::stats />
    </div>
</x-app-layout>
