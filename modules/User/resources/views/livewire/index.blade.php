<div id="appCapsule">
    <div class="section full mb-2 mt-1">
        <div class="section-title">
            <h1>Users</h1>
        </div>

        <div id="myTabContent">
            <div aria-labelledby="all-tab" class="wide-block p-0"
                data-list='{"valueNames":["name","username", "phone", email],"page","pagination":true}' id="all"
                user="tabpanel">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="text-uppercase">
                            <tr>
                                <th class="white-space-nowrap fs--1 ps-0 align-middle">
                                    <div class="form-check fs-0 mb-0">
                                        <input class="form-check-input" data-bulk-select='{"body":"users-table-body"}'
                                            id="checkbox-bulk-customers-select" type="checkbox" />
                                    </div>
                                </th>

                                <th data-sort="name" scope="col">
                                    {{ __('Name') }}
                                </th>

                                <th data-sort="username" scope="col">
                                    {{ __('Username') }}
                                </th>

                                <th data-sort="phone" scope="col">
                                    {{ __('Phone') }}
                                </th>

                                <th data-sort="email" scope="col">
                                    {{ __('Email') }}
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($users ?? [] as $user)
                                <tr class="hover-actions-trigger btn-reveal-trigger position-static"
                                    wire:key="{{ $user->id }}">
                                    <td>
                                        <div class="form-check fs-0 mb-0">
                                            <input class="form-check-input"
                                                data-bulk-select-row='@json($user)' type="checkbox" />
                                        </div>
                                    </td>

                                    <td class="name white-space-nowrap text-1000 align-middle">
                                        {{ $user->name }}
                                    </td>

                                    <td class="username white-space-nowrap text-1000 align-middle">
                                        {{ $user->username }}
                                    </td>

                                    <td class="phone white-space-nowrap text-1000 align-middle">
                                        {{ $user->phone }}
                                    </td>

                                    <td class="email white-space-nowrap text-1000 align-middle">
                                        {{ $user->email ?? '' }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="section full mb-2 mt-2 text-right">
                    <button class="btn btn-icon btn-lg btn-primary mb-1 me-1" data-bs-target="#ModalForm"
                        data-bs-toggle="modal" type="button" wire:click="$dispatch('open-modal')">
                        <ion-icon name="add-outline"></ion-icon>
                    </button>
                    @push('modals')
                        <livewire:user::modals.create />
                    @endpush
                </div>
            </div>
        </div>
    </div>
</div>