<?php

use App\Http\Controllers\CobaController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\DataController;
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

Route::get('', [CobaController::class, 'index']);
Route::get('/products/welcome',[CobaController::class, 'welcome']);
//Route::get('/products', [CobaController::class, 'index']);
//Route::get('/products/create', [CobaController::class, 'create']);
//Route::post('/products/store', [CobaController::class, 'store']);
//Route::get('/products/{Id}', [CobaController::class, 'show']);
//Route::get('/products/{Id}/edit', [CobaController::class, 'edit']);
//Route::put('/products/{Id}', [CobaController::class, 'update']);
//Route::delete('/products/{Id}', [CobaController::class, 'destroy']);

Route::resources([
    'products' => CobaController::class,
    'kategori' => KategoriController::class,
    'data' => DataController::class,
]);