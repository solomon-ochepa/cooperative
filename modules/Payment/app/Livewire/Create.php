<?php

namespace Modules\Payment\app\Livewire;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;
use Illuminate\Validation\ValidationException;
use Livewire\Component;
use Modules\Payment\app\Livewire\Forms\CreateForm;
use SolomonOchepa\Nuban\Nuban;

class Create extends Component
{
    public CreateForm $form;

    protected $listeners = [
        'refresh' => '$refresh',
    ];

    public function mount()
    {
        $nuban = new Nuban;

        $cache_key = 'banks';
        if (Cache::missing($cache_key)) {
            try {
                $data = $nuban->banks();
            } catch (\Throwable $e) {
                throw ValidationException::withMessages([
                    'form.bank.code' => __('Connection error.'),
                ]);
            }

            if ($data) {
                Cache::add($cache_key, Arr::sort($data), now()->tomorrow());
            }
        }
    }

    public function render()
    {
        $data = [];
        $data['banks'] = Cache::get('banks');

        return view('payment::livewire.create', $data);
    }

    public function updatedFormBankCode($code)
    {
        $this->validateOnly('form.bank.account');

        $this->form->bank['name'] = $this->bank($code);

        if (strlen($this->form->account['number'] ?? '') === 10 and $code) {
            $this->account($this->form->account['number'], $code);
        }
    }

    public function updatedFormAccountNumber($number)
    {
        $this->validateOnly('form.account.number');

        if (strlen($number) === 10 and $this->form->bank['code']) {
            $this->account($number, $this->form->bank['code']);
        }
    }

    public function store()
    {
        $this->form->store();

        $this->dispatch('refresh');
    }

    private function account(string $number, string $bank)
    {
        $nuban = new Nuban;

        $cache_key = "bank.account.{$bank}.{$number}";
        if (Cache::missing($cache_key)) {
            try {
                $data = $nuban->account($number, $bank);
            } catch (\Throwable $e) {
                $this->form->account['name'] = '';

                throw ValidationException::withMessages([
                    'form.account.number' => __('Connection error.'),
                ]);
            }

            if (isset($data['status']) and $data['status']) {
                Cache::add($cache_key, $data, now()->tomorrow());
            } else {
                Cache::add($cache_key, $data, now()->addSeconds(10));
            }
        }

        $account = Cache::get($cache_key);

        if ($account['status']) {
            $names = ['first_name', 'other_name', 'last_name'];
            $this->form->account = array_merge($this->form->account, Arr::only($account, $names));
        } else {
            $this->form->account['name'] = '';

            throw ValidationException::withMessages([
                'form.account.number' => __($account['message']),
            ]);
        }
    }

    /**
     * Get a bank name by code.
     */
    private function bank($code)
    {
        return Cache::get('banks')[$code];
    }
}
