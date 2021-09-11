<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/users/logout', [App\Http\Controllers\Auth\LoginController::class, 'userLogout'])->name('user.logout');
Route::get('/waiting-page', [App\Http\Controllers\HomeController::class, 'getWaitingPage'])->name('waiting-page');

Route::get('/admin/login', [App\Http\Controllers\Auth\AdminLoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [App\Http\Controllers\Auth\AdminLoginController::class, 'login'])->name('admin.login.submit');

Route::get('/admin/editStatus/{id}', [App\Http\Controllers\AdminController::class, 'editUserStatus'])->name('admin.editStatus');
Route::put('/admin/updateStatus/{id}', [App\Http\Controllers\AdminController::class, 'updateStatus'])->name('admin.updateStatus');//this is not the problem
// Route::get('/user/institutions', 'AdminControllerr@updateStatus')->name('admin.updateStatus');

Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.dashboard');

Route::get('/admin/logout', [App\Http\Controllers\Auth\AdminLoginController::class, 'logout'])->name('admin.logout'); 