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
Route::get('/profile', 'ProfileController@index')->name('profile');
Route::get('/profile/edit/{id}', 'ProfileController@edit')->name('profile');
Route::put('/profile/send/{id}', 'ProfileController@update')->name('profile');


// Home | Dashboard
Route::get('/home', 'HomeController@index')->name('home');

// izin
Route::get('/izin', 'IzinController@index')->name('izin');
Route::post('/izin/send', 'IzinController@store');


// kaprodi view
Route::get('/kaprodi/edit/{id}', 'KaprodiController@edit')->name('edit-kaprodi');
Route::get('/kaprodi/show/{id}', 'KaprodiController@show')->name('show-kaprodi');
Route::get('/kaprodi-biodata', 'KaprodiController@create')->name('create-view');

// Kaprodi Route Action Form
Route::put('/kaprodi/update/{id}', 'KaprodiController@update')->name('update-kaprodi');
Route::delete('/delete-kaprodi/{id}', 'KaprodiController@clear')->name('delete-kaprodi');
Route::post('/kaprodi-create-biodata', 'KaprodiController@store')->name('create-kaprodi');

// Guru View
Route::get('/guru/edit/{id}', 'GuruController@edit')->name('edit-kaprodi');
Route::get('/guru/show/{id}', 'GuruController@show')->name('show-kaprodi');

// Guru Route Action Form
Route::put('/guru/update/{id}', 'GuruController@update')->name('update-guru');
Route::delete('/delete-guru/{id}', 'GuruController@delete')->name('delete-guru');
Route::post('/guru-create-biodata', 'GuruController@store')->name('create-guru');

// Siswa View
Route::get('/siswa/edit/{id}', 'SiswaController@edit')->name('edit-kaprodi');

// Siswa Route Action Form
Route::put('/siswa/update/{id}', 'SiswaController@update')->name('update-siswa');
Route::delete('/delete-siswa/{id}', 'SiswaController@delete')->name('delete-siswa');

// admin denined
Route::middleware(['PreventAdminAccess'])->group(function () {
    
    
});

// Rute-rute yang memerlukan peran admin
Route::middleware(['checkrole:admin'])->group(function () {
    
    // view user
    Route::get('/kaprodi', 'KaprodiController@kaprodi')->name('kaprodi');
    Route::get('/guru', 'GuruController@guru')->name('guru');
    Route::get('/siswa', 'SiswaController@siswa')->name('siswa');
    
    // View User
    Route::get('/create-user', 'UserController@create')->name('create-user');
    // mapel
    Route::post('/mapel-create', 'UserController@mapelStore');
    // User Action
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