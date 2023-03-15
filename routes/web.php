<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\OrderDetailController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\CouponsController;
use App\Http\Controllers\FE\HomeController as FEController;
use App\Http\Controllers\SearchController;
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

Route::get('/', [FEController::class, 'index'])->name('home');

Route::get('/login', [LoginController::class, 'index'])->name('login');

Route::post('/login', [LoginController::class, 'login'])->name('checkLogin');

Route::post('/product/search', [SearchController::class, 'search'])->name('search');

Route::get('/register', [RegisterController::class, 'index'])->name('register');

Route::post('/register', [RegisterController::class, 'store'])->name('createregister');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// for product details
Route::get('/product/{slug}', [FEController::class, 'product'])->name('product.details');

Route::post('/add-cart', [FEController::class, 'addCart'])->name('addCart');
Route::get('/shop', [FEController::class, 'shop'])->name('shop');
Route::get('/shop/category/{id}', [FEController::class, 'shopByCategory'])->name('shop.category');
Route::get('/shop/search-products', [FEController::class, 'searchProducts'])->name('search.products');

Route::get('/about', [FEController::class, 'about'])->name('about');
Route::get('/contact', [FEController::class, 'contact'])->name('contact');
Route::get('/person', [FEController::class, 'person'])->name('person');
Route::get('/view-cart', [FEController::class, 'viewCart'])->name('viewCart');
Route::get('/clear-cart', [FEController::class, 'clearCart'])->name('clearCart');

Route::post('/change-cart-item', [FEController::class, 'changeCartItem'])->name('changeCart');
Route::post('/remove-cart-item', [FEController::class, 'removeCartItem'])->name('removeCart');




Route::group(['middleware'=>'canLogin'], function() {
    // cần login mới truy cập
    Route::post('/process-checkout', [FEController::class, 'processCheckout'])->name('processCheckout');

    Route::post('/process-review', [FEController::class, 'processReview'])->name('processReview');
    
    Route::get('/checkout', [FEController::class, 'checkout'])->name('checkout');

    Route::get('/review', [FEController::class, 'review'])->name('review');
    
    Route::get('/history', [FEController::class, 'history'])->name('history');
    
    Route::group(['middleware'=>'canAdmin', 'prefix'=> 'admin', 'as' => 'admin.'], function() {
        // cần admin mới truy cập
        Route::get('/', [HomeController::class, 'homedb'])->name('homedb');

        Route::resource('/user', UserController::class);

        Route::resource('/category', CategoryController::class);

        Route::resource('/brand', BrandController::class);

        Route::resource('/product', ProductController::class);

        Route::resource('/orderdetail', OrderDetailController::class);

        Route::resource('/order', OrderController::class);

        Route::resource('/review', ReviewController::class);

        Route::resource('/coupons', CouponsController::class);
    });
        
});

