<?php

namespace App\Models\Publication\House;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TypeHouse extends Model
{
    use SoftDeletes;

    protected $table = 'publication_houses_types_houses';

    static function getTypesHousesOptions()
    {
        $array   = [];
        $options = TypeHouse::select('publication_houses_types_houses.*')
            ->join('publication_houses', 'publication_houses.type_house_id', 'publication_houses_types_houses.id')
            ->where('publication_houses_types_houses.entity_id', config('app.id'))
            ->where('status', 1)
            ->get();

        foreach ($options as $option) {
            $array[$option->id] = $option->name;
        }

        return $array;
    }
}
