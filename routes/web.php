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
    Route::get('/find/{id}', [ProductsController::class, 'findShow'])->name('products.findShow');
    //update
    Route::get('/update/{id}', [ProductsController::class, 'updateShow'])->name('products.editShow');
    Route::post('/update', [ProductsController::class, 'updatePerform'])->name('products.updatePerform');
    //delete
    Route::get('/delete/{id}', [ProductsController::class, 'deleteShow'])->name('products.deleteShow');
    Route::post('/delete', [ProductsController::class, 'deletePerform'])->name('products.deletePerform');
    //data by id
    Route::get('/json/{id}', [ProductsController::class, 'getDataById']);
    //dataTables
    Route::get('/data', [ProductsController::class, 'dataTables'])->name('products.data');
    //chart
    Route::get('/chart/{date}', [ProductsController::class, 'getChart']);

    if (App::hasDebugModeEnabled()) {
        //dataTables json
        Route::get('/json', [ProductsController::class, 'getData']);
    }
});


use App\Http\Controllers\ExamplesV1Controller;

Route::prefix('examplesv1')->group(function () {
    //list
    Route::get('/', [ExamplesV1Controller::class, 'index'])->name('examplesv1.index');
    //add
    Route::get('/create', [ExamplesV1Controller::class, 'createShow'])->name('examplesv1.createShow');
    Route::post('/create', [ExamplesV1Controller::class, 'createPerform'])->name('examplesv1.createPerform');
    //info
    Route::get('/find/{id}', [ExamplesV1Controller::class, 'findShow'])->name('examplesv1.findShow');
    //update
    Route::get('/update/{id}', [ExamplesV1Controller::class, 'updateShow'])->name('examplesv1.editShow');
    Route::post('/update', [ExamplesV1Controller::class, 'updatePerform'])->name('examplesv1.updatePerform');
    //delete
    Route::get('/delete/{id}', [ExamplesV1Controller::class, 'deleteShow'])->name('examplesv1.deleteShow');
    Route::post('/delete', [ExamplesV1Controller::class, 'deletePerform'])->name('examplesv1.deletePerform');
    //data by id
    Route::get('/json/{id}', [ExamplesV1Controller::class, 'getDataById']);
    //dataTables
    Route::get('/data', [ExamplesV1Controller::class, 'dataTables'])->name('examplesv1.data');
    //chart
    Route::get('/chart/{date}', [ExamplesV1Controller::class, 'getChart']);

    if (App::hasDebugModeEnabled()) {
        //dataTables json
        Route::get('/json', [ExamplesV1Controller::class, 'getData']);
    }
});
