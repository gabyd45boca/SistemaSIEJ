<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Dependencia;



class DependenciasController extends Controller
{
    public function __construct(){

        $this->middleware('can:AdministracionDependencias')->only('index');
        $this->middleware('can:AdministracionDependencias')->only('create');
        $this->middleware('can:AdministracionDependencias')->only('edit');
        $this->middleware('can:AdministracionDependencias')->only('destroy');
   
    }
    
    public function index(){

      $dependencias = Dependencia::all();
        
        return view('dependencias',compact('dependencias'));
    }

    public function create(){

      
        $dependencias = Dependencia::all();
       
        return view('dependencias-create',compact('dependencias'));
    }


    public function show($dependencia_id){

        $dependencias = Dependencia::find($dependencia_id);
       
        return view('dependencias-show',compact('dependencias'));
    }

    public function edit($dependencia_id){

      $dependencias = Dependencia::find($dependencia_id);
         
      return view('dependencias-edit',compact('dependencias'));
    } 

    public function store(Request $request){

            $validator = $request -> validate ([
               
            'nombre_dep' =>'required|unique:dependencias',
            'departamental_dep' =>'required',
                                   
            ]);
        
            $dependencias =new Dependencia();
               
            $dependencias->nombre_dep = $request->nombre_dep;
            $dependencias->departamental_dep = $request->departamental_dep;
         
            $dependencias->save();
                  
            return redirect()->route('dependencias')->with('message','Registrado correctamente!');
    }


    public function update(Request $request){

        $validator = $request -> validate ([
          
          'nombre_dep' =>'required|unique:dependencias',
          'departamental_dep' =>'required',
          ]);
    
    
        $dependencias = Dependencia::find($request->dependencia_id);
               
        $dependencias->nombre_dep = $request->nombre_dep;
        $dependencias->departamental_dep = $request->departamental_dep;
        
        $dependencias->save();
    
        return redirect()->route('dependencias')->with('message','Actualizado correctamente!');
      }


      public function destroy($dependencia_id){

        $dependencias = Dependencia::find($dependencia_id);
        $dependencias -> delete();
    
        return redirect()->route('dependencias')->with('message','Eliminado correctamente!');
    
      }
}
