<?php

use App\Http\Controllers\PermissionCOntrller;
use App\Http\Controllers\RoleContoller;
use App\Http\Controllers\RolePermissionController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserPermissionController;
use Illuminate\Support\Facades\Route;



Route::prefix('cms/admin')->middleware('guest:web')->group(function () {
    Route::get('login', [UserAuthController::class, 'showLogin'])->name('cms.login');
    Route::post('login', [UserAuthController::class, 'login'])->name('login');
});

Route::prefix('cms/admin')->middleware('auth:web')->group(function () {
    Route::view('/', 'main');
    Route::get('logout', [UserAuthController::class, 'logout'])->name('cms.logout');

    Route::get('user', [UserController::class,  'index'])->name('users');
    Route::get('user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('user/store', [UserController::class, 'store'])->name('user.store');

    Route::get('user/{id}/edit', [UserController::class,  'edit'])->name('user.edit');
    Route::post('user/{id}/update', [UserController::class, 'update'])->name('user.update');
    Route::post('user/{id}/destroy', [UserController::class, 'destroy'])->name('user.destroy');

    Route::resource('roles', RoleContoller::class);
    Route::resource('permissions', PermissionCOntrller::class);

    Route::resource('user.permissions', UserPermissionController::class);
    Route::resource('role.permissions', RolePermissionController::class);
});