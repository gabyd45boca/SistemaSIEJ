<?php

namespace App\Http\Controllers;
use App\Models\Sumarisima;
use App\Models\Infractor;
use App\Models\Dependencia;
use App\Models\Sancione;
use App\Models\Motivo;
use App\Models\TipoDenuncia;



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
        $motivos = Motivo::all();
        $tipo_denuncias = TipoDenuncia::all();
       
        return view('sancion-create',compact('tipo_denuncias','motivos','sanciones','infractores','dependencias'));
    }

    public function show($sancion_id){

        $sanciones = Sancione::find($sancion_id);

        $infractores = Infractor::all();
        $infractores_ids = $sanciones->infractors()->pluck('infractors.id'); 
       
        return view('sancion-show',compact('sanciones','infractores','infractores_ids'));
    }

    public function edit($sancion_id){

        $sanciones = Sancione::find($sancion_id);
  
        $dependencias = Dependencia::all();
        $motivos = Motivo::all();
        $tipo_denuncias = TipoDenuncia::all();
  
        $infractores = Infractor::all();
        $infractores_ids = $sanciones->infractors()->pluck('infractors.id'); 
       
        return view('sancion-edit',compact('tipo_denuncias','motivos','sanciones','infractores','infractores_ids','dependencias'));
    }

    public function store(Request $request)  {
        $validator = $request -> validate ([
          'num_dj'=> 'required|unique:sanciones',
          'fecha_ingreso' => 'required',
          'fojas' =>'required',
          'motivo' => 'required',
          'lugar_proced'=> 'required',
          'tipo_denuncia' => 'required',
                        
        ]);
    
        $sanciones = new Sancione();
    
        $sanciones->num_dj  = $request->num_dj;
        $sanciones->lugar_proced = $request->lugar_proced;
        $sanciones->fecha_ingreso = $request->fecha_ingreso;
        $sanciones->fecha_inicio = $request->fecha_inicio;
        $sanciones->fojas  = $request->fojas;
        $sanciones->tipo_denuncia  = $request->tipo_denuncia;
        $sanciones->motivo = $request->motivo;
        $sanciones->primera_interv  = $request->primera_interv;
        $sanciones->fecha_pase  = $request->fecha_pase;
        $sanciones->observaciones  = $request->observaciones;
        $sanciones->lugar_pase = $request->lugar_pase;
            /////////
        $sanciones->apellido_nombre_DGAJ = $request->apellido_nombre_DGAJ;
        $sanciones->leg_pers_DGAJ = $request->leg_pers_DGAJ;
        $sanciones->dependen_DGAJ = $request->dependen_DGAJ;
        $sanciones->jerarquia_DGAJ = $request->jerarquia_DGAJ;
        $sanciones->fecha_reingreso_DGAJ = $request->fecha_reingreso_DGAJ;
        $sanciones->obs_reingreso_DGAJ = $request->obs_reingreso_DGAJ;
        $sanciones->opinion_cierre_DGAJ = $request->opinion_cierre_DGAJ;
        $sanciones->fecha_pase_DGAJ = $request->fecha_pase_DGAJ;
        $sanciones->lugar_pase_DGAJ = $request->lugar_pase_DGAJ;
        $sanciones->obs_pase_DGAJ = $request->obs_pase_DGAJ;

        $sanciones->apellido_nombre_AL = $request->apellido_nombre_AL;
        $sanciones->leg_pers_AL = $request->leg_pers_AL;
        $sanciones->dependen_AL = $request->dependen_AL;
        $sanciones->jerarquia_AL = $request->jerarquia_AL;
        $sanciones->reg_interno_AL = $request->reg_interno_AL;
        $sanciones->fecha_mov_procAL = $request->fecha_mov_procAL;
        $sanciones->destin_proceden_AL = $request->destin_proceden_AL;
        $sanciones->sugerencia_AL = $request->sugerencia_AL;
        $sanciones->obs_proced_AL = $request->obs_proced_AL;
        $sanciones->fecha_mov_paseAL = $request->fecha_mov_paseAL;
        $sanciones->destin_pase_AL = $request->destin_pase_AL;
        $sanciones->obs_pase_AL = $request->obs_pase_AL;

        $sanciones->apellido_nombre_SS = $request->apellido_nombre_SS;
        $sanciones->leg_pers_SS = $request->leg_pers_SS;
        $sanciones->dependen_SS = $request->dependen_SS;
        $sanciones->jerarquia_SS = $request->jerarquia_SS;
        $sanciones->reg_interno_SS = $request->reg_interno_SS;
        $sanciones->fecha_proced_SS = $request->fecha_proced_SS;
        $sanciones->lugar_proceden_SS = $request->lugar_proceden_SS;
        $sanciones->sugerencia_SS = $request->sugerencia_SS;
        $sanciones->obs_proced_SS = $request->obs_proced_SS;
        $sanciones->fecha_pase_SS = $request->fecha_pase_SS;
        $sanciones->lugar_pase_SS = $request->lugar_pase_SS;
        $sanciones->obs_pase_SS = $request->obs_pase_SS;

        $sanciones->apellido_nombre_DGRRHH = $request->apellido_nombre_DGRRHH;
        $sanciones->leg_pers_DGRRHH = $request->leg_pers_DGRRHH;
        $sanciones->dependen_DGRRHH = $request->dependen_DGRRHH;
        $sanciones->jerarquia_DGRRHH = $request->jerarquia_DGRRHH;
        $sanciones->reg_interno_DGRRHH = $request->reg_interno_DGRRHH;
        $sanciones->fecha_mov_proceDGRRHH = $request->fecha_mov_proceDGRRHH;
        $sanciones->destin_proceden_DGRRHH = $request->destin_proceden_DGRRHH;
        $sanciones->resol_final_DGRRHH = $request->resol_final_DGRRHH;
        $sanciones->obs_proced_DGRRHH = $request->obs_proced_DGRRHH;
        $sanciones->concluido_DGRRHH = $request->concluido_DGRRHH;
        $sanciones->DGRRHH_N° = $request->DGRRHH_N°;
        $sanciones->fecha_notificacion = $request->fecha_notificacion;
                           
        $sanciones->save();

        $sanciones->infractors()->attach($request->input('apellido_nombre_inf'));

        return redirect()->route('sancion')->with('message','Registrado correctamente!');
    
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
        
       $sanciones = Sancione::find($request->sancion_id); 
    
        $sanciones->num_dj  = $request->num_dj;
        $sanciones->lugar_proced = $request->lugar_proced;
        $sanciones->fecha_ingreso = $request->fecha_ingreso;
        $sanciones->fecha_inicio = $request->fecha_inicio;
        $sanciones->fojas  = $request->fojas;
        $sanciones->tipo_denuncia  = $request->tipo_denuncia;
        $sanciones->motivo = $request->motivo;
        $sanciones->primera_interv  = $request->primera_interv;
        $sanciones->fecha_pase  = $request->fecha_pase;
        $sanciones->observaciones  = $request->observaciones;
        $sanciones->lugar_pase = $request->lugar_pase;
            /////////
        $sanciones->apellido_nombre_DGAJ = $request->apellido_nombre_DGAJ;
        $sanciones->leg_pers_DGAJ = $request->leg_pers_DGAJ;
        $sanciones->dependen_DGAJ = $request->dependen_DGAJ;
        $sanciones->jerarquia_DGAJ = $request->jerarquia_DGAJ;
        $sanciones->fecha_reingreso_DGAJ = $request->fecha_reingreso_DGAJ;
        $sanciones->obs_reingreso_DGAJ = $request->obs_reingreso_DGAJ;
        $sanciones->opinion_cierre_DGAJ = $request->opinion_cierre_DGAJ;
        $sanciones->fecha_pase_DGAJ = $request->fecha_pase_DGAJ;
        $sanciones->lugar_pase_DGAJ = $request->lugar_pase_DGAJ;
        $sanciones->obs_pase_DGAJ = $request->obs_pase_DGAJ;

        $sanciones->apellido_nombre_AL = $request->apellido_nombre_AL;
        $sanciones->leg_pers_AL = $request->leg_pers_AL;
        $sanciones->dependen_AL = $request->dependen_AL;
        $sanciones->jerarquia_AL = $request->jerarquia_AL;
        $sanciones->reg_interno_AL = $request->reg_interno_AL;
        $sanciones->fecha_mov_procAL = $request->fecha_mov_procAL;
        $sanciones->destin_proceden_AL = $request->destin_proceden_AL;
        $sanciones->sugerencia_AL = $request->sugerencia_AL;
        $sanciones->obs_proced_AL = $request->obs_proced_AL;
        $sanciones->fecha_mov_paseAL = $request->fecha_mov_paseAL;
        $sanciones->destin_pase_AL = $request->destin_pase_AL;
        $sanciones->obs_pase_AL = $request->obs_pase_AL;

        $sanciones->apellido_nombre_SS = $request->apellido_nombre_SS;
        $sanciones->leg_pers_SS = $request->leg_pers_SS;
        $sanciones->dependen_SS = $request->dependen_SS;
        $sanciones->jerarquia_SS = $request->jerarquia_SS;
        $sanciones->reg_interno_SS = $request->reg_interno_SS;
        $sanciones->fecha_proced_SS = $request->fecha_proced_SS;
        $sanciones->lugar_proceden_SS = $request->lugar_proceden_SS;
        $sanciones->sugerencia_SS = $request->sugerencia_SS;
        $sanciones->obs_proced_SS = $request->obs_proced_SS;
        $sanciones->fecha_pase_SS = $request->fecha_pase_SS;
        $sanciones->lugar_pase_SS = $request->lugar_pase_SS;
        $sanciones->obs_pase_SS = $request->obs_pase_SS;

        $sanciones->apellido_nombre_DGRRHH = $request->apellido_nombre_DGRRHH;
        $sanciones->leg_pers_DGRRHH = $request->leg_pers_DGRRHH;
        $sanciones->dependen_DGRRHH = $request->dependen_DGRRHH;
        $sanciones->jerarquia_DGRRHH = $request->jerarquia_DGRRHH;
        $sanciones->reg_interno_DGRRHH = $request->reg_interno_DGRRHH;
        $sanciones->fecha_mov_proceDGRRHH = $request->fecha_mov_proceDGRRHH;
        $sanciones->destin_proceden_DGRRHH = $request->destin_proceden_DGRRHH;
        $sanciones->resol_final_DGRRHH = $request->resol_final_DGRRHH;
        $sanciones->obs_proced_DGRRHH = $request->obs_proced_DGRRHH;
        $sanciones->concluido_DGRRHH = $request->concluido_DGRRHH;
        $sanciones->DGRRHH_N° = $request->DGRRHH_N°;
        $sanciones->fecha_notificacion = $request->fecha_notificacion;
       
       $sanciones->save();

       $sanciones->infractors()->sync($request->input('apellido_nombre_inf'));  
    
      
       return redirect()->route('sancion')->with('message','Actualizado correctamente!');
      }

      public function destroy($sancion_id){

        $sanciones = Sancione::find ($sancion_id);
        $sanciones -> delete();
 
        return redirect()->route('sancion')->with('message','Eliminado correctamente!');
    
      }      




}
