<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {

        return view('web.index');
    }

    public function store()
    {

        return view('web.store');
    }

    public function list()
    {

        return view('web.list');
    }

    public function addingcar()
    {

        return view('web.addingcar1');
    }
}
