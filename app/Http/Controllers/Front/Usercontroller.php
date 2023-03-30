<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Routing\Controller as RoutingController;

class UserController extends RoutingController
{
    public function showName(){
        return 'mo is here';
    }

    public function getIndex(){
        return view('welcome');
    }
}

