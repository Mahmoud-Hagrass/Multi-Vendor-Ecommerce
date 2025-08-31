<?php

namespace App\Repositories\World;

use App\Models\Country;
use App\Models\Government;
use App\Repositories\Interfaces\WorldInterface;
use Illuminate\Support\Facades\DB;

class WorldRepository implements WorldInterface
{
    public function getAllCountries()
    {
        $countries = Country::query()
                        ->withCount('governments')
                        ->orderBy('name', 'asc')
                        ->select(['id', 'name', 'phone_code', 'flag', 'status'])
                        ->addSelect(DB::raw('(SELECT COUNT(*) FROM governments WHERE governments.country_id = countries.id) as governments_count'))
                        ->paginate(10);

        if (!$countries) {
            return false;
        }
        return $countries;
    }

    public function getCountryById($country_id)
    {
        $country = Country::where('id', $country_id)->select(['id' , 'name' , 'flag' ,'status'])->first() ;
        if(!$country){
            return false;
        }

        return $country;
    }


    public function changeCountryStatus($country)
    {
        $currentStatus = $country->getRawOriginal('status');
        $newStatus = ($currentStatus == 1) ? 0 : 1;


        if ($currentStatus == $newStatus) {
            return false ; 
        }

        $country->update(['status' => $newStatus]);

        return $country;
    }



    public function getAllGovernments($country)
    {
        $country_with_governments = $country->load(['governments']) ;
        if(!$country_with_governments){
            return false ;
        }

        return $country_with_governments ;
    }


    public function getGovernments()
    {
        $countries_with_governments = Country::whereHas('governments')
                                                    ->with(['governments' => function($query){
                                                        $query->withCount('cities')->with(['shippingPrice' => function($query){
                                                            $query->select(['government_id' , 'shipping_price']) ;
                                                        }]) ;
                                                    }
                                                ])
                                                ->active()
                                                ->select(['id' , 'name' , 'flag' , 'status'])
                                                ->paginate(1) ;
        if($countries_with_governments->isEmpty()){
            return false ;
        }

        return $countries_with_governments ;
    }


    public function changeGovernmentShippingPrice($government , $shippingPrice)
    {
        $government->load('shippingPrice') ;
        $government->shippingPrice()->update([
            'shipping_price'  => $shippingPrice ,
        ]) ;

        return $government ;
    }

    public function changeGovernmentStatus($government)
    {
        $currentStatus = $government->getRawOriginal('status');
        $newStatus = ($currentStatus == 1) ? 0 : 1;

        if($currentStatus == $newStatus){
            return false ;
        }

        $government->update(['status' => $newStatus]);

        return $government;
    }
}
