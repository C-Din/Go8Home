<?php

use App\Http\Controllers\CommoditeBienController;
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
Route::resource('commoditebiens', CommoditeBienController::class);

Route::get('alertes', [App\Http\Controllers\AlerteController::class, 'index'])->name('alertes');
Route::get('lieux', [App\Http\Controllers\LieuController::class, 'index'])->name('lieux');
Route::get('biens', [App\Http\Controllers\BienController::class, 'index'])->name('biens');
Route::get('clients', [App\Http\Controllers\ClientController::class, 'index'])->name('clients');
Route::get('commodites', [App\Http\Controllers\CommoditeController::class, 'index'])->name('commodites
commodites');
Route::get('commoditebiens', [App\Http\Controllers\CommoditeBienController::class, 'index'])->name('commoditebiens');
Route::get('favoris', [App\Http\Controllers\FavoriController::class, 'index'])->name('favoris');
Route::get('typebiens', [App\Http\Controllers\TypeBienController::class, 'index'])->name('typebiens');
Route::get('visuels', [App\Http\Controllers\VisuelController::class, 'index'])->name('visuels');

