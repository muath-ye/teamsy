<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Traits\BelongsToTenant;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, BelongsToTenant;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'tenant_id',
        'password',
        'department',
        'title',
        'status',
        'role',
        'photo',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function avatarUrl()
    {
        if($this->photo) {
            return Storage::disk('s3-public')->url($this->photo);
        }
        return 'https://avatars.dicebear.com/api/initials/' . $this->name . '.svg';
    }

    public static function search($query)
    {
        return empty($query) ? static::query()
            : static::where('name', 'like', '%'.$query.'%')
                ->orWhere('email', 'like', '%'.$query.'%');
    }

    public function isAdmin()
    {
        return $this->role == 'Admin';
    }

    public function isHR()
    {
        return $this->role == 'Human Resources';
    }

    public function applicationUrl()
    {
        if($this->application()) {
            return url('/documents/' . $this->id . '/' . $this->application()->filename);
        }
        return '#';
    }

    public function application()
    {
        return $this->documents()->where('type', 'application')->first();
    }

    public function documents()
    {
        return $this->hasMany(Document::class);
    }
}
