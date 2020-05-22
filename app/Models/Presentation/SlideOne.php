<?php

namespace App\Models\Presentation;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SlideOne extends Model
{
    protected $table = 'presentation_slides_one';

    static function getSlidesOne()
    {
        return SlideOne::where('entity_id', config('app.id'))
            ->orderBy(DB::raw('-`order`'), 'desc')
            ->orderBy('order', 'asc')
            ->get();
    }
}
