<div id="appCapsule">
    {{-- @slot('title', 'Dashboard') --}}
    <x-layouts.app.sections.header back='admin.dashboard' class="bg-primary text-light">
        @slot('title', __('Users Management'))
        @slot('links')
            <x-user::header.links />
        @endslot
    </x-layouts.app.sections.header>

    <div class="section -full mt-4">
        <div class="section-heading -padding">
            <h2 class="title">Manage Users</h2>

            <div>
                {{-- @can('admin.users.create')
                    <a class="button link disabled me-1" data-bs-target="#add" data-bs-toggle="modal" href="javascript://#">
                        <i class="fas fa-user-plus"></i>
                        Add
                    </a>
                    @pushOnce('modals')
                        <livewire:user::admin.modals.create />
                    @endPushOnce
                @endcan --}}

                @can('admin.users.import')
                    <a class="button link" data-bs-target="#import" data-bs-toggle="modal" href="javascript://#">
                        <i class="fas fa-file-import"></i>
                        Import
                    </a>
                    @pushOnce('modals')
                        <livewire:user::admin.modals.import />
                    @endPushOnce
                @endcan
            </div>
        </div>

        <livewire:page.search />

        <div class="row g-3 mb-4">
            @forelse ($users ?? [] as $user)
                <div class="col-sm-2">
                    <a href="{{ route('admin.user.show', ['user' => $user->id]) }}">
                        <div class="user-card">
                            <img alt="img" class="imaged w-100"
                                src="{{ asset('assets/img/sample/avatar/avatar2.jpg') }}">
                            <strong>{{ $user->name }}</strong>
                        </div>
                    </a>
                </div>
            @empty
                <div class="col-sm-2">
                    <div class="user-card">
                        <img alt="img" class="imaged w-100"
                            src="{{ asset('assets/img/sample/avatar/avatar2.jpg') }}">
                        <strong>Jurrien</strong>
                    </div>
                </div>
            @endforelse

            {{-- <div class="col-sm-2">
                <a href="#">
                    <div class="user-card">
                        <img alt="img" class="imaged w-100"
                            src="{{ asset('assets/img/sample/avatar/avatar3.jpg') }}">
                        <strong>Elwin</strong>
                    </div>
                </a>
            </div> --}}

            {{-- <div class="col-sm-2">
                <a href="#">
                    <div class="user-card">
                        <img alt="img" class="imaged w-100"
                            src="{{ asset('assets/img/sample/avatar/avatar4.jpg') }}">
                        <strong>Alma</strong>
                    </div>
                </a>
            </div> --}}

            {{-- <div class="col-sm-2">
                <a href="#">
                    <div class="user-card">
                        <img alt="img" class="imaged w-100"
                            src="{{ asset('assets/img/sample/avatar/avatar5.jpg') }}">
                        <strong>Justine</strong>
                    </div>
                </a>
            </div> --}}

            {{-- <div class="col-sm-2">
                <a href="#">
                    <div class="user-card">
                        <img alt="img" class="imaged w-100"
                            src="{{ asset('assets') }}/img/sample/avatar/avatar6.jpg">
                        <strong>Maria</strong>
                    </div>
                </a>
            </div> --}}

            {{-- <div class="col-sm-2">
                <a href="#">
                    <div class="user-card">
                        <img alt="img" class="imaged w-100"
                            src="{{ asset('assets') }}/img/sample/avatar/avatar7.jpg">
                        <strong>Pamela</strong>
                    </div>
                </a>
            </div> --}}

            {{-- <div class="col-sm-2">
                <a href="#">
                    <div class="user-card">
                        <img alt="img" class="imaged w-100"
                            src="{{ asset('assets') }}/img/sample/avatar/avatar8.jpg">
                        <strong>Neville</strong>
                    </div>
                </a>
            </div> --}}

            {{-- <div class="col-sm-2">
                <a href="#">
                    <div class="user-card">
                        <img alt="img" class="imaged w-100"
                            src="{{ asset('assets') }}/img/sample/avatar/avatar9.jpg">
                        <strong>Alex</strong>
                    </div>
                </a>
            </div> --}}

            {{-- <div class="col-sm-2">
                <a href="#">
                    <div class="user-card">
                        <img alt="img" class="imaged w-100"
                            src="{{ asset('assets') }}/img/sample/avatar/avatar10.jpg">
                        <strong>Stina</strong>
                    </div>
                </a>
            </div> --}}

            @if (isset($users) and $users)
                {{ $users->links() }}
            @endif
        </div>
    </div>
</div>
