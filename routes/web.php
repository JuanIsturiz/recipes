<?php

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

// show register form view
Route::get('/register', [UserController::class, 'create']);

// show login form view
Route::get('/login', [UserController::class, 'login']);

// register user
Route::post('/users/new', [UserController::class, 'store']);

// show login form view
Route::post('/users/authenticate', [UserController::class, 'authenticate']);

// show login form view
Route::post('/users/logout', [UserController::class, 'logout']);
