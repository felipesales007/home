<?php

namespace App\Models\Publication\House;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Realtor extends Model
{
    use SoftDeletes;

    protected $table = 'publication_houses_realtors';
}
