<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sumarisima;
use App\Models\Infractor;

class SumarisimasController extends Controller
{

  public function __construct(){

    $this->middleware('can:CrearSumarisima')->only('create');
    $this->middleware('can:EliminarSumarisima')->only('destroy');
   
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
          'lugar_proced'=> 'required',
          'tipo_denuncia' => 'required',
                        
        ]);
    
        $sumarisima = new Sumarisima();
    
        $sumarisima->num_dj  = $request->num_dj;
        $sumarisima->lugar_proced = $request->lugar_proced;
        $sumarisima->fecha_ingreso = $request->fecha_ingreso;
        $sumarisima->fecha_inicio = $request->fecha_inicio;
        $sumarisima->fojas  = $request->fojas;
        $sumarisima->tipo_denuncia  = $request->tipo_denuncia;
        $sumarisima->motivo = $request->motivo;
        $sumarisima->primera_interv  = $request->primera_interv;
        $sumarisima->fecha_pase  = $request->fecha_pase;
        $sumarisima->observaciones  = $request->observaciones;
        $sumarisima->lugar_pase = $request->lugar_pase;
            /////////
        $sumarisima->apellido_nombre_DGAJ = $request->apellido_nombre_DGAJ;
        $sumarisima->leg_pers_DGAJ = $request->leg_pers_DGAJ;
        $sumarisima->dependen_DGAJ = $request->dependen_DGAJ;
        $sumarisima->jerarquia_DGAJ = $request->jerarquia_DGAJ;
        $sumarisima->fecha_reingreso_DGAJ = $request->fecha_reingreso_DGAJ;
        $sumarisima->obs_reingreso_DGAJ = $request->opinion_cierre_DGAJ;
        $sumarisima->opinion_cierre_DGAJ = $request->opinion_cierre_DGAJ;
        $sumarisima->fecha_pase_DGAJ = $request->fecha_pase_DGAJ;
        $sumarisima->lugar_pase_DGAJ = $request->lugar_pase_DGAJ;
        $sumarisima->obs_pase_DGAJ = $request->obs_pase_DGAJ;

        $sumarisima->apellido_nombre_AL = $request->apellido_nombre_AL;
        $sumarisima->leg_pers_AL = $request->leg_pers_AL;
        $sumarisima->dependen_AL = $request->dependen_AL;
        $sumarisima->jerarquia_AL = $request->jerarquia_AL;
        $sumarisima->reg_interno_AL = $request->reg_interno_AL;
        $sumarisima->fecha_mov_procAL = $request->fecha_mov_procAL;
        $sumarisima->destin_proceden_AL = $request->destin_proceden_AL;
        $sumarisima->sugerencia_AL = $request->sugerencia_AL;
        $sumarisima->obs_proced_AL = $request->obs_proced_AL;
        $sumarisima->fecha_mov_paseAL = $request->fecha_mov_paseAL;
        $sumarisima->destin_pase_AL = $request->destin_pase_AL;
        $sumarisima->obs_pase_AL = $request->obs_pase_AL;

        $sumarisima->apellido_nombre_SS = $request->apellido_nombre_SS;
        $sumarisima->leg_pers_SS = $request->leg_pers_SS;
        $sumarisima->dependen_SS = $request->dependen_SS;
        $sumarisima->jerarquia_SS = $request->jerarquia_SS;
        $sumarisima->reg_interno_SS = $request->reg_interno_SS;
        $sumarisima->fecha_proced_SS = $request->fecha_proced_SS;
        $sumarisima->lugar_proceden_SS = $request->lugar_proceden_SS;
        $sumarisima->sugerencia_SS = $request->sugerencia_SS;
        $sumarisima->obs_proced_SS = $request->obs_proced_SS;
        $sumarisima->fecha_pase_SS = $request->fecha_pase_SS;
        $sumarisima->lugar_pase_SS = $request->lugar_pase_SS;
        $sumarisima->obs_pase_SS = $request->obs_pase_SS;

        $sumarisima->apellido_nombre_DGRRHH = $request->apellido_nombre_DGRRHH;
        $sumarisima->leg_pers_DGRRHH = $request->leg_pers_DGRRHH;
        $sumarisima->dependen_DGRRHH = $request->dependen_DGRRHH;
        $sumarisima->jerarquia_DGRRHH = $request->jerarquia_DGRRHH;
        $sumarisima->reg_interno_DGRRHH = $request->reg_interno_DGRRHH;
        $sumarisima->fecha_mov_proceDGRRHH = $request->fecha_mov_proceDGRRHH;
        $sumarisima->destin_proceden_DGRRHH = $request->destin_proceden_DGRRHH;
        $sumarisima->resol_final_DGRRHH = $request->resol_final_DGRRHH;
        $sumarisima->obs_proced_DGRRHH = $request->obs_proced_DGRRHH;
        $sumarisima->concluido_DGRRHH = $request->concluido_DGRRHH;
        $sumarisima->DGRRHH_N° = $request->DGRRHH_N°;
        $sumarisima->fecha_notificacion = $request->fecha_notificacion;
                           
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
        'lugar_proced'=> 'required',
        'tipo_denuncia' => 'required',
        
        ]);
        
       $sumarisima = Sumarisima::find($request->sumarisima_id); 
    
        $sumarisima->num_dj  = $request->num_dj;
        $sumarisima->lugar_proced = $request->lugar_proced;
        $sumarisima->fecha_ingreso = $request->fecha_ingreso;
        $sumarisima->fecha_inicio = $request->fecha_inicio;
        $sumarisima->fojas  = $request->fojas;
        $sumarisima->tipo_denuncia  = $request->tipo_denuncia;
        $sumarisima->motivo = $request->motivo;
        $sumarisima->primera_interv  = $request->primera_interv;
        $sumarisima->fecha_pase  = $request->fecha_pase;
        $sumarisima->observaciones  = $request->observaciones;
        $sumarisima->lugar_pase = $request->lugar_pase;
            /////////
        $sumarisima->apellido_nombre_DGAJ = $request->apellido_nombre_DGAJ;
        $sumarisima->leg_pers_DGAJ = $request->leg_pers_DGAJ;
        $sumarisima->dependen_DGAJ = $request->dependen_DGAJ;
        $sumarisima->jerarquia_DGAJ = $request->jerarquia_DGAJ;
        $sumarisima->fecha_reingreso_DGAJ = $request->fecha_reingreso_DGAJ;
        $sumarisima->obs_reingreso_DGAJ = $request->obs_reingreso_DGAJ;
        $sumarisima->opinion_cierre_DGAJ = $request->opinion_cierre_DGAJ;
        $sumarisima->fecha_pase_DGAJ = $request->fecha_pase_DGAJ;
        $sumarisima->lugar_pase_DGAJ = $request->lugar_pase_DGAJ;
        $sumarisima->obs_pase_DGAJ = $request->obs_pase_DGAJ;

        $sumarisima->apellido_nombre_AL = $request->apellido_nombre_AL;
        $sumarisima->leg_pers_AL = $request->leg_pers_AL;
        $sumarisima->dependen_AL = $request->dependen_AL;
        $sumarisima->jerarquia_AL = $request->jerarquia_AL;
        $sumarisima->reg_interno_AL = $request->reg_interno_AL;
        $sumarisima->fecha_mov_procAL = $request->fecha_mov_procAL;
        $sumarisima->destin_proceden_AL = $request->destin_proceden_AL;
        $sumarisima->sugerencia_AL = $request->sugerencia_AL;
        $sumarisima->obs_proced_AL = $request->obs_proced_AL;
        $sumarisima->fecha_mov_paseAL = $request->fecha_mov_paseAL;
        $sumarisima->destin_pase_AL = $request->destin_pase_AL;
        $sumarisima->obs_pase_AL = $request->obs_pase_AL;

        $sumarisima->apellido_nombre_SS = $request->apellido_nombre_SS;
        $sumarisima->leg_pers_SS = $request->leg_pers_SS;
        $sumarisima->dependen_SS = $request->dependen_SS;
        $sumarisima->jerarquia_SS = $request->jerarquia_SS;
        $sumarisima->reg_interno_SS = $request->reg_interno_SS;
        $sumarisima->fecha_proced_SS = $request->fecha_proced_SS;
        $sumarisima->lugar_proceden_SS = $request->lugar_proceden_SS;
        $sumarisima->sugerencia_SS = $request->sugerencia_SS;
        $sumarisima->obs_proced_SS = $request->obs_proced_SS;
        $sumarisima->fecha_pase_SS = $request->fecha_pase_SS;
        $sumarisima->lugar_pase_SS = $request->lugar_pase_SS;
        $sumarisima->obs_pase_SS = $request->obs_pase_SS;

        $sumarisima->apellido_nombre_DGRRHH = $request->apellido_nombre_DGRRHH;
        $sumarisima->leg_pers_DGRRHH = $request->leg_pers_DGRRHH;
        $sumarisima->dependen_DGRRHH = $request->dependen_DGRRHH;
        $sumarisima->jerarquia_DGRRHH = $request->jerarquia_DGRRHH;
        $sumarisima->reg_interno_DGRRHH = $request->reg_interno_DGRRHH;
        $sumarisima->fecha_mov_proceDGRRHH = $request->fecha_mov_proceDGRRHH;
        $sumarisima->destin_proceden_DGRRHH = $request->destin_proceden_DGRRHH;
        $sumarisima->resol_final_DGRRHH = $request->resol_final_DGRRHH;
        $sumarisima->obs_proced_DGRRHH = $request->obs_proced_DGRRHH;
        $sumarisima->concluido_DGRRHH = $request->concluido_DGRRHH;
        $sumarisima->DGRRHH_N° = $request->DGRRHH_N°;
        $sumarisima->fecha_notificacion = $request->fecha_notificacion;
       
       $sumarisima->save();

       $sumarisima->infractors()->sync($request->input('apellido_nombre_inf'));  
    
      
       return redirect()->route('sumarisimas')->with('message','Actualizado correctamente!');
      }

      public function destroy($sumarisima_id){

        $sumarisima = Sumarisima::find ($sumarisima_id);
        $sumarisima -> delete();
 
        return redirect()->route('sumarisimas')->with('message','Eliminado correctamente!');
    
      }      

}
