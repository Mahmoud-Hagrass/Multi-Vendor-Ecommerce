<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GovernmentShippingPrice extends Model
{
    protected $fillable = [
        'government_id' ,
        'shipping_price' ,
    ] ;


    //==========================================================================//
        //------------------------Relationships----------------------------//
    //==========================================================================//

    public function government()
    {
        return $this->belongsTo(Government::class) ;
    }
}
