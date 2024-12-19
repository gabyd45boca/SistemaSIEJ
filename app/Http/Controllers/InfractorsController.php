<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Infractor;
use App\Models\Dependencia;
use App\Models\Jerarquia;


class InfractorsController extends Controller
{
      public function __construct(){

        $this->middleware('can:AdministracionInfractores')->only('index');
        $this->middleware('can:AdministracionInfractores')->only('create');
        $this->middleware('can:AdministracionInfractores')->only('edit');
        $this->middleware('can:AdministracionInfractores')->only('destroy');
   
    }
    
    public function index(){

        $infractores = Infractor::all();
        
        return view('infractores',compact('infractores'));
    }

    public function create(){

        $infractores = Infractor::all();
        $dependencias = Dependencia::all();
        $jerarquias = Jerarquia::all();
       
        return view('infractores-create',compact('jerarquias','infractores','dependencias'));
    }


    public function show($infractor_id){

        $infractor = Infractor::find($infractor_id);
       
        return view('infractores-show',compact('infractor'));
    }

    public function edit($infractor_id){

      $infractor = Infractor::find($infractor_id);
      $dependencias = Dependencia::all();
      $jerarquias = Jerarquia::all();

     
      return view('infractores-edit',compact('jerarquias','infractor','dependencias'));
  }

    public function store(Request $request){

            $validator = $request -> validate ([
           
            'apellido_inf' =>'required' ,
            'nombre_inf' =>'required' ,
            'leg_pers_inf' =>'required|unique:infractors' ,
            'dependen_inf' =>'required' ,
            'jerarquia_inf' =>'required' ,
                          
            ]);
        
            $infractors =new Infractor();
               
            $infractors->apellido_inf = $request->apellido_inf;
            $infractors->nombre_inf = $request->nombre_inf;
            $infractors->leg_pers_inf = $request->leg_pers_inf;
            $infractors->dependen_inf = $request->dependen_inf;
            $infractors->jerarquia_inf = $request->jerarquia_inf;
            $infractors->retirado = $request->retirado;
            $infractors->detenido = $request->detenido;
            $infractors->dispon_prev = $request->dispon_prev;
            $infractors->levan_disp_prev = $request->levan_disp_prev;
            $infractors->fecha_disp_prev = $request->fecha_disp_prev;
            $infractors->fecha_lev_disp_prev = $request->fecha_lev_disp_prev;
            $infractors->resol_disp_prev = $request->resol_disp_prev;
            $infractors->resol_levan_disp_prev = $request->resol_levan_disp_prev;
                                                 
            $infractors->save();
                  
            return redirect()->route('infractores')->with('message','Registrado correctamente!');
    }


    public function update(Request $request){

        $validator = $request -> validate ([
          
          'apellido_inf' =>'required',
          'nombre_inf' =>'required',
          'leg_pers_inf' =>'required' ,
          'dependen_inf' =>'required' ,
          'jerarquia_inf' =>'required',
          ]);
    
    
        $infractors = Infractor::find($request->infractor_id);
               
        $infractors->apellido_inf = $request->apellido_inf;
        $infractors->nombre_inf = $request->nombre_inf;
        $infractors->leg_pers_inf = $request->leg_pers_inf;
        $infractors->dependen_inf = $request->dependen_inf;
        $infractors->jerarquia_inf = $request->jerarquia_inf;
        $infractors->retirado = $request->retirado;
        $infractors->detenido = $request->detenido;
        $infractors->dispon_prev = $request->dispon_prev;
        $infractors->levan_disp_prev = $request->levan_disp_prev;
        $infractors->fecha_disp_prev = $request->fecha_disp_prev;
        $infractors->fecha_lev_disp_prev = $request->fecha_disp_prev;
        $infractors->resol_disp_prev = $request->resol_disp_prev;
        $infractors->resol_levan_disp_prev = $request->resol_levan_disp_prev;
        
        $infractors->save();
    
        return redirect()->route('infractores')->with('message','Actualizado correctamente!');
      }


      public function destroy($infractor_id){

        $infractors = Infractor::find($infractor_id);
        $infractors -> delete();
    
        return redirect()->route('infractores')->with('message','Eliminado correctamente!');
    
      }
}
