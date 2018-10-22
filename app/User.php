<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'type', 'image_path', 'super_admin', 'role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function isSuperAdmin()
    {
        return $this->super_admin;
    }

    public function hasAvatar()
    {
        return $this->image_path !== null;
    }

    public function isExternalStaff()
    {
        return $this->type === 'external';
    }

    public function isDeliveryStaff()
    {
        return $this->type === 'external';
    }

    public function getAvatarAttribute()
    {
        $url = Storage::url($this->image_path);
        return $url;
    }

    public function scopeWithoutSuperadmin($query)
    {
        return $query->where('super_admin', false);
    }

    public function scopeWithoutExternal($query)
    {
        return $query->where('type', '!=', 'external');
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
