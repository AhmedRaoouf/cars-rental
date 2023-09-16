<?php

namespace App\Http\Resources;

use App\Models\activation;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $role = Role::where('id', $this->role_id)->select('name')->first()['name'];
        if ($this->img !== NULL){
            $image = asset("uploads/users/$this->img");
        }else{
            $image = 'Not Found';
        }

        $activate = activation::where('user_id', $this->id)->exists();
        if($activate){
            $activation_information = "yes";
        }else{
            $activation_information = "no";
        }

        return [
            'username'=>$this->username,
            'Explore Mode' => $role,
            'email'=>$this->email,
            'phone'=>$this->phone,
            'image'=>$image,
            'token'=>$this->access_token,
            'active'=>$this->active,
            'send_activation_uploads' => $activation_information

        ];
    }
}
