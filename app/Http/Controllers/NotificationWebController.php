<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\Message;
use Illuminate\Http\Request;
use Flash;

class NotificationWebController extends Controller
{

    public function index(){
        $messages = Message::all(); 
        return view('notifications.index', compact('messages'));
    }


    public function create(){
        return view('notifications.create');
    }



    public function store(Request $request){
         $fcm = $request->fcm;
         $message = Message::create($request->all());
         if($fcm){
            Flash::success(__('lang.messages.saved', ['model' => __('models/notifications.singular')]));
             $this->sendNotification($request);
         }
        return redirect(route('notifications.index'));
    }


    /**
     * Write code on Method
     *
     * @return response()
     */
    public function saveToken(Request $request)
    {
        auth()->user()->update(['device_token' => $request->token]);
        return response()->json(['token saved successfully.']);
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function sendNotification(Request $request)
    {
        // $firebaseToken = User::whereNotNull('device_token')->pluck('device_token')->all();

        $SERVER_API_KEY = env('FIREBASE_SERVER_KEY');

        $data = [
            "to" => '/topics/all',
            "notification" => [
                "title" => $request->title,
                "body" => $request->message,
            ]
        ];
        $dataString = json_encode($data);

        $headers = [
            'Authorization: key=' . $SERVER_API_KEY,
            'Content-Type: application/json',
        ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);

        $response = curl_exec($ch);

        dd($response);
    }
}