<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;
    protected $guard = 'admin';

    protected $fillable = ['name', 'email', 'password', 'role_id', 'status'];

    protected $hidden = [
        'password',
        'remember_token',
    ];


    public function hasPermission($permissionKey): bool  // Added return type hint
    {
        if (!$this->role) {
            return false;
        }


        foreach ($this->role->permissions ?? [] as $permission) {
            if ($permission === $permissionKey) {  // Strict comparison
                return true;
            }
        }

        return false;
    }
    //==========================================================================//
    //------------------------Casts----------------------------//
    //==========================================================================//
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    //==========================================================================//
    //------------------------Accessors----------------------------//
    //==========================================================================//
    public function getStatusAttribute($value)
    {
        return ($value == 1) ? __('dashboard.active') : __('dashboard.in_active');
    }

    //==========================================================================//
    //------------------------Scope----------------------------//
    //==========================================================================//
    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function scopeBasicSelect($query)
    {
        return $query->select(['id', 'name', 'email', 'role_id', 'status', 'created_at']);
    }

    public function scopeOrderByAsscending($query)
    {
        return $query->orderBy('id', 'ASC');
    }

    public function scopeWithRole($query)
    {
        return $query->with(['role' => function ($query) {
            $query->select(['id', 'name']);
        }]);
    }

    //==========================================================================//
    //------------------------Relationships----------------------------//
    //==========================================================================//
    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
