<?php

namespace App\Http\Controllers\Cast;

use App\Http\Controllers\Controller;
use App\Models\Cast\Producer;
use Illuminate\Http\Request;

class ProducerController extends Controller
{
    public function store(Request $request)
    {
        $producer = Producer::firstOrCreate(['name' => $request->producer]);
        $producer->titles()->sync([$producer->id => ['order' => $request->order]]);
    }
}
