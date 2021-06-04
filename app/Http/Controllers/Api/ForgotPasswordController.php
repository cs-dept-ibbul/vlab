<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;

class ForgotPasswordController extends Controller
{
    public function forgot()
    {
        $credentials = request()->validate(['email' => 'required|email']);

        $sendLink = Password::sendResetLink($credentials);

        if ($sendLink == Password::INVALID_USER) {
            return response()->json(["msg" => 'Email not found.']);
        } else if ($sendLink == Password::INVALID_TOKEN) {
            return response()->json(["msg" => 'Invalid token.']);
        } else if ($sendLink == Password::RESET_THROTTLED) {
            return response()->json(["msg" => 'Wait for some minutes.']);
        }

        return response()->json(["msg" => 'Reset password link has been sent to your email address.']);
    }

    public function reset(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'token' => 'required|string',
            'password' => 'required|string|confirmed'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->getMessageBag(), 400);
        }

        $credentials = $request->all();

        $reset_password_status = Password::reset($credentials, function ($user, $password) {
            $user->password = md5($password);
            $user->save();
        });

        if ($reset_password_status == Password::INVALID_TOKEN) {
            return response()->json(["msg" => "Invalid token provided"], 400);
        }

        return response()->json(["msg" => "Password has been successfully changed"]);
    }
}
