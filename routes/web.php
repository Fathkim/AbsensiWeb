<?php

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

// Auth
Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login', 'user');
Route::post('/login', 'Auth\LoginController@login');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');


// Profile


// Home | Dashboard
Route::get('/home', 'HomeController@index')->name('home');

// User
Route::get('/user', 'UserController@index')->name('user');
Route::get('/izin', 'IzinController@index')->name('izin');
Route::post('/izin/send', 'IzinController@store');
Route::get('/create-user', 'UserController@create')->name('create-user');
Route::post('/data-create', 'UserController@store');

// Midlleware
Route::middleware(['checkrole:admin'])->group(function () {
    // Rute-rute yang memerlukan peran admin
});

Route::middleware(['checkrole:guru'])->group(function () {
    // Rute-rute yang memerlukan peran guru
});

Route::middleware(['checkrole:kaprodi'])->group(function () {
    // Rute-rute yang memerlukan peran kaprodi
});

Route::middleware(['checkrole:siswa'])->group(function () {
    // Rute-rute yang memerlukan peran siswa
});

