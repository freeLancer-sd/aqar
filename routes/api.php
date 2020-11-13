<?php

use App\Models\Property;
use App\Models\PropertyCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('auth/login', 'AuthController@login');
Route::post('auth/register', 'AuthController@register');



Route::resource('users', 'UserAPIController');


Route::resource('property_categories', 'PropertyCategoryAPIController');

Route::resource('properties', 'PropertyAPIController');
Route::post('properties/search', 'PropertyAPIController@search');
Route::get('properties/user/{id}', 'PropertyAPIController@user');
Route::get('property/cats_types', function(){
    return $response = [
        'category'=> PropertyCategory::all()
    ];
});

Route::get('property/images/{id}', function($id){

    $images =  Property::where('id', $id)->first();
    if($images){
        return $images->images;
    }
    return 'error';
});

Route::resource('images', 'ImageAPIController');

Route::resource('sliders', 'SliderAPIController');

Route::resource('conditions', 'ConditionAPIController');