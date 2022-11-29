<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\AccountLoginController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\NewsController;
use App\Http\Controllers\admin\OrderController;
use App\Http\Controllers\admin\OrderdetailController;
use App\Http\Controllers\admin\PermissionController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\RoleController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\admin\CommentController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Middleware\CheckAdminLogin;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\BillController;
use App\Http\Controllers\Pagenewscontroller;
use Illuminate\Foundation\Auth\EmailVerificationRequest;


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


Route::get('/', [HomeController::class, 'index'])->name('user.home');
Route::get('contact_mail', [HomeController::class, 'contact_mail'])->name('user.contact_mail');
Route::post('contact_mail', [HomeController::class, 'postcontact_mail'])->name('user.contact_mail');
Route::group(['prefix' => 'user'], function () {
    //Đăng nhập, đăng xuất và thông tin user
    Route::get('/login', [AccountController::class, 'login'])->name('user.login');
    Route::post('/login', [AccountController::class, 'post_login'])->name('user.login');
    Route::get('/register', [AccountController::class, 'register'])->name('user.register');
    Route::post('/register', [AccountController::class, 'post_register'])->name('user.register');
    Route::get('/logout', [AccountController::class, 'getLogout'])->name('getLogout');
    Route::get('myaccount', [AccountController::class, 'myAccount'])->name('user.infouser');
    Route::put('myaccount/{id}', [AccountController::class, 'updateAccount'])->name('updateAccount');
    Route::get('/shop', [ShopController::class, 'shop'])->name('user.shop');
    Route::get('/contact', [ContactController::class, 'contact'])->name('user.contact');
    Route::get('/checkout', [CheckoutController::class, 'checkout'])->name('user.checkout');
    Route::get('/shopdetail', [PagesController::class, 'shopdetail'])->name('user.shopdetail');
    Route::get('/shopdetail/{id}', [PagesController::class, 'shopdetail'])->name('detail');
    Route::post('comment', [PagesController::class, 'postComment'])->name('postComment');
    Route::get('/category/{id}', [PagesController::class, 'category'])->name('user.category');
    Route::get('search', [PagesController::class, 'search'])->name('user.search');
    Route::get('/mybill/{id}', [BillController::class, 'myBill'])->name('user.mybill');
    Route::get('/myDetailBill/{id}', [BillController::class, 'myDetailBill'])->name('user.myDetailBill');
    Route::post('/mybill/{id}', [BillController::class, 'cancelBill'])->name('user.mybill');
    Route::get('/shopcart', [CartController::class, 'shopcart'])->name('user.shopcart');

    Route::get('/news', [Pagenewscontroller::class, 'news'])->name('user.news');
    Route::get('/news_detail/{id}', [Pagenewscontroller::class, 'news_detail'])->name('news_detail');
});
Route::post('/save_cart', [CartController::class, 'save_cart'])->name('save_cart');
Route::get('/delete_cart/{rowId}', [CartController::class, 'delete_cart'])->name('delete_cart');
Route::post('/update_cart', [CartController::class, 'update_cart'])->name('update_cart');
Route::post('/place-order', [CheckoutController::class, 'placeorder'])->name('placeorder');


//đăng nhập google
Route::get('user/logingoogle', [AccountController::class, 'login_google'])->name('login_google');
Route::get('/admin/callback', [AccountController::class, 'callback_google'])->name('callback_google');

//trang admin
Route::group(['middleware' => 'CheckAdminLogin', 'prefix' => 'admin'], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.layout.dashboard');
    Route::get('/order/orderdetail/{id}', [OrderController::class, 'orderdetail'])->name('admin.order.orderdetail');
    Route::resource('permission', PermissionController::class);
    Route::resources([
        'category' => CategoryController::class,
        'product' => ProductController::class,
        'order' => OrderController::class,
        'orderdetail' => OrderdetailController::class,
        'news' => NewsController::class,
        'user' => UserController::class,
        'role' => RoleController::class,
        'comment' => CommentController::class,
    ]);
});
