<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RecipeController extends Controller
{
    // show new recipe form
    public function create()
    {
        return view('recipes.create');
    }
    // save new recipe
    public function store()
    {
        $form_fields = request()->validate([
            'name' => 'required',
            'difficulty' => 'required',
            'ingredients' => 'required',
            'steps' => 'required',
            'time' => 'required',
            'tags' => 'required',
            'description' => 'required',
            'file' => 'required',
        ]);

        // if (request()->hasFile('image')) {
        //     $form_fields['image'] = request()->file('image')->store('images', 'public');
        // }

        $form_fields['user_id'] = auth()->id();

        // Recipe::create($form_fields);
        return $form_fields;
        // return redirect('/')->with('message', 'Recipe created successfully!');
    }
}
