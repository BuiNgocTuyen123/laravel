<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CateoryProduct;
use App\Http\Controllers\BrandProduct;
use App\Http\Controllers\Product;



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
//fontend
Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/trang-chu', [HomeController::class, 'index'])->name('trang-chu');



//backend
Route::get('/admin', [AdminController::class, 'index'])->name('admin');
Route::get('/dashboard', [AdminController::class, 'show_dashboard'])->name('admin');
Route::get('/logout', [AdminController::class, 'logout'])->name('admin');
Route::post('/admin-dashboard', [AdminController::class, 'dashboard'])->name('admin');

//category product
Route::get('/add-category-product', [CateoryProduct::class, 'add_category_product'])->name('cat');
Route::get('/edit-category-product/{category_product_id}', [CateoryProduct::class, 'edit_category_product']);
Route::get('/delete-category-product/{category_product_id}', [CateoryProduct::class, 'delete_category_product']);
Route::get('/all-category-product', [CateoryProduct::class, 'all_category_product'])->name('cat');

Route::get('/unactive-category-product/{category_product_id}', [CateoryProduct::class, 'unactive_category_product'])->name('cat');
Route::get('/active-category-product/{category_product_id}', [CateoryProduct::class, 'active_category_product'])->name('cat');

Route::post('/save-category-product', [CateoryProduct::class, 'save_category_product'])->name('cat');
Route::post('/update-category-product/{category_product_id}', [CateoryProduct::class, 'update_category_product'])->name('cat');

//brand product
Route::get('/add-brand-product', [BrandProduct::class, 'add_brand_product'])->name('brand');
Route::get('/edit-brand-product/{brand_product_id}', [BrandProduct::class, 'edit_brand_product']);
Route::get('/delete-brand-product/{brand_product_id}', [BrandProduct::class, 'delete_brand_product']);
Route::get('/all-brand-product', [BrandProduct::class, 'all_brand_product'])->name('brand');

Route::get('/unactive-brand-product/{brand_product_id}', [BrandProduct::class, 'unactive_brand_product'])->name('brand');
Route::get('/active-brand-product/{brand_product_id}', [BrandProduct::class, 'active_brand_product'])->name('brand');

Route::post('/save-brand-product', [BrandProduct::class, 'save_brand_product'])->name('brand');
Route::post('/update-brand-product/{brand_product_id}', [BrandProduct::class, 'update_brand_product'])->name('brand');

// product
Route::get('/add-product', [Product::class, 'add_product'])->name('product');
Route::get('/edit-product/{product_id}', [Product::class, 'edit_product']);
Route::get('/delete-product/{product_id}', [Product::class, 'delete_product']);
Route::get('/all-product', [Product::class, 'all_product'])->name('product');

Route::get('/unactive-product/{product_id}', [Product::class, 'unactive_product'])->name('product');
Route::get('/active-product/{product_id}', [Product::class, 'active_product'])->name('product');

Route::post('/save-product', [Product::class, 'save_product'])->name('product');
Route::post('/update-product/{product_id}', [Product::class, 'update_product'])->name('product');




