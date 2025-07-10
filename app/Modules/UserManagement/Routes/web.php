<?php

use App\Modules\UserManagement\Controllers\PermissionController;
use App\Modules\UserManagement\Controllers\RoleController;
use App\Modules\UserManagement\Controllers\RoleHasPermissionController;
use App\Modules\UserManagement\Controllers\UserController;
use Illuminate\Support\Facades\Route;



Route::middleware(['web', 'auth', 'check.permission'])->group(function () {
    //---------------------------ROLE SECTION ROUTE-----------------------------
    Route::prefix('admin/role')->group(function () {

        Route::get('/', [RoleController::class, 'index'])->name('role.index');
        Route::get('create', [RoleController::class, 'create'])->name('role.create');
        Route::post('store', [RoleController::class, 'store'])->name('role.store');
        Route::get('edit/{id}', [RoleController::class, 'edit'])->name('role.edit');
        Route::get('show/{id}', [RoleController::class, 'show'])->name('role.show');
        Route::put('update/{id}', [RoleController::class, 'update'])->name('role.update');
        Route::delete('destroy/{id}', [RoleController::class, 'delete'])->name('role.destroy');
        Route::get('role-has-permission/{id}', [RoleController::class, 'addPermission'])->name('role.permission');
    });

    //---------------------------PERMISSION SECTION ROUTE-----------------------------
    Route::prefix('admin/permission')->group(function () {
        Route::get('/', [PermissionController::class, 'index'])->name('permission.index');
        Route::get('create', [PermissionController::class, 'create'])->name('permission.create');
        Route::post('store', [PermissionController::class, 'store'])->name('permission.store');
        Route::get('edit/{id}', [PermissionController::class, 'edit'])->name('permission.edit');
        Route::get('show/{id}', [PermissionController::class, 'show'])->name('permission.show');
        Route::put('update/{id}', [PermissionController::class, 'update'])->name('permission.update');
        Route::delete('destroy/{id}', [PermissionController::class, 'delete'])->name('permission.destroy');
    });

    //---------------------------USER  SECTION ROUTE-----------------------------
    Route::prefix('admin/user')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('user.index');
        Route::get('create', [UserController::class, 'create'])->name('user.create');
        Route::post('store', [UserController::class, 'store'])->name('user.store');
        Route::get('edit/{id}', [UserController::class, 'edit'])->name('user.edit');
        Route::get('show/{id}', [UserController::class, 'show'])->name('user.show');
        Route::put('update/{id}', [UserController::class, 'update'])->name('user.update');
        Route::delete('destroy/{id}', [UserController::class, 'delete'])->name('user.destroy');
    });
});
//---------------------------ROLE HAS PERMISSION SECTION ROUTE-----------------------------
Route::prefix('admin/role-has-permission')->group(function () {
    Route::post('store', [RoleHasPermissionController::class, 'store'])->name('role.permission.store');
});
