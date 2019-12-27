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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware'=> 'auth'],function(){
});

Route::group(['middleware'=> 'auth'],function(){
});
//structure Routes
Route::group(['middleware'=> 'auth'],function(){
  Route::resource('structure','\App\Http\Controllers\StructureController');
  Route::post('structure/{id}/update','\App\Http\Controllers\StructureController@update');
  Route::get('structure/{id}/delete','\App\Http\Controllers\StructureController@destroy');
  Route::get('structure/{id}/deleteMsg','\App\Http\Controllers\StructureController@DeleteMsg');
});

Route::group(['middleware'=> 'auth'],function(){
});

Route::group(['middleware'=> 'auth'],function(){
});
Route::group(['middleware'=> 'auth'],function(){
});
//personnel Routes
Route::group(['middleware'=> 'auth'],function(){
  Route::resource('personnel','\App\Http\Controllers\PersonnelController');
  Route::post('personnel/{id}/update','\App\Http\Controllers\PersonnelController@update');
  Route::get('personnel/{id}/delete','\App\Http\Controllers\PersonnelController@destroy');
  Route::get('personnel/{id}/deleteMsg','\App\Http\Controllers\PersonnelController@DeleteMsg');
});

//personnel_cnej Routes
Route::group(['middleware'=> 'auth'],function(){
  Route::resource('personnel_cnej','\App\Http\Controllers\Personnel_cnejController');
  Route::post('personnel_cnej/{id}/update','\App\Http\Controllers\Personnel_cnejController@update');
  Route::get('personnel_cnej/{id}/delete','\App\Http\Controllers\Personnel_cnejController@destroy');
  Route::get('personnel_cnej/{id}/deleteMsg','\App\Http\Controllers\Personnel_cnejController@DeleteMsg');
});

//pole Routes
Route::group(['middleware'=> 'auth'],function(){
  Route::resource('pole','\App\Http\Controllers\PoleController');
  Route::post('pole/{id}/update','\App\Http\Controllers\PoleController@update');
  Route::get('pole/{id}/delete','\App\Http\Controllers\PoleController@destroy');
  Route::get('pole/{id}/deleteMsg','\App\Http\Controllers\PoleController@DeleteMsg');
});

//thematique Routes
Route::group(['middleware'=> 'auth'],function(){
  Route::resource('thematique','\App\Http\Controllers\ThematiqueController');
  Route::post('thematique/{id}/update','\App\Http\Controllers\ThematiqueController@update');
  Route::get('thematique/{id}/delete','\App\Http\Controllers\ThematiqueController@destroy');
  Route::get('thematique/{id}/deleteMsg','\App\Http\Controllers\ThematiqueController@DeleteMsg');
});
