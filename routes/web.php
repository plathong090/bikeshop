<?php

use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
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
Route::get('/product', [ProductController::class, 'index']); // ใช้ get method เพื่อแสดงรายการสินค้า
Route::post('/product/search', [ProductController::class, 'search']); // ใช้ post method เพื่อค้นหาสินค้า
Route::get('/product/edit/{id?}', [ProductController::class, 'edit']); // ใช้ get method เพื่อแก้ไขสินค้า
Route::post('/product/update', [ProductController::class, 'update']); // ใช้ post method เพื่ออัพเดตข้อมูลสินค้า
Route::get('/product/remove/{id}', [ProductController::class, 'remove']); // ใช้ get method เพื่อลบข้อมูลสินค้า
Route::post('/product/insert', [ProductController::class, 'insert']); //รับข้อมูลเพิ่มข้อมูลสินค้า
Route::get('/product/add', [ProductController::class, 'add']); //แสดงหน้าฟอร์มเพิ่มสินค้า

Route::get('/category', [CategoryController::class, 'index']); 
Route::get('/category/edit/{id?}', [CategoryController::class, 'edit']);
Route::post('/category/update', [CategoryController::class, 'update']);
Route::get('/category/remove/{id}', [CategoryController::class, 'remove']);
Route::post('/category/insert', [CategoryController::class, 'insert']);
Route::get('/category/add', [CategoryController::class, 'add']);

Route::get('/home', [HomeController::class, 'index']);

Route::get('/cart/view',[CartController::class,'viewCart']);
Route::get('/cart/add/{id}',[CartController::class,'addToCart']);
Route::get('/cart/delete/{id}',[CartController::class,'deleteCart']);