<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Routing\Controller;
use Nette\Schema\Expect;

class FirstController extends Controller
{
    public function __construct()
    {
        $this ->middleware('auth')->except('showString1');
    }
    //
    public function showString(){
        return '<._.>';
    }
    //
    public function showString1(){
        return '<._.>';
    }
    //
    public function showString2(){
        return '<._.>';
    }
    //
    public function showString3(){
        return '<._.>';
    }
}
