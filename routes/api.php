<?php

use App\Models\Property;
use App\Models\PropertyCategory;
use App\Models\PropertyType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('auth/login', 'AuthController@login');
Route::post('auth/register', 'AuthController@register');



Route::resource('users', 'UserAPIController');

Route::resource('property_types', 'PropertyTypeAPIController');

Route::resource('property_categories', 'PropertyCategoryAPIController');

Route::resource('properties', 'PropertyAPIController');
Route::get('property/cats_types', function(){
    return $response = [
        'category'=> PropertyCategory::all(),
        'type'=> PropertyType::all()
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