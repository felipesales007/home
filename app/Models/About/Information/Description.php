<?php

namespace App\Models\About\Information;

use Illuminate\Database\Eloquent\Model;

class Description extends Model
{
    protected $table = 'about_informations_descriptions';

    static function getDescription()
    {
        return Description::where('entity_id', config('app.id'))->first();
    }
}
