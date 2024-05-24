<?php

use App\Http\Controllers\ExampleController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductShow;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::controller(ProductController::class)->group(function(){
    Route::get('/products','index')->name('products.index');
    Route::get('/products/create', 'create')->name('products.create');
    Route::post('/products', 'store')->name('products.store');
    Route::get('products/{product}/edit','edit')->name('products.edit');
    Route::put('products/{product}','update')->name('products.update');
    Route::delete('products/{product}','destroy')->name('products.destroy');
});

Route::match(['GET','POST'],'/registration/create',[ExampleController::class,'create'])->name('reg.create');
Route::match(['GET','POST'],'/registration',[ExampleController::class,'store'])->name('reg.store');

Route::get('/api/products', [ProductShow::class, 'index']);
Route::get('/api/product/{id}', [ProductShow::class, 'show']);


// Routes for login
Route::get('/login', [ExampleController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [ExampleController::class, 'login'])->name('login');
Route::post('/logout', [ExampleController::class, 'logout'])->name('logout');