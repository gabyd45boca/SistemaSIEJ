<?php

namespace App\Http\Controllers;
use App\Models\Sumarisima;
use App\Models\Infractor;
use App\Models\Dependencia;
use App\Models\Sancione;


use Illuminate\Http\Request;

class SancionController extends Controller
{
    public function __construct(){

        $this->middleware('can:CrearSancion')->only('create');
        $this->middleware('can:EliminarSancion')->only('destroy');
      
    }  
    
    public function index(){

        $sanciones = Sancione::all();
                 
         return view('sancion',compact('sanciones'));
     }

     public function create(){

        $sanciones = Sancione::all();
        $infractores = Infractor::all();
        $dependencias = Dependencia::all();
       
        return view('sancion-create',compact('sanciones','infractores','dependencias'));
    }

    public function show($sancion_id){

        $sanciones = Sancione::find($sancion_id);

        $infractores = Infractor::all();
        $infractores_ids = $sanciones->infractors()->pluck('infractors.id'); 
       
        return view('sancion-show',compact('sanciones','infractores','infractores_ids'));
    }




}
