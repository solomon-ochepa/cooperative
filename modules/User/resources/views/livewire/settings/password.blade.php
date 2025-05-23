<section>
    <x-layouts.app.sections.header back='dashboard' class="bg-primary text-light">
        @slot('title', $title ?? __('Update password'))
        @slot('description', __('Ensure your account is using a long, random password to stay secure'))
        @slot('links')
            <x-user::header.links />
        @endslot
    </x-layouts.app.sections.header>

    <section id="appCapsule">
        <div class="section mt-2">
            <form class="mt-6 space-y-6" wire:submit="updatePassword">
                <x-input :label="__('Current password')" autocomplete="current-password" autofocus required type="password"
                    wire:model="current_password" />
                <x-input :label="__('New password')" autocomplete="new-password" required type="password" wire:model="password" />
                <x-input :label="__('Confirm Password')" autocomplete="new-password" required type="password"
                    wire:model="password_confirmation" />

                <div class="flex items-center gap-4">
                    <div class="flex items-center justify-end">
                        <button class="btn-block btn btn-primary" type="submit">{{ __('Save') }}</button>
                    </div>

                    <x-action-message class="me-3" on="password-updated">
                        {{ __('Saved.') }}
                    </x-action-message>
                </div>
            </form>
        </div>
    </section>
</section>
