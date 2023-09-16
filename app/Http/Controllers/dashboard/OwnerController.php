<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class OwnerController extends Controller
{
    public function index()
    {
        $ownerRoleID= Role::where('name', 'owner')->first()['id'];
        $data['Owners'] = User::where('role_id', $ownerRoleID)->get();
        return view('dashboard.users.owner')->with($data);
    }
}
