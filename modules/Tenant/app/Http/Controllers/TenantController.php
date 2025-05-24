<?php

namespace Modules\Tenant\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Modules\Tenant\App\Models\Tenant;
use Modules\User\App\Models\User;

class TenantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {}

    /**
     * Show the form for creating a new resource.
     */
    public function create() {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {}

    /**
     * Show the specified resource.
     */
    public function show($id) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id) {}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id) {}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) {}

    /**
     * Impersonate a tenant user from the central domain
     */
    public function impersonate(Tenant $tenant, User $user)
    {
        $redirectUrl = '/dashboard';

        $token = tenancy()->impersonate($tenant, $user->id, $redirectUrl);

        $url = Str::of(tenant_route($tenant->domain->url, 'tenant.impersonate', $token))
            ->replace(env('APP_PORT').':', '')
            ->replace('https//', 'https://')
            ->replace('http//', 'http://')
            ->toString();

        return redirect($url);
    }
}
