@extends('adminlte::page')

@section('title', 'SIEA')

@section('content_header')
<style>
        .hidden-view {
            display: none;
        }
</style>
    <h1 class="m-0 text-dark">Mostrar Sancion Directa</h1>
@stop

@section('styles')
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
@endsection

@section('content')

 <div class ="row">

          <div class="col-lg-12">
          
          <div class="card mb-4">
          @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif
      <form method= "POST" action="{{ route ('sancion.update')}}" class="card-body">
              @csrf
             
              <div class="hidden-view">
              <x-adminlte-input type="hidden" name="sancion_id"   value="{{$sanciones->id}}"/> 
              </div>

            <div class="table-responsive text-nowrap">
              <table id="sanciones" class="table table-stripted shadow-lg mt-4" with-buttons>
              <thead class="bg-dark text-white">
              <tr>
                <th>ID</th>
                <th>N° DJA</th>
                <th>N° DJ</th>
                <th>MOTIVO</th>
                <th>LEGAJO</th>
                <th>INFRACTOR</th>
                <th>TIPO DENUNCIA</th>
                <th>FECHA INGRESO</th>
                <th>INFRACCION</th>
                
              </tr>
              </thead>

              <tbody class="table-border-bottom-0">
              <tr>
              <td>{{$sanciones->id}}</td>   
                    <td>{{$sanciones->num_dja}} </td>   
                    <td>{{$sanciones->num_dj}}</td>   
                    <td>{{$sanciones->motivo}} </td>
                                <td>
                                    @foreach ($sanciones->infractors as $infractor)
                                    {{$infractor->leg_pers_inf }} <br>
                                    @endforeach
                                </td>
                   
                                <td>
                                    @foreach ($sanciones->infractors as $infractor)
                                    {{$infractor->apellido_nombre_inf}} <br>
                                    @endforeach
                                </td>   
                    <td>{{$sanciones->tipo_denun}}</td>   
                    <td>{{$sanciones->fecha_ingreso}}</td>  
                    <td>{{$sanciones->infraccion}}</td>
              </tr>
              </tbody>
              </table>
            </div>  
              <br>
              <br>                  
                                

                  <h4 class="fw-normal">1. Datos del expediente</h4>
                  <div class="row g-3">

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-num_dj"> N° DJ</label>
                      <span class="form-control" id="multicol-num_dj">{{$sanciones-> num_dj}}</span>
                    </div>

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-lugar_proced">Lugar de Procedencia</label>
                      <span class="form-control" id="multicol-lugar_proced">{{ $sanciones->lugar_proced }}</span>
                    </div>

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-fecha_ingreso">Fecha de ingreso</label>
                      <span class="form-control" id="multicol-fecha_ingreso">{{$sanciones-> fecha_ingreso}}</span>
                    </div>

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-fecha_inicio"> Fecha Inicio de Actuaciones</label>
                      <span class="form-control" id="multicol-fecha_inicio">{{$sanciones-> fecha_inicio}}</span>
                    </div>

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-fojas">Fojas</label>
                      <span class="form-control" id="multicol-fojas">{{ $sanciones-> fojas }}</span>
                    </div>

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-tipo_denuncia">Tipo de Denuncia</label>
                      <span class="form-control" id="multicol-tipo_denuncia">{{$sanciones->tipo_denuncia}}</span>
                    </div>

                    <div class="col-md-6">
                          <label class="form-label" for="multicol-nombre_mot">Motivo</label>
                          <br>
                          <span class="card" id="multicol-nombre_mot">
                              @foreach ($sanciones->motivos as $motivo)
                              {{$motivo->nombre_mot}}, 
                              @endforeach
                          </span>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label" for="multicol-primera_interv">Primera Intervencion</label>
                        <textarea class="form-control" id="multicol-primera_interv" style="white-space: pre-line; max-height: 100px; overflow-y: auto;" readonly>
                            {{ $sanciones->primera_interv }}
                        </textarea>
                    </div>
                 
                    <div class="col-md-6">
                      <label class="form-label" for="multicol-fecha_pase">Fecha de Pase</label>
                      <span class="form-control" id="multicol-fecha_pase">{{ $sanciones->fecha_pase }}</span>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label" for="multicol-observaciones">Observaciones del Expediente</label>
                        <span class="form-control" id="multicol-observaciones">{{ $sanciones->observaciones }}</span>
                    </div>
                    
                    <div class="col-md-6">
                      <label class="form-label" for="multicol-lugar_pase">Lugar de Pase</label>
                      <span class="form-control" id="multicol-lugar_pase">{{ $sanciones->lugar_pase }}</span>
                    </div>
                       
                  </div>
                              
                  <hr class="my-4 mx-n4" />
                  <h4 class="fw-normal">2. Personal infractor</h4>
                  <div class="row g-3">
                    
                    <div class="col-md-12">
                          <label class="form-label" for="multicol-apellido_nombre_inf">Apellido y Nombres</label>
                          <br>
                          <span class="card" id="multicol-tipo_mov">
                              @foreach ($sanciones->infractors as $infractor)
                              {{$infractor->apellido_nombre_inf}} Lp:{{$infractor->leg_pers_inf }}, 
                              @endforeach
                          </span>
                    </div>
                                      
                  </div>
                 
                                               
                  <hr class="my-4 mx-n4" />
                  <h4 class="fw-normal">3. Datos del personal instructor de la Direccion General de Asuntos Judiciales</h4>
                  <div class="row g-3">

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-apellido_nombre_DAI">Apellido y Nombre</label>
                      <span class="form-control" id="multicol-apellido_nombre_DAI">{{ $sanciones->apellido_nombre_DGAJ }}</span>
                    </div>

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-leg_pers_DAI">Legajo Personal</label>
                      <span class="form-control" id="multicol-leg_pers_DAI">{{$sanciones->leg_pers_DGAJ}}</span>
                    </div>

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-dependen_DAI">Dependencia</label>
                      <span class="form-control" id="multicol-dependen_DAI">{{ $sanciones->dependen_DGAJ}}</span>
                    </div>

                    <div class="col-md-6 select2-primary">
                          <label class="form-label" for="multicol-jerarquia_DAI">Jerarquia</label>
                          <span class="form-control" id="multicol-jerarquia_DAI">{{ $sanciones->jerarquia_DGAJ}}</span>
                    </div>
                            

                  </div> 
                                         
                  <hr class="my-4 mx-n4" />
                  <h4 class="fw-normal">4. Movimientos y sugerencias del instructor de la Direccion General de Asuntos Judiciales </h4>
              <div class="row g-3">

                        <div class="col-md-6">
                          <label class="form-label" for="multicol-fecha_pase_DGAJ">Fecha de Reingreso</label>
                          <span class="form-control" id="multicol-fecha_pase_DGAJ">{{ $sanciones->fecha_reingreso_DGAJ}}</span>
                        </div>     
                                           
                       
                        <div class="col-md-6">
                          <label class="form-label" for="multicol-obs_reingreso_DGAJ">Observaciones del Reingreso</label>
                          <span class="form-control" id="multicol-obs_reingreso_DGAJ">{{ $sanciones->obs_reingreso_DGAJ}}</span>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="multicol-opinion_cierre_DGAJ">Opinion de Cierre</label>
                            <textarea class="form-control" id="multicol-opinion_cierre_DGAJ" style="white-space: pre-line; max-height: 100px; overflow-y: auto;" readonly>
                                {{ $sanciones->opinion_cierre_DGAJ }}
                            </textarea>
                        </div>

                        <div class="col-md-6">
                          <label class="form-label" for="multicol-fecha_pase_DGAJ">Fecha de Pase</label>
                          <span class="form-control" id="multicol-fecha_pase_DGAJ">{{ $sanciones->fecha_pase_DGAJ}}</span>
                        </div>                        

                        <div class="col-md-6">
                          <label class="form-label" for="multicol-lugar_pase_DGAJ">Lugar de Pase</label>
                          <span class="form-control" id="multicol-lugar_pase_DGAJ">{{ $sanciones->lugar_pase_DGAJ}}</span>
                        </div>
                
                       
                        <div class="col-md-6">
                          <label class="form-label" for="multicol-obs_pase_DGAJ">Observaciones del Pase</label>
                          <span class="form-control" id="multicol-obs_pase_DGAJ">{{ $sanciones->obs_pase_DGAJ}}</span>
                        </div>
                        
                    
              </div>
            
                              

                  <hr class="my-4 mx-n4" />
                  <h4 class="fw-normal">5. Datos del personal instructor de Asesoria Letrada</h4>
              <div class="row g-3">

                        <div class="col-md-6">
                          <label class="form-label" for="multicol-apellido_nombre_AL">Apellido y Nombre</label>
                          <span class="form-control" id="multicol-apellido_nombre_AL">{{ $sanciones->apellido_nombre_AL}}</span>
                        </div>

                        <div class="col-md-6">
                          <label class="form-label" for="multicol-leg_pers_AL">Legajo Personal</label>
                          <span class="form-control" id="multicol-leg_pers_AL">{{ $sanciones->leg_pers_AL}}</span>
                        </div>

                        <div class="col-md-6">
                          <label class="form-label" for="multicol-dependen_AL">Dependencia</label>
                          <span class="form-control" id="multicol-dependen_AL">{{ $sanciones->dependen_AL}}</span>
                        </div>

                        <div class="col-md-6 select2-primary">
                          <label class="form-label" for="multicol-jerarquia_AL">Jerarquia</label>
                          <span class="form-control" id="multicol-jerarquia_AL">{{ $sanciones->jerarquia_AL}}</span>
                        </div>

              </div> 

                  <hr class="my-4 mx-n4" />
                  <h4 class="fw-normal">6. Movimientos y sugerencias del instructor de Asesoria Letrada</h4>
              <div class="row g-3">

                    <div class="col-md-6">
                        <label class="form-label" for="multicol-reg_interno_AL">Registro Interno</label>
                        <span class="form-control" id="multicol-reg_interno_AL">{{ $sanciones->reg_interno_AL}}</span>
                    </div>
                  
                    <div class="col-md-6">
                      <label class="form-label" for="multicol-fecha_mov_procAL">Fecha de Procedencia</label>
                      <span class="form-control" id="multicol-fecha_mov_procAL">{{ $sanciones->fecha_mov_procAL}}</span>
                    </div>

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-destin_proceden_AL">Lugar de Procedencia</label>
                      <span class="form-control" id="multicol-destin_proceden_AL">{{ $sanciones->destin_proceden_AL}}</span>
                    </div>

                    <div class="col-md-6">
                            <label class="form-label" for="multicol-sugerencia_DAI">Sugerencia AL</label>
                            <textarea class="form-control" id="multicol-sugerencia_DAI" style="white-space: pre-line; max-height: 100px; overflow-y: auto;" readonly>
                                {{ $sanciones->sugerencia_AL }}
                            </textarea>
                    </div>

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-obs_proced_AL">Observaciones de Procedencia</label>
                      <span class="form-control" id="multicol-obs_proced_AL">{{ $sanciones->obs_proced_AL}}</span>
                    </div>
                  
                    <div class="col-md-6">
                      <label class="form-label" for="multicol-fecha_mov_paseAL">Fecha de Pase</label>
                      <span class="form-control" id="multicol-fecha_mov_paseAL">{{ $sanciones->fecha_mov_paseAL}}</span>
                    </div>

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-destin_pase_AL">Lugar de Pase</label>
                      <span class="form-control" id="multicol-destin_pase_AL">{{ $sanciones->destin_pase_AL}}</span>
                    </div>

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-obs_pase_AL">Observaciones del Pase</label>
                      <span class="form-control" id="multicol-obs_pase_AL">{{ $sanciones->obs_pase_AL}}</span>
                    </div>
               
                    
              </div>

              <hr class="my-4 mx-n4" />
                  <h4 class="fw-normal">7. Datos del personal instructor de la Secretaria General</h4>
              <div class="row g-3">

                        <div class="col-md-6">
                          <label class="form-label" for="multicol-apellido_nombre_SS">Apellido y Nombre</label>
                          <span class="form-control" id="multicol-apellido_nombre_SS">{{ $sanciones->apellido_nombre_SS}}</span>
                        </div>

                        <div class="col-md-6">
                          <label class="form-label" for="multicol-leg_pers_SS">Legajo Personal</label>
                          <span class="form-control" id="multicol-leg_pers_SS">{{ $sanciones->leg_pers_SS}}</span>
                        </div>

                        <div class="col-md-6">
                          <label class="form-label" for="multicol-dependen_SS">Dependencia</label>
                          <span class="form-control" id="multicol-dependen_SS">{{ $sanciones->dependen_SS}}</span>
                        </div>

                        <div class="col-md-6 select2-primary">
                          <label class="form-label" for="multicol-jerarquia_SS">Jerarquia</label>
                          <span class="form-control" id="multicol-jerarquia_SS">{{ $sanciones->jerarquia_SS}}</span>
                        </div>

              </div> 

                  <hr class="my-4 mx-n4" />
                  <h4 class="fw-normal">8. Movimientos y sugerencias del instructor de la Secretaria General</h4>
              <div class="row g-3">

                    <div class="col-md-6">
                        <label class="form-label" for="multicol-reg_interno_SS">Registro Interno</label>
                        <span class="form-control" id="multicol-reg_interno_SS">{{ $sanciones->reg_interno_SS}}</span>
                    </div>
                  
                    <div class="col-md-6">
                      <label class="form-label" for="multicol-fecha_proced_SS">Fecha de Procedencia</label>
                      <span class="form-control" id="multicol-fecha_proced_SS">{{ $sanciones->fecha_proced_SS}}</span>
                    </div>

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-lugar_proceden_SS">Lugar de Procedencia</label>
                      <span class="form-control" id="multicol-lugar_proceden_SS">{{ $sanciones->lugar_proceden_SS}}</span>
                    </div>

                    <div class="col-md-6">
                            <label class="form-label" for="multicol-sugerencia_SS">Sugerencia </label>
                            <textarea class="form-control" id="multicol-sugerencia_SS" style="white-space: pre-line; max-height: 100px; overflow-y: auto;" readonly>
                                {{ $sanciones->sugerencia_SS }}
                            </textarea>
                    </div>

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-obs_proced_SS">Observaciones de Procedencia</label>
                      <span class="form-control" id="multicol-obs_proced_SS">{{ $sanciones->obs_proced_SS}}</span>
                    </div>
                  
                    <div class="col-md-6">
                      <label class="form-label" for="multicol-fecha_pase_SS">Fecha de Pase</label>
                      <span class="form-control" id="multicol-fecha_pase_SS">{{ $sanciones->fecha_pase_SS}}</span>
                    </div>

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-lugar_pase_SS">Lugar de Pase</label>
                      <span class="form-control" id="multicol-lugar_pase_SS">{{ $sanciones->lugar_pase_SS}}</span>
                    </div>

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-obs_pase_SS">Observaciones de Pase</label>
                      <span class="form-control" id="multicol-obs_pase_SS">{{ $sanciones->obs_pase_SS}}</span>
                    </div>
                 
                    
              </div>
             
                             
                  <hr class="my-4 mx-n4" />
                    <h4 class="fw-normal">9. Datos del personal instructor de la Direccion General de Recursos Humanos</h4>
              <div class="row g-3">
                      <div class="col-md-6">
                        <label class="form-label" for="multicol-apellido_nombre_DGRRHH">Apellido y Nombre</label>
                        <span class="form-control" id="multicol-apellido_nombre_DGRRHH">{{ $sanciones->apellido_nombre_DGRRHH}}</span>
                      </div>

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-leg_pers_DGRRHH">Legajo Personal</label>
                      <span class="form-control" id="multicol-leg_pers_DGRRHH">{{ $sanciones->leg_pers_DGRRHH}}</span>
                    </div>
                    
                    <div class="col-md-6">
                          <label class="form-label" for="multicol-dependen_DGRRHH">Dependencia</label>
                          <span class="form-control" id="multicol-dependen_DGRRHH">{{ $sanciones->dependen_DGRRHH}}</span>
                    </div>

                    <div class="col-md-6 select2-primary">
                      <label class="form-label" for="multicol-jerarquia_DGRRHH">Jerarquia</label>
                      <span class="form-control" id="multicol-jerarquia_DGRRHH">{{ $sanciones->jerarquia_DGRRHH}}</span>
                    </div>

              </div> 

                  <hr class="my-4 mx-n4" />
                  <h4 class="fw-normal">10. Movimientos y resolucion final del instructor de la Direccion General de Recursos Humanos</h4>
              <div class="row g-3">

                      <div class="col-md-6">
                          <label class="form-label" for="multicol-reg_interno_DGRRHH">Registro Interno</label>
                          <span class="form-control" id="multicol-reg_interno_DGRRHH">{{ $sanciones->reg_interno_DGRRHH}}</span>
                      </div>
                    
                      <div class="col-md-6">
                        <label class="form-label" for="multicol-fecha_mov_proceDGRRHH"> Fecha de Procedencia</label>
                        <span class="form-control" id="multicol-fecha_mov_proceDGRRHH">{{ $sanciones->fecha_mov_proceDGRRHH}}</span>
                      </div>

                      <div class="col-md-6">
                        <label class="form-label" for="multicol-destin_proceden_DGRRHH">Lugar de Procedencia</label>
                        <span class="form-control" id="multicol-destin_proceden_DGRRHH">{{ $sanciones->destin_proceden_DGRRHH}}</span>
                      </div>

                      <div class="col-md-6">
                              <label class="form-label" for="multicol-sugerencia_DAI">Resolucion Final</label>
                              <textarea class="form-control" id="multicol-sugerencia_DAI" style="white-space: pre-line; max-height: 100px; overflow-y: auto;" readonly>
                                  {{ $sanciones->resol_final_DGRRHH}}
                              </textarea>
                      </div>
            

                      <div class="col-md-6">
                        <label class="form-label" for="multicol-obs_proced_DGRRHH">Observaciones de Procedencia</label>
                        <span class="form-control" id="multicol-obs_proced_DGRRHH">{{ $sanciones->obs_proced_DGRRHH}}</span>
                      </div>
               

                      <div class="col-md-6">
                        <label class="form-label" for="multicol-concluido_DGRRHH">Concluido por Instruccion</label>
                        <span class="form-control" id="multicol-concluido_DGRRHH">{{ $sanciones->concluido_DGRRHH}}</span>
                      </div>

                      <div class="col-md-6">
                        <label class="form-label" for="multicol-DGRRHH_N°">DGRRHH N°</label>
                        <span class="form-control" id="multicol-DGRRHH_N°">{{ $sanciones->DGRRHH_N°}}</span>
                      </div>

                      <div class="col-md-6">
                        <label class="form-label" for="multicol-fecha_notificacion"> Fecha de Notificacion</label>
                        <span class="form-control" id="multicol-fecha_notificacion">{{ $sanciones->fecha_notificacion}}</span>
                      </div>
                      
              </div>
            
    
                  <div class="pt-4">
                      <button type="button" class="btn btn-secondary" onClick="location.href='/sancion'">Volver</button>
                  </div>
      </form>

  </div>
@endsection

@section('scripts')
<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

<script>
  $(document).ready(()=>{});
  $('#apellido_nombre_inf').selectpicker('val',@json($infractores_ids));
  $('#nombre_mot').selectpicker('val',@json($motivos_ids));
</script>

@endsection
