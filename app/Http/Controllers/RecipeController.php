<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecipeController extends Controller
{
    // show new recipe form
    public function create()
    {
        return view('recipes.create');
    }
}
