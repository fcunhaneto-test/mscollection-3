<?php

namespace App\Models\Cast;

use App\Models\Title;
use Illuminate\Database\Eloquent\Model;

class Producer extends Model
{
    protected $fillable = ['name'];
    public $timestamps = false;

    public function titles()
    {
        return $this->belongsToMany(Title::class, 'producer_title')->withPivot('order');
    }
}
