<?php

namespace App\Http\Controllers;

use App\Models\Scopes\TenantScope;
use App\Models\User;

class ImpersonationController extends Controller
{
    public function leave()
    {
        if(! session()->has('impersonate')) {
            abort(403);
        }

        $user = User::withoutGlobalScope(TenantScope::class)->find(session()->get('impersonate'));
        // login as the super user in session
        auth()->login($user);
        session()->forget('impersonate');

        return redirect('/users');
    }
}
