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
        $options = House::where('entity_id', config('app.id'))->where('status', 1)->get();

        foreach ($options as $option) {
            $array[$option->city] = $option->city;
        }

        return $array;
    }

    static function getHousesNeighborhoodsOptions()
    {
        $array   = [];
        $options = House::where('entity_id', config('app.id'))->where('status', 1)->get();

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

    static function getRandomImage($offer_id)
    {
        $house = House::where('entity_id', config('app.id'))
            ->where('status', 1)
            ->where('offer_id', $offer_id)
            ->whereNotNull('image')
            ->get()
            ->pluck('image');

        $count = $house;

        if ($count->count()) {
            return config('app.storage') . '/images/entities/' . config('app.id') . '/publication/houses/houses/' . $house->random(1)[0];
        }

        return url('images/default/others/house.png');
    }

    static function getHouseType($type_house, $city, $neighborhood, $order, $orderBy, $offer_id)
    {
        return House::select('publication_houses.*', 'publication_houses_offers.name as offer', 'uf')
            ->join('publication_houses_offers', 'publication_houses_offers.id', '=', 'publication_houses.offer_id')
            ->join('publication_houses_types_houses', 'publication_houses_types_houses.id', '=', 'publication_houses.type_house_id')
            ->join('states', 'states.id', '=', 'publication_houses.state_id')
            ->where('publication_houses.entity_id', config('app.id'))
            ->where('status', 1)
            ->where('offer_id', $offer_id)
            ->when($type_house, function ($query) use ($type_house) {
                $query->where('publication_houses.type_house_id', $type_house);
            })
            ->when($city, function ($query) use ($city) {
                $query->where('publication_houses.city', $city);
            })
            ->when($neighborhood, function ($query) use ($neighborhood) {
                $query->where('publication_houses.neighborhood', $neighborhood);
            })
            ->when($order, function ($query) use ($orderBy) {
                $query->orderBy($orderBy[0], $orderBy[1]);
            })
            ->when(!$order, function ($query) {
                $query->orderBy('created_at', 'desc');
            })
            ->paginate(9);
    }

    static function getHouseRecents($offer_id)
    {
        return House::select('publication_houses.*', 'publication_houses_offers.name as offer', 'uf')
            ->join('publication_houses_offers', 'publication_houses_offers.id', '=', 'publication_houses.offer_id')
            ->join('states', 'states.id', '=', 'publication_houses.state_id')
            ->where('publication_houses.entity_id', config('app.id'))
            ->where('status', 1)
            ->where('offer_id', $offer_id)
            ->orderBy('created_at', 'desc')
            ->limit(3)
            ->get();
    }
}
