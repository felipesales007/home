<?php

namespace App\Models\Management;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Entity extends Model
{
    use SoftDeletes;

    protected $table = 'management_entities';

    static function getEntity()
    {
        return Entity::where('blocked', null)
            ->where(function ($query) {
                $query->orWhere('blocked_at', '=', null)->orWhere('blocked_at', '<', now()->addDays(-1));
            })->find(config('app.id'));
    }
}
