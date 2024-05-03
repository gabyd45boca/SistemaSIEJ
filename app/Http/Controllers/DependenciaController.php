<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DependenciaController extends Controller
{
    public function index(){

        $dependencias = Dependencia::all();
        return view('expedientes',compact('dependencias'));
    }

}
