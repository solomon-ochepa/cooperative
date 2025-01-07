<x-guest-layout>
    @slot('title', 'Login')
    <x-themes.app.header class="no-border transparent position-absolute">
        @slot('back', 'home')
        @slot('title', '')
        @slot('right')
        @endslot
    </x-themes.app.header>

    <div id="appCapsule">
        <div class="section mt-2 text-center">
            <h1>Log in</h1>
            {{-- <h4>Access the full app as a user</h4> --}}

            <x-alert />
        </div>

        <div class="section mb-5 p-2">
            <form action="{{ route('login') }}" method="POST">
                @csrf

                <div class="card">
                    <div class="card-body pb-1">
                        <!-- Username -->
                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="username">Username</label>
                                <input :value="old('email')" autocomplete="username" autofocus class="form-control"
                                    id="username" name="username" placeholder="" required type="text">
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                                @error('username')
                                    <div class="form-text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Password -->
                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="password">Password</label>
                                <input autocomplete="current-password" class="form-control" id="password"
                                    name="password" required type="password">
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                                @error('password')
                                    <div class="form-text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Remember Me -->
                        <div class="mt-1 block">
                            <label class="" for="remember_me">
                                <input class="" id="remember_me" name="remember" type="checkbox">
                                <span class="ms-1">{{ __('Remember me') }}</span>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-links mt-2">
                    <div>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">{{ __('Create an account') }}</a>
                        @endif
                    </div>

                    @if (Route::has('password.request'))
                        <div>
                            <a class="text-muted" href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        </div>
                    @endif
                </div>

                <div class="form-button-group transparent">
                    <button class="btn btn-primary btn-block btn-lg" type="submit">Log in</button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
