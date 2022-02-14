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
/* Auth::routes();

Route::get('/', function () {
    return view('welcome');
}); */

/* Route Frontend */
Route::group(['namespace'=>'Frontend','prefix' => '/', 'as'=>'root'], function () {
    Route::get('/', ['as' => 'index', 'uses' => 'DepanController@index']);
    Route::get('jenjang/{kelas}', ['as'=>'jenjang', 'uses'=>'DepanController@kelas']);
    Route::get('kelas/{mapel}', ['as'=>'kelas', 'uses'=>'DepanController@mapel']);
    Route::get('mapel/{soal}', ['as'=>'mapel', 'uses'=>'DepanController@soal']);
});

/* Route Backend */
Route::get('belakang/login', function(){
	return view('auth.login');
})->middleware('guest'); 

// Routing untuk authentifikasi
Route::group(['namespace' => 'auth'],function(){
	Route::post('/belakang/login','LoginController@login')->name('login');
    Route::get('/belakang/logout',function(){
        Auth::logout();
        return redirect('/belakang/login');
    })->name('logout');
    Route::get('belakang/resetpassword','LoginController@resetpass')->name('belakang.resetpass')->middleware('admin');
    Route::post('resetpassword','LoginController@reset')->name('reset');
});

Route::group(['namespace'=>'Belakang', 'prefix'=>'belakang', 'middleware'=>'admin'], function() {
	Route::get('/', 'DashboardController@index')->name('belakang');
    Route::resource('user', 'UserController');
    Route::resource('jenjang','JenjangController');
    Route::resource('kelas','KelasController');
    Route::resource('mapel', 'MapelController');
    Route::get('mapel/{id}/create', 'MapelController@tambah')->name('mapel.tambah');
    Route::resource('soal','SoalController');
});