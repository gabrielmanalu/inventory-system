<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Pos\CategoryController;
use App\Http\Controllers\Pos\SupplierController;
use App\Http\Controllers\Pos\CustomerController;
use App\Http\Controllers\Pos\ProductController;
use App\Http\Controllers\Pos\PurchaseController;
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

Route::controller(CategoryController::class)->group(function () {
    Route::get('/category/all', 'categoryAll')->name('category.all');
    Route::get('/category/add', 'categoryAdd')->name('category.add');
    Route::post('/store/category', 'storeCategory')->name('store.category');
    Route::get('/category/edit{id}', 'categoryEdit')->name('category.edit');
    Route::post('/update/category', 'updateCategory')->name('update.category');
    Route::get('/category/delete{id}', 'categoryDelete')->name('category.delete');
});

Route::controller(ProductController::class)->group(function () {
    Route::get('/product/all', 'productAll')->name('product.all');
    Route::get('/product/add', 'productAdd')->name('product.add');
    Route::post('/store/product', 'storeProduct')->name('store.product');
    Route::get('/product/edit{id}', 'productEdit')->name('product.edit');
    Route::post('/update/product', 'updateProduct')->name('update.product');
    Route::get('/product/delete{id}', 'productDelete')->name('product.delete');
});

Route::controller(PurchaseController::class)->group(function () {
    Route::get('/purchase/all', 'purchaseAll')->name('purchase.all');
    Route::get('/purchase/add', 'purchaseAdd')->name('purchase.add');
    // Route::post('/store/product', 'storeProduct')->name('store.product');
    // Route::get('/product/edit{id}', 'productEdit')->name('product.edit');
    // Route::post('/update/product', 'updateProduct')->name('update.product');
    // Route::get('/product/delete{id}', 'productDelete')->name('product.delete');
});

Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth','verified'])->name('dashboard');

require __DIR__.'/auth.php';
