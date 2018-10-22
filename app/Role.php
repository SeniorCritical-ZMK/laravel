<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'name', 'description', 'permissions'
    ];

    protected $casts = [
        'permissions' => 'collection'
    ];

    public function user()
    {
        return $this->hasMany(User::class);
    }

    protected static function boot()
    {
        //To protect from delete while users use this row
        parent::boot();

        static::deleting(function ($role) {
            if ($role->user()->count() > 0) {
                return false;
            }
            return true;
        });
    }
}
