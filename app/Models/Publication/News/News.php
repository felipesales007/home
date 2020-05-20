<?php

namespace App\Models\Publication\News;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'publication_news';

    static function getNews()
    {
        return News::where('entity_id', config('app.id'))->orderBy('date', 'desc');
    }

    /**
     * Retornar um dado aleatória do armazenamento.
     *
     * @return mixed
     */
    static function getRandomImage()
    {
        if (News::where('entity_id', config('app.id'))->count()) {
            return News::where('entity_id', config('app.id'))->get()->pluck('background')->random(1)[0];
        }

        return null;
    }
}
