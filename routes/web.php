<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\ProductController;
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