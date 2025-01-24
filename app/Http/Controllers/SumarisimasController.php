<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sumarisima;
use App\Models\Infractor;
use App\Models\Dependencia;
use App\Models\Motivo;
use App\Models\TipoDenuncia;
use App\Models\Jerarquia;
use App\Exports\SumarisimasExport;
use Maatwebsite\Excel\Facades\Excel;

use Spatie\Permission\Traits\HasRoles;

class SumarisimasController extends Controller
{

  public function __construct(){

    $this->middleware('can:CrearSumarisima')->only('create');
    $this->middleware('can:EliminarSumarisima')->only('destroy');
   
  }
  
  
  //////////////////////////////////////////////////////////////////
    /////////   REINGRESOS ///////////////////////////////////////////
    //////////////////////////////////////////////////////////////////

    public function mostrarFormularioReingreso($id)
      {
          // Encontrar el sumario original
          $sumarisima = Sumarisima::findOrFail($id);
          ////////////
         
          $dependencias = Dependencia::all();
          $motivos = Motivo::all();
          $tipo_denuncias = TipoDenuncia::all();
          $jerarquias = Jerarquia::all();

          $infractores = Infractor::all();
          $infractores_ids = $sumarisima->infractors()->pluck('infractors.id');
          
          $motivos = Motivo::all();
          $motivos_ids = $sumarisima->motivos()->pluck('motivos.id');  

          // Mostrar la vista con el formulario para crear un reingreso
          // return view('sumarios.create-reingreso', compact('sumario'));
          return view('sumarisimas-create-reingreso',compact('motivos','motivos_ids','jerarquias','tipo_denuncias',
          'motivos','sumarisima','infractores','infractores_ids','dependencias'));
      }
    
    
      public function storeReingreso(Request $request, $id)
      {
          // Encontrar el sumario original
          $sumarisimaOriginal = Sumarisima::findOrFail($id);
          $nuevoSumarisima = $sumarisimaOriginal->crearReingreso($request->all());
               
          $nuevoSumarisima->motivos()->attach($request->input('nombre_mot'));
          $nuevoSumarisima->infractors()->attach($request->input('apellido_nombre_inf'));
           //dd($request->all());              
          return redirect()->route('sumarisimas')->with('message','Registrado correctamente!');
     
      }

      
     //////////////////////////////////////////////////////////////////
    ////////// TORTA ESTADISTICA ///////////////////////////////////////////
    //////////////////////////////////////////////////////////////////

    public function getMotivosData()
    {
        $motivos = \DB::table('motivo_sumarisima')
                      ->join('motivos', 'motivo_sumarisima.motivo_id', '=', 'motivos.id')
                      ->select('motivos.nombre_mot', \DB::raw('COUNT(motivo_sumarisima.sumarisima_id) as total'))
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

        return Excel::download(new SumarisimasExport($fechaInicial, $fechaFinal), 'sumarisimas.xlsx');
    }

     //////////////////////////////////////////////////////////////////
    ///////// CONSULTAS POR MOTIVOS ///////////////////////////////////////////
    //////////////////////////////////////////////////////////////////

    public function consulta(){
             
          $sumarisimas1 = Sumarisima::whereHas('motivos', function($query) {
            $query->where('nombre_mot', 'LIKE', 'violencia de genero');
            })->get();

          $sumarisimas2 = Sumarisima::whereHas('motivos', function($query) {
            $query->where('nombre_mot', 'LIKE', 'AUSENTISMO LABORAL');
            })->get();

          $sumarisimas3 = Sumarisima::whereHas('motivos', function($query) {
            $query->where('nombre_mot', 'LIKE', 'PERDIDA Y/O SUSTRACCION DEL ARMA REGLAMENTARIA');
            })->get();
          
          $sumarisimas4 = Sumarisima::whereHas('motivos', function($query) {
            $query->where('nombre_mot', 'LIKE', 'SINIESTRO VIAL');
            })->get();
              
            $sumarisimas5 = Sumarisima::whereHas('motivos', function($query) {
            $query->where('nombre_mot', 'LIKE', 'abuso sexual');
            })->get();

          $sumarisimas6 = Sumarisima::whereHas('motivos', function($query) {
            $query->where('nombre_mot', 'LIKE', 'EBRIEDAD');
            })->get();

          $sumarisimas7 = Sumarisima::whereHas('motivos', function($query) {
            $query->where('nombre_mot', 'LIKE', 'IRREGULARIDADES EN SERVICIO ADICIONAL');
            })->get();
          
          $sumarisimas8 = Sumarisima::whereHas('motivos', function($query) {
            $query->where('nombre_mot', 'LIKE', 'IRREGULARIDADES CON COMBUSTIBLE');
            })->get();

          $sumarisimas9 = Sumarisima::whereHas('motivos', function($query) {
            $query->where('nombre_mot', 'LIKE', 'USO INDEBIDO DEL CELULAR');
            })->get();

          $sumarisimas10 = Sumarisima::whereHas('motivos', function($query) {
            $query->where('nombre_mot', 'LIKE', 'USO INDEBIDO DE ARMA REGLAMENTARIA');
            })->get();

          $sumarisimas11 = Sumarisima::whereHas('motivos', function($query) {
            $query->where('nombre_mot', 'LIKE', 'SUPUESTA INFRACCION AL ART. 205 DEL C.P.A');
            })->get();
          
          $sumarisimas12 = Sumarisima::whereHas('motivos', function($query) {
            $query->where('nombre_mot', 'LIKE', 'OTRO');
            })->get();
                    

          $sumarisimas = Sumarisima::all();
            
          return view('sumarisimas-consulta',compact('sumarisimas','sumarisimas1','sumarisimas2','sumarisimas3','sumarisimas4','sumarisimas5',
                                      'sumarisimas6','sumarisimas7','sumarisimas8','sumarisimas9','sumarisimas10',
                                      'sumarisimas11','sumarisimas12'));
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
        

        $sumarisimas = Sumarisima::whereDate('fecha_ingreso','>=',$fechaInicial)
                            ->whereDate('fecha_ingreso','<=',$fechaFinal)
                        
                            ->get();
        
        return view('sumarisimas',compact('sumarisimas'));                    
      }


        //////////////////////////////////////////////////////////////////
    /////////   CRUD SUMARISIMAS ///////////////////////////////////////////
    //////////////////////////////////////////////////////////////////
      
    public function index(){

       $sumarisimas = Sumarisima::all();
        //$sumarisimas = Sumarisima::with(['infractors'])->get();
       
        return view('sumarisimas',compact('sumarisimas'));
    }

    public function create(){

        $sumarisimas = Sumarisima::all();
        $infractores = Infractor::all();
        $dependencias = Dependencia::all();
        $motivos = Motivo::all();
        $tipo_denuncias = TipoDenuncia::all();
        $jerarquias = Jerarquia::all();
       
        return view('sumarisimas-create',compact('jerarquias','tipo_denuncias','motivos','sumarisimas','infractores','dependencias'));
    }

    public function show($sumarisima_id){

        $sumarisima = Sumarisima::find($sumarisima_id);

        $infractores = Infractor::all();
        $infractores_ids = $sumarisima->infractors()->pluck('infractors.id');

        $motivos = Motivo::all();
        $motivos_ids = $sumarisima->motivos()->pluck('motivos.id');        
       
        return view('sumarisimas-show',compact('motivos','motivos_ids','sumarisima','infractores','infractores_ids'));
    }

    public function edit($sumarisima_id){

      $sumarisima = Sumarisima::find($sumarisima_id);

      $dependencias = Dependencia::all();
      $motivos = Motivo::all();
      $tipo_denuncias = TipoDenuncia::all();
      $jerarquias = Jerarquia::all();

      $infractores = Infractor::all();
      $infractores_ids = $sumarisima->infractors()->pluck('infractors.id');
      
      $motivos = Motivo::all();
      $motivos_ids = $sumarisima->motivos()->pluck('motivos.id');      
     
      return view('sumarisimas-edit',compact('motivos','motivos_ids','jerarquias','tipo_denuncias','motivos','sumarisima','infractores','infractores_ids','dependencias'));
    }

    public function store(Request $request)  {
        $validator = $request -> validate ([
          'num_dj'=> 'required|unique:sumarisimas',
          'fecha_ingreso' => 'required',
          'fojas' =>'required',
         // 'motivo' => 'required',
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
       // $sumarisima->motivo = $request->motivo;
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

        $sumarisima->motivos()->attach($request->input('nombre_mot'));
        $sumarisima->infractors()->attach($request->input('apellido_nombre_inf'));
      
        return redirect()->route('sumarisimas')->with('message','Registrado correctamente!');
    
      }

      public function update(Request $request){

        $validator = $request -> validate ([
        'num_dj'=> 'required',
        'fecha_ingreso' => 'required',
        'fojas' =>'required',
        //'motivo' => 'required',
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
       // $sumarisima->motivo = $request->motivo;
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

       $sumarisima->motivos()->sync($request->input('nombre_mot'));  
       $sumarisima->infractors()->sync($request->input('apellido_nombre_inf'));
            
       return redirect()->route('sumarisimas')->with('message','Actualizado correctamente!');
      }

      public function destroy($sumarisima_id){

        $sumarisima = Sumarisima::find ($sumarisima_id);
        $sumarisima -> delete();
 
        return redirect()->route('sumarisimas')->with('message','Eliminado correctamente!');
    
      }      

}
