<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'home'])->name('home');
Route::get('/product/{productID}/view', [App\Http\Controllers\ProductController::class, 'view'])->name('product.view');
Route::get('/search', [App\Http\Controllers\ProductController::class, 'search'])->name('product.search');

Route::prefix('admin')->middleware('auth','isAdmin')->group(function(){
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/product/create', [App\Http\Controllers\ProductController::class, 'create'])->name('product.create');
    Route::post('/product/save', [App\Http\Controllers\ProductController::class, 'save'])->name('product.save');
    Route::get('/product/all', [App\Http\Controllers\ProductController::class, 'allProducts'])->name('product.all');
    Route::get('/product/{productID}/edit', [App\Http\Controllers\ProductController::class, 'edit'])->name('product.edit');
    Route::post('/product/{productID}/update', [App\Http\Controllers\ProductController::class, 'update'])->name('product.update');
    Route::get('/product/{productID}/delete', [App\Http\Controllers\ProductController::class, 'delete'])->name('product.delete');

    Route::get('/category/create', [App\Http\Controllers\CategoryController::class, 'create'])->name('category.create');
    Route::post('/category/save', [App\Http\Controllers\CategoryController::class, 'save'])->name('category.save');
    Route::get('/category/all', [App\Http\Controllers\CategoryController::class, 'allCategories'])->name('category.all');
    Route::get('/category/{categoryID}/edit', [App\Http\Controllers\CategoryController::class, 'edit'])->name('category.edit');
    Route::post('/category/{categoryID}/update', [App\Http\Controllers\CategoryController::class, 'update'])->name('category.update');
    Route::get('/category/{categoryID}/delete', [App\Http\Controllers\CategoryController::class, 'delete'])->name('category.delete');

});


