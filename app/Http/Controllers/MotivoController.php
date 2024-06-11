<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MotivoController extends Controller
{
    public function index(){

        $motivos = Motivo::all();
        return view('motivos',compact('motivos'));
    }
}
