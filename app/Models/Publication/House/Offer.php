<?php

namespace App\Models\Publication\House;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Offer extends Model
{
    use SoftDeletes;

    protected $table = 'publication_houses_offers';

    static function getOffers()
    {
        return Offer::where('entity_id', config('app.id'))->get();
    }

    static function getOffer($id)
    {
        return Offer::where('entity_id', config('app.id'))->find($id);
    }

    static function getOffersOptions()
    {
        $array   = [];
        $options = Offer::where('entity_id', config('app.id'))->get();

        foreach ($options as $option) {
            $array[$option->id] = $option->name;
        }

        return $array;
    }
}
