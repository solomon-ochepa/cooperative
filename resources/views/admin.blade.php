<x-app-layout>
    @slot('title', 'Administrator')
    <x-themes.app.header class="bg-primary text-light">
        @slot('back', 'settings')
        @slot('title')
            <ion-icon name="desktop"></ion-icon>
            <span>Administrator</span>
        @endslot
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
        <livewire:account::widgets.wallet-card />

        <!-- Transactions -->
        <livewire:transaction::recent />

        <!-- Stats -->
        <livewire:account::widgets.stats />
    </div>
</x-app-layout>
