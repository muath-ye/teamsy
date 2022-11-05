<?php

namespace App\Models;

use App\Traits\BelongsToTenant;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory, BelongsToTenant;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'tenant_id',
        'type',
        'filename',
        'extension',
        'size',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function privateUrl()
    {
        return url('/documents/' . $this->user_id . '/' . $this->filename);
    }
}
