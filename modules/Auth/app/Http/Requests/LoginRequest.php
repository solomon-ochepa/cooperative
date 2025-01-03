<?php

namespace Modules\Auth\App\Http\Requests;

use Illuminate\Auth\Events\Lockout;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Modules\Role\App\Models\Role;
use Modules\User\App\Models\User;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'username' => ['required', 'string'],
            'password' => ['required', 'string'],
        ];
    }

    /**
     * Attempt to authenticate the request's credentials.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function authenticate(): void
    {
        $this->ensureIsNotRateLimited();

        if (! Auth::attempt($this->credentials(), $this->boolean('remember', true))) {
            RateLimiter::hit($this->throttleKey());

            throw ValidationException::withMessages([
                'username' => trans('auth.failed'),
            ]);
        }

        $this->permissions(Auth::user());

        RateLimiter::clear($this->throttleKey());
    }

    /**
     * Ensure the login request is not rate limited.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function ensureIsNotRateLimited(): void
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout($this));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'username' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    /**
     * Get the rate limiting throttle key for the request.
     */
    public function throttleKey(): string
    {
        return Str::transliterate(Str::lower($this->string('username')).'|'.$this->ip());
    }

    private function credentials()
    {
        $phonePattern = '/^\+?[1-9]\d{1,14}$/';
        switch ($this->username) {
            case filter_var($this->username, FILTER_VALIDATE_EMAIL):
                return [
                    'email' => $this->username,
                    'password' => $this->password,
                ];
                break;

            case preg_match($phonePattern, $this->username):
                return [
                    'phone' => $this->username,
                    'password' => $this->password,
                ];
                break;

            default:
                return [
                    'username' => $this->username,
                    'password' => $this->password,
                ];
                break;
        }
    }

    public function permissions(User $user)
    {
        if ($user->username and $user->username === 'admin') {
            $user->assignRole(Role::findOrCreate('super-admin'));
            $user->assignRole(Role::findOrCreate('admin'));
            $user->assignRole(Role::findOrCreate('developer'));
            $user->assignRole(Role::findOrCreate('beta'));
        }

        $user->assignRole(Role::findOrCreate('user'));
    }
}
