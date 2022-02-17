<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AlerteController;
use App\Http\Controllers\BienController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CommoditeBienController;
use App\Http\Controllers\CommoditeController;
use App\Http\Controllers\FavoriController;
use App\Http\Controllers\LieuController;
use App\Http\Controllers\TypeBienController;
use App\Http\Controllers\VisuelController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route:Route::prefix('auth')->group(function () {

    Route::post('/register', [App\Http\Controllers\AuthController::class, 'register']);
    Route::post('/login', [App\Http\Controllers\AuthController::class, 'login']);
    Route::get('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->middleware('auth:api');
    Route::get('/user', [App\Http\Controllers\AuthController::class, 'user'])->middleware('auth:api');
    Route::get('authentication-failed', [App\Http\Controllers\AuthController::class, 'authFailed'])->name('auth-failed');
});

//Route::group(['middleware' => 'auth:api'], function (){

    Route::resource('admins', AdminController::class);
    Route::resource('alertes', AlerteController::class);
    Route::resource('lieux', LieuController::class);
    Route::resource('biens', BienController::class);
    Route::resource('clients', ClientController::class);
    Route::resource('commodites', CommoditeController::class);
    Route::resource('commoditebiens', CommoditeBienController::class);
    Route::resource('favoris', FavoriController::class);
    Route::resource('typebiens', TypeBienController::class);
    Route::resource('visuels', VisuelController::class);
//});

