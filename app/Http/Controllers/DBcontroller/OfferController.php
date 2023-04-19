<?php

namespace App\Http\Controllers\DBcontroller;

use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class OfferController extends Controller
{
    public function create(){
        return view('offers.create');
    }

    public function store(Request $request){
        // Offer::create([

        // ]);

        Offer::create([
            'name'=>$request->name,
            'price'=>$request->price,
            'details'=>$request->details,
        ]);

        return "store successfully";
    }

    public function getAllOffers(){
        return Offer::get();
    }
}
