<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expediente;

class ExpedientesController extends Controller
{
    public function index(){

        $expedientes = Expediente::all();
        return view('expedientes',compact('expedientes'));
    }

    public function create(){

        $expediente = Expediente::all();
        return view('expedientes-create',compact('expediente'));
    }


    public function show($expediente_id){
        $expediente = Expediente::find($expediente_id);
        return view('expedientes-show',compact('expediente'));
    }

    public function store(Request $request){

            $validator = $request -> validate ([
           
            'num_orden_exp'=> 'required|unique:expedientes',
            'fecha_ingreso_exp' => 'required',
            'origen_exp' => 'required',
            'tipo_exp' => 'required',
            'fojas_exp' =>'required',
            'procedencia_exp' => 'required',
            'iniciador_exp' => 'required',
            'extracto_exp' =>'required' ,
            'fecha_salida_exp' =>'required' ,
            'destino_exp' =>'required' ,
                                     
            ]);
        
            $expediente =new Expediente();

            $expediente->num_orden_exp = $request->num_orden_exp;  
            $expediente->fecha_ingreso_exp =  $request->fecha_ingreso_exp; 
            $expediente->origen_exp = $request->origen_exp; 
            $expediente->tipo_exp = $request->tipo_exp; 
            $expediente->fojas_exp =  $request->fojas_exp;
            $expediente->procedencia_exp =  $request->procedencia_exp;
            $expediente->iniciador_exp  = $request->iniciador_exp;
            $expediente->extracto_exp  = $request->extracto_exp; 
            $expediente->fecha_salida_exp =  $request->fecha_salida_exp;
            $expediente->destino_exp  = $request->destino_exp;
            $expediente->observaciones_exp =  $request->observaciones_exp;         
                                 
            $expediente->save();
                  
            return redirect()->route('expedientes')->with('message','Registrado correctamente!');
    }


    public function update(Request $request){

           $validator = $request -> validate ([
            'num_orden_exp'=> 'required',
            'fecha_ingreso_exp' => 'required',
            'origen_exp' => 'required',
            'tipo_exp' => 'required',
            'fojas_exp' =>'required',
            'procedencia_exp' => 'required',
            'iniciador_exp' => 'required',
            'extracto_exp' =>'required' ,
            'fecha_salida_exp' =>'required' ,
            'destino_exp' =>'required' ,
           ]); 
    
    
        $expediente = Expediente::find($request->expediente_id);
    
            $expediente->num_orden_exp = $request->num_orden_exp;  
            $expediente->fecha_ingreso_exp =  $request->fecha_ingreso_exp; 
            $expediente->origen_exp = $request->origen_exp; 
            $expediente->tipo_exp = $request->tipo_exp; 
            $expediente->fojas_exp =  $request->fojas_exp;
            $expediente->procedencia_exp =  $request->procedencia_exp;
            $expediente->iniciador_exp  = $request->iniciador_exp;
            $expediente->extracto_exp  = $request->extracto_exp; 
            $expediente->fecha_salida_exp =  $request->fecha_salida_exp;
            $expediente->destino_exp  = $request->destino_exp;
            $expediente->observaciones_exp =  $request->observaciones_exp;         
       
        $expediente->save();
    
        return redirect()->route('expedientes')->with('message','Actualizado correctamente!');
      }


      public function destroy($expediente_id){

        $expediente = Expediente::find($expediente_id);
        $expediente -> delete();
    
        return redirect()->route('expedientes')->with('message','Eliminado correctamente!');
     }
     
}