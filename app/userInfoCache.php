<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class userInfoCache extends Model
{
    protected $fillable = [
        'id',
        'nickname',
        'location',
        'website',
        'orgin',
        'icon_id',
        'icon_type'
    ];
}
