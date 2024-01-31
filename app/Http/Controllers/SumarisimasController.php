<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sumarisima;
use App\Models\Infractor;

class SumarisimasController extends Controller
{

  public function __construct(){

    $this->middleware('can:CrearSumarisima')->only('create');
    $this->middleware('can:EliminarSumarisima')->only('create');
   
}     
    public function index(){

       $sumarisimas = Sumarisima::all();
        //$sumarisimas = Sumarisima::with(['infractors'])->get();
       
        return view('sumarisimas',compact('sumarisimas'));
    }

    public function create(){

        $sumarisimas = Sumarisima::all();
        $infractores = Infractor::all();
       
        return view('sumarisimas-create',compact('sumarisimas','infractores'));
    }

    public function show($sumarisima_id){

        $sumarisima = Sumarisima::find($sumarisima_id);

        $infractores = Infractor::all();
        $infractores_ids = $sumarisima->infractors()->pluck('infractors.id'); 
       
        return view('sumarisimas-show',compact('sumarisima','infractores','infractores_ids'));
    }

    public function edit($sumarisima_id){

      $sumarisima = Sumarisima::find($sumarisima_id);

      $infractores = Infractor::all();
      $infractores_ids = $sumarisima->infractors()->pluck('infractors.id'); 
     
      return view('sumarisimas-edit',compact('sumarisima','infractores','infractores_ids'));
  }

    public function store(Request $request)  {
        $validator = $request -> validate ([
          'num_dj'=> 'required|unique:sumarisimas',
          'fecha_ingreso' => 'required',
          'fojas' =>'required',
          'motivo' => 'required',
          'destino_proced'=> 'required',
          'tipo_denuncia' => 'required',
                        
        ]);
    
        $sumarisima = new Sumarisima();
    
        $sumarisima->num_dj  = $request->num_dj;
        $sumarisima->fecha_ingreso = $request->fecha_ingreso;
        $sumarisima->fojas  = $request->fojas;
        $sumarisima->tipo_denuncia  = $request->tipo_denuncia;
        $sumarisima->motivo = $request->motivo;
        $sumarisima->destino_proced = $request->destino_proced;
    
       /* $sumarisima->apellido_nombre_inf = $request->apellido_nombre_inf;
        $sumarisima->leg_pers_inf = $request->leg_pers_inf;
        $sumarisima->dependen_inf = $request->dependen_inf;
        $sumarisima->jerarquia_inf = $request->jerarquia_inf;
        $sumarisima->retirado = $request->retirado;
        $sumarisima->detenido = $request->detenido;
        $sumarisima->dispon_prev = $request->dispon_prev;
        $sumarisima->levant_dispon_prev = $request->levant_dispon_prev;
        $sumarisima->fecha_disp_prevent = $request->fecha_disp_prevent;
        $sumarisima->fecha_levan_disp_prev = $request->fecha_levan_disp_prev;
        $sumarisima->resol_disp_prev = $request->resol_disp_prev;
        $sumarisima->resol_levan_disp_prev = $request->resol_levan_disp_prev;*/
    
        $sumarisima->apellido_nombre_AL = $request->apellido_nombre_AL;
        $sumarisima->leg_pers_AL = $request->leg_pers_AL;
        $sumarisima->jerarquia_AL = $request->jerarquia_AL;
        $sumarisima->dependen_AL = $request->dependen_AL;
    
        $sumarisima->fecha_mov = $request->fecha_mov;
        $sumarisima->destino_pase = $request->destino_pase;
        $sumarisima->primera_interv = $request->primera_interv;
        $sumarisima->tipo_mov = $request->tipo_mov;
        $sumarisima->observaciones = $request->observaciones;
        $sumarisima->fecha_reingreso = $request->fecha_reingreso;
        $sumarisima->opinion_final = $request->opinion_final;
        $sumarisima->fecha_egreso = $request->fecha_egreso;
                    
        $sumarisima->save();

        $sumarisima->infractors()->attach($request->input('apellido_nombre_inf'));

        return redirect()->route('sumarisimas')->with('message','Registrado correctamente!');
    
      }

      public function update(Request $request){

        $validator = $request -> validate ([
        'num_dj'=> 'required',
        'fecha_ingreso' => 'required',
        'fojas' =>'required',
        'motivo' => 'required',
        'destino_proced'=> 'required',
        'tipo_denuncia' => 'required',
        
        ]);
        
       $sumarisima = Sumarisima::find($request->sumarisima_id); 
    
       $sumarisima->num_dj = $request->num_dj;
       $sumarisima->fecha_ingreso = $request->fecha_ingreso;
       $sumarisima->fojas  = $request->fojas;
       $sumarisima->tipo_denuncia  = $request->tipo_denuncia;
       $sumarisima->motivo = $request->motivo;
       $sumarisima->destino_proced = $request->destino_proced;
    
      /* $sumarisima->apellido_nombre_inf = $request->apellido_nombre_inf;
       $sumarisima->leg_pers_inf = $request->leg_pers_inf;
       $sumarisima->dependen_inf = $request->dependen_inf;
       $sumarisima->jerarquia_inf = $request->jerarquia_inf;
       $sumarisima->retirado = $request->retirado;
       $sumarisima->detenido = $request->detenido;
       $sumarisima->dispon_prev = $request->dispon_prev;
       $sumarisima->levant_dispon_prev = $request->levant_dispon_prev;
       $sumarisima->fecha_disp_prevent = $request->fecha_disp_prevent;
       $sumarisima->fecha_levan_disp_prev = $request->fecha_levan_disp_prev;
       $sumarisima->resol_disp_prev = $request->resol_disp_prev;
       $sumarisima->resol_levan_disp_prev = $request->resol_levan_disp_prev;*/
    
       $sumarisima->apellido_nombre_AL = $request->apellido_nombre_AL;
       $sumarisima->leg_pers_AL = $request->leg_pers_AL;
       $sumarisima->jerarquia_AL = $request->jerarquia_AL;
       $sumarisima->dependen_AL = $request->dependen_AL;
    
       $sumarisima->fecha_mov = $request->fecha_mov;
       $sumarisima->destino_pase = $request->destino_pase;
       $sumarisima->primera_interv = $request->primera_interv;
       $sumarisima->tipo_mov = $request->tipo_mov;
       $sumarisima->observaciones = $request->observaciones;
       $sumarisima->fecha_reingreso = $request->fecha_reingreso;
       $sumarisima->opinion_final = $request->opinion_final;
       $sumarisima->fecha_egreso = $request->fecha_egreso;
       
       $sumarisima->save();

       $sumarisima->infractors()->sync($request->input('apellido_nombre_inf'));  
    
       //return back()->with('message','Actualizado correctamente!');
       return redirect()->route('sumarisimas')->with('message','Actualizado correctamente!');
      }

      public function destroy($sumarisima_id){

        $sumarisima = Sumarisima::find ($sumarisima_id);
        $sumarisima -> delete();
        //return back();
        return redirect()->route('sumarisimas')->with('message','Eliminado correctamente!');
    
      }      

}
