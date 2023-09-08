<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    //
    public function frominput(){
        return view('from_input');
    }

    public function Welcome(Request $request){
        $firstname = $request['first_name'];
        $lastname = $request['last_name'];

        return view('pages.welcome', compact('firstname', 'lastname'));
    }
}
