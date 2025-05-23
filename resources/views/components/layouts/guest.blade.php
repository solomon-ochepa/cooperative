<x-layouts.app.header :description="$description ?? null" :keywords="$keywords ?? null" :title="$title ?? null">
    {{ $slot }}
</x-layouts.app.header>
