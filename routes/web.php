<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\PromotorController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/culo', [App\Http\Controllers\HomeController::class, 'crear'])->name('culo');


Route::get('/categorias', [CategoriaController::class, 'index'])->name('categorias.index');
Route::get('/categorias/crear', [CategoriaController::class, 'store'])->name('categorias.store');
Route::post('/categoria/guardar', [CategoriaController::class, 'create'])->name('categorias.create');
Route::get('/categoria/edit/{id}', [CategoriaController::class, 'edit'])->name('categorias.edit');
Route::put('/categoria/update/{id}', [CategoriaController::class, 'update'])->name('categorias.update');
Route::delete('/categoria/destroy/{id}', [CategoriaController::class, 'destroy'])->name('categorias.destroy');


Route::get('/promotores', [PromotorController::class, 'index'])->name('promotores.index');
Route::get('/promotores/crear', [PromotorController::class, 'store'])->name('promotores.store');
Route::post('/promotores/guardar', [PromotorController::class, 'create'])->name('promotores.create');
Route::get('/promotores/edit/{id}', [PromotorController::class, 'edit'])->name('promotores.edit');
Route::put('/promotores/update/{id}', [PromotorController::class, 'update'])->name('promotores.update');
Route::delete('/promotores/destroy/{id}', [PromotorController::class, 'destroy'])->name('promotores.destroy');

Route::resource('/productos',ProductoController::class);