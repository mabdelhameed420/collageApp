<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectBoot extends Controller
{
    public function showLanding(){
        
        return view('landing');
    }
}
