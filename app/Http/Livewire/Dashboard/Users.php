<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Tenant;
use App\Models\User;
use Livewire\Component;

class Users extends Component
{
    public $super;
    public function impersonate($userId)
    {
        if (!is_null(auth()->user()->tenant_id)) {
            return;
        }

        $originalId = auth()->user()->id;
        session()->put('impersonate', $originalId);
        auth()->loginUsingId($userId);

        return redirect('/team');
    }
    public function mount()
    {
        if (session()->has('tenant_id')) {
            $this->super = false;
        } else {
            $this->super = true;
            $this->tenants = Tenant::all()->pluck('name', 'id')->toArray();
        }
    }
    public function render()
    {
        return view('livewire.dashboard.users', ['users' => User::paginate()]);
    }
}
