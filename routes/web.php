<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CatController;
use App\Http\Controllers\TransactionController;

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

Route::get('/', function () {
    return redirect()->route('products.index');
});

Route::resource('products',ProductController::class);
Route::resource('cat',CatController::class);
Route::resource('transaction',TransactionController::class);
Route::get('transaction/create/{id}/{product_name}', [TransactionController::class,'createe'])->name('transaction.createe');
Route::get('transaction/precord/{id}/{product_name}', [TransactionController::class,'precord'])->name('transaction.precord');
Route::get('report', [TransactionController::class,'report'])->name('report');
Route::get('/search', [ProductController::class, 'search'])->name('search');
Route::get('/pdfn', [ProductController::class, 'pdfn'])->name('pdfn');
Route::post('/catq', [ProductController::class, 'catq'])->name('catq');





