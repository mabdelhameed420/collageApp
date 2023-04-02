<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    
    public function redirect($services){
        return Socialite::driver($services) -> redirect();
    }
    
    public function callback($services){
        Socialite::with($services)-> user();
        return view('home');
    }
}
