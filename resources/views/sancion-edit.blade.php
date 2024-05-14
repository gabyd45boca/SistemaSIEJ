@extends('adminlte::page')

@section('title', 'SIEA')

@section('content_header')
<style>
        .hidden-view {
            display: none;
        }
</style>
    <h1 class="m-0 text-dark">Editar Sancion Directa</h1>
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
      <form method= "POST" action="{{ route ('sumarisimas.update')}}" class="card-body">
              @csrf
             
              <div class="hidden-view">
              <x-adminlte-input type="hidden" name="sumarisima_id"   value="{{$sumarisima->id}}"/> 
              <x-adminlte-input type="hidden" name="num_dj"   value="{{$sumarisima->num_dj}}"/> 
              <x-adminlte-input type="hidden" name="lugar_proced"    value="{{$sumarisima->lugar_proced}}"/> 
              <x-adminlte-input type="hidden" name="fecha_ingreso"   value="{{$sumarisima->fecha_ingreso}}"/> 
              <x-adminlte-input type="hidden" name="fecha_inicio"    value="{{$sumarisima->fecha_inicio}}"/>
              <x-adminlte-input type="hidden" name="fojas"   value="{{$sumarisima->fojas}}"/> 
              <x-adminlte-input type="hidden" name="tipo_denuncia"    value="{{$sumarisima->tipo_denuncia}}"/> 
              <x-adminlte-input type="hidden" name="motivo"  value="{{$sumarisima->motivo}}"/> 
              <x-adminlte-input type="hidden" name="primera_interv"  value="{{$sumarisima->primera_interv}}"/>
              <x-adminlte-input type="hidden" name="fecha_pase"  value="{{$sumarisima->fecha_pase}}"/> 
              <x-adminlte-input type="hidden" name="observaciones"  value="{{$sumarisima->observaciones}}"/> 
              <x-adminlte-input type="hidden" name="lugar_pase"  value="{{$sumarisima->lugar_pase}}"/> 
                           
              <x-adminlte-input type="hidden" name="apellido_nombre_DGAJ"  value="{{$sumarisima->apellido_nombre_DGAJ}}"/>
              <x-adminlte-input type="hidden" name="leg_pers_DGAJ"   value="{{$sumarisima->leg_pers_DGAJ}}"/> 
              <x-adminlte-input type="hidden" name="dependen_DGAJ"    value="{{$sumarisima->dependen_DGAJ}}"/> 
              <x-adminlte-input type="hidden" name="jerarquia_DGAJ"   value="{{$sumarisima->jerarquia_DGAJ}}"/> 
              <x-adminlte-input type="hidden" name="fecha_reingreso_DGAJ"    value="{{$sumarisima->fecha_reingreso_DGAJ}}"/>
              <x-adminlte-input type="hidden" name="obs_reingreso_DGAJ"   value="{{$sumarisima->obs_reingreso_DGAJ}}"/> 
              <x-adminlte-input type="hidden" name="opinion_cierre_DGAJ"    value="{{$sumarisima->opinion_cierre_DGAJ}}"/> 
              <x-adminlte-input type="hidden" name="fecha_pase_DGAJ"  value="{{$sumarisima->fecha_pase_DGAJ}}"/> 
              <x-adminlte-input type="hidden" name="lugar_pase_DGAJ"  value="{{$sumarisima->lugar_pase_DGAJ}}"/>
              <x-adminlte-input type="hidden" name="obs_pase_DGAJ"  value="{{$sumarisima->obs_pase_DGAJ}}"/>
          
              <x-adminlte-input type="hidden" name="apellido_nombre_AL"  value="{{$sumarisima->apellido_nombre_AL}}"/>
              <x-adminlte-input type="hidden" name="leg_pers_AL"   value="{{$sumarisima->leg_pers_AL}}"/> 
              <x-adminlte-input type="hidden" name="dependen_AL"    value="{{$sumarisima->dependen_AL}}"/> 
              <x-adminlte-input type="hidden" name="jerarquia_AL"   value="{{$sumarisima->jerarquia_AL}}"/> 
              <x-adminlte-input type="hidden" name="reg_interno_AL"    value="{{$sumarisima->reg_interno_AL}}"/>
              <x-adminlte-input type="hidden" name="fecha_mov_procAL"   value="{{$sumarisima->fecha_mov_procAL}}"/> 
              <x-adminlte-input type="hidden" name="destin_proceden_AL"    value="{{$sumarisima->destin_proceden_AL}}"/> 
              <x-adminlte-input type="hidden" name="sugerencia_AL"  value="{{$sumarisima->sugerencia_AL}}"/> 
              <x-adminlte-input type="hidden" name="obs_proced_AL"  value="{{$sumarisima->obs_proced_AL}}"/>
              <x-adminlte-input type="hidden" name="fecha_mov_paseAL"  value="{{$sumarisima->fecha_mov_paseAL}}"/>
              <x-adminlte-input type="hidden" name="destin_pase_AL"  value="{{$sumarisima->destin_pase_AL}}"/> 
              <x-adminlte-input type="hidden" name="obs_pase_AL"  value="{{$sumarisima->obs_pase_AL}}"/> 

              <x-adminlte-input type="hidden" name="apellido_nombre_SS"  value="{{$sumarisima->apellido_nombre_SS}}"/>
              <x-adminlte-input type="hidden" name="leg_pers_SS"   value="{{$sumarisima->leg_pers_SS}}"/> 
              <x-adminlte-input type="hidden" name="dependen_SS"    value="{{$sumarisima->dependen_SS}}"/> 
              <x-adminlte-input type="hidden" name="jerarquia_SS"   value="{{$sumarisima->jerarquia_SS}}"/> 
              <x-adminlte-input type="hidden" name="reg_interno_SS"    value="{{$sumarisima->reg_interno_SS}}"/>
              <x-adminlte-input type="hidden" name="fecha_proced_SS"   value="{{$sumarisima->fecha_proced_SS}}"/> 
              <x-adminlte-input type="hidden" name="lugar_proceden_SS"    value="{{$sumarisima->lugar_proceden_SS}}"/> 
              <x-adminlte-input type="hidden" name="sugerencia_SS"  value="{{$sumarisima->sugerencia_SS}}"/> 
              <x-adminlte-input type="hidden" name="obs_proced_SS"  value="{{$sumarisima->obs_proced_SS}}"/>
              <x-adminlte-input type="hidden" name="fecha_pase_SS"  value="{{$sumarisima->fecha_pase_SS}}"/>
              <x-adminlte-input type="hidden" name="lugar_pase_SS"  value="{{$sumarisima->lugar_pase_SS}}"/> 
              <x-adminlte-input type="hidden" name="obs_pase_SS"  value="{{$sumarisima->obs_pase_SS}}"/> 
             
              <x-adminlte-input type="hidden" name="apellido_nombre_DGRRHH"  value="{{$sumarisima->apellido_nombre_DGRRHH}}"/>
              <x-adminlte-input type="hidden" name="leg_pers_DGRRHH"   value="{{$sumarisima->leg_pers_DGRRHH}}"/> 
              <x-adminlte-input type="hidden" name="dependen_DGRRHH"    value="{{$sumarisima->dependen_DGRRHH}}"/> 
              <x-adminlte-input type="hidden" name="jerarquia_DGRRHH"   value="{{$sumarisima->jerarquia_DGRRHH}}"/> 
              <x-adminlte-input type="hidden" name="reg_interno_DGRRHH"    value="{{$sumarisima->reg_interno_DGRRHH}}"/>
              <x-adminlte-input type="hidden" name="fecha_mov_proceDGRRHH"   value="{{$sumarisima->fecha_mov_proceDGRRHH}}"/> 
              <x-adminlte-input type="hidden" name="destin_proceden_DGRRHH"    value="{{$sumarisima->destin_proceden_DGRRHH}}"/>
              <x-adminlte-input type="hidden" name="fecha_mov_paseDGRRHH"  value="{{$sumarisima->fecha_mov_paseDGRRHH}}"/>        
              <x-adminlte-input type="hidden" name="resol_final_DGRRHH"  value="{{$sumarisima->resol_final_DGRRHH}}"/>
              <x-adminlte-input type="hidden" name="obs_proced_DGRRHH"  value="{{$sumarisima->obs_proced_DGRRHH}}"/>
              <x-adminlte-input type="hidden" name="obs_pase_DGRRHH"  value="{{$sumarisima->obs_pase_DGRRHH}}"/>
              <x-adminlte-input type="hidden" name="concluido_DGRRHH"  value="{{$sumarisima->concluido_DGRRHH}}"/>
              <x-adminlte-input type="hidden" name="DGRRHH_N°"  value="{{$sumarisima->DGRRHH_N°}}"/>
              <x-adminlte-input type="hidden" name="fecha_notificacion"  value="{{$sumarisima->fecha_notificacion}}"/>

              </div>
            <div class="table-responsive text-nowrap">
              <table id="sumarisimas" class="table table-stripted shadow-lg mt-4" with-buttons>
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
              <td>{{$sumarisima->id}}</td>   
                    <td>{{$sumarisima->num_dja}} </td>   
                    <td>{{$sumarisima->num_dj}}</td>   
                    <td>{{$sumarisima->motivo}} </td>
                                <td>
                                    @foreach ($sumarisima->infractors as $infractor)
                                    {{$infractor->leg_pers_inf }} <br>
                                    @endforeach
                                </td>
                   
                                <td>
                                    @foreach ($sumarisima->infractors as $infractor)
                                    {{$infractor->apellido_nombre_inf}} <br>
                                    @endforeach
                                </td>   
                    <td>{{$sumarisima->tipo_denun}}</td>   
                    <td>{{$sumarisima->fecha_ingreso}}</td>  
                    <td>{{$sumarisima->infraccion}}</td>
              </tr>
              </tbody>
              </table>
            </div>  
              <br>
              <br>                  
                  @can('EditarSumarisimaDGAJ')
                

                  <h4 class="fw-normal">1. Carga de datos del expediente</h4>
                  <div class="row g-3">
                 

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-username"> N° DJ</label>
                      <input type="text" name="num_dj" value="{{ $sumarisima-> num_dj }}" id="multicol-num_dj" class="form-control" placeholder="Numero de DJ" required/>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label" for="multicol-lugar_proced">Lugar de Procedencia</label>
                        <x-adminlte-select2 name="lugar_proced" value="{{ $sumarisima->lugar_proced }}" required>
                            <option value="">Seleccionar la dependencia</option>
                            @foreach($dependencias as $dependencia)
                                <option value="{{ $dependencia->nombre_dep }}" @if ($sumarisima->lugar_proced == $dependencia->nombre_dep) selected @endif>{{ $dependencia->nombre_dep }}</option>
                            @endforeach
                        </x-adminlte-select2>
                    </div>
                            
                    <div class="col-md-6">
                      <label class="form-label" for="multicol-username"> Fecha Ingreso</label>
                      <input type="date" name="fecha_ingreso" value="{{ $sumarisima-> fecha_ingreso }}" id="multicol-fecha_ingreso" class="form-control" placeholder="Fecha de ingreso " required/>
                    </div>


                    <div class="col-md-6">
                      <label class="form-label" for="multicol-username"> Fecha Inicio de Actuaciones</label>
                      <input type="date" name="fecha_inicio" value="{{ $sumarisima-> fecha_inicio }}" id="multicol-fecha_inicio" class="form-control" placeholder="Fecha de inicio de actuaciones " required/>
                    </div>

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-username">Fojas</label>
                      <input type="text" name="fojas" value="{{ $sumarisima-> fojas }}" id="multicol-fojas" class="form-control" placeholder="Cantidad de fojas" required/>
                    </div> 

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-tipo_denuncia">Tipo de denuncia</label>
                      <x-adminlte-select2  name="tipo_denuncia" value="{{ $sumarisima-> tipo_denuncia }}" required>
                        <option value="">Seleccionar el tipo</option>
                        <option value="Comparendo" @if ($sumarisima->tipo_denuncia == 'Comparendo') selected @endif 'Comparendo'>Comparendo</option>
                        <option value="Denuncia" @if ($sumarisima->tipo_denuncia == 'Denuncia') selected @endif 'Denuncia'>Denuncia</option>
                        <option value="Oficio" @if ($sumarisima->tipo_denuncia == 'Oficio') selected @endif 'Oficio'>Oficio</option>
                        <option value="Exposicion" @if ($sumarisima->tipo_denuncia == 'exposicion') selected @endif 'Exposicion'>Exposicion</option>
                        <option value="Otro" @if ($sumarisima->tipo_denuncia == 'Otro') selected @endif 'Otro'>Otro</option>
                      </x-adminlte-select2>
                    </div>                  

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-motivo">Motivo</label>
                      <x-adminlte-select2 name="motivo" value="{{ $sumarisima->motivo }}" required>
                        <option value="">Seleccionar el tipo</option>
                        <option value="Violencia de genero" @if ($sumarisima->motivo == 'Violencia de genero') selected @endif 'Violencia de genero' >Violencia de genero</option>
                        <option value="Perdida Arma Reglamentaria" @if ($sumarisima->motivo == 'Perdida Arma Reglamentaria') selected @endif 'Perdida Arma Reglamentaria'>Perdida Arma Reglamentaria</option>
                        <option value="Falta al servicio" @if ($sumarisima->motivo == 'Falta al servicio') selected @endif 'Falta al servicio'>Falta al servicio</option>
                        <option value="Ebriedad" @if ($sumarisima->motivo == 'Ebriedad') selected @endif 'Ebriedad'>Ebriedad</option>
                        <option value="Ausentismo Laboral" @if ($sumarisima->motivo == 'Ausentismo Laboral') selected @endif 'Ausentismo Laboral'>Ausentismo Laboral</option>
                        <option value="Otro" @if ($sumarisima->motivo == 'Otro') selected @endif 'Otro'>Otro</option>
                      </x-adminlte-select2>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label" for="multicol-primera_interv">Primera Intervencion</label>
                        <textarea name="primera_interv" id="multicol-primera_interv" class="form-control">{{ $sumarisima->primera_interv }}</textarea>
                    </div>
                     
                    <div class="col-md-6">
                      <label class="form-label" for="multicol-fecha_pase"> Fecha de Pase</label>
                      <input type="date" name="fecha_pase" value="{{$sumarisima->fecha_pase}}" id="multicol-fecha_pase" class="form-control" value="{{old('fecha_pase')}}" placeholder="Fecha de pase del expediente " required />
                    </div>

                    <div class="col-md-6">
                        <label class="form-label" for="multicol-observaciones">Observaciones del expediente</label>
                        <input type="text" name="observaciones" value="{{ $sumarisima->observaciones}}" id="multicol-observaciones" class="form-control" placeholder="Escribir observaciones para el pase" />
                    </div>
                                    
                    <div class="col-md-6">
                        <label class="form-label" for="multicol-lugar_pase">Lugar de Pase</label>
                        <x-adminlte-select2 name="lugar_pase" value="{{ $sumarisima->lugar_pase }}" required>
                            <option value="">Seleccionar la dependencia</option>
                            @foreach($dependencias as $dependencia)
                                <option value="{{ $dependencia->nombre_dep}}" @if ($sumarisima->lugar_pase == $dependencia->nombre_dep) selected @endif>{{ $dependencia->nombre_dep }}</option>
                            @endforeach
                        </x-adminlte-select2>
                    </div>
                  
                              
                  </div>
                              
                  <hr class="my-4 mx-n4" />
                  <h4 class="fw-normal">2. Carga del personal infractor</h4>
                  <div class="row g-3">
                    
                    <div class="col-md-12">
                          <label class="form-label" for="multicol-apellido_nombre_inf">Apellido y Nombres</label>
                          <x-adminlte-select  name="apellido_nombre_inf[]" id="apellido_nombre_inf" class="form-control selectpicker" data-style="btn-primary" title="Seleccionar Infractores" multiple required >
                              @foreach ($infractores as $infractor) 
                              <option value="{{$infractor->id}}">{{$infractor->apellido_nombre_inf}} Lp: {{$infractor->leg_pers_inf }}</option>
                              @endforeach
                          </x-adminlte-select>
                          @if ($errors->has('apellido_nombre_inf'))
                          <span class="text-danger">
                              <strong>{{$errors->first('apellido_nombre_inf') }}</strong>
                          </span>
                          @endif  
                   </div>
                                      
                  </div>
                  @endcan 
               
  
              @can('EditarSumarisimaDGAJ')  
                  <hr class="my-4 mx-n4" />
                  <h4 class="fw-normal">3. Carga de datos del personal instructor de la Direccion General de Asuntos Judiciales</h4>
              <div class="row g-3">

                        <div class="col-md-6">
                          <label class="form-label" for="multicol-apellido_nombre_DGAJ">Apellido y Nombre</label>
                          <input type="text" name="apellido_nombre_DGAJ" value="{{ $sumarisima-> apellido_nombre_DGAJ }}" id="multicol-apellido_nombre_DGAJ" class="form-control" placeholder="Escribir el apellido y nombre"/>
                        </div>

                        <div class="col-md-6">
                          <label class="form-label" for="multicol-leg_pers_DGAJ">Legajo Personal</label>
                          <input type="text" name="leg_pers_DGAJ" value="{{ $sumarisima-> leg_pers_DGAJ }}" id="multicol-leg_pers_DGAJ" class="form-control" placeholder="Escribir el legajo personal" />
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="multicol-dependen_DGAJ">Dependencia</label>
                            <x-adminlte-select2 name="dependen_DGAJ" value="{{ $sumarisima->dependen_DGAJ }}">
                                <option value="">Seleccionar la dependencia</option>
                                @foreach($dependencias as $dependencia)
                                    <option value="{{ $dependencia->nombre_dep }}" @if ($sumarisima->dependen_DGAJ == $dependencia->nombre_dep) selected @endif>{{ $dependencia->nombre_dep }}</option>
                                @endforeach
                            </x-adminlte-select2>
                        </div>

                        <div class="col-md-6 select2-primary">
                          <label class="form-label" for="multicol-jerarquia_DGAJ">Jerarquia</label>
                          <x-adminlte-select2  name="jerarquia_DGAJ"  value="{{ $sumarisima-> jerarquia_DGAJ }}" class="select2 form-select" >
                            <option value="">Seleccionar la jerarquia</option>
                            <option value="agente" @if ($sumarisima->jerarquia_DGAJ == 'agente') selected @endif 'agente'>agente</option>
                            <option value="oficial ayudante" @if ($sumarisima->jerarquia_DGAJ == 'oficial ayudante') selected @endif 'oficial ayudante'>oficial ayudante</option>
                            <option value="comisario" @if ($sumarisima->jerarquia_DGAJ == 'comisario') selected @endif 'comisario'>comisario</option>
                          </x-adminlte-select2>
                        </div>

              </div> 

                  <hr class="my-4 mx-n4" />
                  <h4 class="fw-normal">4. Carga de movimientos y sugerencias del instructor de la Direccion General de Asuntos Judiciales </h4>
              <div class="row g-3">
                   
                        <div class="col-md-6">
                          <label class="form-label" for="multicol-fecha_reingreso_DGAJ"> Fecha de Reingreso</label>
                          <input type="date" name="fecha_reingreso_DGAJ" value="{{ $sumarisima-> fecha_reingreso_DGAJ }}" id="multicol-fecha_reingreso_DGAJ" class="form-control"  />
                        </div>

                        <div class="col-md-6">
                          <label class="form-label" for="multicol-obs_reingreso_DGAJ">Observaciones del Reingreso</label>
                          <input type="text" name="obs_reingreso_DGAJ" value="{{ $sumarisima-> obs_reingreso_DGAJ }}" id="multicol-obs_reingreso_DGAJ" class="form-control" />
                        </div>

                        <div class="col-md-6">
                          <label class="form-label" for="multicol-opinion_cierre_DGAJ">Opinion de Cierre</label>
                          <textarea name="opinion_cierre_DGAJ" id="multicol-opinion_cierre_DGAJ" class="form-control">{{ $sumarisima->opinion_cierre_DGAJ }}</textarea>
                        </div>

                        <div class="col-md-6">
                          <label class="form-label" for="multicol-fecha_pase_DGAJ"> Fecha de Pase</label>
                          <input type="date" name="fecha_pase_DGAJ" value="{{ $sumarisima-> fecha_pase_DGAJ}}" id="multicol-fecha_pase_DGAJ" class="form-control" value="{{old('fecha_pase_DGAJ')}}" placeholder="Fecha de pase del expediente " />
                        </div>

                
                        <div class="col-md-6">
                            <label class="form-label" for="multicol-lugar_pase_DGAJ">Lugar de Pase</label>
                            <x-adminlte-select2 name="lugar_pase_DGAJ" value="{{ $sumarisima->lugar_pase_DGAJ }}" class="select2 form-select">
                                <option value="">Seleccionar la dependencia</option>
                                @foreach($dependencias as $dependencia)
                                    <option value="{{$dependencia->nombre_dep }}" @if ($sumarisima->lugar_pase_DGAJ == $dependencia->nombre_dep) selected @endif>{{ $dependencia->nombre_dep }}</option>
                                @endforeach
                            </x-adminlte-select2>
                        </div>

                        
                        <div class="col-md-6">
                          <label class="form-label" for="multicol-obs_pase_DGAJ">Observaciones del pase</label>
                          <input type="text" name="obs_pase_DGAJ" value="{{ $sumarisima-> obs_pase_DGAJ}}" id="multicol-obs_pase_DGAJ"value="{{old('obs_pase_DGAJ')}}"  class="form-control" placeholder="Escribir observaciones para el pase" />
                        </div>
           
                     
               </div>

              @endcan

              @can('EditarSumarisimaDGAL')
              
                  <div class="hidden-view">
                    <x-adminlte-select  name="apellido_nombre_inf[]" id="apellido_nombre_inf" class="form-control selectpicker" data-style="btn-primary" title="Seleccionar Infractores" multiple>
                              @foreach ($infractores as $infractor) 
                              <option value="{{$infractor->id}}">{{$infractor->apellido_nombre_inf}}</option>
                              @endforeach
                    </x-adminlte-select>
                  </div>

                  <hr class="my-4 mx-n4" />
                  <h4 class="fw-normal">5. Carga de datos del personal instructor de Asesoria Letrada</h4>
              <div class="row g-3">

                        <div class="col-md-6">
                          <label class="form-label" for="multicol-apellido_nombre_AL">Apellido y Nombre</label>
                          <input type="text" name="apellido_nombre_AL" value="{{ $sumarisima-> apellido_nombre_AL }}" id="multicol-apellido_nombre_AL" class="form-control" placeholder="Escribir el apellido y nombre"/>
                        </div>

                        <div class="col-md-6">
                          <label class="form-label" for="multicol-leg_pers_AL">Legajo Personal</label>
                          <input type="text" name="leg_pers_AL" value="{{ $sumarisima-> leg_pers_AL }}" id="multicol-leg_pers_AL" class="form-control" placeholder="Escribir el legajo personal" />
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="multicol-dependen_AL">Dependencia</label>
                            <x-adminlte-select2 name="dependen_AL" value="{{ $sumarisima->dependen_AL }}" class="select2 form-select">
                                <option value="">Seleccionar la dependencia</option>
                                @foreach($dependencias as $dependencia)
                                    <option value="{{ $dependencia->nombre_dep }}" @if ($sumarisima->dependen_AL == $dependencia->nombre_dep) selected @endif>{{ $dependencia->nombre_dep }}</option>
                                @endforeach
                            </x-adminlte-select2>
                        </div>

                        <div class="col-md-6 select2-primary">
                          <label class="form-label" for="multicol-jerarquia_AL">Jerarquia</label>
                          <x-adminlte-select2  name="jerarquia_AL" value="{{ $sumarisima-> jerarquia_AL }}" class="select2 form-select">
                            <option value="">Seleccionar la jerarquia</option>
                            <option value="agente" @if ($sumarisima->jerarquia_AL == 'agente') selected @endif 'agente'>agente</option>
                            <option value="oficial_ayudante" @if ($sumarisima->jerarquia_AL == 'oficial_ayudante') selected @endif 'oficial_ayudante'>oficial ayudante</option>
                            <option value="comisario" @if ($sumarisima->jerarquia_AL == 'comisario') selected @endif 'comisario'>comisario</option>
                          </x-adminlte-select2>
                        </div>

              </div> 

                  <hr class="my-4 mx-n4" />
                  <h4 class="fw-normal">6. Carga de movimientos y sugerencias del instructor de Asesoria Letrada</h4>
              <div class="row g-3">

                    <div class="col-md-6">
                        <label class="form-label" for="multicol-reg_interno_AL">Registro Interno</label>
                        <input type="text" name="reg_interno_AL" value="{{ $sumarisima-> reg_interno_AL }}" id="multicol-reg_interno_AL" class="form-control" placeholder="Registro interno" />
                    </div>
                  
                    <div class="col-md-6">
                      <label class="form-label" for="multicol-fecha_mov_procAL"> Fecha de Procedencia</label>
                      <input type="date" name="fecha_mov_procAL" value="{{ $sumarisima-> fecha_mov_procAL }}" id="multicol-fecha_mov_procAL" class="form-control" placeholder="Fecha de pase del expediente " />
                    </div>

                    <div class="col-md-6">
                        <label class="form-label" for="multicol-destin_proceden_AL">Lugar de Procedencia</label>
                        <x-adminlte-select2 name="destin_proceden_AL" value="{{ $sumarisima->destin_proceden_AL }}" class="select2 form-select">
                            <option value="">Seleccionar la dependencia</option>
                            @foreach($dependencias as $dependencia)
                                <option value="{{  $dependencia->nombre_dep }}" @if ($sumarisima->destin_proceden_AL ==  $dependencia->nombre_dep) selected @endif>{{  $dependencia->nombre_dep }}</option>
                            @endforeach
                        </x-adminlte-select2>
                    </div>
              

                    <div class="col-md-6">
                        <label class="form-label" for="multicol-sugerencia_AL">Sugerencia AL</label>
                        <textarea name="sugerencia_AL" id="multicol-sugerencia_AL" class="form-control">{{ $sumarisima->sugerencia_AL }}</textarea>
                    </div>

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-obs_proced_AL">Observaciones de la procedencia</label>
                      <input type="text" name="obs_proced_AL" value="{{ $sumarisima-> obs_proced_AL }}" id="multicol-obs_proced_AL" class="form-control" placeholder="Escribir observaciones de la procedencia" />
                    </div>
                  
                    <div class="col-md-6">
                      <label class="form-label" for="multicol-fecha_mov_paseAL"> Fecha de Pase</label>
                      <input type="date" name="fecha_mov_paseAL" value="{{ $sumarisima-> fecha_mov_paseAL }}" id="multicol-fecha_mov_paseAL" class="form-control" placeholder="Fecha de pase del expediente " />
                    </div>

                    <div class="col-md-6">
                        <label class="form-label" for="multicol-destin_pase_AL">Lugar de Pase</label>
                        <x-adminlte-select2 name="destin_pase_AL" value="{{ $sumarisima->destin_pase_AL }}" class="select2 form-select">
                            <option value="">Seleccionar la dependencia</option>
                            @foreach($dependencias as $dependencia)
                                <option value="{{ $dependencia->nombre_dep }}" @if ($sumarisima->destin_pase_AL == $dependencia->nombre_dep) selected @endif>{{ $dependencia->nombre_dep}}</option>
                            @endforeach
                        </x-adminlte-select2>
                    </div>

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-obs_pase_AL">Observaciones del pase</label>
                      <input type="text" name="obs_pase_AL" value="{{ $sumarisima-> obs_pase_AL}}" id="multicol-obs_pase_AL" class="form-control" placeholder="Escribir observaciones para el pase" />
                    </div>
                
                    
              </div>
              @endcan

              @can('EditarSumarisimaSS')
              
              <div class="hidden-view">
                <x-adminlte-select  name="apellido_nombre_inf[]" id="apellido_nombre_inf" class="form-control selectpicker" data-style="btn-primary" title="Seleccionar Infractores" multiple>
                          @foreach ($infractores as $infractor) 
                          <option value="{{$infractor->id}}">{{$infractor->apellido_nombre_inf}}</option>
                          @endforeach
                </x-adminlte-select>
              </div>

              <hr class="my-4 mx-n4" />
              <h4 class="fw-normal">7. Carga de datos del personal instructor de la Secretaria de Seguridad</h4>
          <div class="row g-3">

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-apellido_nombre_SS">Apellido y Nombre</label>
                      <input type="text" name="apellido_nombre_SS" value="{{ $sumarisima-> apellido_nombre_SS }}" id="multicol-apellido_nombre_SS" class="form-control" placeholder="Escribir el apellido y nombre"/>
                    </div>

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-leg_pers_SS">Legajo Personal</label>
                      <input type="text" name="leg_pers_SS" value="{{ $sumarisima-> leg_pers_SS }}" id="multicol-leg_pers_SS" class="form-control" placeholder="Escribir el legajo personal" />
                    </div>

                    <div class="col-md-6">
                        <label class="form-label" for="multicol-dependen_SS">Dependencia</label>
                        <x-adminlte-select2 name="dependen_SS" value="{{ $sumarisima->dependen_SS }}" class="select2 form-select">
                            <option value="">Seleccionar la dependencia</option>
                            @foreach($dependencias as $dependencia)
                                <option value="{{ $dependencia->nombre_dep }}" @if ($sumarisima->dependen_SS == $dependencia->nombre_dep) selected @endif>{{ $dependencia->nombre_dep }}</option>
                            @endforeach
                        </x-adminlte-select2>
                    </div>

                    <div class="col-md-6 select2-primary">
                      <label class="form-label" for="multicol-jerarquia_SS">Jerarquia</label>
                      <x-adminlte-select2  name="jerarquia_SS" value="{{ $sumarisima-> jerarquia_SS }}" class="select2 form-select">
                        <option value="">Seleccionar la jerarquia</option>
                        <option value="agente" @if ($sumarisima->jerarquia_SS == 'agente') selected @endif 'agente'>agente</option>
                        <option value="oficial_ayudante" @if ($sumarisima->jerarquia_SS == 'oficial_ayudante') selected @endif 'oficial_ayudante'>oficial ayudante</option>
                        <option value="comisario" @if ($sumarisima->jerarquia_SS == 'comisario') selected @endif 'comisario'>comisario</option>
                      </x-adminlte-select2>
                    </div>

          </div> 

              <hr class="my-4 mx-n4" />
              <h4 class="fw-normal">8. Carga de movimientos y sugerencias de la Secretaria de Seguridad</h4>
          <div class="row g-3">

                <div class="col-md-6">
                    <label class="form-label" for="multicol-reg_interno_SS">Registro Interno</label>
                    <input type="text" name="reg_interno_SS" value="{{ $sumarisima-> reg_interno_SS }}" id="multicol-reg_interno_SS" class="form-control" placeholder="Registro interno" />
                </div>
              
                <div class="col-md-6">
                  <label class="form-label" for="multicol-fecha_proced_SS"> Fecha de Procedencia</label>
                  <input type="date" name="fecha_proced_SS" value="{{ $sumarisima-> fecha_proced_SS }}" id="multicol-fecha_proced_SS" class="form-control" placeholder="Fecha de pase del expediente " />
                </div>

                <div class="col-md-6">
                    <label class="form-label" for="multicol-lugar_proceden_SS">Lugar de Procedencia</label>
                    <x-adminlte-select2 name="lugar_proceden_SS" value="{{ $sumarisima->lugar_proceden_SS }}" class="select2 form-select">
                        <option value="">Seleccionar la dependencia</option>
                        @foreach($dependencias as $dependencia)
                            <option value="{{ $dependencia->nombre_dep }}" @if ($sumarisima->lugar_proceden_SS == $dependencia->nombre_dep) selected @endif>{{ $dependencia->nombre_dep }}</option>
                        @endforeach
                    </x-adminlte-select2>
                </div>
          

                <div class="col-md-6">
                    <label class="form-label" for="multicol-sugerencia_SS">Sugerencia AL</label>
                    <textarea name="sugerencia_SS" id="multicol-sugerencia_SS" class="form-control">{{ $sumarisima->sugerencia_SS }}</textarea>
                </div>

                <div class="col-md-6">
                  <label class="form-label" for="multicol-obs_proced_SS">Observaciones de la procedencia</label>
                  <input type="text" name="obs_proced_SS" value="{{ $sumarisima-> obs_proced_SS }}" id="multicol-obs_proced_SS" class="form-control" placeholder="Escribir observaciones de la procedencia" />
                </div>
              
                <div class="col-md-6">
                  <label class="form-label" for="multicol-fecha_pase_SS"> Fecha de Pase</label>
                  <input type="date" name="fecha_pase_SS" value="{{ $sumarisima-> fecha_pase_SS }}" id="multicol-fecha_pase_SS" class="form-control" placeholder="Fecha de pase del expediente " />
                </div>

                <div class="col-md-6">
                    <label class="form-label" for="multicol-lugar_pase_SS">Lugar de Pase</label>
                    <x-adminlte-select2 name="lugar_pase_SS" value="{{ $sumarisima->lugar_pase_SS }}" class="select2 form-select">
                        <option value="">Seleccionar la dependencia</option>
                        @foreach($dependencias as $dependencia)
                            <option value="{{ $dependencia->nombre_dep }}" @if ($sumarisima->lugar_pase_SS == $dependencia->nombre_dep) selected @endif>{{ $dependencia->nombre_dep }}</option>
                        @endforeach
                    </x-adminlte-select2>
                </div>


                <div class="col-md-6">
                  <label class="form-label" for="multicol-obs_pase_SS">Observaciones del pase</label>
                  <input type="text" name="obs_pase_SS" value="{{ $sumarisima-> obs_pase_SS}}" id="multicol-obs_pase_SS" class="form-control" placeholder="Escribir observaciones para el pase" />
                </div>
            
                
          </div>
          @endcan

              @can('EditarSumarisimaDGRRHH')
              
                 <div class="hidden-view">
                    <x-adminlte-select  name="apellido_nombre_inf[]" id="apellido_nombre_inf" class="form-control selectpicker" data-style="btn-primary" title="Seleccionar Infractores" multiple>
                              @foreach ($infractores as $infractor) 
                              <option value="{{$infractor->id}}">{{$infractor->apellido_nombre_inf}}</option>
                              @endforeach
                    </x-adminlte-select>
                  </div>

              
                  <hr class="my-4 mx-n4" />
                    <h4 class="fw-normal">9. Carga de datos del personal instructor de la Direccion General de Recursos Humanos</h4>
              <div class="row g-3">
                      <div class="col-md-6">
                        <label class="form-label" for="multicol-apellido_nombre_DGRRHH">Apellido y Nombre</label>
                        <input type="text" name="apellido_nombre_DGRRHH" value="{{ $sumarisima-> apellido_nombre_DGRRHH}}" id="multicol-apellido_nombre_DGRRHH" class="form-control" placeholder="Escribir el apellido y nombre"/>
                      </div>

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-leg_pers_DGRRHH">Legajo Personal</label>
                      <input type="text" name="leg_pers_DGRRHH" value="{{ $sumarisima-> leg_pers_DGRRHH}}" id="multicol-leg_pers_DGRRHH" class="form-control" placeholder="Escribir el legajo personal" />
                    </div>
                    
                    <div class="col-md-6">
                        <label class="form-label" for="multicol-dependen_DGRRHH">Dependencia</label>
                        <x-adminlte-select2 name="dependen_DGRRHH" class="select2 form-select">
                            <option value="">Seleccionar la dependencia</option>
                            @foreach($dependencias as $dependencia)
                                <option value="{{ $dependencia->nombre_dep }}" @if ($sumarisima->dependen_DGRRHH == $dependencia->nombre_dep) selected @endif>{{ $dependencia->nombre_dep }}</option>
                            @endforeach
                        </x-adminlte-select2>
                    </div>

                    <div class="col-md-6 select2-primary">
                      <label class="form-label" for="multicol-jerarquia_DGRRHH">Jerarquia</label>
                      <x-adminlte-select2  name="jerarquia_DGRRHH" value="{{ $sumarisima-> jerarquia_DGRRHH}}" class="select2 form-select" >
                        <option value="">Seleccionar la jerarquia</option>
                        <option value="agente" @if ($sumarisima->jerarquia_DGRRHH == 'agente') selected @endif 'agente'>agente</option>
                        <option value="oficial_ayudante" @if ($sumarisima->jerarquia_DGRRHH == 'oficial_ayudante') selected @endif 'oficial_ayudante'>oficial ayudante</option>
                        <option value="comisario" @if ($sumarisima->jerarquia_DGRRHH == 'comisario') selected @endif 'comisario'>comisario</option>
                      </x-adminlte-select2>
                    </div>

              </div> 

                  <hr class="my-4 mx-n4" />
                  <h4 class="fw-normal">10. Carga de movimientos y resolucion final del instructor de la Direccion General de Recursos Humanos</h4>
              <div class="row g-3">

                      <div class="col-md-6">
                          <label class="form-label" for="multicol-reg_interno_DGRRHH">Registro Interno</label>
                          <input type="text" name="reg_interno_DGRRHH" value="{{ $sumarisima-> reg_interno_DGRRHH}}" id="multicol-reg_interno_DGRRHH" class="form-control" placeholder="Registro interno" />
                      </div>
                    
                      <div class="col-md-6">
                        <label class="form-label" for="multicol-fecha_mov_proceDGRRHH"> Fecha de Procedencia</label>
                        <input type="date" name="fecha_mov_proceDGRRHH" value="{{ $sumarisima-> fecha_mov_proceDGRRHH}}" id="multicol-fecha_mov_proceDGRRHH" class="form-control" placeholder="Fecha de pase del expediente " />
                      </div>

                      <div class="col-md-6">
                          <label class="form-label" for="multicol-destin_proceden_DGRRHH">Lugar de Procedencia</label>
                          <x-adminlte-select2 name="destin_proceden_DGRRHH" class="select2 form-select">
                              <option value="">Seleccionar la dependencia</option>
                              @foreach($dependencias as $dependencia)
                                  <option value="{{ $dependencia->nombre_dep }}" @if ($sumarisima->destin_proceden_DGRRHH == $dependencia->nombre_dep) selected @endif>{{ $dependencia->nombre_dep }}</option>
                              @endforeach
                          </x-adminlte-select2>
                      </div>
                                                         

                      <div class="col-md-6">
                          <label class="form-label" for="multicol-resol_final_DGRRHH">Resolucion Final</label>
                          <textarea name="resol_final_DGRRHH" id="multicol-resol_final_DGRRHH" class="form-control">{{ $sumarisima->resol_final_DGRRHH }}</textarea>
                      </div>

                      <div class="col-md-6">
                        <label class="form-label" for="multicol-obs_proced_DGRRHH">Observaciones de la procedencia</label>
                        <input type="text" name="obs_proced_DGRRHH"  value="{{ $sumarisima-> obs_proced_DGRRHH}}" id="multicol-obs_proced_DGRRHH" class="form-control" placeholder="Escribir observaciones de la procedencia" />
                      </div>
                   

                      <div class="col-md-6">
                        <label class="form-label" for="multicol-concluido_DGRRHH">Concluido por Instruccion</label>
                        <x-adminlte-select2  name="concluido_DGRRHH" value="{{ $sumarisima-> concluido_DGRRHH}}" class="select2 form-select">
                          <option value="">Seleccione</option>
                          <option value="Si" @if ($sumarisima->concluido_DGRRHH == 'Si') selected @endif 'Si'>Si</option>
                          <option value="No" @if ($sumarisima->concluido_DGRRHH == 'No') selected @endif 'No'>No</option>
                        </x-adminlte-select2>
                      </div>
               
                      <div class="col-md-6">
                        <label class="form-label" for="multicol-DGRRHH_N°">DGRRHH N°</label>
                        <input type="text" name="DGRRHH_N°" id="multicol-DGRRHH_N°" value="{{ $sumarisima-> DGRRHH_N°}}" class="form-control" placeholder="Escribir N° de resolucion" />
                      </div>

                      <div class="col-md-6">
                        <label class="form-label" for="multicol-fecha_notificacion"> Fecha de Notificacion</label>
                        <input type="date" name="fecha_notificacion" id="multicol-fecha_notificacion" value="{{ $sumarisima-> fecha_notificacion}}" class="form-control" placeholder="Fecha de notificacion de la resolucion" />
                      </div>
                      
              </div>
              @endcan
    
                  <div class="pt-4">
                      <button type="submit" class="btn btn-primary me-sm-3 me-1">Guardar</button>
                      <button type="button" class="btn btn-secondary" onClick="location.href='/sumarisimas'">Cancelar</button>
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
