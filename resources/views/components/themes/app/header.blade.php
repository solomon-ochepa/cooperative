<div {{ $attributes->merge(['class' => 'appHeader']) }}>
    <div class="left">
        @if (isset($back))
            <a class="headerButton goBack" href="{{ empty($back) ? route('dashboard') : route($back) }}">
                <ion-icon name="chevron-back-outline"></ion-icon>
            </a>
        @else
            <a class="headerButton" data-bs-target="#sidebarPanel" data-bs-toggle="modal" href="#">
                <ion-icon name="menu-outline"></ion-icon>
            </a>
        @endif
    </div>

    <div class="pageTitle">
        {!! $title ?? null !!}
    </div>

    <div class="right">
        {{ $right ?? null }}
    </div>
</div>
