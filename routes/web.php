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

use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return redirect(route('login'));
});
Auth::routes([
    'verify' => false,
    'confirm' => false,
    'reset' => false

]);
Route::get('/forgot', 'HomeController@index')->name('forgot');
Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
})->name('clear-config');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/payment', 'HomeController@payment')->name('payment');

    Route::group(['middleware' => 'cekPayment'], function () {
        // Kalo udah bayar
        Route::get('/home', 'HomeController@index')->name('home');

        Route::group(['middleware' => ['role:SMP|SMA|SMK']], function () {
            Route::resource('biodata', 'BiodataController')->except('destroy', 'show', 'update', 'edit');
            Route::get('fotoprofil', 'BiodataController@foto')->name('biodata.foto');
            Route::resource('orangtua', 'ParentController')->except('destroy', 'show', 'update', 'edit');
            Route::get('examcard', 'HomeController@examcard')->name('examcard');
            Route::post('examcard', 'HomeController@examcardPost')->name('examcard.post');
            Route::get('information', 'HomeController@information')->name('information');
            Route::get('biaya', 'HomeController@biaya')->name('biaya');
        }); // end route prefix SMP

        Route::group(['middleware' => ['role:Super Admin|Admin']], function () {
            Route::resource('settings', 'SettingController')->except('destroy', 'store', 'create', 'show');
            Route::group(['middleware' => ['role:Super Admin|Admin']], function () {
            }); // end route prefix SuperAdmin
        }); // end route prefix SuperAdmin & Admin
    }); // end checkpayment
}); // end auth

Route::resource('role', 'RoleController')->except('edit', 'update', 'show');
