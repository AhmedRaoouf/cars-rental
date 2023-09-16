<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Car_User;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $ownerRoleID= Role::where('name', 'owner')->first()['id'];
        $data['Owners'] = User::where('role_id', $ownerRoleID)->count();

        $borrowerRoleID= Role::where('name', 'borrower')->first()['id'];
        $data['Borrowers'] = User::where('role_id', $borrowerRoleID)->count();

        $data['cars'] = Car::count();
        $data['rentCars'] = Car_User::where('status','confirmed')->count();
        $data['waitingRentCars'] = Car_User::where('status','waiting')->count();


        return view('dashboard.index')->with($data);
    }
}
