<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JerarquiaController extends Controller
{
    public function index(){

        $jerarquias = Jerarquia::all();
        return view('jerarquias',compact('jerarquias'));
    }

}
