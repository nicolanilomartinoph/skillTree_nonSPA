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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/jobs', function() {
    return view('jobs');
});
Route::get('/jobs/{job}', 'JobsController@show');
Route::get('/jobs/{job}/subject', 'SubjectController@show');

Route::post('/addUserJob', 'UserJobController@create')->middleware('auth');
Route::post('/removeUserJob', 'UserJobController@destroy')->middleware('auth');