<section>
    <x-layouts.app.sections.header back='dashboard' class="bg-primary text-light">
        @slot('title', $title ?? __('Profile'))
        @slot('links')
            <x-user::header.links />
        @endslot
    </x-layouts.app.sections.header>

    <section id="appCapsule">
        <div class="section mt-3 text-center">
            <div class="avatar-section">
                <a href="#">
                    <img alt="avatar" class="imaged w100 rounded" src="{{ asset('unknown.webp') }}">
                    <span class="button">
                        <ion-icon name="camera-outline"></ion-icon>
                    </span>
                </a>
            </div>
        </div>

        <div class="section mt-2">
            <div class="section-title">Basic</div>
            <div class="card">
                <div class="card-body">
                    <form class="" wire:submit="updateProfileInformation">
                        <div class="row">
                            <div class="col-md-6">
                                <x-input :label="__('First name')" autocomplete="first-name" autofocus required
                                    wire:model="form.first_name" />
                            </div>
                            <div class="col-md-6">
                                <x-input :label="__('Last name')" autocomplete="last-name" required
                                    wire:model="form.last_name" />
                            </div>
                            <div class="col-md-12">
                                <x-input :label="__('Username')" autocomplete="username" required
                                    wire:model="form.username" />
                            </div>
                            <div class="col-md-12">
                                <x-input :label="__('Phone')" autocomplete="phone" required type="tel"
                                    wire:model="form.phone" />
                            </div>
                            <div class="col-md-12">
                                <x-input :label="__('Email')" autocomplete="email" required type="email"
                                    wire:model="form.email" />

                                @if (auth()->user() instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !auth()->user()->hasVerifiedEmail())
                                    <div>
                                        <div class="my-3">
                                            @if (session('status') === 'verification-link-sent')
                                                <div class="text-success my-3 text-center font-medium">
                                                    <i aria-hidden="true" class="fa fa-check-circle"></i>
                                                    {{ __('A new verification link has been sent to your email address.') }}
                                                </div>
                                            @endif

                                            <ul class="listview link-listview">
                                                <li>
                                                    <a href="#">
                                                        {{ __('Your email address is unverified.') }}

                                                        <span class="text-muted">
                                                            <button
                                                                class="btn btn-sm text-primary cursor-pointer text-sm"
                                                                data-bs-toggle="tooltip"
                                                                title="{{ __('Click here to re-send the verification email.') }}"
                                                                type="button"
                                                                wire:click.prevent="resendVerificationNotification">
                                                                {{ __('re-send') }}
                                                            </button>
                                                        </span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-12">
                                <div class="flex items-center gap-4">
                                    <div class="flex items-center justify-end">
                                        <button class="btn btn-block btn-primary"
                                            type="submit">{{ __('Save') }}</button>
                                    </div>

                                    <x-action-message class="me-3" on="profile-updated">
                                        {{ __('Saved.') }}
                                    </x-action-message>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- <livewire:user::settings.delete-user-form /> --}}
    </section>
</section>
