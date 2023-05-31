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
Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'Auth\LoginController@login');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');


// Profile
Route::get('/profile', 'ProfileController@index')->name('profile');
Route::get('/profile/edit', 'ProfileController@edit')->name('profile-edit');


// Home | Dashboard
Route::get('/home', 'HomeController@index')->name('home');

// izin
Route::get('/izin', 'IzinController@index')->name('izin');
Route::post('/izin/send', 'IzinController@store');

// User
Route::get('/user', 'UserController@index')->name('user');
Route::get('/create-user', 'UserController@create')->name('create-user');
Route::post('/data-create', 'UserController@store')->name('data-create');


// Rute-rute yang memerlukan peran admin
Route::middleware(['checkrole:admin'])->group(function () {
    
    // User
    Route::get('/create-user', 'UserController@create')->name('create-user');
    Route::post('/data-create', 'UserController@store');
});


// Rute-rute yang tidak boleh diakses oleh siswa
Route::middleware(['PreventSiswaAccess'])->group(function () {
    
    // User
    Route::get('/user', 'UserController@index')->name('user');

    // Monthly Report
    Route::get('/monthly-report', 'HomeController@show')->name('monthly-report');
});


// Rute-rute yang memerlukan peran guru
Route::middleware(['checkrole:guru'])->group(function () {
    
});


// Rute-rute yang memerlukan peran kaprodi
Route::middleware(['checkrole:kaprodi'])->group(function () {
    
});


// Rute-rute yang memerlukan peran siswa
Route::middleware(['checkrole:siswa'])->group(function () {

});

