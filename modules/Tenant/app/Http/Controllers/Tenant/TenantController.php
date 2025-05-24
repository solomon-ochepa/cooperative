<?php

namespace Modules\Tenant\App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use Modules\User\App\Models\User;
use Stancl\Tenancy\Database\Models\ImpersonationToken;
use Stancl\Tenancy\Features\UserImpersonation;

class TenantController extends Controller
{
    /**
     * Display the tenancy landing page.
     */
    public function home()
    {
        // return view('tenant::welcome');
        return redirect()->route('dashboard');
    }

    /**
     * Display the tenancy landing page.
     */
    public function dashboard()
    {
        return view('tenant::dashboard');
    }

    /**
     * Impersonate a tenant user from the central domain
     */
    public function impersonate(ImpersonationToken $token)
    {
        $user = User::find($token->user_id);
        abort_unless($user, 403, 'User not found');

        return UserImpersonation::makeResponse($token);
    }
}
