<?php

namespace App\Models\Qualifiers;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $timestamps = false;
    protected $fillable = ['name', 'e_name'];
}
