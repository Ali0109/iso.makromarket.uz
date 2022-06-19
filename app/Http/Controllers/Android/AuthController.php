<?php

namespace App\Http\Controllers\Android;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\SmsService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function registerTemp(Request $request)
    {
        $request->validate([
            'phone' => 'required|digits:12',
        ]);
        $phone = $request->input('phone');
        if (isset($phone) && substr($phone, 0, 3) == 998) {
               $send_sms = SmsService::sendSms($phone);
            $send_sms = [
                'rand_val' => rand(100000, 999999),
                'phone' => $request->phone,
            ];
            return response($send_sms, '200');
        }
        return response('Input correct phone number', '403');
    }

    public function register(Request $request, $phone)
    {
        if (!isset($phone) || substr($phone, 0, 3) != 998 || strlen($phone) != 12) {
            return response([
                'message' => 'Bad creds',
            ], 401);
        }

        $date = Carbon::now()->toDateTimeString();
        $fields = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'phone' => '',
        ]);

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'phone' => $phone,
        ]);

        $user_data = User::where('phone', $phone)->first();
        $token = $user_data->createToken("$user_data")->plainTextToken;
        $request->headers->add(['Authorization' => 'Bearer '. $token]);


        $message = [
            'token' => $token,
            'id' => $user_data->id
        ];

        return response($message, 201);
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();

        return [
            'message' => 'Logged out',
        ];
    }

    public function login(Request $request)
    {
        $fields = $request->validate([
            'phone' => 'required',
        ]);

        $user = User::where('phone', $fields['phone'])->first();
        if (!$user || $fields['phone'] != $user->phone) {
            return response([
                'message' => 'This user not registered',
            ], 401);
        }

        $token = $user->createToken("$user")->plainTextToken;
        $request->headers->add(['Authorization' => 'Bearer '. $token]);

        $response = [
            'token' => $token,
            'id' => $user->id,
        ];
        return response($response, '201');
    }

    public function check() {
        $expiration_lifetime = config('sanctum.expiration');
        $date = date('Y-m-d H:i:s');

        return response("You are authorized!", 200);
    }
}
