<?php

namespace App\Http\Controllers\Qualifiers;

use App\Http\Controllers\Controller;
use App\Models\Qualifiers\Media;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    protected $table;
    public function __construct()
    {
        $this->table = new Media();
    }

    public function index()
    {
        return Media::all();
    }

    public function streams()
    {
        return $this->table->streams();
    }
}
