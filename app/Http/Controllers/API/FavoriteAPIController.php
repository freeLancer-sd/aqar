<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Models\Favorite;
use Response;

/**
 * Class FavoriteAPIController
 * @package App\Http\Controllers\API
 */

class FavoriteAPIController extends AppBaseController
{
    public function index($userId){
        return $favorite = Favorite::where('user_id', $userId)->get();
    }

    public function getFavorite($userId, $propertyId){
         $favorite = Favorite::where('user_id', $userId)
        ->where('property_id', $propertyId)->count();
        if($favorite){
            return true;
        }
        return false;
    }
    public function saveFavorite($userId, $propertyId){}
    public function deleteFavorite($userId, $propertyId){}
}
