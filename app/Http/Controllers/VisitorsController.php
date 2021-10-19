<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VisitorsController extends Controller
{
    public function __construct()
    {
        $this->middleware('role');
    }

    public function index(){

        return view('visitors.index');
    }
}
