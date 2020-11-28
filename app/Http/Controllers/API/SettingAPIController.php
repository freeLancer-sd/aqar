<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SettingAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return Setting::all()->first();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {

    }

    /**
     * updateUser a update users resource.
     *
     * @param Request $request
     * @return Response
     */
    public function updateUser(Request $request)
    {
        $user = User::find($request->user_id);
        if ($user) {
            $user->device_token = $request->device_token;
            $user->save();
            return true;
        } else {
            return false;
        }
    }

}
