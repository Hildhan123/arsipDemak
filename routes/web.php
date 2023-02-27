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
    return redirect()->route('login');
});

Auth::routes([
    'register' => false, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
  ]);

//home
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/daftar-user', [App\Http\Controllers\HomeController::class, 'daftarUser'])->name('daftarUser');
Route::get('/daftar-arsip', [App\Http\Controllers\HomeController::class, 'daftarArsip'])->name('daftarArsip');

//admin
Route::get('/admin', [App\Http\Controllers\adminController::class, 'dashboard'])->name('admin');
Route::get('/daftar-user/buat', [App\Http\Controllers\adminController::class, 'daftarBuat'])->name('daftarBuat');
Route::post('/daftar-user/buat', [App\Http\Controllers\adminController::class, 'daftarBuatPost'])->name('daftarBuatPost');
Route::get('/daftar-user/edit/{id}', [App\Http\Controllers\adminController::class, 'daftarEdit'])->name('daftarEdit');
Route::post('/daftar-user/edit/{id}', [App\Http\Controllers\adminController::class, 'daftarEditPost'])->name('daftarEditPost');
Route::get('/daftar-user/delete/{id}', [App\Http\Controllers\adminController::class, 'daftarDelete'])->name('daftarDelete');
Route::get('/dari-arsip', [App\Http\Controllers\adminController::class, 'dariArsip'])->name('dariArsip');
Route::get('/dari-arsip/buat', [App\Http\Controllers\adminController::class, 'dariArsipBuat'])->name('dariArsipBuat');
Route::post('/dari-arsip/buat', [App\Http\Controllers\adminController::class, 'dariArsipPost'])->name('dariArsipPost');
Route::get('dari-arsip/delete/{id}', [App\Http\Controllers\adminController::class, 'dariArsipDelete'])->name('dariArsipDelete');

//bupati
Route::get('/bup', [App\Http\Controllers\bupatiController::class, 'dashboard'])->name('bup');

//user
Route::get('/user', [App\Http\Controllers\userController::class, 'dashboard'])->name('user');
Route::get('/daftar-arsip/buat', [App\Http\Controllers\userController::class, 'daftarArsipBuat'])->name('daftarArsipBuat');
Route::post('/daftar-arsip/buat', [App\Http\Controllers\userController::class, 'daftarArsipBuatPost'])->name('daftarArsipBuatPost');
Route::get('/daftar-arsip/edit/{id}', [App\Http\Controllers\userController::class, 'daftarArsipEdit'])->name('daftarArsipEdit');
Route::post('/daftar-arsip/edit/{id}', [App\Http\Controllers\userController::class, 'daftarArsipEditPost'])->name('daftarArsipEditPost');
Route::get('/daftar-arsip/delete/{id}', [App\Http\Controllers\userController::class, 'daftarArsipDelete'])->name('daftarArsipDelete');


