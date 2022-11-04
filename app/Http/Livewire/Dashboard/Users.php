<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\User;
use Livewire\Component;

class Users extends Component
{
    public function render()
    {
        return view('livewire.dashboard.users', ['users' => User::paginate( )])
                ->layout('layouts.dashboard');
    }
}
