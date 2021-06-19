<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\BrandController;
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

Route::get('/', function () {
    return view('welcome');
});

// routes for login
Route::get('admin',[AdminController::class, 'index']);
Route::post('admin/auth',[AdminController::class, 'auth'])->name('admin.auth');
//Route::get('admin/encryptpassword',[AdminController::class, 'encryptpassword']);
Route::group(['middleware'=>'admin_auth'], function(){
    Route::get('admin/dashboard',[AdminController::class, 'dashboard']);
    Route::get('admin/logout', function () {
        session()->forget('ADMIN_LOGIN');
        session()->forget('ADMIN_ID');
        session()->flash('msg', 'Logout Successfully');
        return redirect('admin');
    });
// routes for category
    Route::get('admin/category',[CategoryController::class, 'index']);
    Route::get('admin/category/manage_category',[CategoryController::class, 'manage_category']);
    Route::get('admin/category/manage_category/{id}',[CategoryController::class, 'manage_category']);
    Route::post('admin/category/manage_category_process',[CategoryController::class, 'manage_category_process'])->name('category.manage_category_process');
    Route::get('admin/category/status/{status}/{id}',[CategoryController::class, 'status']);
    Route::get('admin/category/delete/{id}',[CategoryController::class, 'delete']);

// routes for coupon
    Route::get('admin/coupon',[CouponController::class, 'index']);
    Route::get('admin/coupon/manage_coupon',[CouponController::class, 'manage_coupon']);
    Route::get('admin/coupon/manage_coupon/{id}',[CouponController::class, 'manage_coupon']);
    Route::post('admin/coupon/manage_coupon_process',[CouponController::class, 'manage_coupon_process'])->name('coupon.manage_coupon_process');
    Route::get('admin/coupon/status/{status}/{id}',[CouponController::class, 'status']);
    Route::get('admin/coupon/delete/{id}',[CouponController::class, 'delete']);

// routes for size
    Route::get('admin/size',[SizeController::class, 'index']);
    Route::get('admin/size/manage_size',[SizeController::class, 'manage_size']);
    Route::get('admin/size/manage_size/{id}',[SizeController::class, 'manage_size']);
    Route::post('admin/size/manage_size_process',[SizeController::class, 'manage_size_process'])->name('size.manage_size_process');
    Route::get('admin/size/status/{status}/{id}',[SizeController::class, 'status']);
    Route::get('admin/size/delete/{id}',[SizeController::class, 'delete']);

// routes for color
    Route::get('admin/color',[ColorController::class, 'index']);
    Route::get('admin/color/manage_color',[ColorController::class, 'manage_color']);
    Route::get('admin/color/manage_color/{id}',[ColorController::class, 'manage_color']);
    Route::post('admin/color/manage_color_process',[ColorController::class, 'manage_color_process'])->name('color.manage_color_process');
    Route::get('admin/color/status/{status}/{id}',[ColorController::class, 'status']);
    Route::get('admin/color/delete/{id}',[ColorController::class, 'delete']);

// routes for brand
    Route::get('admin/brand',[BrandController::class, 'index']);
    Route::get('admin/brand/manage_brand',[BrandController::class, 'manage_brand']);
    Route::get('admin/brand/manage_brand/{id}',[BrandController::class, 'manage_brand']);
    Route::post('admin/brand/manage_brand_process',[BrandController::class, 'manage_brand_process'])->name('brand.manage_brand_process');
    Route::get('admin/brand/status/{status}/{id}',[BrandController::class, 'status']);
    Route::get('admin/brand/delete/{id}',[BrandController::class, 'delete']);
});
