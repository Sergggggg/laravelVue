<?php

namespace App\Services;

use App\Models\Apartments;


class ApartmentService
{
    /**
     * Gets apartments.
     */

    public static function searchApartments($data, $searchMask, $maxPrice = null)
    {
        if ($data) {
            return Apartments::where(function ($q) use ($data, $maxPrice, $searchMask) {
                $q->orWhere($searchMask, 'like', "%$data%")
                    ->orWhereBetween($searchMask, [$data, $maxPrice]);
            })->get();
        }
    }

    /**
     * Gets apartments by params.
     */

    public static function searchApartmentsByParams($param)
    {

        if (!empty(array_filter($param))) {

            $apartments = Apartments::query();

        return  $apartments->when($param["name"], function ($query) use ($param) {

                return $query->where('name', 'like', '%' . $param['name'] . '%');

            })->when($param["bedrooms"], function ($q1) use ($param) {

                return $q1->orWhere('bedrooms', 'like', '%' . $param['bedrooms'] . '%');

            })->when($param["bathrooms"], function ($q2) use ($param) {

                return $q2->orWhere('bathrooms', 'like', '%' . $param['bathrooms'] . '%');

            })->when($param["storeys"], function ($q3) use ($param) {

                return $q3->orWhere('storeys', 'like', '%' . $param['storeys'] . '%');

            })->when($param["garages"], function ($q4) use ($param) {

                return $q4->orWhere('garages', 'like', '%' . $param['garages'] . '%');

            })->get();
        }
    }
}