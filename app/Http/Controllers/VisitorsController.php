<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VisitorsController extends Controller
{

    public function welcome(){

        return view('visitors.index');
    }
    public function view_perizinan(){
        return view('visitors.home');
    }

}
