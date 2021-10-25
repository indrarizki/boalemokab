<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VisitorsController extends Controller
{

    public function welcome(){

        return view('visitors.index');
    }

    public function test(){

        return view('visitors.test');
    }
}
