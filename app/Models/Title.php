<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Title extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'title', 'original_title', 'year', 'time', 'category_1', 'category_2','our_rating', 'imdb_rating',
        'poster', 'summary'
    ];
}
