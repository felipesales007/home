<?php

namespace App\Models\About\Information;

use App\Models\Other\Icon;
use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    protected $table = 'about_informations_social';

    static function getSocial()
    {
        return Social::select('about_informations_social.*', 'icons.icon', 'icons.name as name_icon')
            ->join('icons', 'icons.id', '=', 'about_informations_social.icon_id')
            ->where('entity_id', config('app.id'))
            ->orderBy('order', 'asc')
            ->get();
    }

    public function getIcon()
    {
        return $this->belongsTo(Icon::class, 'icon_id');
    }
}
