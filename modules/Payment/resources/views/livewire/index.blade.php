<div id="appCapsule">
    {{-- @slot('title', 'Payment Methods') --}}
    <x-layouts.app.sections.header class="bg-primary text-light">
        @slot('title', 'Payment Methods')
        @slot('back', '')
        @slot('links')
            <x-user::header.links />
        @endslot
    </x-layouts.app.sections.header>

    <x-alert />

    <div class="section mt-2">
        <header>
            <nav class="navbar sticky-top navbar-expand-md bg-body-tertiary mb-2">
                <form class="d-flex col px-0 pe-1" role="search">
                    <input aria-label="Search" class="form-control me-2 rounded" placeholder="Search" type="search">
                </form>

                <button aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"
                    class="navbar-toggler" data-bs-target="#navbarNav" data-bs-toggle="collapse" type="button">
                    {{-- <span class="navbar-toggler-icon"></span> --}}
                    <ion-icon name="menu-outline"></ion-icon>
                </button>

                <div class="navbar-collapse justify-content-end collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link button" data-bs-target="#payment" data-bs-toggle="modal" href="#">
                                <span data-bs-toggle="tooltip" title="Create">
                                    <ion-icon name="add-outline"></ion-icon>
                                    Add
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <div class="transactions">
            @forelse ($payments ?? [] as $payment)
                <a class="item p-2{{ $payment->trashed() ? ' text-muted' : '' }}" href="#"
                    wire:key="{{ $payment->id }}">
                    <div class="detail">
                        <i class="fas fa-bank image-block imaged btn-icon me-1"></i>
                        <div>
                            <strong>
                                <span data-bs-toggle="tooltip" title="First name">
                                    {{ $payment->details['account']['first_name'] ?? '' }}
                                </span>
                                <span data-bs-toggle="tooltip" title="Other name">
                                    {{ $payment->details['account']['other_name'] ?? '' }}
                                </span>
                                <span data-bs-toggle="tooltip" title="Last name">
                                    {{ $payment->details['account']['last_name'] ?? '' }}
                                </span>
                                @if ($payment->default)
                                    <span data-bs-toggle="tooltip" title="Default">
                                        <i aria-hidden="true" class="fa fa-check-circle"></i>
                                    </span>
                                @endif
                            </strong>
                            <p>
                                <span data-bs-toggle="tooltip" title="Bank name">
                                    {{ $payment->details['bank']['name'] ?? '' }}
                                </span> &dash;
                                <span data-bs-toggle="tooltip" title="Account number">
                                    {{ $payment->details['account']['number'] ?? '' }}
                                </span>
                            </p>
                        </div>
                    </div>

                    <div class="right">
                        <div class="actions text-muted">
                            @if ($payment->trashed())
                                <button class="btn btn-link btn-icon text-success" data-bs-toggle="tooltip"
                                    href="#" role="button" title="Restore"
                                    wire:click="$dispatch('payments.restore', {payment: @js($payment->id)})">
                                    <span>
                                        <i aria-hidden="true" class="fa fa-undo icon"></i>
                                        {{-- <span class="d-none d-md-inline">Restore</span> --}}
                                    </span>
                                </button>

                                <button class="btn btn-link btn-icon text-danger" data-bs-toggle="tooltip"
                                    href="#" role="button" title="Delete"
                                    wire:click="$dispatch('payments.delete', {payment: @js($payment->id)})">
                                    <span>
                                        <i aria-hidden="true" class="fa fa-trash-alt icon"></i>
                                        {{-- Delete --}}
                                    </span>
                                </button>
                            @else
                                {{-- <button class="btn btn-link btn-icon px-3" data-bs-toggle="tooltip" href="#"
                                    role="button" title="Withdraw"
                                    wire:click="$dispatch('payments.withdraw', {payment: @js($payment->id)})">
                                    <span>
                                        <ion-icon name="card-outline"></ion-icon>
                                        Withdraw
                                    </span>
                                </button> --}}

                                <button class="btn btn-link btn-icon text-danger" data-bs-toggle="tooltip"
                                    href="#" role="button" title="Trash"
                                    wire:click="$dispatch('payments.trash', {payment: @js($payment->id)})">
                                    <span>
                                        <i aria-hidden="true" class="fa fa-trash icon"></i>
                                        {{-- Trash --}}
                                    </span>
                                </button>
                            @endif
                        </div>
                    </div>
                </a>
            @empty
                <a class="item" data-bs-target="#payment" data-bs-toggle="modal" href="#">
                    <div class="detail">
                        <img alt="img" class="image-block imaged w48"
                            src="{{ asset('assets/img/sample/brand/1.jpg') }}">
                        <div>
                            <strong>No records found!</strong>
                            <p>Click to create a new payment method</p>
                        </div>
                    </div>

                    <div class="right">
                        <div class="price text-danger"></div>
                    </div>
                </a>
            @endforelse
        </div>
    </div>

    @pushonce('modals')
        <!-- Create payment -->
        <livewire:payment::create />
    @endpushonce
</div>
