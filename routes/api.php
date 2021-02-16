<?php

use App\Models\City;
use App\Models\District;
use App\Models\Property;
use App\Models\PropertyCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
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
Route::get('property/cats_types', function () {
    return $response = [
        'category' => PropertyCategory::where('status', 1)->get(),
        'all_category' => PropertyCategory::all(),
        'city' => City::all(),
        'district' => District::all()
    ];
});

Route::get('ads_seen/{id}', function ($id) {
    $property = Property::find($id);
    $property->seen = $property->seen + 1;
    $property->timestamps = false;
    $property->save();
});

Route::get('property/images/{id}', function ($id) {

    $images = Property::where('id', $id)->first();
    if ($images) {
        return $images->images;
    }
    return 'error';
});

Route::resource('images', 'ImageAPIController');

Route::resource('sliders', 'SliderAPIController');

Route::resource('conditions', 'ConditionAPIController');

Route::get('seatings', 'SettingAPIController@index');
Route::post('seatings', 'SettingAPIController@updateUser');

Route::resource('cities', 'CityAPIController');

Route::resource('districts', 'DistrictAPIController');
Route::get('districts/byCity/{city}', 'DistrictAPIController@byCity');

Route::resource('settings', 'SettingAPIController');
