<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sumario;
use App\Models\Infractor;
use App\Models\Dependencia;
use Spatie\Permission\Traits\HasRoles;

class SumariosController extends Controller
{

    public function __construct(){

        $this->middleware('can:CrearSumario')->only('create');
        $this->middleware('can:EliminarSumario')->only('destroy');

       
    }     

    public function index(){

        $sumarios = Sumario::all();
        
        return view('sumarios',compact('sumarios'));
    }

    public function create(){

        $sumarios = Sumario::all();
        $infractores = Infractor::all();
        $dependencias = Dependencia::all();
       
        return view('sumarios-create',compact('sumarios','infractores','dependencias'));
    }


    public function show($sumario_id){

        $sumario = Sumario::find($sumario_id);

        $infractores = Infractor::all();
        $infractores_ids = $sumario->infractors()->pluck('infractors.id'); 
       
        return view('sumarios-show',compact('sumario','infractores','infractores_ids'));
    }

    public function consulta(){

      //$sumarios = Sumario::where('motivo','=','Violencia de genero')->get();
      //$sumarios = Sumario::where('motivo','LIKE','Violencia de genero')->get();
      $sumarios = Sumario::where('motivo','LIKE','Violencia de genero')->get();



      /*$infractores = Infractor::all();
      $infractores_ids = $sumario->infractors()->pluck('infractors.id');*/ 
     
      return view('sumarios-consulta',compact('sumarios'));
      
    }


      public function NumGenerales(){

        //$sumarios = Sumario::where('motivo','=','Violencia de genero')->get();
        //$sumarios = Sumario::where('motivo','LIKE','Violencia de genero')->get();
        $sumarios1 = Sumario::where('motivo','LIKE','Violencia de genero')->get();
        $sumarios2 = Sumario::where('motivo','LIKE','Perdida Arma Reglamentaria')->get();
        $sumarios3 = Sumario::where('motivo','LIKE','Falta al servicio')->get();
        $sumarios4 = Sumario::where('motivo','LIKE','Ebriedad')->get();
        $sumarios5 = Sumario::where('motivo','LIKE','Ausentismo Laboral')->get();
        //$sumarios6 = Sumario::where('motivo','LIKE','Otro')->get();
       // $sumarios7 = Sumario::where('motivo','LIKE','Violencia de genero')->get();
       // $sumarios8 = Sumario::where('motivo','LIKE','Violencia de genero')->get();
        /*$infractores = Infractor::all();
        $infractores_ids = $sumario->infractors()->pluck('infractors.id');*/ 
      
        return view('home',compact('sumarios1','sumarios2','sumarios3','sumarios4',
        'sumarios5'));
        
    }


    public function edit($sumario_id){

      $sumario = Sumario::find($sumario_id);
      $dependencias = Dependencia::all();

      $infractores = Infractor::all();
      $infractores_ids = $sumario->infractors()->pluck('infractors.id'); 
     
      return view('sumarios-edit',compact('sumario','infractores','infractores_ids','dependencias'));
    }

    public function store(Request $request){

           // dd($request->all());

            $validator = $request -> validate ([
            'num_dja'=> 'required|unique:sumarios',
            'lugar_proced' => 'required',
            'fecha_ingreso' => 'required',
            'num_dj' => ['required','unique:sumarios'],
            'fecha_inicio' => 'required',
            'fojas' =>'required',
            'infraccion' => 'required',
            'motivo' => 'required',
            'tipo_denun' => 'required',
            'fecha_movimiento' =>'required' ,
            'destino_pase' =>'required' ,
            'extracto' =>'required' ,
                                               
            ]);
     
            $sumario =new Sumario();
                   
            $sumario->num_dja  = $request->num_dja;
            $sumario->lugar_proced  = $request->lugar_proced;
            $sumario->fecha_ingreso = $request->fecha_ingreso;
            $sumario->num_dj  = $request->num_dj;
            $sumario->fecha_inicio = $request->fecha_inicio;
            $sumario->fojas = $request->fojas;
            $sumario->infraccion = $request->infraccion;
            $sumario->motivo = $request->motivo;
            $sumario->extracto = $request->extracto;
            $sumario->tipo_denun = $request->tipo_denun;
            $sumario->fecha_movimiento = $request->fecha_movimiento;
            $sumario->destino_pase = $request->destino_pase;
            $sumario->observaciones = $request->observaciones;
                             
            $sumario->apellido_nombre_DAI = $request->apellido_nombre_DAI;
            $sumario->leg_pers_DAI = $request->leg_pers_DAI;
            $sumario->dependen_DAI = $request->dependen_DAI;
            $sumario->jerarquia_DAI = $request->jerarquia_DAI;
            $sumario->reg_interno_DAI = $request->reg_interno_DAI;
            $sumario->fecha_mov_proceDAI = $request->fecha_mov_proceDAI;
            $sumario->destin_proceden_DAI = $request->destin_proceden_DAI;
            $sumario->obs_proced_DAI = $request->obs_proced_DAI;
            $sumario->sugerencia_DAI = $request->sugerencia_DAI;
            $sumario->fecha_elev_inst_DAI = $request->fecha_elev_inst_DAI;
            $sumario->fecha_mov_paseDAI = $request->fecha_mov_paseDAI;
            $sumario->destin_pase_DAI = $request->destin_pase_DAI;
            $sumario->obs_pase_DAI = $request->obs_pase_DAI;
            $sumario->concluido_DAI = $request->concluido_DAI; 
        
            $sumario->apellido_nombre_DGAJ = $request->apellido_nombre_DGAJ;
            $sumario->leg_pers_DGAJ = $request->leg_pers_DGAJ;
            $sumario->dependen_DGAJ = $request->dependen_DGAJ;
            $sumario->jerarquia_DGAJ = $request->jerarquia_DGAJ;
            $sumario->fecha_mov_proceDGAJ = $request->fecha_mov_proceDGAJ;
            $sumario->destin_proced_DGAJ = $request->destin_proced_DGAJ;
            $sumario->sugerencia_DGAJ = $request->sugerencia_DGAJ;
            $sumario->obs_proced_DGAJ = $request->obs_proced_DGAJ;
            $sumario->fecha_mov_destDGAJ = $request->fecha_mov_destDGAJ;
            $sumario->destin_pase_DGAJ = $request->destin_pase_DGAJ;
            $sumario->obs_pase_DGAJ = $request->obs_pase_DGAJ;
            $sumario->concluido_DGAJ = $request->concluido_DGAJ;
            
            $sumario->apellido_nombre_AL = $request->apellido_nombre_AL;
            $sumario->leg_pers_AL = $request->leg_pers_AL;
            $sumario->dependen_AL = $request->dependen_AL;
            $sumario->jerarquia_AL = $request->jerarquia_AL;
            $sumario->reg_interno_AL = $request->reg_interno_AL;
            $sumario->fecha_mov_procAL = $request->fecha_mov_procAL;
            $sumario->destin_proceden_AL = $request->destin_proceden_AL;
            $sumario->sugerencia_AL = $request->sugerencia_AL;
            $sumario->obs_proced_AL = $request->obs_proced_AL;
            $sumario->fecha_mov_paseAL = $request->fecha_mov_paseAL;
            $sumario->destin_pase_AL = $request->destin_pase_AL;
            $sumario->obs_pase_AL = $request->obs_pase_AL;
            $sumario->concluido_AL = $request->concluido_AL;
        
            $sumario->apellido_nombre_DGRRHH = $request->apellido_nombre_DGRRHH;
            $sumario->leg_pers_DGRRHH = $request->leg_pers_DGRRHH;
            $sumario->dependen_DGRRHH = $request->dependen_DGRRHH;
            $sumario->jerarquia_DGRRHH = $request->jerarquia_DGRRHH;
            $sumario->reg_interno_DGRRHH = $request->reg_interno_DGRRHH;
            $sumario->fecha_mov_proceDGRRHH = $request->fecha_mov_proceDGRRHH;
            $sumario->destin_proceden_DGRRHH = $request->destin_proceden_DGRRHH;
            $sumario->resol_final_DGRRHH = $request->resol_final_DGRRHH;
            $sumario->obs_proced_DGRRHH = $request->obs_proced_DGRRHH;
            $sumario->fecha_mov_paseDGRRHH = $request->fecha_mov_paseDGRRHH;
            $sumario->destin_pase_DGRRHH = $request->destin_pase_DGRRHH;
            $sumario->obs_pase_DGRRHH = $request->obs_pase_DGRRHH;
            $sumario->concluido_DGRRHH = $request->concluido_DGRRHH;
            $sumario->DGRRHH_N° = $request->DGRRHH_N°;
            $sumario->fecha_notificacion = $request->fecha_notificacion;
                  
            $sumario->save();

            //dd($request->all());
            $sumario->infractors()->attach($request->input('apellido_nombre_inf'));
                          
            return redirect()->route('sumarios')->with('message','Registrado correctamente!');
    }


    public function update(Request $request){
        // dd($request->all());
        $validator = $request -> validate ([
          'num_dja'=> 'required',
          'lugar_proced' => 'required',
          'fecha_ingreso' => 'required',
          'num_dj' => 'required',
          'fecha_inicio' => 'required',
          'fojas' =>'required',
          'infraccion' => 'required',
          'motivo' => 'required',
          'tipo_denun' => 'required',
          'fecha_movimiento' =>'required' ,
          'destino_pase' =>'required' ,
          'extracto' =>'required' ,
        
          ]);
    
    
        $sumario = Sumario::find($request->sumario_id);
    
        $sumario->num_dja  = $request->num_dja;
        $sumario->lugar_proced  = $request->lugar_proced;
        $sumario->fecha_ingreso = $request->fecha_ingreso;
        $sumario->num_dj  = $request->num_dj;
        $sumario->fecha_inicio = $request->fecha_inicio;
        $sumario->fojas = $request->fojas;
        $sumario->infraccion = $request->infraccion;
        $sumario->motivo = $request->motivo; 
        $sumario->extracto = $request->extracto;
        $sumario->tipo_denun = $request->tipo_denun;
        $sumario->fecha_movimiento = $request->fecha_movimiento;
        $sumario->destino_pase = $request->destino_pase;
        $sumario->observaciones = $request->observaciones;
                  
        $sumario->apellido_nombre_DAI = $request->apellido_nombre_DAI;
        $sumario->leg_pers_DAI = $request->leg_pers_DAI;
        $sumario->jerarquia_DAI = $request->jerarquia_DAI;
        $sumario->dependen_DAI = $request->dependen_DAI;
        $sumario->reg_interno_DAI = $request->reg_interno_DAI;
        $sumario->fecha_mov_proceDAI = $request->fecha_mov_proceDAI;
        $sumario->destin_proceden_DAI = $request->destin_proceden_DAI;
        $sumario->obs_proced_DAI = $request->obs_proced_DAI;
        $sumario->sugerencia_DAI = $request->sugerencia_DAI;
        $sumario->fecha_elev_inst_DAI = $request->fecha_elev_inst_DAI;
        $sumario->fecha_mov_paseDAI = $request->fecha_mov_paseDAI;
        $sumario->destin_pase_DAI = $request->destin_pase_DAI;
        $sumario->obs_pase_DAI = $request->obs_pase_DAI;
        $sumario->concluido_DAI = $request->concluido_DAI; 
    
        $sumario->apellido_nombre_DGAJ = $request->apellido_nombre_DGAJ;
        $sumario->leg_pers_DGAJ = $request->leg_pers_DGAJ;
        $sumario->jerarquia_DGAJ = $request->jerarquia_DGAJ;
        $sumario->dependen_DGAJ = $request->dependen_DGAJ;
        $sumario->fecha_mov_proceDGAJ = $request->fecha_mov_proceDGAJ;
        $sumario->destin_proced_DGAJ = $request->destin_proced_DGAJ;
        $sumario->sugerencia_DGAJ = $request->sugerencia_DGAJ;
        $sumario->obs_proced_DGAJ = $request->obs_proced_DGAJ;
        $sumario->fecha_mov_destDGAJ = $request->fecha_mov_destDGAJ;
        $sumario->destin_pase_DGAJ = $request->destin_pase_DGAJ;
        $sumario->obs_pase_DGAJ = $request->obs_pase_DGAJ;
        $sumario->concluido_DGAJ = $request->concluido_DGAJ;
        
        $sumario->apellido_nombre_AL = $request->apellido_nombre_AL;
        $sumario->leg_pers_AL = $request->leg_pers_AL;
        $sumario->jerarquia_AL = $request->jerarquia_AL;
        $sumario->dependen_AL = $request->dependen_AL;
        $sumario->reg_interno_AL = $request->reg_interno_AL;
        $sumario->fecha_mov_procAL = $request->fecha_mov_procAL;
        $sumario->destin_proceden_AL = $request->destin_proceden_AL;
        $sumario->sugerencia_AL = $request->sugerencia_AL;
        $sumario->obs_proced_AL = $request->obs_proced_AL;
        $sumario->fecha_mov_paseAL = $request->fecha_mov_paseAL;
        $sumario->destin_pase_AL = $request->destin_pase_AL;
        $sumario->obs_pase_AL = $request->obs_pase_AL;
        $sumario->concluido_AL = $request->concluido_AL;
    
        $sumario->apellido_nombre_DGRRHH = $request->apellido_nombre_DGRRHH;
        $sumario->leg_pers_DGRRHH = $request->leg_pers_DGRRHH;
        $sumario->jerarquia_DGRRHH = $request->jerarquia_DGRRHH;
        $sumario->dependen_DGRRHH = $request->dependen_DGRRHH;
        $sumario->reg_interno_DGRRHH = $request->reg_interno_DGRRHH;
        $sumario->fecha_mov_proceDGRRHH = $request->fecha_mov_proceDGRRHH;
        $sumario->destin_proceden_DGRRHH = $request->destin_proceden_DGRRHH;
        $sumario->resol_final_DGRRHH = $request->resol_final_DGRRHH;
        $sumario->obs_proced_DGRRHH = $request->obs_proced_DGRRHH;
        $sumario->fecha_mov_paseDGRRHH = $request->fecha_mov_paseDGRRHH;
        $sumario->destin_pase_DGRRHH = $request->destin_pase_DGRRHH;
        $sumario->obs_pase_DGRRHH = $request->obs_pase_DGRRHH;
        $sumario->concluido_DGRRHH = $request->concluido_DGRRHH;
        $sumario->DGRRHH_N° = $request->DGRRHH_N°;
        $sumario->fecha_notificacion = $request->fecha_notificacion;

        //dd($request->all());
        $sumario->save();

        //$sumario->update($request->all());

        $sumario->infractors()->sync($request->input('apellido_nombre_inf'));  

        return redirect()->route('sumarios')->with('message','Actualizado correctamente!');
      }


      public function destroy($sumario_id){

        $sumario = Sumario::find($sumario_id);
        $sumario -> delete();
    
        return redirect()->route('sumarios')->with('message','Eliminado correctamente!');
    
      }




}
