<?php


namespace App\Http\Controllers\API;


use App\User;
use Illuminate\Http\Request;
use Str;

class AuthAPIController
{

    public function login(Request $request)
    {

        $loginData = $request->validate([
            'mobile' => 'required',
            'password' => 'required'
        ]);

        if (!auth()->attempt($loginData)) {
            return response(['message' => 'Invalid Credentials', 'status' => false]);
        }

        $token = Str::random(60);
        auth()->user()->update(['api_token' => $token]);
        return response(['user' => auth()->user(), 'api_token' => $token, 'status' => true]);
    }

    public function register(Request $request)
    {
        try {

            $otp = random_int(1, 200) . random_int(1, 200);
        } catch (\Exception $e) {
        }
        $validatedData = $request->validate([
            'name' => 'required|max:55',
            'mobile' => 'required|max:15|unique:users',
            'email' => 'email|required|unique:users',
            'password' => 'required'
        ]);

        $validatedData['password'] = bcrypt($request->password);
        $validatedData['api_token'] = Str::random(60);
        $validatedData['otp'] = $otp;

        $user = User::create($validatedData);
        return $message = "رمز تفعيل الحساب هو: " . $otp;
//        self::sendSms($request->mobile, $message);

//        return response(['user' => $user, 'api_token' => $validatedData['api_token'], 'status' => true]);

    }

    public function sendSms($phone, $message)
    {
        $userName = env('MSEGAT_USERNAME');
        $userSender = env('MSEGAT_SENDR_NAME');
        $apiKey = env('MSEGAT_APIKEY');
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, "https://www.msegat.com/gw/sendsms.php");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, TRUE);

        curl_setopt($ch, CURLOPT_POST, TRUE);

        $fields = <<<EOT
{
  "userName": $userName,
  "numbers": "966$phone",
  "userSender": "$userSender",
  "apiKey": "$apiKey",
  "msg": "$message"
}
EOT;
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);

        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Content-Type: application/json",));

        $response = curl_exec($ch);
        $info = curl_getinfo($ch);
        curl_close($ch);

        var_dump($info["http_code"]);
        var_dump($response);
    }
}
