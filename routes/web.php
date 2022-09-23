<?php

use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\CustomerController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\SupplierController;
use App\Http\Controllers\Backend\UnitController;
use App\Http\Controllers\Backend\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::group(['middleware'=>'auth'],function(){

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::prefix('users')->group(function () {
    Route::get('/view', [UserController::class, 'view'])->name('user.view');
    Route::get('/create', [UserController::class, 'create'])->name('user.create');
    Route::get('/create/form', [UserController::class, 'createForm'])->name('user.create.form');
    Route::post('/store', [UserController::class, 'store'])->name('user.store');
    Route::get('/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::delete('/delete', [UserController::class, 'delete'])->name('user.delete');
});
Route::prefix('Profiles')->group(function () {
    Route::get('/view', [ProfileController::class, 'view'])->name('profiles.view');
    Route::get('/edit', [ProfileController::class, 'edit'])->name('profiles.edit');
    Route::post('/store', [ProfileController::class, 'store'])->name('profiles.store');
    Route::get('/change_password', [ProfileController::class, 'change_password'])->name('profiles.change_password');
    Route::post('/update_password', [ProfileController::class, 'update_password'])->name('profiles.update_password');

});

//Manage Supplier
Route::resource('supplier', SupplierController::class);
Route::get('/supplier/create/form', [SupplierController::class, 'createForm'])->name('supplier.create_form');

//Customer Supplier
Route::resource('customer', CustomerController::class);
Route::get('/customer/create/form', [CustomerController::class, 'create_customer_form'])->name('customer.create_form');
//Unit Supplier
Route::resource('unit', UnitController::class);
Route::get('/unit/create/form', [UnitController::class, 'create_unit_form'])->name('unit.create_form');

//Manage Category
Route::resource('category', CategoryController::class);
Route::get('/category/create/form', [CategoryController::class, 'create_category_form'])->name('category.create_form');

//Manage Product
Route::resource('product', ProductController::class);
Route::get('/product/create/form', [ProductController::class, 'create_product_form'])->name('product.create_form');



});
