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
use App\Http\Controllers\Admin\MemberController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\InformationController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\FooterController;
use App\Http\Controllers\Admin\CouponsController;
use App\Http\Controllers\Admin\KeywordController;

use App\Http\Controllers\FE\HomeController as FEController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\authController;
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
use Laravel\Socialite\Facades\Socialite;
 
Route::get('/auth/github/redirect',[authController::class ,'githubredirect'] )->name('githublogin');
  
Route::get('/auth/github/callback',[authController::class ,'githubcallback'] );


Route::get('/auth/google/redirect',[authController::class ,'googleredirect'] )->name('googlelogin');
  
Route::get('/auth/google/callback',[authController::class ,'googlecallback'] );
 


Route::get('/', [FEController::class, 'index'])->name('home');

Route::get('/layout', [FEController::class, 'layout'])->name('layout');

Route::get('/login', [LoginController::class, 'index'])->name('login');

Route::post('/login', [LoginController::class, 'login'])->name('checkLogin');

Route::post('/product/search', [SearchController::class, 'search'])->name('search');

Route::get('/register', [RegisterController::class, 'index'])->name('register');

Route::post('/register', [RegisterController::class, 'store'])->name('createregister');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/ajax-search-product', [FEController::class, 'ajaxSearch'])->name('ajax-search-product');
// for product details
Route::get('/product/{slug}', [FEController::class, 'product'])->name('product.details');

Route::get('/view-category/{slug}', [FEController::class, 'viewCategory'])->name('view-category');

Route::post('/add-cart', [FEController::class, 'addCart'])->name('addCart');

Route::get('/shop', [FEController::class, 'shop'])->name('shop');
Route::get('/filterBrand', [FEController::class, 'filterBrand'])->name('filterBrand');
Route::get('/shop/category/{id}', [FEController::class, 'shopByCategory'])->name('shop.category');
Route::get('/shop/brand/{id}', [FEController::class, 'shopByBrand'])->name('shop.brand');
Route::get('/shop/search-products', [FEController::class, 'searchProducts'])->name('search.products');
Route::get('/shop/featured-products', [FEController::class, 'featuredProducts'])->name('featured.products');
Route::get('/sort-by', [FEController::class, 'sortBy'])->name('sort.by');
Route::get('/products/sort/{sortOption}', [FEController::class, 'sortProducts'])->name('sort.products');

Route::get('/about', [FEController::class, 'about'])->name('about');
Route::get('/contact', [FEController::class, 'contact'])->name('contact');
Route::get('/person', [FEController::class, 'person'])->name('person');
Route::get('/view-cart', [FEController::class, 'viewCart'])->name('viewCart');
Route::get('/clear-cart', [FEController::class, 'clearCart'])->name('clearCart');

Route::post('/change-cart-item', [FEController::class, 'changeCartItem'])->name('changeCart');
Route::post('/remove-cart-item', [FEController::class, 'removeCartItem'])->name('removeCart');

Route::post('/process-contact', [FEController::class, 'processContact'])->name('processContact');



Route::group(['middleware' => 'canLogin'], function () {
    // cần login mới truy cập
    Route::post('/process-checkout', [FEController::class, 'processCheckout'])->name('processCheckout');

    Route::post('/process-review', [FEController::class, 'processReview'])->name('processReview');
    
    Route::post('/process-edituser/{id}', [FEController::class, 'processEditUser'])->name('processEditUser');
    
    Route::get('/checkout', [FEController::class, 'checkout'])->name('checkout');

    Route::get('/review', [FEController::class, 'review'])->name('review');

    Route::get('/history/view/{id}', [FEController::class, 'history'])->name('history');

    Route::get('/edituser/view/{id}', [FEController::class, 'edituser'])->name('edituser');

    Route::group(['middleware'=>'canAdmin', 'prefix'=> 'admin', 'as' => 'admin.'], function() {
        // cần admin mới truy cập
        Route::get('/', [HomeController::class, 'homedb'])->name('homedb');

      

        Route::resource('/user', UserController::class);

        Route::resource('/category', CategoryController::class);

        Route::post('/arrange', [CategoryController::class, 'arrangeCategory'])->name('arrange');

        Route::resource('/brand', BrandController::class);

        Route::resource('/product', ProductController::class);

        Route::get('/product/brand/{id}', [ProductController::class, 'filterByBrand'])->name('filterByBrand');

        Route::resource('/orderdetail', OrderDetailController::class);

        Route::get('/orderdetail/view/{id}', [OrderDetailController::class, 'view'])->name('orderdetail.view');

        Route::resource('/order', OrderController::class);

        Route::resource('/review', ReviewController::class);

        Route::resource('/coupons', CouponsController::class);

        Route::resource('/member', MemberController::class);

        Route::resource('/blog', BlogController::class);

        Route::resource('/information', InformationController::class);

        Route::resource('/contact', ContactController::class);

        Route::get('/contact/view/{id}', [ContactController::class, 'view'])->name('contact.view');

        Route::get('/contact/sendMail/{id}', [ContactController::class, 'sendMail'])->name('contact.sendMail');

        Route::post('process-sendMail', [ContactController::class, 'processsendMail'])->name('processsendMail');

        Route::resource('/keyword', KeywordController::class);

        Route::resource('/footer', FooterController::class);
    });
});
