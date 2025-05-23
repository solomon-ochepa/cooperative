<?php

namespace Modules\User\app\Livewire\Settings\Forms;

use Illuminate\Support\Facades\Auth;
use Livewire\Form;
use Modules\User\App\Http\Requests\CreateUserRequest;

class ProfileForm extends Form
{
    public ?string $first_name = '';

    public ?string $last_name = '';

    public ?string $username = '';

    public ?string $phone = '';

    public ?string $email = '';

    public function rules()
    {
        return (new CreateUserRequest(Auth::user()))->rules();
    }

    public function update()
    {
        $validated = $this->validate();
        $user = Auth::user();

        $user->fill($validated);

        // If the email address is changed, we need to set the email_verified_at field to null
        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();
    }
}
