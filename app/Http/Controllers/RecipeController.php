<?php

namespace App\Http\Controllers;

use App\Models\Recipe;

class RecipeController extends Controller
{
    // show recipes
    public function index()
    {
        return view('recipes.index', [
            'recipes' => Recipe::latest()->filter(request(['tag', 'search']))->paginate(6)
        ]);
    }
    // show single recipe
    public function show(Recipe $recipe)
    {
        return view('recipes.show', [
            'recipe' => $recipe
        ]);
    }
    // show new recipe form
    public function create()
    {
        return view('recipes.create');
    }
    // save new recipe
    public function store()
    {
        $form_fields = request()->validate([
            'name' => ['required'],
            'difficulty' => ['required'],
            'ingredients' => ['required'],
            'steps' => ['required'],
            'time' => ['required'],
            'tags' => ['required'],
            'description' => ['required'],
        ]);

        if (request()->hasFile('image')) {
            $form_fields['image'] = request()->file('image')->store('images', 'public');
        }

        $form_fields['user_id'] = auth()->id();


        Recipe::create($form_fields);

        return redirect('/')->with('message', 'Recipe created successfully!');
    }
    // show edit form
    public function edit(Recipe $recipe)
    {
        return view('recipes.edit', [
            'recipe' => $recipe
        ]);
    }
    // update recipe
    public function update(Recipe $recipe)
    {
        // check user
        if ($recipe->user_id != auth()->id()) {
            abort(403, 'UNAUTHORIZED ACTION');
        }

        $form_fields = request()->validate([
            'name' => ['required'],
            'difficulty' => ['required'],
            'ingredients' => ['required'],
            'steps' => ['required'],
            'time' => ['required'],
            'tags' => ['required'],
            'description' => ['required'],
        ]);

        if (request()->hasFile('image')) {
            $form_fields['image'] = request()->file('image')->store('images', 'public');
        }

        $recipe->update($form_fields);

        return redirect('/recipes/manage')->with('message', 'Recipe updated successfully!');
    }
    // delete recipe
    public function destroy(Recipe $recipe)
    {

        // check user
        if ($recipe->user_id != auth()->id()) {
            abort(403, 'UNAUTHORIZED ACTION');
        }

        $recipe->delete();
        return redirect('/')->with('message', 'Recipe deleted successfully!');
    }
    // manage recipe
    public function manage()
    {
        return view('recipes.manage', ['recipes' => auth()->user()->recipes()->get()]);
    }
}
