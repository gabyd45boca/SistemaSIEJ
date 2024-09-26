<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expediente;
use App\Models\Dependencia;
use App\Models\TipoDenuncia;
class ExpedientesController extends Controller
{
    public function __construct(){

        $this->middleware('can:AdministracionExpedientes')->only('index');
        $this->middleware('can:AdministracionExpedientes')->only('create');
        $this->middleware('can:AdministracionExpedientes')->only('edit');
        $this->middleware('can:AdministracionExpedientes')->only('destroy');
    
       
    }

     //////////////////////////////////////////////////////////////////
    /////////   REINGRESOS ///////////////////////////////////////////
    //////////////////////////////////////////////////////////////////

    public function mostrarFormularioReingreso($id)
      {
          // Encontrar el sumario original
          $expedientes = Expediente::findOrFail($id);
          ////////////
          //$sumario = Sumario::find($sumario_id);
          $dependencias = Dependencia::all();
          $tipo_denuncias = TipoDenuncia::all();
         // Mostrar la vista con el formulario para crear un reingreso
         return view('expedientes-create-reingreso',compact('tipo_denuncias',
          'expedientes','dependencias'));
      }
    
    
      public function storeReingreso(Request $request, $id)
      {
          // Encontrar el expediente original
          $expedienteOriginal = Expediente::findOrFail($id);
          $nuevoExpediente = $expedienteOriginal->crearReingreso($request->all());
                 
           //dd($request->all());              
          return redirect()->route('expedientes')->with('message','Registrado correctamente!');
     
      }

    public function index(){

        $expedientes = Expediente::all();
        return view('expedientes',compact('expedientes'));
    }

    public function create(){
        $dependencias = Dependencia::all();
        $tipo_denuncias = TipoDenuncia::all();

        $expediente = Expediente::all();
        return view('expedientes-create',compact('tipo_denuncias','expediente','dependencias'));
    }


    public function show($expediente_id){
        $expediente = Expediente::find($expediente_id);
        return view('expedientes-show',compact('expediente'));
    }


    public function edit($expediente_id){

        $dependencias = Dependencia::all();
        $tipo_denuncias = TipoDenuncia::all();

        $expediente = Expediente::find($expediente_id);
        return view('expedientes-edit',compact('tipo_denuncias','expediente','dependencias'));
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
           // 'tipo_exp' => 'required',
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