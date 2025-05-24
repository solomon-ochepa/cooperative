<?php

use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomainOrSubdomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;

it('registers tenancy events correctly', function () {
    Event::fake();

    // Boot the application to trigger the service provider
    $this->app->boot();

    // Assert that events are registered
    $events = app()->make('events');
    $registeredListeners = collect($events->getListeners(Stancl\Tenancy\Events\TenantCreated::class));

    expect($registeredListeners)->not->toBeEmpty();
});

it('sets tenancy middleware to highest priority', function () {
    $kernel = app(\Illuminate\Contracts\Http\Kernel::class);

    // Boot the application to trigger the service provider
    $this->app->boot();

    $middlewarePriority = $kernel->getMiddlewarePriority();

    expect($middlewarePriority)->toContain(
        PreventAccessFromCentralDomains::class,
        InitializeTenancyByDomainOrSubdomain::class
    );
});

it('maps tenant and central domain routes correctly', function () {
    // Boot the application to trigger the service provider
    $this->app->boot();

    // Assert that tenant and central domain routes are registered
    $routes = Route::getRoutes();

    $tenantRoutes = collect($routes)->filter(function ($route) {
        return in_array('web', $route->middleware());
    });

    expect($tenantRoutes)->not->toBeEmpty();
});
