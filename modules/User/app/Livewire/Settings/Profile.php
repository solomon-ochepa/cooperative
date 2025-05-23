<?php

namespace Modules\User\app\Livewire\Settings;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Modules\User\app\Livewire\Settings\Forms\ProfileForm;
use Modules\User\App\Models\User;

class Profile extends Component
{
    public ProfileForm $form;

    public User $user;

    public function mount()
    {
        $this->user = Auth::user();

        $this->form->fill($this->user);
    }

    public function render()
    {
        return view('user::livewire.settings.profile', [
            'title' => __('Profile'),
        ])->layout('components.layouts.app', [
            'title' => __('Profile'),
            'description' => __('Update your profile information.'),
        ]);
    }

    /**
     * Update the profile information for the currently authenticated user.
     */
    public function updateProfileInformation(): void
    {
        $this->form->update();

        $this->dispatch('profile-updated', name: $this->user->name);
    }

    /**
     * Send an email verification notification to the current user.
     */
    public function resendVerificationNotification(): void
    {
        $user = Auth::user();

        if ($user->hasVerifiedEmail()) {
            $this->redirectIntended(default: route('dashboard', absolute: false));

            return;
        }

        $user->sendEmailVerificationNotification();

        Session::flash('status', 'verification-link-sent');
    }
}
