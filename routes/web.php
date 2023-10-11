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

Route::middleware(['authUser:DOCTOR,ADMIN'])->group(function () {
    Route::get('/register', [App\Http\Controllers\DoctorController::class, 'create'])->name('registerpatient');
    Route::post('/store-user', [App\Http\Controllers\DoctorController::class, 'save'])->name('storepatient');
    Route::get('/patient' , [App\Http\Controllers\DoctorController::class, 'patient'])->name('patient');
    Route::get('/editpatient', [App\Http\Controllers\DoctorController::class, 'updatedPatient'])->name('editpatient');
    Route::post('/save-edit', [App\Http\Controllers\DoctorController::class, 'saveEdit'])->name('saveedit');
    Route::put('/patient-inactive', [App\Http\Controllers\DoctorController::class, 'inactivePatient'])->name('inactivePatient');
    Route::put('/patient-activate', [App\Http\Controllers\DoctorController::class, 'activePatient'])->name('activePatient');

});

Route::middleware(['authUser:DOCTOR,ADMIN,NURSE,BOSS_NURSE'])->group(function () {
    Route::get('/createactivity', [App\Http\Controllers\DoctorController::class, 'createActivity'])->name('createactivity');
    Route::post('/save-activity', [App\Http\Controllers\DoctorController::class, 'saveActivity'])->name('saveactivity');
    Route::get('/activities', [App\Http\Controllers\DoctorController::class, 'Activities'])->name('activities');
    Route::get('/editactivity', [App\Http\Controllers\DoctorController::class, 'updateActivity'])->name('editactivity');
    Route::post('/save-editactivitiy', [App\Http\Controllers\DoctorController::class, 'saveEditActivity'])->name('saveeditactivity');
    Route::delete('/activity', [App\Http\Controllers\DoctorController::class, 'deleteActivity'])->name('deleteactivity');
    Route::get('/dashboard', [App\Http\Controllers\DoctorController::class, 'dashboardPatient'])->name('dashboardpatient');

});

Route::middleware(['authUser:DOCTOR'])->group(function () {
    Route::get('/doctor/home', [App\Http\Controllers\DoctorController::class, 'index'])->name('doctor.home');
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
