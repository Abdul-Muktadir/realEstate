<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{AuthController,DashboardController,VendorsController,PropertiesController,AdminsController,AdminVendorsController,AdminPropertiesController};
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

Route::get('/admin/login', [AuthController::class, 'getLogin'])->name('getLogin');
Route::post('/admin/login', [AuthController::class, 'postLogin'])->name('postLogin');
Route::group(['middleware'=>['admin_auth']], function(){
    Route::get('/admin/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/admin/logout', [DashboardController::class, 'logout'])->name('logout');
    Route::get('/admin/registervendor', [DashboardController::class, 'getVendor'])->name('getVendor');
    Route::post('/admin/registervendor', [DashboardController::class, 'postVendor'])->name('postVendor');
    Route::get('/admin/show_vendor', [DashboardController::class, 'showVendor'])->name('showVendor');
    Route::get('/admin/edit_vendor', [DashboardController::class, 'editVendor'])->name('editVendor');
    Route::get('/admin/destroy_vendor', [DashboardController::class, 'destroyVendor'])->name('destroyVendor');
    Route::get('/admin/edit_property', [DashboardController::class, 'editProperty'])->name('editProperty');
    Route::get('/admin/show_property', [DashboardController::class, 'showProperty'])->name('showProperty');
    Route::resource('/admin', '\App\Http\Controllers\Admin\AdminsController');
    Route::resource('/adminvendors', '\App\Http\Controllers\Admin\AdminVendorsController');
    Route::resource('/adminproperties', '\App\Http\Controllers\Admin\AdminPropertiesController');
});
Route::get('/vendors/auth/login', [AuthController::class, 'getVendorLogin'])->name('getVendorLogin');
Route::post('/vendors/auth/login', [AuthController::class, 'postVendorLogin'])->name('postVendorLogin');
Route::group(['middleware'=>['vendor_auth']], function(){
Route::get('/vendor/auth/logout', [AuthController::class, 'vendorLogout'])->name('vendorLogout');

// Route::get('/vendors/vendorDashboard', [DashboardController::class, 'vendorDashboard'])->name('vendorDashboard');
Route::resource('/vendors', '\App\Http\Controllers\Admin\VendorsController');
Route::resource('/properties', '\App\Http\Controllers\Admin\PropertiesController');
});