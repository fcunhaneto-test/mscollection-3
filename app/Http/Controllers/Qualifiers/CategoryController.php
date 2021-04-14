<?php

namespace App\Http\Controllers\Qualifiers;

use App\Http\Controllers\Controller;
use App\Models\Qualifiers\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return Category::all();
    }
}
