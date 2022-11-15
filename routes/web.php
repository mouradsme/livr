<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\FactoriesController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\DeliveriesController;

Route::get('/', [UsersController::class, 'index'])->middleware('auth')->name('users');

Route::get('/users', [UsersController::class, 'index'])->middleware('auth')->name('users');

Route::get('/users/add', [UsersController::class, 'addUserPage'])->middleware('auth')->name('add-user-page');

Route::get('/login', [LoginController::class, 'index'])->name('login');

Route::get('/products', [ProductsController::class, 'index'])->middleware('auth')->name('products');

Route::get('/products/add', [ProductsController::class, 'addProductPage'])->middleware('auth')->name('add-product-page');

Route::get('/clients', [ClientsController::class, 'index'])->middleware('auth')->name('clients');

Route::get('/clients/add', [ClientsController::class, 'addClientPage'])->middleware('auth')->name('add-client-page');

Route::get('/factories', [FactoriesController::class, 'index'])->middleware('auth')->name('factories');

Route::get('/factories/add', [FactoriesController::class, 'addFactoryPage'])->middleware('auth')->name('add-factory-page');

Route::get('/deliveries', [DeliveriesController::class, 'index'])->middleware('auth')->name('deliveries');

Route::get('/deliveries/add', [DeliveriesController::class, 'addDeliveryPage'])->middleware('auth')->name('add-delivery-page');

// POST actions

Route::post('/login-action', [LoginController::class, 'login'])->name('login-action');


Route::post('/add-user', [UsersController::class, 'addAction'])
    ->middleware('auth')
    ->name('add-user')
    ;


Route::post('/add-delivery', [DeliveriesController::class, 'addAction'])
    ->middleware('auth')
    ->name('add-delivery')
    ;


Route::post('/add-client', [ClientsController::class, 'addAction'])
    ->middleware('auth')
    ->name('add-client')
    ;

Route::post('/add-factory', [FactoriesController::class, 'addAction'])
    ->middleware('auth')
    ->name('add-factory')
    ;

Route::post('/add-product', [ProductsController::class, 'addAction'])
    ->middleware('auth')
    ->name('add-product')
    ;
