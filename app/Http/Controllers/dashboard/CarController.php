<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index()
    {
        $data['cars'] = Car::get();
        return view('dashboard.users.borrower')->with($data);
    }
}
