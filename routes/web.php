<?php

use App\Http\Controllers\MasterCategoriesController;
use App\Models\MasterCategories;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/master-items', [App\Http\Controllers\MasterItemsController::class, 'index']);
Route::get('/master-items/search', [App\Http\Controllers\MasterItemsController::class, 'search']);
Route::get('/master-items/form/{method}/{id?}', [App\Http\Controllers\MasterItemsController::class, 'formView']);
Route::post('/master-items/form/{method}/{id?}', [App\Http\Controllers\MasterItemsController::class, 'formSubmit']);

Route::get('/master-items/view/{kode}', [App\Http\Controllers\MasterItemsController::class, 'singleView']);
Route::get('/master-items/delete/{id}', [App\Http\Controllers\MasterItemsController::class, 'delete']);


Route::get('/master-items/update-random-data', [App\Http\Controllers\MasterItemsController::class, 'updateRandomData']);

Route::prefix('master-categories/')->name('master-categories.')->group(function(){
    Route::get('/', [MasterCategoriesController::class, 'index'])->name('index');
    Route::get('search', [MasterCategoriesController::class, 'search'])->name('search');
    Route::get('form/{method}/{id?}', [MasterCategoriesController::class, 'formView'])->name('formView');
    Route::post('form/{method}/{id?}', [MasterCategoriesController::class, 'formSubmit'])->name('formSubmit');
    Route::get('view/{kode}', [MasterCategoriesController::class, 'singleView'])->name('singleView');
    Route::get('delete/{id}', [MasterCategoriesController::class, 'delete'])->name('delete');
});
