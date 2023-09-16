<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ForgetResource;
use App\Mail\Subscribe;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ForgetController extends Controller
{
    public function forgot(Request $request)
    {
        $validator =   Validator::make($request->all(), [
            'email' => ['required', 'email'],
        ]);
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()->all()
            ]);
        }
        $user = User::where('email', $request->email)->first();
        if ($user != null) {
            $receiverMail = $request->email;
            $otp = random_int(1000, 9999);
            $user->update([
                'otp' => $otp,
            ]);
            try {
                Mail::to($receiverMail)->send(new Subscribe($receiverMail, $otp));
                return response()->json([
                    'status' => true,
                    "data" => new ForgetResource($user)
                ]);
            } catch (Exception $e) {
                return response()->json([
                    'status' => false,
                    "message" => 'Something Wrong in Server Email'
                ]);
            }
        } else {
            return response()->json([
                'status' => false,
                "message" => 'your email is not coorect'
            ]);
        }
    }

    public function otp($otp)
    {
        $user = User::where('otp', $otp)->first();

        if ($user !== Null) {

            return response()->json([
                'status' => true,
            ]);
        } else {
            return response()->json([
                'status' => false,
            ]);
        }
    }


    public function reset(Request $request, $otp)
    {

        $user = User::where('otp', $otp)->first();
        if ($user !== NULL) {
            $validator = Validator::make($request->all(), [
                'password' => ['required', 'min:8', 'confirmed'],

            ]);
            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'error' => $validator->errors()->all()
                ]);
            }



            $update = $user->update([
                'password' => Hash::make($request->password)
            ]);
            if ($update) {
                $user->update([
                    'otp' => null,
                ]);
                return response()->json([
                    'status' => true,
                    'message' => "Password update successfully",
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'error' => ["Password update faild"],
                ]);
            }
        }else{
            return response()->json([
                'status' => false,
                "message" => 'OTP invalid'
            ]);
        }
    }
}
