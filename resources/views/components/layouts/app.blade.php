<x-layouts.app.sidebar :description="$description ?? null" :keywords="$keywords ?? null" :title="$title ?? null">
    {{ $slot }}
</x-layouts.app.sidebar>
