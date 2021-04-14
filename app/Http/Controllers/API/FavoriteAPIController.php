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
         $favorite = Favorite::where('user_id', $userId)
         ->with('property')
       ->get();
        return response()->json(['data'=> $favorite]);
    }

    public function getFavorite($userId, $propertyId){
         $favorite = Favorite::where('user_id', $userId)
        ->where('property_id', $propertyId)->count();
        if($favorite){
            return response()->json(true);
        }
        return response()->json(false);
        }

    public function saveFavorite(Request $request){
        $favorite = new Favorite();
        $favorite->user_id = $request->userId;
        $favorite->property_id = $request->propertyId;
        $favorite->save();
        if($favorite){
        return response()->json(true);
        }
        return response()->json(false);
    }

    public function deleteFavorite($userId, $propertyId){
        $favorite = Favorite::where('user_id', $userId)
        ->where('property_id', $propertyId);
        $favorite= $favorite->delete();
        if($favorite){
            return response()->json(true);
        }
        return response()->json(false);
        
    }
}
