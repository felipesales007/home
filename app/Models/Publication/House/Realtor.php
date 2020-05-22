<?php

namespace App\Models\Publication\House;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Realtor extends Model
{
    use SoftDeletes;

    protected $table = 'publication_houses_realtors';

    static function getRealtors()
    {
        return Realtor::where('entity_id', config('app.id'))->get();
    }

    static function getRealtor($id)
    {
        return Realtor::where('entity_id', config('app.id'))->find($id);
    }

    static function getRealtorsOptions()
    {
        $array   = [];
        $options = Realtor::where('entity_id', config('app.id'))
            ->where(function($query) {
                $query
                    ->where('blocked_at', '<', date('Y-m-d'))
                    ->orWhereNull('blocked_at');
            })
            ->whereNull('blocked')
            ->whereNull('deleted_at')
            ->get();

        foreach ($options as $option) {
            $array[$option->id] = $option->name;
        }

        return $array;
    }
}
