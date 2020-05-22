<?php

namespace App\Models\Publication\House;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TypeHouse extends Model
{
    use SoftDeletes;

    protected $table = 'publication_houses_types_houses';

    static function getTypeHouses()
    {
        return TypeHouse::where('entity_id', config('app.id'))->get();
    }

    static function getTypeHouse($id)
    {
        return TypeHouse::where('entity_id', config('app.id'))->find($id);
    }

    static function getTypesHousesOptions()
    {
        $array   = [];
        $options = TypeHouse::where('entity_id', config('app.id'))->get();

        foreach ($options as $option) {
            $array[$option->id] = $option->name;
        }

        return $array;
    }
}
