<?php

namespace App\Models\Publication\House;

use App\Models\Other\State;
use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    protected $table = 'publication_houses';

    static function getHouse($id)
    {
        return House::where('entity_id', config('app.id'))->where('status', 1)->find($id);
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

        return url('images/default/others/background.png');
    }

    static function getHousesType($type_house, $city, $neighborhood, $order, $orderBy, $offer)
    {
        return House::where('entity_id', config('app.id'))
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
        return House::where('entity_id', config('app.id'))
            ->where('status', 1)
            ->where('offer_id', $offer)
            ->orderBy('created_at', 'desc')
            ->limit(3)
            ->get();
    }

    public function getRealtor()
    {
        return $this->belongsTo(Realtor::class, 'realtor_id');
    }

    public function getOffer()
    {
        return $this->belongsTo(Offer::class, 'offer_id');
    }

    public function getTypeHouse()
    {
        return $this->belongsTo(TypeHouse::class, 'type_house_id');
    }

    public function getState()
    {
        return $this->belongsTo(State::class, 'state_id');
    }
}
