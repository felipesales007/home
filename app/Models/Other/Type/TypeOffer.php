<?php

namespace App\Models\Other\Type;

use Illuminate\Database\Eloquent\Model;

class TypeOffer extends Model
{
    protected $table = 'types_publication_houses_offers';

    static function getTypesOffersOptions()
    {
        $array   = [];
        $options = TypeOffer::select('types_publication_houses_offers.*')
            ->join('publication_houses', 'publication_houses.type_offer_id', 'types_publication_houses_offers.id')
            ->where('status', 1)
            ->get();

        foreach ($options as $option) {
            $array[$option->id] = $option->name;
        }

        return $array;
    }
}
