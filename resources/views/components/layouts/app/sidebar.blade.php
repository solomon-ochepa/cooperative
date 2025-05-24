<!DOCTYPE html>
<html class="dark" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        @include('components.layouts.app.partials.head')
    </head>

    <body>
        <x-layouts.partials.loader />

        {{ $slot }}

        @auth
            <x-layouts.app.sections.bottom-menu />

            <x-layouts.app.sections.sidebar />
        @endauth

        <x-layouts.partials.add-to-home-screen />

        <x-layouts.app.sections.cookies />

        @include('components.layouts.app.partials.foot')
    </body>

</html>
