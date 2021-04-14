<?php

use Illuminate\Support\Facades\Route;


Route::post('auth/login', 'AuthAPIController@login');
Route::post('auth/register', 'AuthAPIController@register');
Route::post('auth/resend_otp', 'AuthAPIController@reSendOtpMessage');
Route::get('auth/verify/{id}/{otp}', 'AuthAPIController@verifyAccount');
//resetPassword
Route::post('auth/reset_password', 'AuthAPIController@resetPassword');
Route::post('auth/save_password', 'AuthAPIController@saveNewPassword');

Route::resource('users', 'UserAPIController');
Route::get('user/images/{user}', 'UserAPIController@userImage');


Route::resource('property_categories', 'PropertyCategoryAPIController');

Route::resource('properties', 'PropertyAPIController');
Route::post('properties/search', 'PropertyAPIController@search');
Route::post('properties/filter', 'PropertyAPIController@filterData');
Route::get('properties/user/{id}', 'PropertyAPIController@user');
Route::get('property/cats_types', 'PropertyCategoryAPIController@catType');

Route::get('ads_seen/{id}', 'PropertyAPIController@adsSeen');

Route::get('property/images/{id}', 'PropertyAPIController@getImage');

Route::resource('images', 'ImageAPIController');

Route::resource('sliders', 'SliderAPIController');

Route::resource('conditions', 'ConditionAPIController');

Route::get('seatings', 'SettingAPIController@index');
Route::post('seatings', 'SettingAPIController@updateUser');
Route::resource('cities', 'CityAPIController');
Route::get('count_notifications', 'NotificationsAPIController@count');
Route::get('notifications', 'NotificationsAPIController@index');


Route::resource('districts', 'DistrictAPIController');
Route::get('districts/byCity/{city}', 'DistrictAPIController@byCity');

Route::resource('settings', 'SettingAPIController');

Route::get('favorite/{userId}', 'FavoriteAPIController@index')->name('favorite');
Route::get('get_favorite/{userId}/{propertyId}', 'FavoriteAPIController@getFavorite');
Route::get('delete_favorite/{userId}/{propertyId}', 'FavoriteAPIController@deleteFavorite');
Route::post('save_favorite', 'FavoriteAPIController@saveFavorite');
