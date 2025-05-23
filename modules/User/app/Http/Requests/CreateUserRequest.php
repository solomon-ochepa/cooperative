<?php

namespace Modules\User\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Modules\User\App\Models\User;

class CreateUserRequest extends FormRequest
{
    public function __construct(public ?User $user = null)
    {
        parent::__construct();

        $this->user = $user;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'first_name' => ['required', 'string', 'min:1', 'max:32'],
            'last_name' => ['required', 'string', 'min:1', 'max:32'],
            'username' => ['nullable', 'string', 'min:3', 'max:16', 'alpha_dash', Rule::unique(User::class)->ignore($this->user?->id)],
            'phone' => ['required', 'string', 'max:16', Rule::unique(User::class)->ignore($this->user?->id)],
            'email' => [
                'nullable',
                'string',
                'email',
                'lowercase',
                'max:255',
                Rule::unique(User::class)->ignore($this->user?->id),
            ],
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::user()->can('create', $this->user);
    }
}
