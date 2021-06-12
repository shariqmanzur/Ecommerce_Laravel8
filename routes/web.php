<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
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

Route::get('admin',[AdminController::class, 'index']);
Route::post('admin/auth',[AdminController::class, 'auth'])->name('admin.auth');

Route::group(['middleware'=>'admin_auth'], function(){
    Route::get('admin/dashboard',[AdminController::class, 'dashboard']);
    Route::get('admin/category',[CategoryController::class, 'index']);
    Route::get('admin/category/manage_category',[CategoryController::class, 'manage_category']);
    Route::get('admin/category/manage_category/{id}',[CategoryController::class, 'manage_category']);
    //Route::get('admin/encryptpassword',[AdminController::class, 'encryptpassword']);
    Route::post('admin/category/manage_category_process',[CategoryController::class, 'manage_category_process'])->name('category.manage_category_process');
    Route::get('admin/category/status/{status}/{id}',[CategoryController::class, 'status']);
    Route::get('admin/category/delete/{id}',[CategoryController::class, 'delete']);
    Route::get('admin/logout', function () {
        session()->forget('ADMIN_LOGIN');
        session()->forget('ADMIN_ID');
        session()->flash('msg', 'Logout Successfully');
        return redirect('admin');
    });
});
