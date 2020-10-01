<?php

use Illuminate\Support\Facades\Route;
$url = "App\Http\Controllers";

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
    return view('home');
});

Route::get('product/{slug}', $url . '\ProductController@showProduct');
Route::resource('product', $url . '\ProductController');

// Route::get('product/{product:slug}', $url . '\ProductController@showProduct');
// (Product $product)
