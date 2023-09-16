<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function show(Request $request)
    {

        $access_token = $request->header('Authorization');
        $user = User::where('access_token', "=", $access_token)->first();
        return response()->json([
            'status' => true,
            "data" => new UserResource($user)
        ]);
    }
    public function edit(Request $request)
    {

        $access_token = $request->header('Authorization');
        $user = User::where('access_token', "=", $access_token)->first();

        $validator = Validator::make($request->all(), [
            'username' => ['nullable', 'string'],
            'email' => ['nullable', 'email'],
            'image' => ['nullable', 'image'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors(),
            ]);
        }


        if ($user != null) {
            if ($request->username != Null) {
                $user->update([
                    'username' => $request->username,
                ]);
            }

            if ($request->email != Null) {
                $user->update([
                    'email' => $request->email,
                ]);
            }

            $path = $user->img;


            if ($request->hasFile('image')) {

                if ($path !== Null) {
                    $path = "uploads/users/" . $path;
                    unlink($path);
                    $path2 = $request->file('image');
                    $ext = $path2->getClientOriginalExtension();
                    $filename = time() . '.' . $ext;
                    $path2->move('uploads/users/', $filename);
                    $user->update([
                        'img' =>  $filename,
                    ]);
                } else {
                    $path2 = $request->file('image');
                    $ext = $path2->getClientOriginalExtension();
                    $filename = time() . '.' . $ext;
                    $path2->move('uploads/users/', $filename);
                    $user->update([
                        'img' =>  $filename,
                    ]);
                }
            }

            return response()->json([
                'status' => true,
                'message' => "Your Profile updated successfully",
                "data" => new UserResource($user)
            ]);
        } else {
            return response()->json([
                'status' => false,
                "message" => 'your credientials is not correct'
            ]);
        }
    }



    public function update_password(Request $request)
    {
        $access_token = $request->header('Authorization');
        $user = User::where('access_token', "=", $access_token)->first();

        $validator = Validator::make($request->all(), [
            'old_password' => ['required', 'min:8'],
            'password' => ['required', 'min:8', 'confirmed'],

        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors(),
            ]);
        }


        if ($user != null) {
            $password_Correct = Hash::check($request->old_password, $user->password);
            if ($password_Correct) {
                $user->update([
                    'password' => Hash::make($request->password),
                ]);

                return response()->json([
                    'status' => true,
                    'message' => "Your password updated successfully",
                ]);
            } else {

                return response()->json([
                    'status' => false,
                    "message" => 'Your old password is not correct'
                ]);
            }
        } else {
            return response()->json([
                'status' => false,
                "message" => 'your credientials is not correct'
            ]);
        }
    }

    public function delete(Request $request)
    {

        $access_token = $request->header('Authorization');
        $user = User::where('access_token', "=", $access_token)->first();

        $path = $user->img;
        if ($path !== Null) {
            $path = "uploads/users/" . $path;
            unlink($path);
            $user->update([
                'img' =>  NULL,
            ]);
            return response()->json([
                'status' => true,
                'message' => "Image Deleted successfully",
            ]);
        }else{
            return response()->json([
                'status' => false,
                "message" => 'No image'
            ]);

        }
    }
}
