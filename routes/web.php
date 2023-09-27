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
    Route::get('/admin/edituser', [App\Http\Controllers\UsersController::class, 'updatedUser'])->name('admin.edituser');
    Route::post('/admin/save-edit', [App\Http\Controllers\UsersController::class, 'saveEdit'])->name('admin.saveedit');
    Route::put('/admin/user-inactivate', [App\Http\Controllers\UsersController::class, 'inactivateUser'])->name('admin.inactivateUser');
    Route::put('/admin/user-activate', [App\Http\Controllers\UsersController::class, 'activateUser'])->name('admin.activateUser');

});

Route::middleware(['authUser:DOCTOR'])->group(function () {
    Route::get('/doctor/home', [App\Http\Controllers\DoctorController::class, 'index'])->name('doctor.home');
    Route::get('/doctor/register', [App\Http\Controllers\DoctorController::class, 'create'])->name('doctor.registerpatient');
    Route::post('/doctor/store-user', [App\Http\Controllers\DoctorController::class, 'save'])->name('doctor.storepatient');
    Route::get('/doctor/patient' , [App\Http\Controllers\DoctorController::class, 'patient'])->name('doctor.patient');
    Route::delete('/doctor/deleted', [App\Http\Controllers\DoctorController::class, 'deleted'])->name('doctor.deleted');
    Route::get('/doctor/editpatient', [App\Http\Controllers\DoctorController::class, 'updatedPatient'])->name('doctor.editpatient');
    Route::post('/doctor/save-edit', [App\Http\Controllers\DoctorController::class, 'saveEdit'])->name('doctor.saveedit');

});

Route::middleware(['authUser:BOSS_NURSE'])->group( function () {
    Route::get('/boss_nurse/home', [App\Http\Controllers\BossNurseController::class, 'index'])->name('boss_nurse.home');
});

Route::middleware(['authUser:NURSE'])->group(function () {
    Route::get('/nurse/home', [App\Http\Controllers\NurseController::class, 'index'])->name('nurse.home');
});

Route::middleware(['authUser:CARER'])->group(function () {
    Route::get('/carer/home', [App\Http\Controllers\CarerController::class, 'index'])->name('carer.home');
});

Route::middleware(['authUser:INVENTORY'])->group(function () {
    Route::get('/inventory/home', [App\Http\Controllers\InventoryController::class, 'index'])->name('inventory.home');
});
