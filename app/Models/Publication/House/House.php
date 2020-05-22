<?php

namespace App\Models\Publication\House;

use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    protected $table = 'publication_houses';

    static function getHouses()
    {
        return House::where('entity_id', config('app.id'))->get();
    }

    static function getHouse($id)
    {
        return House::where('entity_id', config('app.id'))->find($id);
    }

    static function getHousesOptions()
    {
        $array   = [];
        $options = House::where('entity_id', config('app.id'))->get();

        foreach ($options as $option) {
            $array[$option->id] = $option->name;
        }

        return $array;
    }

    static function getHousesCitiesOptions()
    {
        $array   = [];
        $options = House::where('entity_id', config('app.id'))->get();

        foreach ($options as $option) {
            $array[$option->city] = $option->city;
        }

        return $array;
    }

    static function getHousesNeighborhoodsOptions()
    {
        $array   = [];
        $options = House::where('entity_id', config('app.id'))->get();

        foreach ($options as $option) {
            $array[$option->neighborhood] = $option->neighborhood;
        }

        return $array;
    }

    static function storageFile($storage = 0)
    {
        if ($storage == 1) {
            return '/images/entities/' . config('app.id') . '/publication/houses/houses/';
        }

        return '/images/default/default-image.png';
    }
}
