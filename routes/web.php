<?php
use App\Http\Controllers\Admin\AdminLayotController;
use Illuminate\Support\Facades\Route;

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::controller(AdminLayotController::class)->group(function () {
    Route::get('/admin/dashboard', 'AdminLayout')->name('adminLayout');
});

Route::get('/', function () {
    return redirect()->route('home');
});
