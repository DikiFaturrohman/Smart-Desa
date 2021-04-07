<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('onesignal', 'Backend\API\DataController@onesignal');

Route::namespace('Backend')->prefix('v1')->group(function () {
    Route::post('/register', 'API\RegisterController@registerProccess')->name('backend.api.register');
    Route::post('/profil/update', 'API\RegisterController@updateProfil')->name('backend.api.profil.update')->middleware('auth:api');
    Route::post('/profil/password', 'API\RegisterController@updatePassword')->name('backend.api.profil.password')->middleware('auth:api');
    Route::post('/verifikasi', 'API\RegisterController@verifikasi')->name('backend.api.verifikasi');
    Route::post('/resend-otp', 'API\RegisterController@resendOtp')->name('backend.api.resend');
    Route::post('/forgot-password', 'API\RegisterController@forgotPassword')->name('backend.api.forgot');
    Route::post('/login', 'API\LoginController@login')->name('backend.api.login');
    Route::post('/login-admin', 'API\LoginController@loginAdmin')->name('backend.api.loginAdmin');
    Route::get('/beranda', 'API\DataController@beranda')->name('backend.api.beranda')->middleware('auth:api-admin');
    Route::get('/apps-update', 'API\DataController@cekApps')->name('backend.api.cekApps')->middleware('auth:api');
    Route::get('/apps-update/admin', 'API\DataController@cekAppsAdmin')->name('backend.api.cekAppsAdmin')->middleware('auth:api-admin');
    Route::get('/desa', 'API\DataController@getDesa')->name('backend.api.desa');
    Route::post('/list-surat', 'API\DataController@getListSuratBaru')->name('backend.api.listSurat')->middleware('auth:api-admin');
    Route::post('/verifikasi/surat', 'API\VerifikasiController@verifikasiSurat')->name('backend.api.verifikasiSurat')->middleware('auth:api-admin');
    Route::get('/profil/admin', 'API\ProfilController@index')->name('backend.api.profilAdmin')->middleware('auth:api-admin');
    Route::post('/profil/admin', 'API\ProfilController@update')->name('backend.api.profilAdmin.update')->middleware('auth:api-admin');
    Route::post('/admin/password', 'API\ProfilController@updatePassword')->name('backend.api.admin.password')->middleware('auth:api-admin');
	Route::post('/upload/dokumen','API\DataController@upload')->name('backend.api.upload')->middleware('auth:api-admin');
});
