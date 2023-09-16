<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function switch(Request $request){
        $access_token=$request->header('Authorization');
        $user = User::where('access_token',"=",$access_token)->first();
        $user_role = Role::where('id', $user->role_id)->first()['name'];


        $owner_id = Role::where('name', 'owner')->first()['id'];
        $borrower_id = Role::where('name', 'borrower')->first()['id'];

        if($user_role == 'owner'){
            $new = $user->update([
                'role_id' => $borrower_id
            ]);

        }elseif($user_role == 'borrower'){
            $new = $user->update([
                'role_id' => $owner_id
            ]);
        }

        $new_user_role = Role::where('id', $user->role_id)->first()['name'];        

        return response()->json([
            "status"=>true,
            "message" => "You are now $new_user_role"
        ]);
    }

    public function role(Request $request){

        $access_token=$request->header('Authorization');
        $user = User::where('access_token',"=",$access_token)->first();
        $user_role = Role::where('id', $user->role_id)->first()['name'];
        return response()->json([
            "role" => $user_role
        ]);

    }
}
