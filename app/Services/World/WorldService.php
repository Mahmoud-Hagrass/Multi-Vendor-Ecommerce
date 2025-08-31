<?php

namespace App\Services\World;

use App\Models\Government;
use App\Repositories\Interfaces\WorldInterface;

class WorldService
{
    protected $worldRepository ;

    public function __construct(WorldInterface $worldRepository)
    {
        $this->worldRepository = $worldRepository;
    }

    public function getAllCountries()
    {
       return $this->worldRepository->getAllCountries() ;
    }

    public function getCountryById($country_id)
    {
       return $this->worldRepository->getCountryById($country_id);
    }

    public function changeCountryStatus($country_id)
    {
        $country = Self::getCountryById($country_id);

        if (!$country) {
            return false;
        }

        return $this->worldRepository->changeCountryStatus($country) ; 
    }


    public function getAllGovernments($country_id)
    {
        $country = self::getCountryById($country_id) ;
        if(!$country){
            return false ;
        }

        return $this->worldRepository->getAllGovernments($country) ;
    }
    public function getGovernments()
    {
        return $this->worldRepository->getGovernments() ;
    }

    public function getGovernmentById($governmentId)
    {
        $government = Government::where('id' , $governmentId)->first() ;
        if(!$government){
            return false ;
        }
        return $government ;
    }


    public function changeGovernmentShippingPrice($data)
    {
        $government = Self::getGovernmentById($data['government_id']) ;
        return $this->worldRepository->changeGovernmentShippingPrice($government , $data['new_shipping_price']) ;
    }

    public function changeGovernmentStatus($government_id)
    {
        $government = Self::getGovernmentById($government_id) ;
        return $this->worldRepository->changeGovernmentStatus($government) ;
    }


}
