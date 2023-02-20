<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MealsController;
use App\Http\Controllers\OrdersController;
use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/', [HomeController::class, 'index'])->name('home');
//Route::get('/', [VisitorController::class, 'index'])->name('visitor');


Route::controller(CategoriesController::class)->group(function () {
    Route::get('/category', 'index')->name('category.index');
    Route::post('/category', 'store')->name('category.store');
    Route::post('/category-update', 'update')->name('category.update');
    Route::delete('/category/{category}', 'destroy')->name('category.destroy');

});

Route::controller(MealsController::class)->group(function () {
    Route::get('/meal', 'index')->name('meal.index');
    Route::get('/meal/create', 'create')->name('meal.create');
    Route::post('/meal', 'store')->name('meal.store');
    Route::get('/meal/{id}', 'show')->name('meal.show');
    Route::get('/meal/edit/{id}', 'edit')->name('meal.edit');
    Route::put('/meal/{id}', 'update')->name('meal.update');
    Route::delete('/meal/{id}', 'destroy')->name('meal.delete');
});


Route::controller(OrdersController::class)->group(function () {
//    Route::get('/order', 'index')->name('order.index');
//    Route::get('/order/create', 'create')->name('order.create');
    Route::post('/order', 'store')->name('order.store');
    Route::get('/order', 'index')->name('order.index');
//    Route::get('/order/{id}', 'show')->name('order.show');
//    Route::get('/order/edit/{id}', 'edit')->name('order.edit');
    Route::put('/order/{id}', 'update')->name('order.update');
//    Route::delete('/order/{id}', 'destroy')->name('order.delete');
});
