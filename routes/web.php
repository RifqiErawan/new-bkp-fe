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

Route::get('/', 'PageController@index')->name('home');
Route::get('profile', 'PageController@profile')->name('profile');
Route::get('login', 'AuthenticationController@loginForm')->name('auth.login_form');
Route::post('login_submit', 'AuthenticationController@login')->name('auth.login');
Route::post('logout', 'AuthenticationController@logout')->name('auth.logout');

Route::prefix('admin')->group(function () {
    Route::get('/', 'AdminController@dashboard')->name('admin.dashboard');
    Route::prefix('konselor')->group(function () {
        Route::get('/create', 'AdminController@createKonselor')->name('admin.konselor.create');
        Route::post('/store', 'AdminController@storeKonseor')->name('admin.konselor.store');
    });
    Route::prefix('mahasiswa')->group(function () {
        Route::get('/create', 'AdminController@createMahasiswa')->name('admin.mahasiswa.create');
        Route::post('/store', 'AdminController@storeMahasiswa')->name('admin.mahasiswa.store');
    });
    Route::prefix('pembantu_direktur')->group(function () {
        Route::get('/create', 'AdminController@createPembantuDirektur')->name('admin.pembantu_direktur.create');
        Route::post('/store', 'AdminController@storePembantuDirektur')->name('admin.pembantu_direktur.store');
    });
    Route::prefix('post')->group(function () {
        Route::get('/create', 'AdminController@createPost')->name('admin.post.create');
        Route::post('/store', 'AdminController@storePost')->name('admin.post.store');
    });
});

Route::prefix('konselor')->group(function () {
    Route::get('/', 'KonselorController@dashboard')->name('konselor.dashboard');
    Route::get('/profile', 'KonselorController@profile')->name('konselor.profile');
    Route::get('/feedback', 'KonselorController@feedback')->name('konselor.feedback');
    Route::get('/konseling', 'KonselorController@konselingAll')->name('konselor.konseling');
    Route::post('/konseling/show', 'KonselorController@show')->name('konselor.konseling.show');
    Route::get('/konseling/history', 'KonselorController@history')->name('konselor.konseling.history');
    Route::get('/konseling/create', 'KonselorController@create')->name('konselor.konseling.create');
    Route::get('/konseling/edit', 'KonselorController@edit')->name('konselor.konseling.edit');
    Route::post('/konseling/update', 'KonselorController@update')->name('konselor.konseling.update');
    Route::post('/konseling/store', 'KonselorController@store')->name('konselor.konseling.store');
});

Route::prefix('pembantu_direktur')->group(function () {
    Route::get('/', 'PembantuDirekturController@dashboard')->name('pembantu_direktur.dashboard');
    Route::get('/profile', 'PembantuDirekturController@profile')->name('pembantu_direktur.profile');
});

Route::prefix('mahasiswa')->group(function () {
    Route::get('/', 'MahasiswaController@dashboard')->name('mahasiswa.dashboard');
    Route::get('/profile', 'MahasiswaController@profile')->name('mahasiswa.profile');
    Route::get('/feedback', 'MahasiswaController@feedback')->name('mahasiswa.feedback');
    Route::get('/konseling', 'MahasiswaController@konselingAll')->name('mahasiswa.konseling');
    Route::get('/konseling/history', 'MahasiswaController@history')->name('mahasiswa.konseling.history');
    Route::get('/konseling/create', 'MahasiswaController@create')->name('mahasiswa.konseling.create');
    Route::get('/konseling/edit', 'MahasiswaController@edit')->name('mahasiswa.konseling.edit');
    Route::put('/konseling/update', 'MahasiswaController@update')->name('mahasiswa.konseling.update');
    Route::post('/konseling/store', 'MahasiswaController@store')->name('mahasiswa.konseling.store');
});
