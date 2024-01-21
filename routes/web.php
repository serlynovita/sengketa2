<?php

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

Route::get('/', function () {
	return view('auth/login');
});
 
Route::get('/pemohon', 'App\Http\Controllers\PemohonController@index')->name('pemohon');

Route::get('/pemohon/tambah', 'App\Http\Controllers\PemohonController@tambah')->name('pemohon-tambah');
 	
Route::post('/pemohon/store', 'App\Http\Controllers\PemohonController@store');

Route::get('/pemohon/edit/{id}', 'App\Http\Controllers\PemohonController@edit')->name('pemohon-edit');

Route::put('/pemohon/update/{id}', 'App\Http\Controllers\PemohonController@update');
	
Route::get('/pemohon/hapus/{id}', 'App\Http\Controllers\PemohonController@delete');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
