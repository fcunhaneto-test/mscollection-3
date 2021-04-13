<?php

namespace App\Models\Qualifiers;

use App\Models\Title;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $table = 'media';
    public $timestamps = false;
    protected $fillable = ['name'];

    public function titles()
    {
        return $this->belongsToMany(Title::class);
    }

    public function streams()
    {
        return $this->where('stream', true)->get();
    }
}
