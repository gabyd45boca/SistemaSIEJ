<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TipoDenunciaController extends Controller
{
    public function index(){

        $tipo_denuncias = TipoDenuncia::all();
        return view('tipo_denuncias',compact('tipo_denuncias'));
    }
}
