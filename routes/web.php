<?php

use GuzzleHttp\Middleware;
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
//     return view('welcome');
// });
Auth::routes();



Route::group(['middleware' => 'auth'], function () {

    // Route::get('/', function () {
    //     return view('admin/index');
    // });

    Route::get('/about', function () {
        return view('about');
    });

    Route::get('/', 'HomeController@index');

    Route::get('siswa', 'SiswaController@index');
    Route::get('siswa/create', 'SiswaController@create');
    Route::get('siswa/{siswa}', 'SiswaController@show');
    Route::post('siswa', 'SiswaController@store');
    Route::get('siswa/{siswa}/edit', 'SiswaController@edit');
    Route::patch('siswa/{siswa}', 'SiswaController@update');
    Route::delete('siswa/{siswa}', 'SiswaController@destroy');
    Route::post('/siswa/{siswa}/addnilai', 'SiswaController@addnilai');
    Route::get('/siswa/{siswa}/{idmapel}/deletenilai', 'SiswaController@deletenilai');


    Route::get('guru', 'GuruController@index');
    Route::get('guru/create', 'GuruController@create');
    Route::get('guru/{guru}', 'GuruController@show');
    Route::post('guru', 'GuruController@store');
    Route::get('guru/{guru}/edit', 'GuruController@edit');
    Route::patch('guru/{guru}', 'GuruController@update');
    Route::delete('guru/{guru}', 'GuruController@destroy');

    Route::get('kelas', 'KelasController@index');
    Route::post('kelas/store', 'KelasController@store');

    Route::get('ekskul', 'EkskulController@index');
    Route::post('ekskul/store', 'EkskulController@store');

    Route::get('pelajaran', 'PelajaranController@index');
    Route::post('pelajaran/store', 'PelajaranController@store');
    
});
