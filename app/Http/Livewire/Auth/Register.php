<?php

namespace App\Http\Livewire\Auth;

use App\Models\Tenant;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Livewire\Component;

class Register extends Component
{
    /** @var string */
    public $name = '';

    /** @var string */
    public $email = '';

    /** @var string */
    public $company = '';

    /** @var string */
    public $password = '';

    /** @var string */
    public $passwordConfirmation = '';

    public function register()
    {
        $this->validate([
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users'],
            'company' => ['required', 'string', 'unique:tenants,name'],
            'password' => ['required', 'min:8', 'same:passwordConfirmation'],
        ]);

        $tenant = Tenant::create([
            'name' => $this->company,
        ]);

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'role' => 'admin', // Admin because this user is register the tenant and can add new users to the tenant
            'tenant_id' => $tenant->tenant_id,
            'password' => Hash::make($this->password),
        ]);

        event(new Registered($user));

        Auth::login($user, true);

        return redirect()->intended(route('home'));
    }

    public function render()
    {
        return view('livewire.auth.register')->extends('layouts.auth');
    }
}
