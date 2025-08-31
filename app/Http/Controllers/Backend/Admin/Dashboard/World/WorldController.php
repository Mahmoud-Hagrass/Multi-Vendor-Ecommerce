<?php

namespace App\Http\Controllers\Backend\Admin\Dashboard\World;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostGovernmentShippingPriceRequest;
use App\Models\Government;
use App\Services\World\WorldService;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class WorldController extends Controller implements HasMiddleware
{
    protected $worldService ;

    public function __construct(WorldService $worldService)
    {
        $this->worldService = $worldService ;
    }

     public static function middleware(): array
     {
         return [
            new Middleware('able:government_shipping_management'    , only: ['governments' , 'countries']),
            new Middleware('able:government_shipping_price_change'  , only: ['changeGovernmentShippingPrice']),
            new Middleware('able:government_change_status'          , only: ['changeGovernmentStatus']),
            new Middleware('able:country_change_status'             , only: ['changeCountryStatus']),
         ];
     }

    public function countries()
    {
        $countries = $this->worldService->getAllCountries() ;
        // return $countries ;
        if(!$countries){
            return redirectBack(__('dashboard.error_operation') , 'error') ;
        }

        return view('backend.admin.world.countries' , compact('countries')) ;
    }

    public function changeCountryStatus($country_id)
    {
        $country = $this->worldService->changeCountryStatus($country_id) ;
        if(!$country){
            return response()->json([
            'status' => false ,
            'message'=> __('dashboard.error_operation') ,
        ]) ;
        }else{
                return response()->json([
                'status' => true ,
                'message'=> __('dashboard.success_operation') ,
                'data'=> $country ,
            ]) ;
        }
    }

    public function governments()
    {
        $countries_with_governments = $this->worldService->getGovernments() ;

        if(!$countries_with_governments){
            return redirectBack(__('dashboard.error_operation') , 'error') ;
        }

        return view('backend.admin.world.governments' , compact('countries_with_governments')) ;
    }

    public function changeGovernmentShippingPrice(PostGovernmentShippingPriceRequest $request)
    {
        $data = $request ;
        $newShippingPrice = $this->worldService->changeGovernmentShippingPrice($data) ;

        if(!$newShippingPrice){
            abort(404) ;
        }

        return redirectBack(__('dashboard.success_operation') , 'success');
    }

    public function changeGovernmentStatus($government_id)
    {
        $government = $this->worldService->changeGovernmentStatus($government_id) ;
        if(!$government){
            return response()->json([
                'status' => false ,
                'message'=> __('dashboard.error_operation') ,
        ]) ;
        }else{
                return response()->json([
                'status' => true ,
                'message'=> __('dashboard.success_operation') ,
                'data'=> $government ,
            ]) ;
        }
    }
}
