<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class City extends Model
{
     use HasTranslations;

    protected $fillable = ['name' , 'government_id' , 'status'] ;
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

    public function government()
    {
        return $this->belongsTo(Government::class) ;
    }

    //==========================================================================//
        //------------------------Local Scopes-----------------------------//
    //==========================================================================//

    public function scopeActive($query)
    {
        return $query->where('status' , 1) ; 
    }

    //==========================================================================//
        //------------------------Accessors-----------------------------//
    //==========================================================================//
    public function getStatusAttribute($value)
    {
        return ($value == 1) ? __('dashboard.active') : __('dashboard.in_active') ;
    }
}
