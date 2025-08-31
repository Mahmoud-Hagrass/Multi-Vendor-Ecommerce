<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Government extends Model
{
     use HasTranslations;

    protected $fillable = ['name' , 'country_id' , 'status'] ;
    public array $translatable = ['name'];
    public $timestamps = false ;



    //==========================================================================//
        //------------------------Casts----------------------------//
    //==========================================================================//

    protected $casts = [
        'name' => 'array',
    ];


    //==========================================================================//
        //------------------------Relationships----------------------------//
    //==========================================================================//

    public function country()
    {
        return $this->belongsTo(Country::class) ;
    }

    public function cities()
    {
        return $this->hasMany(City::class) ;
    }

    public function shippingPrice()
    {
        return $this->hasOne(GovernmentShippingPrice::class) ;
    }


    //==========================================================================//
     //------------------------Accessors & Mutators----------------------------//
    //==========================================================================//

    public function getStatusAttribute($value)
    {
        return ($value == 1) ? __('dashboard.active') : __('dashboard.in_active') ;
    }


    //==========================================================================//
         //------------------------Local Scopes ---------------------------//
    //==========================================================================//
    public function scopeActive($query)
    {
        return $query->where('status' , 1) ;
    }

}
