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


Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->middleware('verified');

Route::view('/bulksms', 'test.bulksms');
Route::post('/bulksms', 'BulkSmsController@sendSms');


Route::resource('users', 'UserController');

Route::resource('propertyTypes', 'PropertyTypeController');

Route::resource('propertyCategories', 'PropertyCategoryController');

Route::resource('properties', 'PropertyController');

Route::resource('images', 'ImageController');

Route::resource('propertyTypes', 'PropertyTypeController');

Route::resource('propertyCategories', 'PropertyCategoryController');