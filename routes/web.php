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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/users/logout', [App\Http\Controllers\Auth\LoginController::class, 'userLogout'])->name('user.logout');
Route::get('/waiting-page', [App\Http\Controllers\HomeController::class, 'getWaitingPage'])->name('waiting-page');

Route::get('/admin/login', [App\Http\Controllers\Auth\AdminLoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [App\Http\Controllers\Auth\AdminLoginController::class, 'login'])->name('admin.login.submit');
Route::get('/admin/editStatus/{id}', [App\Http\Controllers\AdminController::class, 'editUserStatus'])->name('admin.editStatus');
Route::put('/admin/updateStatus/{id}', [App\Http\Controllers\AdminController::class, 'updateStatus'])->name('admin.updateStatus');//this is not the problem
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.dashboard');
Route::get('/admin/logout', [App\Http\Controllers\Auth\AdminLoginController::class, 'logout'])->name('admin.logout'); 

Route::resources(['workshop' => App\Http\Controllers\WorkshopController::class]);
Route::get('search', [App\Http\Controllers\WorkshopController::class, 'search'])->name('search');

Route::get('/appointment/create/{id}', [App\Http\Controllers\AppointmentController::class, 'create'])->name('appointment.create');
Route::get('/appointment/estimate', [App\Http\Controllers\AppointmentController::class, 'estimateCost'])->name('appointment.estimate');
Route::get('/appointment/checkout', [App\Http\Controllers\AppointmentController::class, 'checkout'])->name('appointment.checkout');
Route::post('/appointment/store/{id}', [App\Http\Controllers\AppointmentController::class, 'store'])->name('appointment.store');
Route::get('/appointment/show/{id}', [App\Http\Controllers\AppointmentController::class, 'show'])->name('appointment.show');
Route::delete('/appointment/destroy/{id}', [App\Http\Controllers\AppointmentController::class, 'destroy'])->name('appointment.destroy');



Route::get('/references/index', [App\Http\Controllers\ReferencesController::class, 'index'])->name('references.index');
Route::get('/references/create', [App\Http\Controllers\ReferencesController::class, 'create'])->name('reference.create');
Route::post('/references/store', [App\Http\Controllers\ReferencesController::class, 'store'])->name('reference.store');
Route::get('/references/show/{id}', [App\Http\Controllers\ReferencesController::class, 'show'])->name('reference.show');
Route::get('/references/edit/{id}', [App\Http\Controllers\ReferencesController::class, 'edit'])->name('reference.edit');
Route::post('/references/update/{id}', [App\Http\Controllers\ReferencesController::class, 'update'])->name('reference.update');
Route::get('/references/download/{id}', [App\Http\Controllers\ReferencesController::class, 'getDownload'])->name('reference.letter');
Route::delete('/references/destroy/{id}', [App\Http\Controllers\ReferencesController::class, 'destroy'])->name('reference.remove');

