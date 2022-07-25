<?php

use App\Http\Controllers\MenaraController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('dashboard');

Route::get('/table', 'App\Http\Controllers\MenaraController@index')->name('table');
Route::get('/table/create', [MenaraController::class, 'create'])->name('table.create');
Route::post('/table/store', [MenaraController::class, 'store'])->name('table.store');
Route::get('/table/detail/{id}', [MenaraController::class, 'detail'])->name('table.detail');

Route::get('/ubah/{id}','App\Http\Controllers\MenaraController@ubah')->name('ubah');

Route::post('/update','App\Http\Controllers\MenaraController@update')->name('update');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::patch('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::patch('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});

Route::group(['middleware' => 'auth'], function () {
	Route::get('{page}', ['as' => 'page.index', 'uses' => 'App\Http\Controllers\PageController@index']);
});

