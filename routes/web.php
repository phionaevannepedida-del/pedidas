<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/logout', function () {

    Session::flush();

    return redirect('/login');

})->name('logout');


/*
|--------------------------------------------------------------------------
| Dashboard Route
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', [AuthController::class, 'showDashboard'])->name('dashboard');


/*
|--------------------------------------------------------------------------
| User Routes
|--------------------------------------------------------------------------
*/

Route::get('/users', [UserController::class, 'usersTable'])->name('users');

Route::post('/users', [UserController::class, 'addUser']);

Route::post('/users/update/{id}', [UserController::class, 'updateUser'])
    ->name('users.update');

Route::post('/users/delete/{id}', [UserController::class, 'deleteUser'])
    ->name('users.delete');


/*
|--------------------------------------------------------------------------
| Product Routes
|--------------------------------------------------------------------------
*/

Route::get('/products', [ProductController::class, 'productsTable'])
    ->name('products');

Route::post('/products', [ProductController::class, 'addProduct']);

Route::post('/products/update/{id}', [ProductController::class, 'updateProduct']);

Route::post('/products/delete/{id}', [ProductController::class, 'deleteProduct']);


/*
|--------------------------------------------------------------------------
| Profile Routes
|--------------------------------------------------------------------------
*/

Route::get('/profile', [AuthController::class, 'showProfile'])
    ->name('profile');

Route::post('/profile/update', [AuthController::class, 'updateProfile']);

Route::post('/profile/picture', [AuthController::class, 'updatePicture']);