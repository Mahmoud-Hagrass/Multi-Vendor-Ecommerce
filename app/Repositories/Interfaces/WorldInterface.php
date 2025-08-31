<?php

namespace App\Repositories\Interfaces;

interface WorldInterface
{
    public function getAllCountries() ;
    public function getCountryById($country_id) ;
    public function changeCountryStatus($country) ;
    public function getAllGovernments($country) ;
    public function getGovernments() ;
    public function changeGovernmentShippingPrice($governmet , $shippingPrice) ;
    public function changeGovernmentStatus($government) ;
}
