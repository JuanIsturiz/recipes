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
Route::get('/', function () {
    return view('recipes.index');
});

// show new recipe form
Route::get('/add', [RecipeController::class, 'create'])->middleware('auth');

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
