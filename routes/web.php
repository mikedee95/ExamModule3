<?php

use App\Http\Controllers\StoreController;
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
    return view('welcome');
});

Route::resource('stores','StoreController');

Route::get('/storeList',[StoreController::class,'index'])->name('stores.index');
Route::get('/addStores', [StoreController::class,'create'])->name('stores.create');
//Route::get('/editStores', [StoreController::class,'edit'])->name('stores.edit');
Route::post('/addStores', [StoreController::class,'store'])->name('stores.store');
Route::post('/search', [StoreController::class,'search'])->name('stores.search');
