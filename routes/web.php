<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
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

Route::get('/',[HomeController::class,'home']);
Route::get('/categories',[HomeController::class,'category'])->name('category.list');

Route::get('/create/category',[CategoryController::class,'showCreateForm']);
Route::post('/category/store',[CategoryController::class,'store']);

Route::get('/brand/list',[BrandController::class,'list'])->name('brand.list');
Route::get('/brand/create',[BrandController::class,'create'])->name('brand.create');
Route::post('/brand/store',[BrandController::class,'store'])->name('brand.store');

Route::get('/product/list',[ProductController::class,'list'])->name('product.list');
Route::get('/product/create-form',[ProductController::class,'createForm'])->name('product.create.form');
Route::post('/product/store',[ProductController::class,'store'])->name('product.store');
Route::get('/product/view/{id}',[ProductController::class,'view'])->name('product.view');
Route::get('/product/delete/{id}',[ProductController::class,'delete'])->name('product.delete');
