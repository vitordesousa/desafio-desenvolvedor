<?php

use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
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



Route::group(['prefix' => 'admin', 'as' => 'admin.'], function() {
        
    Route::resource('clientes' ,  App\Http\Controllers\ClientController::class)->except('show');
    Route::resource('categorias' ,  App\Http\Controllers\CategoryController::class)->except('show');
    Route::resource('produtos' ,  App\Http\Controllers\ProductController::class)->except('show');
    
    Route::group(['prefix' => 'clientes', 'as' => 'clientes.'], function() {
        Route::get('/buscar', [App\Http\Controllers\ClientController::class, 'search'])->name('search');
        Route::post('/delete-in-mass', [App\Http\Controllers\ClientController::class, 'deleteInMass'])->name('deleteInMass');
    });
    Route::get('/categorias/buscar', [App\Http\Controllers\CategoryController::class, 'search'])->name('search');
    Route::group(['prefix' => 'produtos', 'as' => 'produtos.'], function() {
        Route::get('/buscar', [App\Http\Controllers\ProductController::class, 'search'])->name('search');
        Route::post('/delete-in-mass', [App\Http\Controllers\ProductController::class, 'deleteInMass'])->name('deleteInMass');
    });
});
