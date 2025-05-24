<!DOCTYPE html>
<html class="dark" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        @include('tenancy::components.layouts.guest.partials.head')
    </head>

    <body>
        @stack('js.body')

        <main class="main" id="top" style="--phoenix-scroll-margin-top: 1.2rem;">
            <x-tenancy::layouts.guest.sections.header />

            {{ $slot }}
        </main>

        @include('tenancy::components.layouts.guest.partials.foot')
    </body>

</html>
