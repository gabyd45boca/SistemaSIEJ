<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Isa;
use App\Models\Infractor;
use Spatie\Permission\Traits\HasRoles;


class IsasController extends Controller
{

    public function __construct(){

        $this->middleware('can:CrearSumario')->only('create');
        $this->middleware('can:EliminarSumario')->only('destroy');

       
    }     

    public function index(){

        $isas = Isa::all();
        
        return view('isas',compact('isas'));
    }

    public function create(){

        $isas = Isa::all();
        $infractores = Infractor::all();
       
        return view('isas-create',compact('isas','infractores'));
    }


    public function show($isa_id){

        $isa = Isa::find($isa_id);

        $infractores = Infractor::all();
        $infractores_ids = $isa->infractors()->pluck('infractors.id'); 
       
        return view('isas-show',compact('isa','infractores','infractores_ids'));
    }

    public function store(Request $request){

           // dd($request->all());

            $validator = $request -> validate ([
            'num_dja'=> 'required|unique:isas',
            'fecha_ingreso' => 'required',
            'num_dj' => ['required','unique:isas'],
            'fecha_inicio' => 'required',
            'fojas' =>'required',
            'deslindar_resp' =>'required',
            'motivo' => 'required',
            'fecha_movimiento' =>'required' ,
            'destino_pase' =>'required' ,
            'tipo_mov' =>'required' ,
                                     
            ]);
     
            $isa =new Isa();
                   
            $isa->num_dja  = $request->num_dja;
            $isa->fecha_ingreso = $request->fecha_ingreso;
            $isa->num_dj  = $request->num_dj;
            $isa->fecha_inicio = $request->fecha_inicio;
            $isa->fojas = $request->fojas;
            $isa->deslindar_resp = $request->deslindar_resp;
            $isa->motivo = $request->motivo;
            $isa->fecha_movimiento = $request->fecha_movimiento;
            $isa->destino_pase = $request->destino_pase;
            $isa->tipo_mov = $request->tipo_mov;
            $isa->observaciones = $request->observaciones;
            $isa->elevado_por_instruccion = $request->elevado_por_instruccion;
            $isa->opinion_sede_inst = $request->opinion_sede_inst;
            $isa->conversion_convalid = $request->conversion_convalid;
            
                   
            $isa->apellido_nombre_DAI = $request->apellido_nombre_DAI;
            $isa->leg_pers_DAI = $request->leg_pers_DAI;
            $isa->jerarquia_DAI = $request->jerarquia_DAI;
            $isa->dependen_DAI = $request->dependen_DAI;
            $isa->reg_interno_DAI = $request->reg_interno_DAI;
            $isa->fecha_mov_proceDAI = $request->fecha_mov_proceDAI;
            $isa->destin_proceden_DAI = $request->destin_proceden_DAI;
            $isa->obs_proced_DAI = $request->obs_proced_DAI;
            $isa->tipo_mov_proce_DAI = $request->tipo_mov_proce_DAI;
            $isa->sugerencia_DAI = $request->sugerencia_DAI;
            $isa->fecha_elev_inst_DAI = $request->fecha_elev_inst_DAI;
            $isa->fecha_mov_paseDAI = $request->fecha_mov_paseDAI;
            $isa->destin_pase_DAI = $request->destin_pase_DAI;
            $isa->obs_pase_DAI = $request->obs_pase_DAI;
            $isa->tipo_mov_pase_DAI = $request->tipo_mov_pase_DAI;
            $isa->concluido_DAI = $request->concluido_DAI; 
        
            $isa->apellido_nombre_DGAJ = $request->apellido_nombre_DGAJ;
            $isa->leg_pers_DGAJ = $request->leg_pers_DGAJ;
            $isa->jerarquia_DGAJ = $request->jerarquia_DGAJ;
            $isa->dependen_DGAJ = $request->dependen_DGAJ;
            $isa->reg_interno_DGAJ = $request->reg_interno_DGAJ;
            $isa->fecha_mov_proceDGAJ = $request->fecha_mov_proceDGAJ;
            $isa->destin_proced_DGAJ = $request->destin_proced_DGAJ;
            $isa->tipo_mov_proce_DGAJ = $request->tipo_mov_proce_DGAJ;
            $isa->sugerencia_DGAJ = $request->sugerencia_DGAJ;
            $isa->obs_proced_DGAJ = $request->obs_proced_DGAJ;
            $isa->fecha_mov_destDGAJ = $request->fecha_mov_destDGAJ;
            $isa->destin_pase_DGAJ = $request->destin_pase_DGAJ;
            $isa->tipo_mov_pase_DGAJ = $request->tipo_mov_pase_DGAJ;
            $isa->obs_pase_DGAJ = $request->obs_pase_DGAJ;
            $isa->concluido_DGAJ = $request->concluido_DGAJ;
            
            $isa->apellido_nombre_AL = $request->apellido_nombre_AL;
            $isa->leg_pers_AL = $request->leg_pers_AL;
            $isa->jerarquia_AL = $request->jerarquia_AL;
            $isa->dependen_AL = $request->dependen_AL;
            $isa->reg_interno_AL = $request->reg_interno_AL;
            $isa->fecha_mov_procAL = $request->fecha_mov_procAL;
            $isa->destin_proceden_AL = $request->destin_proceden_AL;
            $isa->tipo_mov_proce_AL = $request->tipo_mov_proce_AL;
            $isa->sugerencia_AL = $request->sugerencia_AL;
            $isa->obs_proced_AL = $request->obs_proced_AL;
            $isa->fecha_mov_paseAL = $request->fecha_mov_paseAL;
            $isa->destin_pase_AL = $request->destin_pase_AL;
            $isa->tipo_mov_pase_AL = $request->tipo_mov_pase_AL;
            $isa->obs_pase_AL = $request->obs_pase_AL;
            $isa->concluido_AL = $request->concluido_AL;
        
            $isa->apellido_nombre_DGRRHH = $request->apellido_nombre_DGRRHH;
            $isa->leg_pers_DGRRHH = $request->leg_pers_DGRRHH;
            $isa->jerarquia_DGRRHH = $request->jerarquia_DGRRHH;
            $isa->dependen_DGRRHH = $request->dependen_DGRRHH;
            $isa->reg_interno_DGRRHH = $request->reg_interno_DGRRHH;
            $isa->fecha_mov_proceDGRRHH = $request->fecha_mov_proceDGRRHH;
            $isa->destin_proceden_DGRRHH = $request->destin_proceden_DGRRHH;
            $isa->tipo_mov_proce_DGRRHH = $request->tipo_mov_proce_DGRRHH;
            $isa->resol_final_DGRRHH = $request->resol_final_DGRRHH;
            $isa->obs_proced_DGRRHH = $request->obs_proced_DGRRHH;
            $isa->fecha_mov_paseDGRRHH = $request->fecha_mov_paseDGRRHH;
            $isa->destin_pase_DGRRHH = $request->destin_pase_DGRRHH;
            $isa->tipo_mov_pase_DGRRHH = $request->tipo_mov_pase_DGRRHH;
            $isa->obs_pase_DGRRHH = $request->obs_pase_DGRRHH;
            $isa->concluido_DGRRHH = $request->concluido_DGRRHH;
                  
            $isa->save();

            //dd($request->all());
            $isa->infractors()->attach($request->input('apellido_nombre_inf'));
                          
            return redirect()->route('isas')->with('message','Registrado correctamente!');
    }


    public function update(Request $request){
        // dd($request->all());
        $validator = $request -> validate ([
          'num_dja'=> 'required',
          'fecha_ingreso' => 'required',
          'num_dj' => 'required',
          'fecha_inicio' => 'required',
          'fojas' =>'required',
          'deslindar_resp' =>'required',
          'motivo' => 'required',
          'fecha_movimiento' =>'required' ,
          'destino_pase' =>'required' ,
          'tipo_mov' =>'required' ,
                                     
          ]);
    
    
        $isa = Isa::find($request->isa_id);
    
        $isa->num_dja  = $request->num_dja;
        $isa->fecha_ingreso = $request->fecha_ingreso;
        $isa->num_dj  = $request->num_dj;
        $isa->fecha_inicio = $request->fecha_inicio;
        $isa->fojas = $request->fojas;
        $isa->deslindar_resp = $request->deslindar_resp;
        $isa->motivo = $request->motivo;
        $isa->fecha_movimiento = $request->fecha_movimiento;
        $isa->destino_pase = $request->destino_pase;
        $isa->tipo_mov = $request->tipo_mov;
        $isa->observaciones = $request->observaciones;
        $isa->elevado_por_instruccion = $request->elevado_por_instruccion;
        $isa->opinion_sede_inst = $request->opinion_sede_inst;
        $isa->conversion_convalid = $request->conversion_convalid;
            
        $isa->apellido_nombre_DAI = $request->apellido_nombre_DAI;
        $isa->leg_pers_DAI = $request->leg_pers_DAI;
        $isa->jerarquia_DAI = $request->jerarquia_DAI;
        $isa->dependen_DAI = $request->dependen_DAI;
        $isa->reg_interno_DAI = $request->reg_interno_DAI;
        $isa->fecha_mov_proceDAI = $request->fecha_mov_proceDAI;
        $isa->destin_proceden_DAI = $request->destin_proceden_DAI;
        $isa->obs_proced_DAI = $request->obs_proced_DAI;
        $isa->tipo_mov_proce_DAI = $request->tipo_mov_proce_DAI;
        $isa->sugerencia_DAI = $request->sugerencia_DAI;
        $isa->fecha_elev_inst_DAI = $request->fecha_elev_inst_DAI;
        $isa->fecha_mov_paseDAI = $request->fecha_mov_paseDAI;
        $isa->destin_pase_DAI = $request->destin_pase_DAI;
        $isa->obs_pase_DAI = $request->obs_pase_DAI;
        $isa->tipo_mov_pase_DAI = $request->tipo_mov_pase_DAI;
        $isa->concluido_DAI = $request->concluido_DAI; 
    
        $isa->apellido_nombre_DGAJ = $request->apellido_nombre_DGAJ;
        $isa->leg_pers_DGAJ = $request->leg_pers_DGAJ;
        $isa->jerarquia_DGAJ = $request->jerarquia_DGAJ;
        $isa->dependen_DGAJ = $request->dependen_DGAJ;
        $isa->reg_interno_DGAJ = $request->reg_interno_DGAJ;
        $isa->fecha_mov_proceDGAJ = $request->fecha_mov_proceDGAJ;
        $isa->destin_proced_DGAJ = $request->destin_proced_DGAJ;
        $isa->tipo_mov_proce_DGAJ = $request->tipo_mov_proce_DGAJ;
        $isa->sugerencia_DGAJ = $request->sugerencia_DGAJ;
        $isa->obs_proced_DGAJ = $request->obs_proced_DGAJ;
        $isa->fecha_mov_destDGAJ = $request->fecha_mov_destDGAJ;
        $isa->destin_pase_DGAJ = $request->destin_pase_DGAJ;
        $isa->tipo_mov_pase_DGAJ = $request->tipo_mov_pase_DGAJ;
        $isa->obs_pase_DGAJ = $request->obs_pase_DGAJ;
        $isa->concluido_DGAJ = $request->concluido_DGAJ;
        
        $isa->apellido_nombre_AL = $request->apellido_nombre_AL;
        $isa->leg_pers_AL = $request->leg_pers_AL;
        $isa->jerarquia_AL = $request->jerarquia_AL;
        $isa->dependen_AL = $request->dependen_AL;
        $isa->reg_interno_AL = $request->reg_interno_AL;
        $isa->fecha_mov_procAL = $request->fecha_mov_procAL;
        $isa->destin_proceden_AL = $request->destin_proceden_AL;
        $isa->tipo_mov_proce_AL = $request->tipo_mov_proce_AL;
        $isa->sugerencia_AL = $request->sugerencia_AL;
        $isa->obs_proced_AL = $request->obs_proced_AL;
        $isa->fecha_mov_paseAL = $request->fecha_mov_paseAL;
        $isa->destin_pase_AL = $request->destin_pase_AL;
        $isa->tipo_mov_pase_AL = $request->tipo_mov_pase_AL;
        $isa->obs_pase_AL = $request->obs_pase_AL;
        $isa->concluido_AL = $request->concluido_AL;
    
        $isa->apellido_nombre_DGRRHH = $request->apellido_nombre_DGRRHH;
        $isa->leg_pers_DGRRHH = $request->leg_pers_DGRRHH;
        $isa->jerarquia_DGRRHH = $request->jerarquia_DGRRHH;
        $isa->dependen_DGRRHH = $request->dependen_DGRRHH;
        $isa->reg_interno_DGRRHH = $request->reg_interno_DGRRHH;
        $isa->fecha_mov_proceDGRRHH = $request->fecha_mov_proceDGRRHH;
        $isa->destin_proceden_DGRRHH = $request->destin_proceden_DGRRHH;
        $isa->tipo_mov_proce_DGRRHH = $request->tipo_mov_proce_DGRRHH;
        $isa->resol_final_DGRRHH = $request->resol_final_DGRRHH;
        $isa->obs_proced_DGRRHH = $request->obs_proced_DGRRHH;
        $isa->fecha_mov_paseDGRRHH = $request->fecha_mov_paseDGRRHH;
        $isa->destin_pase_DGRRHH = $request->destin_pase_DGRRHH;
        $isa->tipo_mov_pase_DGRRHH = $request->tipo_mov_pase_DGRRHH;
        $isa->obs_pase_DGRRHH = $request->obs_pase_DGRRHH;
        $isa->concluido_DGRRHH = $request->concluido_DGRRHH;

        //dd($request->all());
        $isa->save();

        //$isa->update($request->all());

        $isa->infractors()->sync($request->input('apellido_nombre_inf'));  

        return redirect()->route('isas')->with('message','Actualizado correctamente!');
      }


      public function destroy($isa_id){

        $isa = Isa::find($isa_id);
        $isa -> delete();
    
        return redirect()->route('isas')->with('message','Eliminado correctamente!');
    
      }


}
