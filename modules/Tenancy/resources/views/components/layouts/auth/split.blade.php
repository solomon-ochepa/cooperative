<!DOCTYPE html>
<html class="dark" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        @include('tenancy::components.layouts.auth.partials.head')
    </head>

    <body class="font-sans text-gray-900 antialiased">
        <div class="flex min-h-screen flex-col items-center bg-gray-100 pt-6 sm:justify-center sm:pt-0 dark:bg-gray-900">
            <div>
                <a href="/">
                    <x-tenancy::layouts.partials.logo-icon class="h-20 w-20 fill-current text-gray-500" />
                </a>
            </div>

            <div
                class="mt-6 w-full overflow-hidden bg-white px-6 py-4 shadow-md sm:max-w-md sm:rounded-lg dark:bg-gray-800">
                {{ $slot }}
            </div>
        </div>

        @include('tenancy::components.layouts.auth.partials.foot')
    </body>

</html>
