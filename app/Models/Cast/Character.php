<?php

namespace App\Models\Cast;

use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    protected $fillable = ['name'];
    public $timestamps = false;
}
