<?php

namespace App\Models;

use App\Models\Cast\Cast;
use App\Models\Cast\Producer;
use App\Models\Qualifiers\Media;
use Illuminate\Database\Eloquent\Model;

class Title extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'title', 'original_title', 'year', 'time', 'category_1', 'category_2','our_rating', 'imdb_rating',
        'poster', 'summary'
    ];

    public function media()
    {
        return $this->belongsToMany(Media::class);
    }

    public function cast()
    {
        return $this->belongsToMany(Cast::class, 'cast_title')->withPivot('order', 'star');
    }

    public function producers()
    {
        return $this->belongsToMany(Producer::class, 'producer_title')->withPivot('order');
    }
}
