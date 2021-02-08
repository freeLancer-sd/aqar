<?php


namespace App\Http\Controllers\API;


use App\Http\Controllers\Controller;
use App\Http\Requests\API\CreateAuthUserAPIRequest;
use App\User;
use Illuminate\Http\Request;
use Str;
use Validator;

class AuthAPIController extends Controller
{

    public function login(Request $request)
    {

        $loginData = $request->validate([
            'mobile' => 'required',
            'password' => 'required'
        ]);

        if (!auth()->attempt($loginData)) {
            return response(['message' => __('auth.failed'), 'status' => false]);
        }

        $token = Str::random(60);
        auth()->user()->update(['api_token' => $token]);
        return response(['user' => auth()->user(), 'api_token' => $token, 'status' => true]);
//        return $this->sendSms("544249999", 'Test Otp');
    }

    public function register(Request $request)
    {
        $otp = random_int(1, 200) . random_int(1, 200);
        $input = $request->all();
        $validatedData = Validator::make($request->all(), [
            'name' => 'required|max:55',
            'mobile' => 'required|max:15|unique:users',
            'email' => 'email|unique:users',
            'password' => 'required'
        ]);

        $input['password'] = bcrypt($request->password);
        $input['otp'] = $otp;
        $input['status'] = 2;
        if ($validatedData->fails()) {
            return ['status' => false, 'message' => $validatedData->messages()->first()];

//        return $message = "رمز تفعيل الحساب هو: " . $otp;
//        self::sendSms($request->mobile, $message);
        }
        $user = User::create($input);

        return response(['user' => $user, 'status' => true]);

    }

    public function verifyAccount($id, $otp)
    {
        $user = User::where('id', $id)->where('otp', '=', $otp)->first();
        if ($user) {
            $user->status = 1;
            $user->save();
            return true;
        }
        return false;
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

//        var_dump($info["http_code"]);
//        var_dump($response);
        return $response;
    }
}
