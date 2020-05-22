<?php

namespace App\Models\Publication\House;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'publication_houses_items';

    static function getItems()
    {
        return Item::where('entity_id', config('app.id'))->get();
    }

    static function getItem($id)
    {
        return Item::where('entity_id', config('app.id'))->find($id);
    }

    static function storageFile($storage = 0)
    {
        if ($storage == 1) {
            return '/images/entities/' . config('app.id') . '/publication/houses/items/';
        } elseif ($storage == 2) {
            return '/images/default/youtube.png';
        }

        return '/images/default/default-image.png';
    }
}
