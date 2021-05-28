<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AddressesController;

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

Route::group(['middleware' => ['json.response'], 'prefix' => 'addresses', 'as' => 'api.addresses.'], function () {
    Route::get('/', [AddressesController::class, 'findAll'])->name('findAll');
    Route::post('/store', [AddressesController::class, 'store'])->name('store');
    Route::put('/update/{addresses}', [AddressesController::class, 'update'])->name('update');
    Route::delete('/delete/{addresses}', [AddressesController::class, 'destroy'])->name('destroy');
    Route::patch('/restore/{addresses}', [AddressesController::class, 'restore'])->name('restore');
    Route::get('/findAddressByZipcode', [AddressesController::class, 'findAddressByZipcode'])->name('findAddressByZipcode');
    Route::get('/search', [AddressesController::class, 'fuzzySearch'])->name('fuzzySearch');
    Route::get('/find', [AddressesController::class, 'find'])->name('find');
});


