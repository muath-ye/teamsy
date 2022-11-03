<?php

namespace App\Traits;

use App\Models\Scopes\TenantScope;

trait BelongsToTenant
{
    /**
     * Perform any actions required after the model boots.
     *
     * @return void
     */
    protected static function bootBelongsToTenant()
    {
        static::addGlobalScope(new TenantScope);
        static::creating(function ($model) {
            if(session()->has('tenant_id')){
                $model->tenant_id = session()->get('tenant_id');
            }
        });
    }
}