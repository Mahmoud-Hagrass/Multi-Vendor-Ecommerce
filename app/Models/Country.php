<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Country extends Model
{
    use HasTranslations;

    public array $translatable = ['name'];
    public $timestamps = false ;

    protected $fillable = [
            'name',
            'phone_code',
            'flag' ,
            'capital',
            'currency',
            'currency_name',
            'currency_symbol',
            'region',
            'subregion',
            'latitude',
            'longitude',
            'timezones',
            'status'
        ] ;


    protected $casts = [
        'name' => 'array',
        'timezones' => 'array',
    ];

    //==========================================================================//
        //------------------------Accessors----------------------------//
    //==========================================================================//

    public function getStatusAttribute($value)
    {
        return ($value == 1) ? __('dashboard.active') : __('dashboard.in_active') ;
    }

    //==========================================================================//
        //------------------------Relationships----------------------------//
    //==========================================================================//

    public function governments()
    {
        return $this->hasMany(Government::class) ;
    }

    //==========================================================================//
        //------------------------Local Scopes----------------------------//
    //==========================================================================//

    public function scopeActive($query)
    {
        return $query->where('status' , 1) ;
    }
}
