<div class="sticky-top landing-navbar bg-white" data-navbar-shadow-on-scroll="data-navbar-shadow-on-scroll">
    <nav class="navbar navbar-expand-lg container-small px-lg-7 px-xxl-3 px-3">
        <!-- Logo -->
        <a class="navbar-brand flex-lg-grow-0 flex-1" href="{{ route('home') }}">
            <div class="d-flex align-items-center">
                <img alt="phoenix" src="{{ asset('logo.png') }}" width="27" />
                <p class="logo-text ms-2">{{ config('app.name') }}</p>
            </div>
        </a>

        <!-- Switch themes [light | dark] -->
        <div class="d-lg-none">
            <div class="theme-control-toggle fa-icon-wait px-2">
                <input class="form-check-input theme-control-toggle-input ms-0" data-theme-control="phoenixTheme"
                    id="themeControlToggleSm" type="checkbox" value="dark" />
                <label class="theme-control-toggle-label theme-control-toggle-light mb-0" data-bs-placement="left"
                    data-bs-toggle="tooltip" for="themeControlToggleSm" title="Switch theme">
                    <span class="icon" data-feather="moon"></span>
                </label>
                <label class="theme-control-toggle-label theme-control-toggle-dark mb-0" data-bs-placement="left"
                    data-bs-toggle="tooltip" for="themeControlToggleSm" title="Switch theme">
                    <span class="icon" data-feather="sun"></span>
                </label>
            </div>
        </div>

        <!-- Mobile menu -->
        <button aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"
            class="navbar-toggler" data-bs-target="#navbarSupportedContent" data-bs-toggle="collapse" type="button">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="navbar-collapse collapse" id="navbarSupportedContent">
            <div class="border-bottom border-bottom-lg-0 mb-2">
                <!-- Search -->
                <div class="search-box d-inline d-lg-none">
                    <form class="position-relative" data-bs-display="static" data-bs-toggle="search">
                        <input aria-label="Search" class="form-control search-input search rounded-pill my-4" disabled
                            placeholder="Search" type="search" />
                        <span class="fas fa-search search-box-icon"></span>
                    </form>
                </div>
            </div>

            <!-- Nav -->
            <ul class="navbar-nav mb-lg-0 mb-2 me-auto">
                <li class="nav-item border-bottom border-bottom-lg-0">
                    <a aria-current="page" class="nav-link lh-1 fs--1 fw-bold active py-3"
                        href="{{ route('home') }}">Home</a>
                </li>

                <li class="nav-item border-bottom border-bottom-lg-0">
                    <a aria-current="page" class="nav-link lh-1 fs--1 fw-bold active py-3"
                        href="{{ route('splitter') }}">Splitter</a>
                </li>

                {{-- <li class="nav-item border-bottom border-bottom-lg-0">
                    <a class="nav-link lh-1 fs--1 fw-bold py-0 py-3" href="#feature">Features</a>
                </li>
                <li class="nav-item border-bottom border-bottom-lg-0">
                    <a class="nav-link lh-1 fs--1 fw-bold py-0 py-3" href="#blog">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link lh-1 fs--1 fw-bold py-0 py-3" href="#team">Team</a>
                </li> --}}
            </ul>

            <!-- Actions -->
            <div class="d-grid d-lg-flex align-items-center">
                <div class="nav-item d-flex align-items-center d-none d-lg-block pe-2">
                    <div class="theme-control-toggle fa-icon-wait px-2">
                        <input class="form-check-input theme-control-toggle-input ms-0"
                            data-theme-control="phoenixTheme" id="themeControlToggle" type="checkbox" value="dark" />
                        <label class="theme-control-toggle-label theme-control-toggle-light mb-0"
                            data-bs-placement="left" data-bs-toggle="tooltip" for="themeControlToggle"
                            title="Switch theme">
                            <span class="icon" data-feather="moon"></span>
                        </label>
                        <label class="theme-control-toggle-label theme-control-toggle-dark mb-0"
                            data-bs-placement="left" data-bs-toggle="tooltip" for="themeControlToggle"
                            title="Switch theme">
                            <span class="icon" data-feather="sun"></span>
                        </label>
                    </div>
                </div>

                <!-- Search -->
                {{-- <a class="text-700 hover-text-1100 d-none d-lg-inline lh-sm px-2" data-bs-target="#searchBoxModal"
                    data-bs-toggle="modal" href="#">
                    <span data-feather="search" style="height: 20px; width: 20px;"></span>
                </a> --}}

                <!-- Auth -->
                @if (Route::has('login'))
                    @auth
                        <a class="btn btn-link text-900 order-lg-0 me-lg-2 order-1 ps-4" href="{{ route('dashboard') }}">
                            Dashboard
                        </a>

                        <form action="{{ route('logout') }}" method="POST">
                            @csrf

                            <a class="btn btn-link border-start text-danger order-lg-0 me-lg-2 -ps-4 -order-1"
                                data-bs-toggle="tooltip" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); this.closest('form').submit();" title="Log out">
                                <i aria-hidden="true" class="fa fa-power-off"></i>
                            </a>
                        </form>
                    @else
                        <a class="btn btn-link text-900 order-lg-0 me-lg-2 order-1 ps-4" href="{{ route('login') }}">
                            Sign in
                        </a>

                        @if (Route::has('register'))
                            <a class="btn btn-phoenix-primary order-0" href="{{ route('register') }}">
                                <span class="fw-bold">Sign Up</span>
                            </a>
                        @endif
                    @endauth
                @endif
            </div>
        </div>
    </nav>
</div>
