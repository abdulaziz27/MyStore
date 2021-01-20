<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;

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
    return view('welcome');
});

Route::resource('product', ProductController::class)->except([
    'edit', 'show', 'destroy', 'exportXL', 'exportCSV', 'exportPDF', 'upload', 'destroyAll'
]);

Route::get('product/{product:slug}', [ProductController::class, 'show'])->name('product.show');
Route::get('product/{product:product_slug}/edit', [ProductController::class, 'edit'])->name('product.edit');
Route::delete('product/{product:product_slug}', [ProductController::class, 'destroy'])->name('product.destroy');

// Export File
Route::get('product/export/xlsx', [ProductController::class, 'exportXL'])->name('product.exportXL');
Route::get('product/export/csv', [ProductController::class, 'exportCSV'])->name('product.exportCSV');
Route::get('product/export/pdf', [ProductController::class, 'exportPDF'])->name('product.exportPDF');

// Input File
Route::get('upload', [ProductController::class, 'upload'])->name('product.upload');
Route::post('product/upload/data', [ProductController::class, 'uploadData']); 

// 
Route::resource('category', CategoryController::class);

// Route::get('product/{product:slug}', $url . '\ProductController@showProduct');
// (Product $product)

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('sendMail', function () {
   
    $pesan = [
        'title' => 'Mail from myStore.com',
        'body' => 'This is for testing email using smtp'
    ];
   
    \Mail::to('doelziez212@gmail.com')->send(new \App\Mail\EmailKu($pesan));
   
    dd("Email is Sent.");
});

