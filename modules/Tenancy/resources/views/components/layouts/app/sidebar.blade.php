<!DOCTYPE html>
<html class="dark" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        @include('tenancy::components.layouts.app.partials.head')
    </head>

    <body>
        <x-tenancy::layouts.partials.loader />

        {{ $slot }}

        @auth
            <x-tenancy::layouts.app.sections.sidebar />
            <x-tenancy::layouts.app.sections.bottom-menu />
        @endauth

        <x-tenancy::layouts.partials.add-to-home-screen />

        <x-tenancy::layouts.app.sections.cookies />

        @include('tenancy::components.layouts.app.partials.foot')
    </body>

</html>
