<?php

namespace App\Models\Publication\House;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Offer extends Model
{
    use SoftDeletes;

    protected $table = 'publication_houses_offers';

    static function getOffersOptions()
    {
        $array   = [];
        $options = Offer::select('publication_houses_offers.*')
            ->join('publication_houses', 'publication_houses.offer_id', 'publication_houses_offers.id')
            ->where('publication_houses_offers.entity_id', config('app.id'))
            ->where('status', 1)
            ->get();

        foreach ($options as $option) {
            $array[$option->id] = $option->name;
        }

        return $array;
    }
}
