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
//     return view('login');
// });

Route::get('/', 'App\Http\Controllers\LoginController@index');

Route::prefix('login')->group(function () {
    Route::get('/', 'App\Http\Controllers\LoginController@index');
    Route::post('/log', 'App\Http\Controllers\LoginController@log');
});

Route::prefix('register')->group(function () {
    Route::get('/', 'App\Http\Controllers\RegisterController@index');
    Route::get('/getData', 'App\Http\Controllers\RegisterController@getData');
    Route::post('/store', 'App\Http\Controllers\RegisterController@store');
});

Route::prefix('dashboard')->group(function () {
    Route::get('/', 'App\Http\Controllers\DashboardController@index');
    Route::get('/getData', 'App\Http\Controllers\DashboardController@getData');
    Route::get('/getAllData', 'App\Http\Controllers\DashboardController@getAllData');
    Route::post('/storeRole', 'App\Http\Controllers\DashboardController@storeRole');
    Route::post('/updateRole', 'App\Http\Controllers\DashboardController@updateRole');
    Route::post('/deleteRole', 'App\Http\Controllers\DashboardController@deleteRole');
    Route::post('/storeUser', 'App\Http\Controllers\DashboardController@storeUser');
    Route::post('/updateUser', 'App\Http\Controllers\DashboardController@updateUser');
    Route::post('/deleteUser', 'App\Http\Controllers\DashboardController@deleteUser');
    Route::get('/logout', 'App\Http\Controllers\DashboardController@logout');
});
