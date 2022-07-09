<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;

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

use App\Http\Controllers\ProductsController;

Route::get('/', [ProductsController::class, 'index'])->name('products.index');

Route::prefix('products')->group(function () {
    //list
    Route::get('/', [ProductsController::class, 'index'])->name('products.index');
    //add
    Route::get('/create', [ProductsController::class, 'createShow'])->name('products.createShow');
    Route::post('/create', [ProductsController::class, 'createPerform'])->name('products.createPerform');
    //info
    Route::get('/find', [ProductsController::class, 'findShow'])->name('products.findShow');
    //update
    Route::get('/update', [ProductsController::class, 'updateShow'])->name('products.editShow');
    Route::post('/update', [ProductsController::class, 'updatePerform'])->name('products.updatePerform');
    //delete
    Route::get('/delete/{id}', [ProductsController::class, 'deleteShow'])->name('products.deleteShow');
    Route::post('/delete', [ProductsController::class, 'deletePerform'])->name('products.deletePerform');
    //data by id
    Route::get('/json/{id}', [ProductsController::class, 'getDataById']);
    //dataTables
    Route::get('/data', [ProductsController::class, 'dataTables'])->name('products.data');

    if (App::hasDebugModeEnabled()) {
        //dataTables json
        Route::get('/json', [ProductsController::class, 'getData']);
    }
});
