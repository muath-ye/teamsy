<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;

class Users extends Component
{
    public function render()
    {
        return view('livewire.dashboard.users')->layout('layouts.dashboard');
    }
}
