<?php

namespace App\Models\About\Information;

use App\Models\Other\Icon;
use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    protected $table = 'about_informations_social';

    static function getSocial()
    {
        return Social::where('entity_id', config('app.id'))
            ->orderBy('order', 'asc')
            ->get();
    }

    public function getIcon()
    {
        return $this->belongsTo(Icon::class, 'icon_id');
    }
}
