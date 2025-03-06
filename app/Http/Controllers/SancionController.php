<?php

namespace App\Http\Controllers;
use App\Models\Sumarisima;
use App\Models\Infractor;
use App\Models\Dependencia;
use App\Models\Sancione;
use App\Models\Motivo;
use App\Models\TipoDenuncia;
use App\Models\Jerarquia;
use App\Exports\SancionesExport;
use Maatwebsite\Excel\Facades\Excel;




use Illuminate\Http\Request;

class SancionController extends Controller
{
    public function __construct(){

        $this->middleware('can:CrearSancion')->only('create');
        $this->middleware('can:EliminarSancion')->only('destroy');
      
    }
    
     //////////////////////////////////////////////////////////////////
    /////////   REINGRESOS ///////////////////////////////////////////
    //////////////////////////////////////////////////////////////////

    public function mostrarFormularioReingreso($id)
      {
          // Encontrar la sancion original
          $sancione = Sancione::findOrFail($id);
          ////////////
         
          $dependencias = Dependencia::all();
          $motivos = Motivo::all();
          $tipo_denuncias = TipoDenuncia::all();
          $jerarquias = Jerarquia::all();

          $infractores = Infractor::all();
          $infractores_ids = $sancione->infractors()->pluck('infractors.id');
          
          $motivos = Motivo::all();
          $motivos_ids = $sancione->motivos()->pluck('motivos.id');  

          // Mostrar la vista con el formulario para crear un reingreso
       
         return view('sancion-create-reingreso',compact('motivos','motivos_ids','jerarquias','tipo_denuncias',
          'motivos','sancione','infractores','infractores_ids','dependencias'));
      }

      public function storeReingreso(Request $request, $id)
      {
          // Encontrar la sancion original
          $sancionOriginal = Sancione::findOrFail($id);
          $nuevoSancion = $sancionOriginal->crearReingreso($request->all());
               
          $nuevoSancion->motivos()->attach($request->input('nombre_mot'));
          $nuevoSancion->infractors()->attach($request->input('apellido_nombre_inf'));
           //dd($request->all());              
          return redirect()->route('sancion')->with('message','Registrado correctamente!');
     
      }

       //////////////////////////////////////////////////////////////////
    ////////// TORTA ESTADISTICA ///////////////////////////////////////////
    //////////////////////////////////////////////////////////////////

    public function getMotivosData()
    {
        $motivos = \DB::table('motivo_sancion')
                      ->join('motivos', 'motivo_sancion.motivo_id', '=', 'motivos.id')
                      ->select('motivos.nombre_mot', \DB::raw('COUNT(motivo_sancion.sancion_id) as total'))
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

        return Excel::download(new SancionesExport($fechaInicial, $fechaFinal), 'sanciones.xlsx');
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

          $sancion1 = Sancion::whereHas('motivos', function($query) {
            $query->where('nombre_mot', 'LIKE', 'violencia de genero');
            })->get();

          $sancion2 = Sancion::whereHas('motivos', function($query) {
            $query->where('nombre_mot', 'LIKE', 'AUSENTISMO LABORAL');
            })->get();

          $sancion3 = Sancion::whereHas('motivos', function($query) {
            $query->where('nombre_mot', 'LIKE', 'PERDIDA Y/O SUSTRACCION DEL ARMA REGLAMENTARIA');
            })->get();
          
          $sancion4 = Sancion::whereHas('motivos', function($query) {
            $query->where('nombre_mot', 'LIKE', 'SINIESTRO VIAL');
            })->get();
              
            $sancion5 = Sancion::whereHas('motivos', function($query) {
            $query->where('nombre_mot', 'LIKE', 'abuso sexual');
            })->get();

          $sancion6 = Sancion::whereHas('motivos', function($query) {
            $query->where('nombre_mot', 'LIKE', 'EBRIEDAD');
            })->get();

          $sancion7 = Sancion::whereHas('motivos', function($query) {
            $query->where('nombre_mot', 'LIKE', 'IRREGULARIDADES EN SERVICIO ADICIONAL');
            })->get();
          
          $sancion8 = Sancion::whereHas('motivos', function($query) {
            $query->where('nombre_mot', 'LIKE', 'IRREGULARIDADES CON COMBUSTIBLE');
            })->get();

          $sancion9 = Sancion::whereHas('motivos', function($query) {
            $query->where('nombre_mot', 'LIKE', 'USO INDEBIDO DEL CELULAR');
            })->get();

          $sancion10 = Sancion::whereHas('motivos', function($query) {
            $query->where('nombre_mot', 'LIKE', 'USO INDEBIDO DE ARMA REGLAMENTARIA');
            })->get();

          $sancion11 = Sancion::whereHas('motivos', function($query) {
            $query->where('nombre_mot', 'LIKE', 'SUPUESTA INFRACCION AL ART. 205 DEL C.P.A');
            })->get();
          
          $sancion12 = Sancion::whereHas('motivos', function($query) {
            $query->where('nombre_mot', 'LIKE', 'OTRO');
            })->get();
                    

          $sancion = Sancion::all();
            
          return view('sancion-consulta',compact('sancion1','sancion2','sancion3','sancion4','sancion5','sancion6',
                                      'sancion7','sancion8','sancion9','sancion10','sancion11',
                                      'sancion11','sancion12'));
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
        

        $sanciones = Sancione :: whereDate('fecha_ingreso','>=',$fechaInicial)
                            ->whereDate('fecha_ingreso','<=',$fechaFinal)
                        
                            ->get();
        
        return view('sancion',compact('sanciones'));                    
      }
    
     //////////////////////////////////////////////////////////////////
    /////////   CRUD SANCIONES ///////////////////////////////////////////
    //////////////////////////////////////////////////////////////////  
    
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
        $jerarquias = Jerarquia::all();
       
        return view('sancion-create',compact('jerarquias','tipo_denuncias','motivos','sanciones','infractores','dependencias'));
    }

    public function show($sancion_id){

        $sanciones = Sancione::find($sancion_id);
        
        $infractores = Infractor::all();
        $infractores_ids = $sanciones->infractors()->pluck('infractors.id');
        
        $motivos = Motivo::all();
        $motivos_ids = $sanciones->motivos()->pluck('motivos.id');   
              
        return view('sancion-show',compact('sanciones','infractores','infractores_ids','motivos_ids','motivos'));
    }

    public function edit($sancion_id){

        $sanciones = Sancione::find($sancion_id);
  
        $dependencias = Dependencia::all();
        $motivos = Motivo::all();
        $tipo_denuncias = TipoDenuncia::all();
        $jerarquias = Jerarquia::all();
  
        $infractores = Infractor::all();
        $infractores_ids = $sanciones->infractors()->pluck('infractors.id');
        
        $motivos = Motivo::all();
        $motivos_ids = $sanciones->motivos()->pluck('motivos.id');  
       
        return view('sancion-edit',compact('motivos','motivos_ids','jerarquias','tipo_denuncias','sanciones','infractores','infractores_ids','dependencias'));
    }

    public function store(Request $request)  {
        $validator = $request -> validate ([
          'num_dj'=> 'required|unique:sanciones',
          'fecha_ingreso' => 'required',
          'fojas' =>'required',
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
      //  $sanciones->motivo = $request->motivo;
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

        $sanciones->motivos()->attach($request->input('nombre_mot'));
        $sanciones->infractors()->attach($request->input('apellido_nombre_inf'));

        return redirect()->route('sancion')->with('message','Registrado correctamente!');
    
    }

    public function update(Request $request){

        $validator = $request -> validate ([
        'num_dj'=> 'required',
        'fecha_ingreso' => 'required',
        'fojas' =>'required',
       // 'motivo' => 'required',
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
      //  $sanciones->motivo = $request->motivo;
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

       $sanciones->motivos()->sync($request->input('nombre_mot'));  
       $sanciones->infractors()->sync($request->input('apellido_nombre_inf'));  
          
       return redirect()->route('sancion')->with('message','Actualizado correctamente!');
      }

      public function destroy($sancion_id){

        $sanciones = Sancione::find ($sancion_id);
        $sanciones -> delete();
 
        return redirect()->route('sancion')->with('message','Eliminado correctamente!');
    
      }      




}
