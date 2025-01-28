<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Isa;
use App\Models\Infractor;
use App\Models\Dependencia;
use App\Models\Motivo;
use App\Models\TipoDenuncia;
use App\Models\Jerarquia;
use App\Exports\IsasExport;
use Maatwebsite\Excel\Facades\Excel;
use Spatie\Permission\Traits\HasRoles;


class IsasController extends Controller
{
   //////////////////////////////////////////////////////////////////
    ///////// CONTROL ACCESOS ///////////////////////////////////////////
    //////////////////////////////////////////////////////////////////    

    public function __construct(){

        $this->middleware('can:CrearSumario')->only('create');
        $this->middleware('can:EliminarSumario')->only('destroy');

       
    }
    
     //////////////////////////////////////////////////////////////////
    /////////   REINGRESOS ///////////////////////////////////////////
    //////////////////////////////////////////////////////////////////

    public function mostrarFormularioReingreso($id)
      {
          // Encontrar la isa original
          $isa = Isa::findOrFail($id);
          ////////////
          $dependencias = Dependencia::all();
          $motivos = Motivo::all();
          $tipo_denuncias = TipoDenuncia::all();
          $jerarquias = Jerarquia::all();

          $infractores = Infractor::all();
          $infractores_ids = $isa->infractors()->pluck('infractors.id');
          
          $motivos = Motivo::all();
          $motivos_ids = $isa->motivos()->pluck('motivos.id');  

          // Mostrar la vista con el formulario para crear un reingreso
       
         return view('isas-create-reingreso',compact('motivos','motivos_ids','jerarquias','tipo_denuncias',
         'isa','infractores','infractores_ids','dependencias'));
      }
    
    
      public function storeReingreso(Request $request, $id)
      {
          // Encontrar la isa original
          $isaOriginal = Isa::findOrFail($id);
          $nuevoIsa= $isaOriginal->crearReingreso($request->all());
               
          $nuevoIsa->motivos()->attach($request->input('nombre_mot'));
          $nuevoIsa->infractors()->attach($request->input('apellido_nombre_inf'));
           //dd($request->all());              
          return redirect()->route('isas')->with('message','Registrado correctamente!');
     
      }

         //////////////////////////////////////////////////////////////////
    ////////// TORTA ESTADISTICA ///////////////////////////////////////////
    //////////////////////////////////////////////////////////////////

    public function getMotivosData()
    {
        $motivos = \DB::table('isa_motivo')
                      ->join('motivos', 'isa_motivo.motivo_id', '=', 'motivos.id')
                      ->select('motivos.nombre_mot', \DB::raw('COUNT(isa_motivo.isa_id) as total'))
                      ->groupBy('motivos.nombre_mot')
                      ->get();
    
        return response()->json($motivos);
    }
    
    
     //////////////////////////////////////////////////////////////////
    ///////// EXPORTACION EXCEL ///////////////////////////////////////////
    //////////////////////////////////////////////////////////////////

    public function export(Request $request)
    {
      
      $fechaInicial = $request->query('start_date');
      $fechaFinal = $request->query('end_date');

        return Excel::download(new IsasExport($fechaInicial, $fechaFinal), 'isas.xlsx');
    }

     //////////////////////////////////////////////////////////////////
    ///////// CONSULTAS POR MOTIVOS ///////////////////////////////////////////
    //////////////////////////////////////////////////////////////////

    public function consulta(){
              /* $sumarios1 = Sumario::where('motivo','LIKE','VIOLENCIA DE GENERO')->get();
              $motivosBuscados = ['VIOLENCIA DE GENERO', 'ROBO', 'FRAUDE'];
              $sumarios = Sumario::whereHas('motivos', function($query) use ($motivosBuscados) {
              $query->whereIn('nombre_mot', $motivosBuscados);
          })->get();*/

          $isas1 = Isa::whereHas('motivos', function($query) {
            $query->where('nombre_mot', 'LIKE', 'violencia de genero');
            })->get();

          $isas2 = Isa::whereHas('motivos', function($query) {
            $query->where('nombre_mot', 'LIKE', 'AUSENTISMO LABORAL');
            })->get();

          $isas3 = Isa::whereHas('motivos', function($query) {
            $query->where('nombre_mot', 'LIKE', 'PERDIDA Y/O SUSTRACCION DEL ARMA REGLAMENTARIA');
            })->get();
          
          $isas4 = Isa::whereHas('motivos', function($query) {
            $query->where('nombre_mot', 'LIKE', 'SINIESTRO VIAL');
            })->get();
              
          $isas5 = Isa::whereHas('motivos', function($query) {
            $query->where('nombre_mot', 'LIKE', 'abuso sexual');
            })->get();

          $isas6 = Isa::whereHas('motivos', function($query) {
            $query->where('nombre_mot', 'LIKE', 'EBRIEDAD');
            })->get();

          $isas7 = Isa::whereHas('motivos', function($query) {
            $query->where('nombre_mot', 'LIKE', 'IRREGULARIDADES EN SERVICIO ADICIONAL');
            })->get();
          
          $isas8 = Isa::whereHas('motivos', function($query) {
            $query->where('nombre_mot', 'LIKE', 'IRREGULARIDADES CON COMBUSTIBLE');
            })->get();

          $isas9 = Isa::whereHas('motivos', function($query) {
            $query->where('nombre_mot', 'LIKE', 'USO INDEBIDO DEL CELULAR');
            })->get();

          $isas10 = Isa::whereHas('motivos', function($query) {
            $query->where('nombre_mot', 'LIKE', 'USO INDEBIDO DE ARMA REGLAMENTARIA');
            })->get();

          $isas11 = Isa::whereHas('motivos', function($query) {
            $query->where('nombre_mot', 'LIKE', 'SUPUESTA INFRACCION AL ART. 205 DEL C.P.A');
            })->get();
          
          $isas12 = Isa::whereHas('motivos', function($query) {
            $query->where('nombre_mot', 'LIKE', 'OTRO');
            })->get();
                    

          $isas = Isa::all();
            
          return view('isas-consulta',compact('isas','isas1','isas2','isas3','isas4','isas5',
                                      'isas6','isas7','isas8','isas9','isas10',
                                      'isas11','isas12'));
    }

    //////////////////////////////////////////////////////////////////
    ///////// FILTRADO DE FECHAS ///////////////////////////////////////////
    //////////////////////////////////////////////////////////////////


      public function filtrado(Request $request){
        
        $validator = $request -> validate ([
          'fechaInicial' => 'required',
          'fechaFinal' => 'required',
                                                  
          ]);

        $fechaInicial = $request->fechaInicial;
        $fechaFinal = $request->fechaFinal;
        

        $isas = Isa::whereDate('fecha_ingreso','>=',$fechaInicial)
                            ->whereDate('fecha_ingreso','<=',$fechaFinal)
                        
                            ->get();
        
        return view('isas',compact('isas'));                    
      }



     //////////////////////////////////////////////////////////////////
    /////////   CRUD ISAS ///////////////////////////////////////////
    //////////////////////////////////////////////////////////////////  
    

    public function index(){

        $isas = Isa::all();
        $motivos = Motivo::all();
        $infractores = Infractor::all();
        
        return view('isas',compact('isas','infractores','motivos'));
    }

    public function create(){

        $isas = Isa::all();
        $infractores = Infractor::all();

        $dependencias = Dependencia::all();
        $motivos = Motivo::all();
        $tipo_denuncias = TipoDenuncia::all();
        $jerarquias = Jerarquia::all();
       
        return view('isas-create',compact('jerarquias','tipo_denuncias','motivos','isas','infractores','dependencias'));
    }


    public function show($isa_id){

        $isa = Isa::find($isa_id);

        $infractores = Infractor::all();
        $infractores_ids = $isa->infractors()->pluck('infractors.id');
        
        $motivos = Motivo::all();
        $motivos_ids = $isa->motivos()->pluck('motivos.id');   
       
        return view('isas-show',compact('motivos','motivos_ids','isa','infractores','infractores_ids'));
    }

    public function edit($isa_id){

      $isa = Isa::find($isa_id);

      $dependencias = Dependencia::all();
      $motivos = Motivo::all();
      $tipo_denuncias = TipoDenuncia::all();
      $jerarquias = Jerarquia::all();

      $infractores = Infractor::all();
      $infractores_ids = $isa->infractors()->pluck('infractors.id');
      
      $motivos = Motivo::all();
      $motivos_ids = $isa->motivos()->pluck('motivos.id');  
     
      return view('isas-edit',compact('motivos','motivos_ids','jerarquias','tipo_denuncias','motivos','isa','infractores','infractores_ids','dependencias'));
  }

    public function store(Request $request){

           // dd($request->all());

            $validator = $request -> validate ([
            'num_dja'=> 'required|unique:isas',
            'lugar_proced' => 'required',
            'fecha_ingreso' => 'required',
            'num_dj' => ['required','unique:isas'],
            'fecha_inicio' => 'required',
            'fojas' =>'required',
            'deslindar_resp' =>'required',
            'fecha_movimiento' =>'required' ,
            'destino_pase' =>'required' ,
                                                 
            ]);
     
            $isa =new Isa();
                   
            $isa->num_dja  = $request->num_dja;
            $isa->lugar_proced  = $request->lugar_proced;
            $isa->fecha_ingreso = $request->fecha_ingreso;
            $isa->num_dj  = $request->num_dj;
            $isa->fecha_inicio = $request->fecha_inicio;
            $isa->fojas = $request->fojas;
            $isa->deslindar_resp = $request->deslindar_resp;
          //  $isa->motivo = $request->motivo;
            $isa->tipo_denun = $request->tipo_denun;
            $isa->fecha_movimiento = $request->fecha_movimiento;
            $isa->destino_pase = $request->destino_pase;
            $isa->observaciones = $request->observaciones;
            $isa->elevado_por_instruccion = $request->elevado_por_instruccion;
            $isa->opinion_sede_inst = $request->opinion_sede_inst;
            $isa->conversion_convalid = $request->conversion_convalid;
            
                   
            $isa->apellido_nombre_DAI = $request->apellido_nombre_DAI;
            $isa->leg_pers_DAI = $request->leg_pers_DAI;
            $isa->dependen_DAI = $request->dependen_DAI;
            $isa->jerarquia_DAI = $request->jerarquia_DAI;
            $isa->reg_interno_DAI = $request->reg_interno_DAI;
            $isa->fecha_mov_proceDAI = $request->fecha_mov_proceDAI;
            $isa->destin_proceden_DAI = $request->destin_proceden_DAI;
            $isa->obs_proced_DAI = $request->obs_proced_DAI;
            $isa->sugerencia_DAI = $request->sugerencia_DAI;
            $isa->fecha_elev_inst_DAI = $request->fecha_elev_inst_DAI;
            $isa->fecha_mov_paseDAI = $request->fecha_mov_paseDAI;
            $isa->destin_pase_DAI = $request->destin_pase_DAI;
            $isa->obs_pase_DAI = $request->obs_pase_DAI;
            $isa->concluido_DAI = $request->concluido_DAI; 
        
            $isa->apellido_nombre_DGAJ = $request->apellido_nombre_DGAJ;
            $isa->leg_pers_DGAJ = $request->leg_pers_DGAJ;
            $isa->dependen_DGAJ = $request->dependen_DGAJ;
            $isa->jerarquia_DGAJ = $request->jerarquia_DGAJ;
            $isa->fecha_mov_proceDGAJ = $request->fecha_mov_proceDGAJ;
            $isa->destin_proced_DGAJ = $request->destin_proced_DGAJ;
            $isa->sugerencia_DGAJ = $request->sugerencia_DGAJ;
            $isa->obs_proced_DGAJ = $request->obs_proced_DGAJ;
            $isa->fecha_mov_destDGAJ = $request->fecha_mov_destDGAJ;
            $isa->destin_pase_DGAJ = $request->destin_pase_DGAJ;
            $isa->obs_pase_DGAJ = $request->obs_pase_DGAJ;
            $isa->concluido_DGAJ = $request->concluido_DGAJ;

            $isa->apellido_nombre_AL = $request->apellido_nombre_AL;
            $isa->leg_pers_AL = $request->leg_pers_AL;
            $isa->dependen_AL = $request->dependen_AL;
            $isa->jerarquia_AL = $request->jerarquia_AL;
            $isa->reg_interno_AL = $request->reg_interno_AL;
            $isa->fecha_mov_procAL = $request->fecha_mov_procAL;
            $isa->destin_proceden_AL = $request->destin_proceden_AL;
            $isa->sugerencia_AL = $request->sugerencia_AL;
            $isa->obs_proced_AL = $request->obs_proced_AL;
            $isa->fecha_mov_paseAL = $request->fecha_mov_paseAL;
            $isa->destin_pase_AL = $request->destin_pase_AL;
            $isa->obs_pase_AL = $request->obs_pase_AL;
            $isa->concluido_AL = $request->concluido_AL;
        
            $isa->apellido_nombre_DGRRHH = $request->apellido_nombre_DGRRHH;
            $isa->leg_pers_DGRRHH = $request->leg_pers_DGRRHH;
            $isa->dependen_DGRRHH = $request->dependen_DGRRHH;
            $isa->jerarquia_DGRRHH = $request->jerarquia_DGRRHH;
            $isa->reg_interno_DGRRHH = $request->reg_interno_DGRRHH;
            $isa->fecha_mov_proceDGRRHH = $request->fecha_mov_proceDGRRHH;
            $isa->destin_proceden_DGRRHH = $request->destin_proceden_DGRRHH;
            $isa->resol_final_DGRRHH = $request->resol_final_DGRRHH;
            $isa->obs_proced_DGRRHH = $request->obs_proced_DGRRHH;
            $isa->fecha_mov_paseDGRRHH = $request->fecha_mov_paseDGRRHH;
            $isa->destin_pase_DGRRHH = $request->destin_pase_DGRRHH;
            $isa->obs_pase_DGRRHH = $request->obs_pase_DGRRHH;
            $isa->concluido_DGRRHH = $request->concluido_DGRRHH;
            $isa->DGRRHH_N° = $request->DGRRHH_N°;
            $isa->fecha_notificacion = $request->fecha_notificacion;
                  
            $isa->save();

            //dd($request->all());
            $isa->motivos()->attach($request->input('nombre_mot'));
            $isa->infractors()->attach($request->input('apellido_inf'));
                          
            return redirect()->route('isas')->with('message','Registrado correctamente!');
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
          'deslindar_resp' =>'required',
        //  'motivo' => 'required',
          'fecha_movimiento' =>'required' ,
          'destino_pase' =>'required' ,
                                              
          ]);
    
    
        $isa = Isa::find($request->isa_id);
    
        $isa->num_dja  = $request->num_dja;
        $isa->lugar_proced  = $request->lugar_proced;
        $isa->fecha_ingreso = $request->fecha_ingreso;
        $isa->num_dj  = $request->num_dj;
        $isa->fecha_inicio = $request->fecha_inicio;
        $isa->fojas = $request->fojas;
        $isa->deslindar_resp = $request->deslindar_resp;
      //  $isa->motivo = $request->motivo;
        $isa->tipo_denun = $request->tipo_denun;
        $isa->fecha_movimiento = $request->fecha_movimiento;
        $isa->destino_pase = $request->destino_pase;
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
        $isa->sugerencia_DAI = $request->sugerencia_DAI;
        $isa->fecha_elev_inst_DAI = $request->fecha_elev_inst_DAI;
        $isa->fecha_mov_paseDAI = $request->fecha_mov_paseDAI;
        $isa->destin_pase_DAI = $request->destin_pase_DAI;
        $isa->obs_pase_DAI = $request->obs_pase_DAI;
        $isa->concluido_DAI = $request->concluido_DAI; 
    
        $isa->apellido_nombre_DGAJ = $request->apellido_nombre_DGAJ;
        $isa->leg_pers_DGAJ = $request->leg_pers_DGAJ;
        $isa->jerarquia_DGAJ = $request->jerarquia_DGAJ;
        $isa->dependen_DGAJ = $request->dependen_DGAJ;
        $isa->fecha_mov_proceDGAJ = $request->fecha_mov_proceDGAJ;
        $isa->destin_proced_DGAJ = $request->destin_proced_DGAJ;
        $isa->sugerencia_DGAJ = $request->sugerencia_DGAJ;
        $isa->obs_proced_DGAJ = $request->obs_proced_DGAJ;
        $isa->fecha_mov_destDGAJ = $request->fecha_mov_destDGAJ;
        $isa->destin_pase_DGAJ = $request->destin_pase_DGAJ;
        $isa->obs_pase_DGAJ = $request->obs_pase_DGAJ;
        $isa->concluido_DGAJ = $request->concluido_DGAJ;
        
        $isa->apellido_nombre_AL = $request->apellido_nombre_AL;
        $isa->leg_pers_AL = $request->leg_pers_AL;
        $isa->jerarquia_AL = $request->jerarquia_AL;
        $isa->dependen_AL = $request->dependen_AL;
        $isa->reg_interno_AL = $request->reg_interno_AL;
        $isa->fecha_mov_procAL = $request->fecha_mov_procAL;
        $isa->destin_proceden_AL = $request->destin_proceden_AL;
        $isa->sugerencia_AL = $request->sugerencia_AL;
        $isa->obs_proced_AL = $request->obs_proced_AL;
        $isa->fecha_mov_paseAL = $request->fecha_mov_paseAL;
        $isa->destin_pase_AL = $request->destin_pase_AL;
        $isa->obs_pase_AL = $request->obs_pase_AL;
        $isa->concluido_AL = $request->concluido_AL;
    
        $isa->apellido_nombre_DGRRHH = $request->apellido_nombre_DGRRHH;
        $isa->leg_pers_DGRRHH = $request->leg_pers_DGRRHH;
        $isa->jerarquia_DGRRHH = $request->jerarquia_DGRRHH;
        $isa->dependen_DGRRHH = $request->dependen_DGRRHH;
        $isa->reg_interno_DGRRHH = $request->reg_interno_DGRRHH;
        $isa->fecha_mov_proceDGRRHH = $request->fecha_mov_proceDGRRHH;
        $isa->destin_proceden_DGRRHH = $request->destin_proceden_DGRRHH;
        $isa->resol_final_DGRRHH = $request->resol_final_DGRRHH;
        $isa->obs_proced_DGRRHH = $request->obs_proced_DGRRHH;
        $isa->fecha_mov_paseDGRRHH = $request->fecha_mov_paseDGRRHH;
        $isa->destin_pase_DGRRHH = $request->destin_pase_DGRRHH;
        $isa->obs_pase_DGRRHH = $request->obs_pase_DGRRHH;
        $isa->concluido_DGRRHH = $request->concluido_DGRRHH;
        $isa->DGRRHH_N° = $request->DGRRHH_N°;
        $isa->fecha_notificacion = $request->fecha_notificacion;

        //dd($request->all());
        $isa->save();

        //$isa->update($request->all());
        $isa->motivos()->sync($request->input('nombre_mot'));  
        $isa->infractors()->sync($request->input('apellido_nombre_inf'));  

        return redirect()->route('isas')->with('message','Actualizado correctamente!');
      }


      public function destroy($isa_id){

        $isa = Isa::find($isa_id);
        $isa -> delete();
    
        return redirect()->route('isas')->with('message','Eliminado correctamente!');
    
      }


}
