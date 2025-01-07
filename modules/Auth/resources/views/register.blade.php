<x-app-layout>
    @slot('title', 'Register')
    <x-themes.app.header class="no-border transparent position-absolute">
        @slot('back', 'home')
        @slot('title', '')
        @slot('right')
            <a class="headerButton" href="{{ route('login') }}">
                Login
            </a>
        @endslot
    </x-themes.app.header>

    <div id="appCapsule">
        <div class="section mt-2 text-center">
            <h1>Register now</h1>
            <h4>Create an account for free!</h4>
        </div>
        <div class="section mb-5 p-2">
            <form action="{{ route('register') }}" method="POST">
                @csrf

                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <!-- First Name -->
                            <div class="col-sm-4">
                                <div class="form-group basic">
                                    <div class="input-wrapper">
                                        <x-input-label :value="__('First Name')" for="first_name" />
                                        <x-text-input :value="old('first_name')" autocomplete="first_name" autofocus
                                            id="first_name" name="first_name" required type="text" />
                                        <x-input-error :messages="$errors->get('first_name')" class="mt-2" />

                                        <i class="clear-input">
                                            <ion-icon name="close-circle"></ion-icon>
                                        </i>
                                    </div>
                                </div>
                            </div>

                            <!-- Last Name -->
                            <div class="col-sm-4">
                                <div class="form-group basic">
                                    <div class="input-wrapper">
                                        <x-input-label :value="__('Last Name')" for="last_name" />
                                        <x-text-input :value="old('last-name')" autocomplete="last_name" id="last_name"
                                            name="last_name" required type="text" />
                                        <x-input-error :messages="$errors->get('last_name')" class="mt-2" />

                                        <i class="clear-input">
                                            <ion-icon name="close-circle"></ion-icon>
                                        </i>
                                    </div>
                                </div>
                            </div>

                            <!-- Other Name -->
                            <div class="col-sm-4">
                                <!-- Other Name -->
                                <div class="form-group basic">
                                    <div class="input-wrapper">
                                        <x-input-label :value="__('Other Name')" for="other_name" />
                                        <x-text-input :value="old('other_name')" autocomplete="other_name" id="other_name"
                                            name="other_name" type="text" />
                                        <x-input-error :messages="$errors->get('other_name')" class="mt-2" />

                                        <i class="clear-input">
                                            <ion-icon name="close-circle"></ion-icon>
                                        </i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="email1">E-mail</label>
                                <input class="form-control" id="email1" placeholder="" type="email">
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                        </div>

                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="password1">Password</label>
                                <input autocomplete="off" class="form-control" id="password1" placeholder=""
                                    type="password">
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                        </div>

                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="password2">Password</label>
                                <input autocomplete="off" class="form-control" id="password2" placeholder=""
                                    type="password">
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                        </div>

                        <div class="custom-control custom-checkbox mb-1 mt-2">
                            <div class="form-check">
                                <input class="form-check-input" id="customCheckb1" type="checkbox">
                                <label class="form-check-label" for="customCheckb1">
                                    I agree <a data-bs-target="#termsModal" data-bs-toggle="modal" href="#">
                                        terms and conditions
                                    </a>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-button-group transparent">
                    <button class="btn btn-primary btn-block btn-lg" type="submit">Register</button>
                </div>
            </form>
        </div>

        <form action="{{ route('register') }}" class="d-none" method="POST">
            @csrf

            <!-- Name -->
            <div>
                <x-input-label :value="__('Name')" for="name" />
                <x-text-input :value="old('name')" autocomplete="name" autofocus class="mt-1 block w-full" id="name"
                    name="name" required type="text" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label :value="__('Email')" for="email" />
                <x-text-input :value="old('email')" autocomplete="username" class="mt-1 block w-full" id="email"
                    name="email" required type="email" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label :value="__('Password')" for="password" />

                <x-text-input autocomplete="new-password" class="mt-1 block w-full" id="password" name="password"
                    required type="password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label :value="__('Confirm Password')" for="password_confirmation" />

                <x-text-input autocomplete="new-password" class="mt-1 block w-full" id="password_confirmation"
                    name="password_confirmation" required type="password" />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="mt-4 flex items-center justify-end">
                <a class="rounded-md text-sm text-gray-600 underline hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:text-gray-400 dark:hover:text-gray-100 dark:focus:ring-offset-gray-800"
                    href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-primary-button class="ms-4">
                    {{ __('Register') }}
                </x-primary-button>
            </div>
        </form>
    </div>

    @pushOnce('modals')
        <!-- Terms and Conditions -->
        <div class="modal fade modalbox" id="termsModal" role="dialog" tabindex="-1">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Terms and Conditions</h5>
                        <a data-bs-dismiss="modal" href="#">Close</a>
                    </div>

                    <div class="modal-body">
                        <p>
                            ...
                        </p>
                        <p>
                            ...
                        </p>
                    </div>
                </div>
            </div>
        </div>
    @endPushOnce
</x-app-layout>
