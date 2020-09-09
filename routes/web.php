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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::view('/postjob','postjob');
Route::post('postjob','PostjobController@index');
Route::get('/jobs','PostjobController@list');
Route::get('/deletejobs/{id}','PostjobController@delete');
Route::get('/editjobs/{id}','PostjobController@edit');
Route::post('editjob','PostjobController@update');
Route::get('/findjob','PostjobController@show');
Route::get('/applyjob/{id}','PostjobController@apply');