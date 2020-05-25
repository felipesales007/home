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

    static function getRandomImage()
    {
        $news = News::where('entity_id', config('app.id'))
            ->whereNotNull('background')
            ->get()
            ->pluck('background');

        $count = $news;

        if ($count->count()) {
            return config('app.storage') . '/images/entities/' . config('app.id') . '/publication/news/' . $news->random(1)[0];
        }

        return url('images/default/others/house.png');
    }

    static function storageFile($storage)
    {
        if ($storage) {
            return config('app.storage') . '/images/entities/' . config('app.id') . '/publication/news/' . $storage;
        }

        return url('/images/default/others/image.png');
    }
}
