<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Role extends Model
{
    use HasTranslations;
    protected $fillable = ['name', 'permissions'];
    public array $translatable = ['name'];

    //==========================================================================//
        //------------------------Accessors -----------------------------//
    //==========================================================================//
    public function getPermissionsAttribute($value)
    {
        return json_decode($value) ;
    }

    //==========================================================================//
        //------------------------Accessors -----------------------------//
    //==========================================================================//

    public function scopeBasicSelect($query)
    {
        return $query->select('id' , 'name' , 'permissions') ;
    }

    public function scopeAdminCounts($query)
    {
        return $query->withCount('admins') ;
    }


    //==========================================================================//
        //------------------------Relationships----------------------------//
    //==========================================================================//
    public function admins()
    {
        return $this->hasMany(Admin::class) ;
    }
}
