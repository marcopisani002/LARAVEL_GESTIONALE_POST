<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('layouts.admin');
});



// Route::get("/posts", [PostController::class, "index"])->name("posts.index");

// crea tutte le funzioni necessarie della crud
// https://laravel.com/docs/9.x/controllers#resource-controllers
// ::resource collega le rotte con le funzioni del controller.
// Poi saranno le singole funzioni che eventualmente si dovranno
// collegare alle view
Route::resource("posts", PostController::class);