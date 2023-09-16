<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class BorrowerController extends Controller
{
    public function index()
    {
        $borrowerRoleID= Role::where('name', 'borrower')->first()['id'];
        $data['Borrowers'] = User::where('role_id', $borrowerRoleID)->get();
        return view('dashboard.users.borrower')->with($data);
    }
}
