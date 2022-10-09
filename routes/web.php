<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Pos\SupplierController;
use App\Http\Controllers\Pos\CustomerController;
use App\Http\Controllers\Pos\UnitController;

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

Route::middleware(['auth'])->group(function () {

    Route::controller(AdminController::class)->group(function () {
        Route::get('/admin/logout', 'destroy')->name('admin.logout');
        Route::get('/admin/profile', 'profile')->name('admin.profile');
        Route::get('/edit/profile', 'editProfile')->name('edit.profile');
        Route::post('/store/profile', 'storeProfile')->name('store.profile');
        Route::get('/change/password', 'changePassword')->name('change.password');
        Route::post('/update/password', 'updatePassword')->name('update.password');
    });

});

Route::controller(SupplierController::class)->group(function () {
    Route::get('/supplier/all', 'supplierAll')->name('supplier.all');
    Route::get('/supplier/add', 'supplierAdd')->name('supplier.add');
    Route::post('/store/supplier', 'storeSupplier')->name('store.supplier');
    Route::get('/supplier/edit{id}', 'supplierEdit')->name('supplier.edit');
    Route::post('/update/supplier', 'updateSupplier')->name('update.supplier');
    Route::get('/supplier/delete{id}', 'supplierDelete')->name('supplier.delete');
});

Route::controller(CustomerController::class)->group(function () {
    Route::get('/customer/all', 'customerAll')->name('customer.all');
    Route::get('/customer/add', 'customerAdd')->name('customer.add');
    Route::post('/store/customer', 'storeCustomer')->name('store.customer');
    Route::get('/customer/edit{id}', 'customerEdit')->name('customer.edit');
    Route::post('/update/customer', 'updateCustomer')->name('update.customer');
    Route::get('/customer/delete{id}', 'customerDelete')->name('customer.delete');
});

Route::controller(UnitController::class)->group(function () {
    Route::get('/unit/all', 'unitAll')->name('unit.all');
    Route::get('/unit/add', 'unitAdd')->name('unit.add');
    Route::post('/store/unit', 'storeUnit')->name('store.unit');
    Route::get('/unit/edit{id}', 'unitEdit')->name('unit.edit');
    Route::post('/update/unit', 'updateUnit')->name('update.unit');
    Route::get('/unit/delete{id}', 'unitDelete')->name('unit.delete');
});

Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth','verified'])->name('dashboard');

require __DIR__.'/auth.php';
