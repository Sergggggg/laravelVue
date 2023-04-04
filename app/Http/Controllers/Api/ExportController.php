<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Traits\JsonResponseFormat;
use Illuminate\Http\Request;
use App\Services\ApartmentService;



class ExportController extends Controller
{
    use JsonResponseFormat;

    public function getFlatByName($name)
    {
        return ApartmentService::searchApartments($name, 'name');
    }

    public function getFlatByBedrooms($numberBedrooms)
    {
        return ApartmentService::searchApartments($numberBedrooms, 'bedrooms');
    }

    public function getFlatByBathrooms($numberBathrooms)
    {
        return ApartmentService::searchApartments($numberBathrooms, 'bathrooms');
    }

    public function getFlatByStoreys($numberStoreys)
    {
        return ApartmentService::searchApartments($numberStoreys, 'storeys');
    }

    public function getFlatByGarages($numberGarages)
    {
        return ApartmentService::searchApartments($numberGarages, 'garages');
    }

    public function getFlatByPrices($min, $max)
    {

        return ApartmentService::searchApartments($min, 'price', $max);

    }

    public function getFlatByParam(Request $request){
        
        return ApartmentService::searchApartmentsByParams($request->ajaxData);
    }

}


