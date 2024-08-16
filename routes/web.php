<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CateoryProduct;
use App\Http\Controllers\BrandProduct;
use App\Http\Controllers\Product;
use App\Http\Controllers\Bill;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;



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

Route::post('/tim-kiem', [HomeController::class, 'search'])->name('trang-chu');

//danh mục sản phẩm trang chủ
Route::get('/danh-muc-san-pham/{category_id}', [CateoryProduct::class,'show_category_home'])->name('trang-chu');
//thương hiệu sản phẩm trang chủ
Route::get('/thuong-hieu-san-pham/{brand_id}', [BrandProduct::class,'show_brand_home'])->name('trang-chu');
//chi tiết sản phẩm
Route::get('/chi-tiet-san-pham/{product_id}', [Product::class,'detail_product'])->name('trang-chu');





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

// cart
Route::post('/update-cart-quantity', [CartController::class, 'update_cart_quantity'])->name('cart');
Route::post('/save-cart', [CartController::class, 'save_cart'])->name('cart');

Route::get('/show-cart', [CartController::class, 'show_cart'])->name('cart');
Route::get('/delete-to-cart/{rowId}', [CartController::class, 'delete_to_cart'])->name('cart');

//checkout
Route::get('/login-checkout', [CheckoutController::class, 'login_checkout'])->name('cart');
Route::get('/logout-checkout', [CheckoutController::class, 'logout_checkout'])->name('cart');
Route::post('/add-customer', [CheckoutController::class, 'add_customer'])->name('cart');

Route::post('/order-place', [CheckoutController::class, 'order_place'])->name('cart');

Route::post('/login-customer', [CheckoutController::class, 'login_customer'])->name('cart');

Route::get('/checkout', [CheckoutController::class, 'checkout'])->name('cart');
Route::get('/payment', [CheckoutController::class, 'payment'])->name('cart');
Route::post('/save-checkout-customer', [CheckoutController::class, 'save_checkout_customers'])->name('cart');

Route::get('/ajax-products', [HomeController::class,'ajaxProducts'])->name('ajax.products');

//bill
Route::get('/all-bill', [CheckoutController::class, 'all_bill'])->name('bill');
Route::get('/view-order/{orderId}', [CheckoutController::class, 'view_order'])->name('bill');

//send mail
Route::get('/send-mail',[HomeController::class, 'send_mail']);
// Đảm bảo rằng bạn có route này trong web.php
Route::get('/ajax-products', 'HomeController@ajaxProducts');



