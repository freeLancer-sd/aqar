<?php


namespace App\Http\Controllers\API;

use App\Http\Controllers\AppBaseController;
use App\Models\Message;


/**
 * Class NotificationsAPIController
 * @package App\Http\Controllers\API
 */
class NotificationsAPIController extends AppBaseController
{

    public function index()
    {
        $message = Message::all();
        if (!empty($message) ) {
            return response()->json([
                'data' => $message,
                'status' => true
            ]);
        }
        return ['data' => null, 'status' => false];
    }

    public function count()
    {
        $count = Message::all()->count();
        if (!empty($count)) {
            return response()->json([
                'data' => $count,
                'status' => true
            ]);
        }
        return ['data' => null, 'status' => false];
    }
}
