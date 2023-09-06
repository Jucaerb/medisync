<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Auth::routes();
Route::get('/', function () {
    return redirect(route('home'));
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['authUser:ADMIN'])->group( function () {
    Route::get('/admin/home', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.home');
    Route::get('/admin/register', [App\Http\Controllers\UsersController::class, 'create'])->name('admin.registeruser');
    Route::post('/admin/store-user', [App\Http\Controllers\UsersController::class, 'save'])->name('admin.storeuser');
    Route::get('/admin/users', [App\Http\Controllers\UsersController::class, 'user'])->name('admin.users');
});

Route::middleware(['authUser:DOCTOR'])->group(function () {
  Route::get('/doctor/home', [App\Http\Controllers\DoctorController::class, 'index'])->name('doctor.home');
});
