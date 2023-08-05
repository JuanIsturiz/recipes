<?php

use App\Http\Controllers\RecipeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// show index view
Route::get('/', [RecipeController::class, 'index']);

// show new recipe form
Route::get('/add', [RecipeController::class, 'create'])->middleware('auth');

// store new recipe
Route::post('/recipes/new', [RecipeController::class, 'store'])->middleware('auth');

// show edit form
Route::get('/recipes/{recipe}/edit', [RecipeController::class, 'edit'])->middleware('auth');

// update recipe
Route::put('/recipes/{recipe}', [RecipeController::class, 'update'])->middleware('auth');

// delete recipe
Route::delete('/recipes/{recipe}', [RecipeController::class, 'destroy'])->middleware('auth');

// show manage recipes view
Route::get('/recipes/manage', [RecipeController::class, 'manage'])->middleware('auth');

// show single recipe
Route::get('/recipes/{recipe}', [RecipeController::class, 'show']);

// show register form view
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

// show login form view
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

// register user
Route::post('/users/new', [UserController::class, 'store']);

// show login form view
Route::post('/users/authenticate', [UserController::class, 'authenticate']);

// logout user
Route::post('/users/logout', [UserController::class, 'logout'])->middleware('auth');
