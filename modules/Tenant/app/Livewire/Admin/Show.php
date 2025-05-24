<?php

namespace Modules\Tenant\app\Livewire\Admin;

use Illuminate\Support\Facades\Artisan;
use Livewire\Attributes\On;
use Livewire\Component;
use Modules\Tenant\App\Models\Tenant;
use Stancl\Tenancy\Events\TenantCreated;

class Show extends Component
{
    public $tenant;

    public $listeners = [
        'refresh' => '$refresh',
    ];

    public function mount(Tenant $tenant)
    {
        $this->tenant = $tenant;
    }

    public function render()
    {
        return view('tenant::livewire.admin.show');
    }

    #[On('tenant.trash')]
    public function trash(string $id, array $data)
    {
        Tenant::find($id)->delete();

        $this->dispatch('close-modal');

        session(null)->flash('status', 'Record trashed successfully.');

        $url = isset($data['redirect']) ? $data['redirect'] : route('admin.tenant.index');
        $this->redirect($url);
    }

    public function create_database(): void
    {
        event(new TenantCreated($this->tenant));

        session()->flash('status', 'Client updated!');
    }

    public function migrate(): void
    {
        tenancy()->initialize($this->tenant);
        Artisan::call('tenants:migrate', [
            '--force' => true,
        ]);

        session()->flash('status', 'Client updated!');
    }

    public function migrate_fresh(): void
    {
        tenancy()->initialize($this->tenant);
        Artisan::call('tenants:migrate-fresh', [
            '--force' => true,
        ]);
        tenancy()->end();

        session()->flash('status', 'Client updated!');
    }

    public function migrate_rollback(): void
    {
        tenancy()->initialize($this->tenant);
        Artisan::call('tenants:rollback', [
            '--force' => true,
        ]);
        tenancy()->end();

        session()->flash('status', 'Client updated!');
    }

    public function seed(): void
    {
        tenancy()->initialize($this->tenant);
        Artisan::call('tenants:seed', [
            '--force' => true,
        ]);
        tenancy()->end();

        session()->flash('status', 'Client updated!');
    }
}
