<?php

namespace App\Models\Publication\House;

use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    protected $table = 'publication_houses';

    static function getHouse($id)
    {
        return House::select('publication_houses.*', 'uf', 'publication_houses_types_houses.name as type',
            'publication_houses_realtors.contact', 'publication_houses_realtors.whatsapp')
            ->join('publication_houses_offers', 'publication_houses_offers.id', '=', 'publication_houses.offer_id')
            ->join('publication_houses_types_houses', 'publication_houses_types_houses.id', '=', 'publication_houses.type_house_id')
            ->join('publication_houses_realtors', 'publication_houses_realtors.id', '=', 'publication_houses.realtor_id')
            ->join('states', 'states.id', '=', 'publication_houses.state_id')
            ->where('publication_houses.entity_id', config('app.id'))
            ->where('status', 1)
            ->find($id);
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

    static function storageFile($storage)
    {
        if ($storage) {
            return config('app.storage') . '/images/entities/' . config('app.id') . '/publication/houses/houses/' . $storage;
        }

        return url('/images/default/others/image.png');
    }

    static function getRandomImage($offer)
    {
        $house = House::where('entity_id', config('app.id'))
            ->where('status', 1)
            ->where('offer_id', $offer)
            ->whereNotNull('image')
            ->get()
            ->pluck('image');

        $count = $house;

        if ($count->count()) {
            return config('app.storage') . '/images/entities/' . config('app.id') . '/publication/houses/houses/' . $house->random(1)[0];
        }

        return url('images/default/others/house.png');
    }

    static function getHousesType($type_house, $city, $neighborhood, $order, $orderBy, $offer)
    {
        return House::select('publication_houses.*', 'publication_houses_offers.name as offer', 'uf')
            ->join('publication_houses_offers', 'publication_houses_offers.id', '=', 'publication_houses.offer_id')
            ->join('publication_houses_types_houses', 'publication_houses_types_houses.id', '=', 'publication_houses.type_house_id')
            ->join('states', 'states.id', '=', 'publication_houses.state_id')
            ->where('publication_houses.entity_id', config('app.id'))
            ->where('status', 1)
            ->when($offer, function ($query) use ($offer) {
                $query->where('offer_id', $offer);
            })
            ->when($type_house, function ($query) use ($type_house) {
                $query->where('type_house_id', $type_house);
            })
            ->when($city, function ($query) use ($city) {
                $query->where('city', $city);
            })
            ->when($neighborhood, function ($query) use ($neighborhood) {
                $query->where('neighborhood', $neighborhood);
            })
            ->when($order, function ($query) use ($orderBy) {
                $query->orderBy($orderBy[0], $orderBy[1]);
            })
            ->when(!$order, function ($query) {
                $query->orderBy('created_at', 'desc');
            })
            ->paginate(9);
    }

    static function getHousesRecents($offer)
    {
        return House::select('publication_houses.*', 'publication_houses_offers.name as offer', 'uf')
            ->join('publication_houses_offers', 'publication_houses_offers.id', '=', 'publication_houses.offer_id')
            ->join('states', 'states.id', '=', 'publication_houses.state_id')
            ->where('publication_houses.entity_id', config('app.id'))
            ->where('status', 1)
            ->where('offer_id', $offer)
            ->orderBy('created_at', 'desc')
            ->limit(3)
            ->get();
    }
}
