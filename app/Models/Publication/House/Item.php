<?php

namespace App\Models\Publication\House;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'publication_houses_items';

    static function getItems($id)
    {
        return Item::where('entity_id', config('app.id'))->where('house_id', $id)->orderBy('order', 'asc')->get();
    }

    static function storageFile($storage)
    {
        if ($storage) {
            return config('app.storage') . '/images/entities/' . config('app.id') . '/publication/houses/items/' . $storage;
        }

        return url('/images/default/others/image.png');
    }
}
