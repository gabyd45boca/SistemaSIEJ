@extends('adminlte::page')

@section('title', 'SIEJ')

@section('content_header')
<style>
        .hidden-view {
            display: none;
        }
</style>
    <h1 class="m-0 text-dark">Mostrar Sumario</h1>
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
      <form method= "POST" action="{{ route ('sumarios.update')}}" class="card-body">
              @csrf
             
              <div class="hidden-view">
              <x-adminlte-input type="hidden" name="sumario_id"   value="{{$sumario->id}}"/> 
              </div>

            <div class="table-responsive text-nowrap">
              <table id="sumarios" class="table table-stripted shadow-lg mt-4" with-buttons>
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
              <td>{{$sumario->id}}</td>   
                    <td>{{$sumario->num_dja}} </td>   
                    <td>{{$sumario->num_dj}}</td>   
                    <td>{{$sumario->motivo}} </td>
                                <td>
                                    @foreach ($sumario->infractors as $infractor)
                                    {{$infractor->leg_pers_inf }} <br>
                                    @endforeach
                                </td>
                   
                                <td>
                                    @foreach ($sumario->infractors as $infractor)
                                    {{$infractor->apellido_nombre_inf}} <br>
                                    @endforeach
                                </td>   
                    <td>{{$sumario->tipo_denun}}</td>   
                    <td>{{$sumario->fecha_ingreso}}</td>  
                    <td>{{$sumario->infraccion}}</td>
              </tr>
              </tbody>
              </table>
            </div>  
              <br>
              <br>                  
                                

                  <h4 class="fw-normal">1. Datos del expediente</h4>
                  <div class="row g-3">

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-username">N° DJA</label>
                      <span class="form-control" id="multicol-num_dja">{{ $sumario-> num_dja}}</span>
                    </div>

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-fecha_ingreso"> Fecha Ingreso</label>
                      <span class="form-control" id="multicol-fecha_ingreso">{{ $sumario-> fecha_ingreso }}</span>
                    </div>

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-num_dj"> N° DJ</label>
                      <span class="form-control" id="multicol-num_dj">{{ $sumario-> num_dj }}</span>
                    </div>

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-fecha_inicio"> Fecha Inicio de Actuaciones</label>
                      <span class="form-control" id="multicol-fecha_inicio">{{ $sumario-> fecha_inicio }}</span>
                    </div>

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-fojas">Fojas</label>
                      <span class="form-control" id="multicol-fojas">{{ $sumario-> fojas }}</span>
                    </div>

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-infraccion">Infraccion</label>
                      <span class="form-control" id="multicol-infraccion">{{ $sumario-> infraccion }}</span>
                    </div>

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-motivo">Motivo</label>
                      <span class="form-control" id="multicol-motivo">{{ $sumario-> motivo }}</span>
                    </div>

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-extracto">Extracto</label>
                      <span class="form-control" id="multicol-extracto">{{ $sumario-> extracto }}</span>
                    </div>

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-tipo_denun">Tipo de Denuncia</label>
                      <span class="form-control" id="multicol-tipo_denun">{{ $sumario->tipo_denun }}</span>
                     </div>
                  
                    <div class="col-md-6">
                      <label class="form-label" for="multicol-fecha_movimiento"> Fecha de Pase</label>
                      <span class="form-control" id="multicol-fecha_movimiento">{{ $sumario->fecha_movimiento }}</span>
                    </div>
                    
                    <div class="col-md-6">
                      <label class="form-label" for="multicol-destino_pase">Lugar de Pase</label>
                      <span class="form-control" id="multicol-destino_pase">{{ $sumario->destino_pase }}</span>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label" for="multicol-observaciones">Observaciones del Expediente</label>
                        <span class="form-control" id="multicol-observaciones">{{ $sumario->observaciones }}</span>
                    </div>
                  
                              
                  </div>
                              
                  <hr class="my-4 mx-n4" />
                  <h4 class="fw-normal">2. Personal infractor</h4>
                  <div class="row g-3">
                    
                    <div class="col-md-12">
                          <label class="form-label" for="multicol-apellido_nombre_inf">Apellido y Nombres</label>
                          <br>
                          <span class="card" id="multicol-tipo_mov">
                              @foreach ($sumario->infractors as $infractor)
                              {{$infractor->apellido_nombre_inf}} Lp:{{$infractor->leg_pers_inf }}, 
                              @endforeach
                          </span>
                    </div>
                                      
                  </div>
                 
                                               
                  <hr class="my-4 mx-n4" />
                  <h4 class="fw-normal">3. Datos del personal instructor de la Direccion de Asuntos Internos</h4>
                  <div class="row g-3">

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-apellido_nombre_DAI">Apellido y Nombre</label>
                      <span class="form-control" id="multicol-apellido_nombre_DAI">{{ $sumario->apellido_nombre_DAI }}</span>
                    </div>

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-leg_pers_DAI">Legajo Personal</label>
                      <span class="form-control" id="multicol-leg_pers_DAI">{{ $sumario->leg_pers_DAI }}</span>
                    </div>

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-dependen_DAI">Dependencia</label>
                      <span class="form-control" id="multicol-dependen_DAI">{{ $sumario->dependen_DAI }}</span>
                    </div>

                    <div class="col-md-6 select2-primary">
                          <label class="form-label" for="multicol-jerarquia_DAI">Jerarquia</label>
                          <span class="form-control" id="multicol-jerarquia_DAI">{{ $sumario->jerarquia_DAI }}</span>
                    </div>
                            

                  </div> 
           
             
                  <hr class="my-4 mx-n4" />
                  <h4 class="fw-normal">4. Movimientos y sugerencias del instructor de la Direccion de Asuntos Internos </h4>
              <div class="row g-3">

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-reg_interno_DAI">Registro Interno</label>
                      <span class="form-control" id="multicol-reg_interno_DAI">{{ $sumario->reg_interno_DAI }}</span>
                    </div>

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-fecha_mov_proceDAI">Fecha de Procedencia</label>
                      <span class="form-control" id="multicol-fecha_mov_proceDAI">{{ $sumario->fecha_mov_proceDAI }}</span>
                    </div>

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-destin_proceden_DAI">Lugar de Procedencia</label>
                      <span class="form-control" id="multicol-destin_proceden_DAI">{{ $sumario->destin_proceden_DAI }}</span>
                    </div>

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-obs_proced_DAI">Observaciones de Procedencia</label>
                      <span class="form-control" id="multicol-obs_proced_DAI">{{ $sumario->obs_proced_DAI }}</span>
                    </div>
       
                    
                    <div class="col-md-6">
                        <label class="form-label" for="multicol-sugerencia_DAI">Sugerencia DAI</label>
                        <textarea class="form-control" id="multicol-sugerencia_DAI" style="white-space: pre-line; max-height: 100px; overflow-y: auto;" readonly>
                            {{ $sumario->sugerencia_DAI }}
                        </textarea>
                    </div>


                    <div class="col-md-6">
                      <label class="form-label" for="multicol-fecha_elev_inst_DAI"> Fecha de Elevado por Instruccion</label>
                      <span class="form-control" id="multicol-fecha_elev_inst_DAI">{{ $sumario->fecha_elev_inst_DAI }}</span>
                    </div>

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-fecha_mov_paseDAI">Fecha de Pase</label>
                      <span class="form-control" id="multicol-fecha_mov_paseDAI">{{ $sumario->fecha_mov_paseDAI}}</span>
                    </div>

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-destin_pase_DAI">Lugar de Pase</label>
                      <span class="form-control" id="multicol-destin_pase_DAI">{{ $sumario->destin_pase_DAI}}</span>
                    </div>

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-obs_pase_DAI">Observaciones del pase</label>
                      <span class="form-control" id="multicol-obs_pase_DAI">{{ $sumario->obs_pase_DAI}}</span>
                    </div>
             

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-concluido_DAI">Concluido por Instruccion</label>
                      <span class="form-control" id="multicol-concluido_DAI">{{ $sumario->concluido_DAI}}</span>
                    </div>
              </div>
           
                  <hr class="my-4 mx-n4" />
                  <h4 class="fw-normal">5. Datos del personal instructor de la Direccion General de Asuntos Judiciales</h4>
              <div class="row g-3">

                        <div class="col-md-6">
                          <label class="form-label" for="multicol-apellido_nombre_DGAJ">Apellido y Nombre</label>
                          <span class="form-control" id="multicol-apellido_nombre_DGAJ">{{ $sumario->apellido_nombre_DGAJ}}</span>
                        </div>

                        <div class="col-md-6">
                          <label class="form-label" for="multicol-leg_pers_DGAJ">Legajo Personal</label>
                          <span class="form-control" id="multicol-leg_pers_DGAJ">{{ $sumario->leg_pers_DGAJ}}</span>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="multicol-dependen_DGAJ">Dependencia</label>
                            <span class="form-control" id="multicol-dependen_DGAJ">{{ $sumario->dependen_DGAJ}}</span>
                        </div>

                        <div class="col-md-6 select2-primary">
                          <label class="form-label" for="multicol-jerarquia_DGAJ">Jerarquia</label>
                          <span class="form-control" id="multicol-jerarquia_DGAJ">{{ $sumario->jerarquia_DGAJ}}</span>
                        </div>

              </div> 

                  <hr class="my-4 mx-n4" />
                  <h4 class="fw-normal">6. Movimientos y sugerencias del instructor de la Direccion General de Asuntos Judiciales </h4>
              <div class="row g-3">

                                          
                        <div class="col-md-6">
                          <label class="form-label" for="multicol-fecha_mov_proceDGAJ">Fecha de procedencia</label>
                          <span class="form-control" id="multicol-fecha_mov_proceDGAJ">{{ $sumario->fecha_mov_proceDGAJ}}</span>
                        </div>

                        <div class="col-md-6">
                          <label class="form-label" for="multicol-destin_proced_DGAJ">Lugar de Procedencia</label>
                          <span class="form-control" id="multicol-destin_proced_DGAJ">{{ $sumario->destin_proced_DGAJ}}</span>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="multicol-sugerencia_DGAJ">Sugerencia DGAJ</label>
                            <textarea class="form-control" id="multicol-sugerencia_DGAJ" style="white-space: pre-line; max-height: 100px; overflow-y: auto;" readonly>
                                {{ $sumario->sugerencia_DGAJ }}
                            </textarea>
                        </div>
                       
                        <div class="col-md-6">
                          <label class="form-label" for="multicol-obs_proced_DGAJ">Observaciones de Procedencia</label>
                          <span class="form-control" id="multicol-obs_proced_DGAJ">{{ $sumario->obs_proced_DGAJ}}</span>
                        </div>
                        
                        <div class="col-md-6">
                          <label class="form-label" for="multicol-fecha_mov_destDGAJ">Fecha de Pase</label>
                          <span class="form-control" id="multicol-fecha_mov_destDGAJ">{{ $sumario->fecha_mov_destDGAJ}}</span>
                        </div>


                        <div class="col-md-6">
                          <label class="form-label" for="multicol-destin_pase_DGAJ">Lugar de Pase</label>
                          <span class="form-control" id="multicol-destin_pase_DGAJ">{{ $sumario->destin_pase_DGAJ}}</span>
                        </div>

                        <div class="col-md-6">
                          <label class="form-label" for="multicol-obs_pase_DGAJ">Observaciones del pase</label>
                          <span class="form-control" id="multicol-obs_pase_DGAJ">{{ $sumario->obs_pase_DGAJ}}</span>
                        </div>

                        <div class="col-md-6">
                          <label class="form-label" for="multicol-concluido_DGAJ">Concluido por Instruccion</label>
                          <span class="form-control" id="multicol-concluido_DGAJ">{{ $sumario->concluido_DGAJ}}</span>
                        </div>
                    
              </div>
            
                              

                  <hr class="my-4 mx-n4" />
                  <h4 class="fw-normal">7. Datos del personal instructor de Asesoria Letrada</h4>
              <div class="row g-3">

                        <div class="col-md-6">
                          <label class="form-label" for="multicol-apellido_nombre_AL">Apellido y Nombre</label>
                          <span class="form-control" id="multicol-apellido_nombre_AL">{{ $sumario->apellido_nombre_AL}}</span>
                        </div>

                        <div class="col-md-6">
                          <label class="form-label" for="multicol-leg_pers_AL">Legajo Personal</label>
                          <span class="form-control" id="multicol-leg_pers_AL">{{ $sumario->leg_pers_AL}}</span>
                        </div>

                        <div class="col-md-6">
                          <label class="form-label" for="multicol-dependen_AL">Dependencia</label>
                          <span class="form-control" id="multicol-dependen_AL">{{ $sumario->dependen_AL}}</span>
                        </div>

                        <div class="col-md-6 select2-primary">
                          <label class="form-label" for="multicol-jerarquia_AL">Jerarquia</label>
                          <span class="form-control" id="multicol-jerarquia_AL">{{ $sumario->jerarquia_AL}}</span>
                        </div>

              </div> 

                  <hr class="my-4 mx-n4" />
                  <h4 class="fw-normal">8. Movimientos y sugerencias del instructor de Asesoria Letrada</h4>
              <div class="row g-3">

                    <div class="col-md-6">
                        <label class="form-label" for="multicol-reg_interno_AL">Registro Interno</label>
                        <span class="form-control" id="multicol-reg_interno_AL">{{ $sumario->reg_interno_AL}}</span>
                    </div>
                  
                    <div class="col-md-6">
                      <label class="form-label" for="multicol-fecha_mov_procAL"> Fecha de Procedencia</label>
                      <span class="form-control" id="multicol-fecha_mov_procAL">{{ $sumario->fecha_mov_procAL}}</span>
                    </div>

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-destin_proceden_AL">Lugar de Procedencia</label>
                      <span class="form-control" id="multicol-destin_proceden_AL">{{ $sumario->destin_proceden_AL}}</span>
                    </div>
               

                    <div class="col-md-6">
                            <label class="form-label" for="multicol-sugerencia_DAI">Sugerencia AL</label>
                            <textarea class="form-control" id="multicol-sugerencia_DAI" style="white-space: pre-line; max-height: 100px; overflow-y: auto;" readonly>
                                {{ $sumario->sugerencia_AL }}
                            </textarea>
                    </div>

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-obs_proced_AL">Observaciones de Procedencia</label>
                      <span class="form-control" id="multicol-obs_proced_AL">{{ $sumario->obs_proced_AL}}</span>
                    </div>
                  
                    <div class="col-md-6">
                      <label class="form-label" for="multicol-fecha_mov_paseAL">Fecha de Pase</label>
                      <span class="form-control" id="multicol-fecha_mov_paseAL">{{ $sumario->fecha_mov_paseAL}}</span>
                    </div>

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-destin_pase_AL">Lugar de Pase</label>
                      <span class="form-control" id="multicol-destin_pase_AL">{{ $sumario->destin_pase_AL}}</span>
                    </div>

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-obs_pase_AL">Observaciones del pase</label>
                      <span class="form-control" id="multicol-obs_pase_AL">{{ $sumario->obs_pase_AL}}</span>
                    </div>

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-concluido_AL">Concluido por Instruccion</label>
                      <span class="form-control" id="multicol-concluido_AL">{{ $sumario->concluido_AL}}</span>
                    </div>
                    
              </div>
             
                             
                  <hr class="my-4 mx-n4" />
                    <h4 class="fw-normal">9. Datos del personal instructor de la Direccion General de Recursos Humanos</h4>
              <div class="row g-3">
                      <div class="col-md-6">
                        <label class="form-label" for="multicol-apellido_nombre_DGRRHH">Apellido y Nombre</label>
                        <span class="form-control" id="multicol-apellido_nombre_DGRRHH">{{ $sumario->apellido_nombre_DGRRHH}}</span>
                      </div>

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-leg_pers_DGRRHH">Legajo Personal</label>
                      <span class="form-control" id="multicol-leg_pers_DGRRHH">{{ $sumario->leg_pers_DGRRHH}}</span>
                    </div>
                    
                    <div class="col-md-6">
                          <label class="form-label" for="multicol-dependen_DGRRHH">Dependencia</label>
                          <span class="form-control" id="multicol-dependen_DGRRHH">{{ $sumario->dependen_DGRRHH}}</span>
                    </div>

                    <div class="col-md-6 select2-primary">
                      <label class="form-label" for="multicol-jerarquia_DGRRHH">Jerarquia</label>
                      <span class="form-control" id="multicol-jerarquia_DGRRHH">{{ $sumario->jerarquia_DGRRHH}}</span>
                    </div>

              </div> 

                  <hr class="my-4 mx-n4" />
                  <h4 class="fw-normal">10. Movimientos y resolucion final del instructor de la Direccion General de Recursos Humanos</h4>
              <div class="row g-3">

                      <div class="col-md-6">
                          <label class="form-label" for="multicol-reg_interno_DGRRHH">Registro Interno</label>
                          <span class="form-control" id="multicol-reg_interno_DGRRHH">{{ $sumario->reg_interno_DGRRHH}}</span>
                      </div>
                    
                      <div class="col-md-6">
                        <label class="form-label" for="multicol-fecha_mov_proceDGRRHH">Fecha de Procedencia</label>
                        <span class="form-control" id="multicol-fecha_mov_proceDGRRHH">{{ $sumario->fecha_mov_proceDGRRHH}}</span>
                      </div>

                      <div class="col-md-6">
                        <label class="form-label" for="multicol-destin_proceden_DGRRHH">Lugar de Procedencia</label>
                        <span class="form-control" id="multicol-destin_proceden_DGRRHH">{{ $sumario->destin_proceden_DGRRHH}}</span>
                      </div>
    

                      <div class="col-md-6">
                            <label class="form-label" for="multicol-resol_final_DGRRHH">Resolucion Final</label>
                            <textarea class="form-control" id="multicol-resol_final_DGRRHH" style="white-space: pre-line; max-height: 100px; overflow-y: auto;" readonly>
                                {{ $sumario->resol_final_DGRRHH}}
                            </textarea>
                     </div>
           

                      <div class="col-md-6">
                        <label class="form-label" for="multicol-obs_proced_DGRRHH">Observaciones de Procedencia</label>
                        <span class="form-control" id="multicol-obs_proced_DGRRHH">{{ $sumario->obs_proced_DGRRHH}}</span>
                      </div>
                    
                      <div class="col-md-6">
                        <label class="form-label" for="multicol-fecha_mov_paseDGRRHH">Fecha de Pase</label>
                        <span class="form-control" id="multicol-fecha_mov_paseDGRRHH">{{ $sumario->fecha_mov_paseDGRRHH}}</span>
                      </div>

                      <div class="col-md-6">
                        <label class="form-label" for="multicol-destin_pase_DGRRHH">Lugar de Pase</label>
                        <span class="form-control" id="multicol-destin_pase_DGRRHH">{{ $sumario->destin_pase_DGRRHH}}</span>
                      </div>
                   
                      <div class="col-md-6">
                        <label class="form-label" for="multicol-obs_pase_DGRRHH">Observaciones del pase</label>
                        <span class="form-control" id="multicol-obs_pase_DGRRHH">{{ $sumario->obs_pase_DGRRHH}}</span>
                      </div>

                      <div class="col-md-6">
                        <label class="form-label" for="multicol-concluido_DGRRHH">Concluido por Instruccion</label>
                        <span class="form-control" id="multicol-concluido_DGRRHH">{{ $sumario->concluido_DGRRHH}}</span>
                      </div>

                      <div class="col-md-6">
                        <label class="form-label" for="multicol-DGRRHH_N°">DGRRHH N°</label>
                        <span class="form-control" id="multicol-DGRRHH_N°">{{ $sumario->DGRRHH_N°}}</span>
                      </div>

                      <div class="col-md-6">
                        <label class="form-label" for="multicol-fecha_notificacion"> Fecha de Notificacion</label>
                        <span class="form-control" id="multicol-fecha_notificacion">{{ $sumario->fecha_notificacion}}</span>
                      </div>
                      
              </div>
            
    
                  <div class="pt-4">
                      <button type="button" class="btn btn-secondary" onClick="location.href='/sumarios'">Volver</button>
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
</script>

@endsection
