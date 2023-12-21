<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use MongoDB\Laravel\Eloquent\Model as Eloquent;

class Repack extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'repacks';

    protected $hidden = [];

    protected $fillable = [
        '_id',
        'url',
        'title',
        'published_date',
        'main_poster',
        'download_links',
        'slideshow',
        'genre_tags',
        'company',
        'languages',
        'original_size',
        'comp_size',
        'features',
        'description',
        'website'
    ];

    protected $casts = [
        'published_date' => 'date:Y-m-d',
    ];
}
