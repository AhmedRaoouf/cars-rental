<?php

namespace App\Http\Controllers\Api;



use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Laravel\Socialite\Facades\Socialite;


class AuthController extends Controller
{

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "user_type"     => ["required", 'in:owner,borrower'],
            "username"     => ["required", 'string', 'unique:users'],
            "email"  => ['required', 'string', 'email', 'unique:users'],
            "phone"    => ['required', 'string', 'unique:users'],
            "password"  => ['required', 'string', 'confirmed'],
            "image" => ['nullable', 'image'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                "status" => false,
                "message" => $validator->errors()->all()
            ] );
        }
     
        $access_token = Str::random(64);
        $role_id = Role::where('name', $request->user_type)->select('id')->first()->id;

        if ($request->hasFile('image')) {
            $path = $request->file('image');
            $ext = $path->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $path->move('uploads/users/', $filename);


            $new_account = User::create([
                'role_id' => $role_id,
                'username'      => $request->username,
                'email'         => $request->email,
                'phone'         => $request->phone,
                'password'      => Hash::make($request->password),
                'img' => $filename,
                'access_token'  => $access_token
            ]);
        }else{
            $new_account = User::create([
                'role_id' => $role_id,
                'username'      => $request->username,
                'email'         => $request->email,
                'phone'         => $request->phone,
                'password'      => Hash::make($request->password),
                'access_token'  => $access_token
            ]);

        }


        if ($new_account) {
            return response()->json([
                "status" => true,
                'message' => "you are successfully registered",
                "data" => new UserResource($new_account)
            ]);
        } else {
            return response()->json([
                'message' => "you are failed registered"
            ]);
        }
    }


    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username_or_email' => ['required', 'string',],
            'password' => ['required', 'string']
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'error' => $validator->errors()->all(),
            ]);
        }
        $user = User::where('email', $request->username_or_email)->orWhere('username', $request->username_or_email)->first();


        if ($user !== null) {
            $password_Correct = Hash::check($request->password, $user->password);
            if ($password_Correct) {
                $access_token = Str::random(64);

                $user->update([
                    'access_token' => $access_token,
                ]);
                return response()->json([
                    'status' => true,
                    'message' => "Logged in successfully",
                    "data" => new UserResource($user)
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'error' => ['The password is incorrect'],
                ]);
            }
        } else {
            return response()->json([
                'status' => false,
                'error' => ['The password is incorrect'],
            ]);
        }
    }


    public function logout(Request $request)
    {
        $access_token = $request->header('Authorization');

        $user = User::where('access_token', "=", $access_token)->first();
        // dd($user);

        $user->update([
            'access_token' => Null
        ]);
        return response()->json([
            'status' => true,
            'message' => 'Logged out Successfully ',
        ]);
    }


    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback(Request $request)
    {
        $userData = Socialite::driver('google')->user();

        $user = User::where('email', $userData->email)->first();
        if ($user) {
            $access_token = Str::random(64);
            $user->update([
                'access_token' => $access_token,
            ]);

            return response()->json([
                'status' => "true",
                'message' => "success",
                'access_token' => $access_token

            ]);
        } else {
            //do register
            $access_token = Str::random(64);
            $uuid = Str::uuid()->toString();
            $user = new User();
            $user->name = $userData->name;
            $user->email  = $userData->email;
            $user->country  = $userData->country;
            $user->password = Hash::make($uuid . now());
            $user->access_token = $access_token;
            $user->save();
            return response()->json([
                'status' => "true",
                'message' => "success",
                'access_token' => $access_token
            ]);
        }

    }

    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookCallback(Request $request)
    {
        $userData = Socialite::driver('facebook')->user();
    
        $user = User::where('email', $userData->email)->first();


        if ($user) {
            $access_token = Str::random(64);
            $user->update([
                'access_token' => $access_token,
            ]);


            return response()->json([
                'status' => "true",
                'message' => "success",
                'access_token' => $access_token
            ]);
        } else {
            //do register
            $access_token = Str::random(64);
            $uuid = Str::uuid()->toString();
            $user = new User();
            $user->name = $userData->name;
            $user->email  = $userData->email;
            $user->country  = $userData->country;
            $user->password = Hash::make($uuid . now());
            $user->access_token = $access_token;
            $user->save();


            return response()->json([
                'status' => "true",
                'message' => "success",
                'access_token' => $access_token,
            ]);
        }
    }
}
