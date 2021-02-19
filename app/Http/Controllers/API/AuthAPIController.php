<?php


namespace App\Http\Controllers\API;


use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
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
        $input['role'] = 2;
        if ($validatedData->fails()) {
            return ['status' => false, 'message' => $validatedData->messages()->first()];
        }
        $user = User::create($input);
        $message = "رمز تفعيل الحساب هو: " . $otp;
        $response = self::sendSms($request->mobile, $message);

        return response(['user' => $user, 'status' => true, 'message' => __('auth.'), 'sms' => $response->code]);

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

    public function reSendOtpMessage(Request $request)
    {
        $user = User::where('id', $request->user_id)->first();
        if ($user) {
            $message = "رمز تفعيل الحساب هو: " . $user->otp;
            $response = self::sendSms($user->mobile, $message);
            if ($response['code'] == 1 || $response['message'] == "Success")
                return true;
        } else {
            return [false, 'message' => 'لم يتم ارسال الرسالة'];
        }
        return false;
    }

    public function resetPassword(Request $request)
    {
        $otp = random_int(1, 200) . random_int(1, 200);
        $message = "رمز استعادة كلمة المرور: $otp";
        $user = User::where('mobile', $request->mobile)->first();
        if ($user) {
            $user->otp = $otp;
            $user->save();
            $response = self::sendSms($request->mobile, $message);
            if ($response['code'] == 1 || $response['message'] == "Success")
                return true;
        } else {
            return [false, 'message' => 'لم يتم ارسال الرسالة'];
        }
        return false;
    }

    public function saveNewPassword(Request $request)
    {
        $user = User::where('mobile', $request->mobile)
            ->where('otp', $request->otp)
            ->first();
        if ($user) {
            $user->password = bcrypt($request->password);
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
        $fields = array(
            "userName" => "$userName",
            "numbers" => "966$phone",
            "userSender" => "$userSender",
            "apiKey" => "$apiKey",
            "msg" => "$message");

        return $response = Http::post('https://www.msegat.com/gw/sendsms.php', $fields);
    }
}
