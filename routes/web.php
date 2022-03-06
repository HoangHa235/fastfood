<?php

use App\Http\Controllers\Admin\CartController as AdminCartController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\Users\LoginController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\RecruitController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\UploadController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\Users\RegisterController;
use App\Http\Controllers\MenuController as ControllersMenuController;
use Monolog\Handler\RotatingFileHandler;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CommentController as ControllersCommentController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\RecruitController as ControllersRecruitController;
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

Route::get('/', [HomeController::class,'index'])->name('home.index');
Route::get('/thanh-vien',[HomeController::class,'show'])->name('member');
Route::get('/thong-tin-ca-nhan/{user}',[HomeController::class,'edit'])->name('info');
Route::post('/thong-tin-ca-nhan/{user}',[UserController::class,'update']);
Route::get('/danh-muc/{id}-{slug}.html',[ControllersMenuController::class,'index']);
Route::get('/danh-muc/tatca.html',[ControllersMenuController::class,'getallproduct']);
Route::get('/san-pham/{id}-{slug}.html',[App\Http\Controllers\ProductController::class,'index']);
Route::post('/add-cart',[CartController::class,'index']);
Route::get('carts',[CartController::class,'show']);
Route::post('/update-cart',[CartController::class,'update']);
Route::get('/carts/delete/{id}',[CartController::class,'remove']);
Route::get('/carts/remove',[CartController::class,'removeall']);
Route::post('/carts',[CartController::class,'addCart']);
Route::get('/tin-tuc-tuyen-dung.html',[ControllersRecruitController::class,'index'])->name('tin-tuc-tuyen-dung');

//Liên hệ
Route::get('/lien-he',[HomeController::class,'contact'])->name('contact');
Route::post('/lien-he',[HomeController::class,'postcontact']);

//Bình luận
Route::get('/chi-tiet-tin-tuyen-dung/{id}-{slug}.html',[ControllersRecruitController::class,'show']);
Route::post('/chi-tiet-tin-tuyen-dung/{id}-{slug}.html',[ControllersCommentController::class,'postcomment']);
Route::get('/chi-tiet-tin-tuyen-dung/{id}',[CommentController::class,'delete']);

//Search
Route::post('/danh-muc/tatca.html/name',[SearchController::class,'getSearchAjax'])->name('search');

//Đăng nhập- đăng kí- đăng xuất
Route::get('/admin/users/login',[LoginController::class,'index'])->name('login');
Route::post('/admin/users/login/store',[LoginController::class,'store']);
Route::get('/admin/users/register',[RegisterController::class,'index'])->name('register');
Route::post('/admin/users/register',[RegisterController::class,'store']);
Route::get('/logout',[LoginController::class,'logout'])->name('logout');


Route::middleware(['auth'])->group(function(){
    //Đơn hàng của người dùng
    Route::get('/don-hang',[OrderController::class,'index'])->name('order');
    Route::get('/don-hang/view/{customer}',[OrderController::class,'show']);
    Route::get('don-hang/remove/{id}',[OrderController::class,'remove']);

    //Người quản trị
    Route::prefix('admin')->group(function(){
        Route::get('/', [MainController::class,'index'])->name('admin');
        Route::get('main', [MainController::class,'index']);

        //Menu
        Route::prefix('menus')->group(function(){
            Route::get('add',[MenuController::class,'create']);
            Route::post('add',[MenuController::class,'store']);
            Route::get('list',[MenuController::class,'index']);
            Route::get('edit/{menu}',[MenuController::class,'show']);
            Route::post('edit/{menu}',[MenuController::class,'update']);
            Route::get('destroy/{iddanhmuc}',[MenuController::class,'destroy']);
        });

        //Product
        Route::prefix('products')->group(function(){
            Route::get('add',[ProductController::class,'create']);
            Route::post('add',[ProductController::class,'store']);
            Route::get('list',[ProductController::class,'index']);
            Route::get('edit/{product}',[ProductController::class,'show']);
            Route::post('edit/{product}',[ProductController::class,'update']);
            Route::get('destroy/{idproduct}',[ProductController::class,'destroy']);
        });

        //Sliders
        Route::prefix('sliders')->group(function(){
            Route::get('add',[SliderController::class,'create']);
            Route::post('add',[SliderController::class,'store']);
            Route::get('list',[SliderController::class,'index']);
            Route::get('edit/{slider}',[SliderController::class,'show']);
            Route::post('edit/{slider}',[SliderController::class,'update']);
            Route::get('destroy/{idslider}',[SliderController::class,'destroy']);
        });

        //User
        Route::prefix('users')->group(function(){
            Route::get('list',[UserController::class,'index']);
            Route::get('edit/{user}',[UserController::class,'show']);
            Route::post('edit/{user}',[UserController::class,'update']);
            Route::get('delete/{id}',[UserController::class,'destroy']);
        });

        //recruit
        Route::prefix('recruits')->group(function(){
            Route::get('add',[RecruitController::class,'create']);
            Route::post('add',[RecruitController::class,'store']);
            Route::get('list',[RecruitController::class,'index']);
            Route::get('edit/{recruit}',[RecruitController::class,'show']);
            Route::post('edit/{recruit}',[RecruitController::class,'update']);
            Route::get('destroy/{idrecruit}',[RecruitController::class,'destroy']);
        });

        //comment
        Route::prefix('comments')->group(function(){
            Route::get('list',[CommentController::class,'index']);
            Route::get('delete/{id}',[CommentController::class,'delete']);
        });

        //Upload
        Route::post('upload/services',[UploadController::class,'store']);

        //Carts
        Route::get('customers',[AdminCartController::class,'index']);
        Route::get('customers/view/{customer}',[AdminCartController::class,'show']);
    });
});


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

/**
 * GET => account.index => danh sách
 * GET => account.creat => form thêm mới
 * POST => account.store => khi submit form
 * GET => account.show => xem chi tiết
 * GET => account.edit => form edit
 * PUT => account.update => khi submit form edit
 * DELETE => account.destroy => khi xóa
 */

