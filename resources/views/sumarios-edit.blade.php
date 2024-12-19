@extends('adminlte::page')

@section('title', 'SIEJ')

@section('content_header')
<style>
        .hidden-view {
            display: none;
        }
</style>
    <h1 class="m-0 text-dark">Editar Sumario</h1>
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
              <x-adminlte-input type="hidden" name="num_dja"   value="{{$sumario->num_dja}}"/> 
              <x-adminlte-input type="hidden" name="lugar_proced"    value="{{$sumario->lugar_proced}}"/> 
              <x-adminlte-input type="hidden" name="fecha_ingreso"    value="{{$sumario->fecha_ingreso}}"/> 
              <x-adminlte-input type="hidden" name="num_dj"   value="{{$sumario->num_dj}}"/> 
              <x-adminlte-input type="hidden" name="fecha_inicio"    value="{{$sumario->fecha_inicio}}"/>
              <x-adminlte-input type="hidden" name="fojas"   value="{{$sumario->fojas}}"/> 
              <x-adminlte-input type="hidden" name="infraccion"    value="{{$sumario->infraccion}}"/> 
            
              <x-adminlte-input type="hidden" name="tipo_denun"  value="{{$sumario->tipo_denun}}"/>
              <x-adminlte-input type="hidden" name="fecha_movimiento"  value="{{$sumario->fecha_movimiento}}"/> 
              <x-adminlte-input type="hidden" name="destino_pase"  value="{{$sumario->destino_pase}}"/> 
              <x-adminlte-input type="hidden" name="extracto"  value="{{$sumario->extracto}}"/> 
              <x-adminlte-input type="hidden" name="tipo_mov"  value="{{$sumario->tipo_mov}}"/>
              <x-adminlte-input type="hidden" name="observaciones"   value="{{$sumario->observaciones}}"/> 
              
              <x-adminlte-input type="hidden" name="apellido_nombre_DAI"   value="{{$sumario->apellido_nombre_DAI}}"/> 
              <x-adminlte-input type="hidden" name="leg_pers_DAI"    value="{{$sumario->leg_pers_DAI}}"/> 
              <x-adminlte-input type="hidden" name="dependen_DAI"   value="{{$sumario->dependen_DAI}}"/> 
              <x-adminlte-input type="hidden" name="jerarquia_DAI"    value="{{$sumario->jerarquia_DAI}}"/>
              <x-adminlte-input type="hidden" name="reg_interno_DAI"   value="{{$sumario->reg_interno_DAI}}"/> 
              <x-adminlte-input type="hidden" name="fecha_mov_proceDAI"    value="{{$sumario->fecha_mov_proceDAI}}"/> 
              <x-adminlte-input type="hidden" name="destin_proceden_DAI"  value="{{$sumario->destin_proceden_DAI}}"/> 
              <x-adminlte-input type="hidden" name="obs_proced_DAI"  value="{{$sumario->obs_proced_DAI}}"/>
              <x-adminlte-input type="hidden" name="tipo_mov_proce_DAI"  value="{{$sumario->tipo_mov_proce_DAI}}"/>
              <x-adminlte-input type="hidden" name="sugerencia_DAI"  value="{{$sumario->sugerencia_DAI}}"/>
              <x-adminlte-input type="hidden" name="fecha_elev_inst_DAI"  value="{{$sumario->fecha_elev_inst_DAI}}"/> 
              <x-adminlte-input type="hidden" name="fecha_mov_paseDAI"  value="{{$sumario->fecha_mov_paseDAI}}"/> 
              <x-adminlte-input type="hidden" name="destin_pase_DAI"  value="{{$sumario->destin_pase_DAI}}"/> 
              <x-adminlte-input type="hidden" name="obs_pase_DAI"  value="{{$sumario->obs_pase_DAI}}"/>
              <x-adminlte-input type="hidden" name="tipo_mov_pase_DAI"  value="{{$sumario->tipo_mov_pase_DAI}}"/> 
              <x-adminlte-input type="hidden" name="concluido_DAI"  value="{{$sumario->concluido_DAI}}"/>

              <x-adminlte-input type="hidden" name="apellido_nombre_DGAJ"  value="{{$sumario->apellido_nombre_DGAJ}}"/>
              <x-adminlte-input type="hidden" name="leg_pers_DGAJ"   value="{{$sumario->leg_pers_DGAJ}}"/> 
              <x-adminlte-input type="hidden" name="dependen_DGAJ"    value="{{$sumario->dependen_DGAJ}}"/> 
              <x-adminlte-input type="hidden" name="jerarquia_DGAJ"   value="{{$sumario->jerarquia_DGAJ}}"/> 
              <x-adminlte-input type="hidden" name="reg_interno_DGAJ"    value="{{$sumario->reg_interno_DGAJ}}"/>
              <x-adminlte-input type="hidden" name="fecha_mov_proceDGAJ"   value="{{$sumario->fecha_mov_proceDGAJ}}"/> 
              <x-adminlte-input type="hidden" name="destin_proced_DGAJ"    value="{{$sumario->destin_proced_DGAJ}}"/> 
              <x-adminlte-input type="hidden" name="tipo_mov_proce_DGAJ"  value="{{$sumario->tipo_mov_proce_DGAJ}}"/> 
              <x-adminlte-input type="hidden" name="sugerencia_DGAJ"  value="{{$sumario->sugerencia_DGAJ}}"/>
              <x-adminlte-input type="hidden" name="obs_proced_DGAJ"  value="{{$sumario->obs_proced_DGAJ}}"/>
              <x-adminlte-input type="hidden" name="fecha_mov_destDGAJ"  value="{{$sumario->fecha_mov_destDGAJ}}"/>
              <x-adminlte-input type="hidden" name="destin_pase_DGAJ"  value="{{$sumario->destin_pase_DGAJ}}"/> 
              <x-adminlte-input type="hidden" name="tipo_mov_pase_DGAJ"  value="{{$sumario->tipo_mov_pase_DGAJ}}"/> 
              <x-adminlte-input type="hidden" name="obs_pase_DGAJ"  value="{{$sumario->obs_pase_DGAJ}}"/> 
              <x-adminlte-input type="hidden" name="concluido_DGAJ"  value="{{$sumario->concluido_DGAJ}}"/>

              <x-adminlte-input type="hidden" name="apellido_nombre_AL"  value="{{$sumario->apellido_nombre_AL}}"/>
              <x-adminlte-input type="hidden" name="leg_pers_AL"   value="{{$sumario->leg_pers_AL}}"/> 
              <x-adminlte-input type="hidden" name="dependen_AL"    value="{{$sumario->dependen_AL}}"/> 
              <x-adminlte-input type="hidden" name="jerarquia_AL"   value="{{$sumario->jerarquia_AL}}"/> 
              <x-adminlte-input type="hidden" name="reg_interno_AL"    value="{{$sumario->reg_interno_AL}}"/>
              <x-adminlte-input type="hidden" name="fecha_mov_procAL"   value="{{$sumario->fecha_mov_procAL}}"/> 
              <x-adminlte-input type="hidden" name="destin_proceden_AL"    value="{{$sumario->destin_proceden_AL}}"/> 
              <x-adminlte-input type="hidden" name="tipo_mov_proce_AL"  value="{{$sumario->tipo_mov_proce_AL}}"/> 
              <x-adminlte-input type="hidden" name="sugerencia_AL"  value="{{$sumario->sugerencia_AL}}"/>
              <x-adminlte-input type="hidden" name="obs_proced_AL"  value="{{$sumario->obs_proced_AL}}"/>
              <x-adminlte-input type="hidden" name="fecha_mov_paseAL"  value="{{$sumario->fecha_mov_paseAL}}"/>
              <x-adminlte-input type="hidden" name="destin_pase_AL"  value="{{$sumario->destin_pase_AL}}"/> 
              <x-adminlte-input type="hidden" name="tipo_mov_pase_AL"  value="{{$sumario->tipo_mov_pase_AL}}"/> 
              <x-adminlte-input type="hidden" name="obs_pase_AL"  value="{{$sumario->obs_pase_AL}}"/> 
              <x-adminlte-input type="hidden" name="concluido_AL"  value="{{$sumario->concluido_AL}}"/>

              <x-adminlte-input type="hidden" name="apellido_nombre_DGRRHH"  value="{{$sumario->apellido_nombre_DGRRHH}}"/>
              <x-adminlte-input type="hidden" name="leg_pers_DGRRHH"   value="{{$sumario->leg_pers_DGRRHH}}"/> 
              <x-adminlte-input type="hidden" name="dependen_DGRRHH"    value="{{$sumario->dependen_DGRRHH}}"/> 
              <x-adminlte-input type="hidden" name="jerarquia_DGRRHH"   value="{{$sumario->jerarquia_DGRRHH}}"/> 
              <x-adminlte-input type="hidden" name="reg_interno_DGRRHH"    value="{{$sumario->reg_interno_DGRRHH}}"/>
              <x-adminlte-input type="hidden" name="fecha_mov_proceDGRRHH"   value="{{$sumario->fecha_mov_proceDGRRHH}}"/> 
              <x-adminlte-input type="hidden" name="destin_proceden_DGRRHH"    value="{{$sumario->destin_proceden_DGRRHH}}"/>
              <x-adminlte-input type="hidden" name="tipo_mov_pase_DGRRHH"  value="{{$sumario->tipo_mov_pase_DGRRHH}}"/>
              <x-adminlte-input type="hidden" name="resol_final_DGRRHH"  value="{{$sumario->resol_final_DGRRHH}}"/>
              <x-adminlte-input type="hidden" name="obs_proced_DGRRHH"  value="{{$sumario->obs_proced_DGRRHH}}"/>
              <x-adminlte-input type="hidden" name="fecha_mov_paseDGRRHH"  value="{{$sumario->fecha_mov_paseDGRRHH}}"/>
              <x-adminlte-input type="hidden" name="destin_pase_DGRRHH"  value="{{$sumario->destin_pase_DGRRHH}}"/> 
              <x-adminlte-input type="hidden" name="tipo_mov_pase_DGRRHH"  value="{{$sumario->tipo_mov_pase_DGRRHH}}"/> 
              <x-adminlte-input type="hidden" name="obs_pase_DGRRHH"  value="{{$sumario->obs_pase_DGRRHH}}"/>
              <x-adminlte-input type="hidden" name="concluido_DGRRHH"  value="{{$sumario->concluido_DGRRHH}}"/>
              <x-adminlte-input type="hidden" name="DGRRHH_N°"  value="{{$sumario->DGRRHH_N°}}"/>
              <x-adminlte-input type="hidden" name="fecha_notificacion"  value="{{$sumario->fecha_notificacion}}"/>

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
                  @can('EditarSumarioDGAJ')
                

                  <h4 class="fw-normal">1. Carga de datos del expediente</h4>
                  <div class="row g-3">

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-username">N° DJA</label>
                      <input type="text" name= "num_dja" value="{{ $sumario-> num_dja }}" id="multicol-num_dja" class="form-control" placeholder="Numero de DJA " required/>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label" for="multicol-lugar_proced">Lugar de Procedencia</label>
                        <x-adminlte-select2 name="lugar_proced" value="{{ $sumario->lugar_proced }}" required>
                            <option value="">Seleccionar la dependencia</option>
                            @foreach($dependencias as $dependencia)
                                <option value="{{ $dependencia->nombre_dep }}" {{ $sumario->lugar_proced == $dependencia->nombre_dep ? 'selected' : '' }}>{{ $dependencia->nombre_dep }}</option>
                            @endforeach
                        </x-adminlte-select2>
                    </div>

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-username"> Fecha Ingreso</label>
                      <input type="date" name="fecha_ingreso" value="{{ $sumario-> fecha_ingreso }}" id="multicol-fecha_ingreso" class="form-control" placeholder="Fecha de ingreso " required/>
                    </div>

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-username"> N° DJ</label>
                      <input type="text" name="num_dj" value="{{ $sumario-> num_dj }}" id="multicol-num_dj" class="form-control" placeholder="Numero de DJ" required/>
                    </div>

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-username"> Fecha Inicio de Actuaciones</label>
                      <input type="date" name="fecha_inicio" value="{{ $sumario-> fecha_inicio }}" id="multicol-fecha_inicio" class="form-control" placeholder="Fecha de inicio de actuaciones " required/>
                    </div>

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-username">Fojas</label>
                      <input type="text" name="fojas" value="{{ $sumario-> fojas }}" id="multicol-fojas" class="form-control" placeholder="Cantidad de fojas" required/>
                    </div>

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-username">Infraccion</label>
                      <input type="text" name="infraccion" value="{{ $sumario-> infraccion }}" id="multicol-infraccion" class="form-control" placeholder="Infraccion cometida" required/>
                    </div>

                    
                    <div class="col-md-6">
                        <label class="form-label" for="multicol-nombre_mot">Motivo</label>
                        <x-adminlte-select2 name="nombre_mot[]" id="nombre_mot" class="form-control" title="Seleccionar motivos" multiple required data-placeholder="Seleccionar motivos" data-allow-clear="true">
                            @foreach ($motivos as $motivo)
                                <option value="{{$motivo->id}}" 
                                    {{ in_array($motivo->id, old('nombre_mot', $sumario->motivos->pluck('id')->toArray())) ? 'selected' : '' }}>
                                    {{$motivo->nombre_mot}}
                                </option>
                            @endforeach
                        </x-adminlte-select2>

                        @if ($errors->has('nombre_mot'))
                            <span class="text-danger">
                                <strong>{{$errors->first('nombre_mot') }}</strong>
                            </span>
                        @endif
                    </div>


                    <div class="col-md-6">
                      <label class="form-label" for="multicol-extracto">Extracto</label>
                      <input type="text" name="extracto" value="{{ $sumario->extracto }}" id="multicol-extracto" class="form-control" placeholder="Extracto" />
                    </div>

                    <div class="col-md-6">
                        <label class="form-label" for="multicol-tipo_denun">Tipo de Denuncia</label>
                        <x-adminlte-select2 name="tipo_denun" required>
                            <option value="">Seleccionar el tipo</option>
                            @foreach($tipo_denuncias as $tipo_denuncia)
                                <option value="{{ $tipo_denuncia->nombre_tipoDen }}" {{ $sumario->tipo_denun == $tipo_denuncia->nombre_tipoDen ? 'selected' : '' }}>
                                    {{ $tipo_denuncia->nombre_tipoDen}}
                                </option>
                            @endforeach
                        </x-adminlte-select2>
                    </div>

                  
                    <div class="col-md-6">
                      <label class="form-label" for="multicol-fecha_movimiento"> Fecha de Pase</label>
                      <input type="date" name="fecha_movimiento" value="{{ $sumario-> fecha_movimiento }}" id="multicol-fecha_movimiento" class="form-control" placeholder="Fecha de pase del expediente " required />
                    </div>
                    
                    <div class="col-md-6">
                        <label class="form-label" for="multicol-destino_pase">Lugar de Pase</label>
                        <x-adminlte-select2 name="destino_pase" value="{{ $sumario->destino_pase }}" required>
                            <option value="">Seleccionar la dependencia</option>
                            @foreach($dependencias as $dependencia)
                                <option value="{{ $dependencia->nombre_dep }}" {{ $sumario->destino_pase == $dependencia->nombre_dep ? 'selected' : '' }}>
                                    {{ $dependencia->nombre_dep }}
                                </option>
                            @endforeach
                        </x-adminlte-select2>
                    </div>


                    <div class="col-md-6">
                        <label class="form-label" for="multicol-observaciones">Observaciones del Expediente</label>
                        <input type="text" name="observaciones" value="{{ $sumario-> observaciones}}" id="multicol-observaciones" class="form-control" placeholder="Escribir observaciones para el pase" />
                    </div>
           
                              
                  </div>
                              
                  <hr class="my-4 mx-n4" />
                  <h4 class="fw-normal">2. Carga del personal infractor</h4>
                  <div class="row g-3">
                                    
                  <div class="col-md-12">
                      <label class="form-label" for="multicol-apellido_nombre_inf">Apellido y Nombres</label>
                      <x-adminlte-select2 name="apellido_nombre_inf[]" id="apellido_nombre_inf" class="form-control" title="Seleccionar Infractores" multiple required data-tags="true" data-token-separators="[',']" data-allow-clear="true" data-placeholder="Seleccionar Infractores">
                          @foreach ($infractores as $infractor)
                              <option value="{{$infractor->id}}" 
                                  {{ in_array($infractor->id, old('apellido_nombre_inf', $sumario->infractors->pluck('id')->toArray())) ? 'selected' : '' }}>
                                  {{$infractor->jerarquia_inf}} {{$infractor->apellido_inf}} {{$infractor->nombre_inf}} Lp: {{$infractor->leg_pers_inf }}
                              </option>
                          @endforeach
                      </x-adminlte-select2>

                      @if ($errors->has('apellido_nombre_inf'))
                          <span class="text-danger">
                              <strong>{{$errors->first('apellido_nombre_inf') }}</strong>
                          </span>
                      @endif
                  </div>
                                      
                  </div>
                  @endcan 

                  @can('EditarSumarioDGAI')
                  
                  <div class="hidden-view">
                    <x-adminlte-select  name="apellido_nombre_inf[]" id="apellido_nombre_inf" class="form-control selectpicker" data-style="btn-primary" title="Seleccionar Infractores" multiple>
                              @foreach ($infractores as $infractor) 
                              <option value="{{$infractor->id}}">{{$infractor->apellido_nombre_inf}}</option>
                              @endforeach
                    </x-adminlte-select>
                  </div>
                                
                  <hr class="my-4 mx-n4" />
                  <h4 class="fw-normal">3. Carga de datos del personal instructor de la Direccion de Asuntos Internos</h4>
                  <div class="row g-3">

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-apellido_nombre_DAI">Apellido y Nombre</label>
                      <input type="text" name="apellido_nombre_DAI" value="{{ $sumario-> apellido_nombre_DAI }}" id="multicol-apellido_nombre_DAI" class="form-control" placeholder="Escribir el apellido y nombre"/>
                    </div>

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-leg_pers_DAI">Legajo Personal</label>
                      <input type="text" name= "leg_pers_DAI" value="{{ $sumario-> leg_pers_DAI }}" id="multicol-leg_pers_DAI" class="form-control" placeholder="Escribir el legajo personal" />
                    </div>

                    <div class="col-md-6">
                        <label class="form-label" for="multicol-dependen_DAI">Dependencia</label>
                        <x-adminlte-select2 name="dependen_DAI" value="{{ $sumario->dependen_DAI }}">
                            <option value="">Seleccionar la dependencia</option>
                            @foreach($dependencias as $dependencia)
                                <option value="{{ $dependencia->nombre_dep }}" {{ $sumario->dependen_DAI == $dependencia->nombre_dep ? 'selected' : '' }}>
                                    {{ $dependencia->nombre_dep }}
                                </option>
                            @endforeach
                        </x-adminlte-select2>
                    </div>

                    <div class="col-md-6 select2-primary">
                        <label class="form-label" for="multicol-jerarquia_DAI">Jerarquía</label>
                        <x-adminlte-select2 name="jerarquia_DAI" class="select2 form-select">
                            <option value="">Seleccionar la jerarquía</option>
                            @foreach($jerarquias as $jerarquia)
                                <option value="{{ $jerarquia->nombre_jer }}" @if ($sumario->jerarquia_DAI == $jerarquia->nombre_jer) selected @endif>
                                    {{ $jerarquia->nombre_jer }}
                                </option>
                            @endforeach
                        </x-adminlte-select2>
                    </div>
                         

                  </div> 
           
             
                  <hr class="my-4 mx-n4" />
                  <h4 class="fw-normal">4. Carga de movimientos y sugerencias del instructor de la Direccion de Asuntos Internos </h4>
              <div class="row g-3">

                  <div class="col-md-6">
                    <label class="form-label" for="multicol-reg_interno_DAI">Registro Interno</label>
                      <input type="text" name="reg_interno_DAI" value="{{ $sumario-> reg_interno_DAI }}" id="multicol-reg_interno_DAI" class="form-control" placeholder="Registro interno" />
                    </div>

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-fecha_mov_proceDAI"> Fecha de Procedencia</label>
                      <input type="date" name="fecha_mov_proceDAI" value="{{ $sumario-> fecha_mov_proceDAI }}" id="multicol-fecha_mov_proceDAI" class="form-control" placeholder="Fecha de pase del expediente " />
                    </div>

                    <div class="col-md-6">
                        <label class="form-label" for="multicol-destin_proceden_DAI">Lugar de Procedencia</label>
                        <x-adminlte-select2 name="destin_proceden_DAI" value="{{ $sumario->destin_proceden_DAI }}" class="select2 form-select">
                            <option value="">Seleccionar la dependencia</option>
                            @foreach($dependencias as $dependencia)
                                <option value="{{ $dependencia->nombre_dep }}" {{ $sumario->destin_proceden_DAI == $dependencia->nombre_dep ? 'selected' : '' }}>
                                    {{ $dependencia->nombre_dep }}
                                </option>
                            @endforeach
                        </x-adminlte-select2>
                    </div>


                    <div class="col-md-6">
                      <label class="form-label" for="multicol-obs_proced_DAI">Observaciones de Procedencia</label>
                      <input type="text" name="obs_proced_DAI" value="{{ $sumario-> obs_proced_DAI }}" id="multicol-obs_proced_DAI" class="form-control" placeholder="Observaciones" />
                    </div>
                  
                    <div class="col-md-6">
                        <label class="form-label" for="multicol-sugerencia_DAI">Sugerencia DAI</label>
                        <textarea name="sugerencia_DAI" id="multicol-sugerencia_DAI" class="form-control">{{ $sumario->sugerencia_DAI }}</textarea>
                    </div>


                    <div class="col-md-6">
                    <label class="form-label" for="multicol-fecha_elev_inst_DAI"> Fecha de Elevado por Instruccion</label>
                      <input type="date" name="fecha_elev_inst_DAI" value="{{ $sumario-> fecha_elev_inst_DAI }}" id="multicol-fecha_elev_inst_DAI" class="form-control" placeholder="Fecha elevado por insruccion " />
                    </div>

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-fecha_mov_paseDAI"> Fecha de Pase</label>
                      <input type="date" name="fecha_mov_paseDAI" value="{{ $sumario-> fecha_mov_paseDAI }}" id="multicol-fecha_mov_paseDAI" class="form-control" placeholder="Fecha de pase del expediente " />
                    </div>

                    <div class="col-md-6">
                        <label class="form-label" for="multicol-destin_pase_DAI">Lugar de Pase</label>
                        <x-adminlte-select2 name="destin_pase_DAI" value="{{ $sumario->destin_pase_DAI }}" class="select2 form-select">
                            <option value="">Seleccionar la dependencia</option>
                            @foreach($dependencias as $dependencia)
                                <option value="{{ $dependencia->nombre_dep }}" {{ $sumario->destin_pase_DAI == $dependencia->nombre_dep ? 'selected' : '' }}>
                                    {{ $dependencia->nombre_dep }}
                                </option>
                            @endforeach
                        </x-adminlte-select2>
                    </div>

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-obs_pase_DAI">Observaciones del Pase</label>
                      <input type="text" name="obs_pase_DAI" value="{{ $sumario-> obs_pase_DAI }}" id="multicol-obs_pase_DAI" class="form-control" placeholder="Observaciones" />
                    </div>

                 
                    <div class="col-md-6">
                    <label class="form-label" for="multicol-concluido_DAI">Concluido por Instruccion</label>
                      <x-adminlte-select2  name="concluido_DAI" value="{{ $sumario-> concluido_DAI }}" class="select2 form-select" >
                        <option value="">Seleccione</option>
                        <option value="Si" @if ($sumario->concluido_DAI == 'Si') selected @endif 'Si'>Si</option>
                        <option value="No" @if ($sumario->concluido_DAI == 'No') selected @endif 'No'>No</option>
                      </x-adminlte-select2>
                    </div>
              </div>
              @endcan

  
              @can('EditarSumarioDGAJ')  
                  <hr class="my-4 mx-n4" />
                  <h4 class="fw-normal">5. Carga de datos del personal instructor de la Direccion General de Asuntos Judiciales</h4>
              <div class="row g-3">

                        <div class="col-md-6">
                          <label class="form-label" for="multicol-apellido_nombre_DGAJ">Apellido y Nombre</label>
                          <input type="text" name="apellido_nombre_DGAJ" value="{{ $sumario-> apellido_nombre_DGAJ }}" id="multicol-apellido_nombre_DGAJ" class="form-control" placeholder="Escribir el apellido y nombre"/>
                        </div>

                        <div class="col-md-6">
                          <label class="form-label" for="multicol-leg_pers_DGAJ">Legajo Personal</label>
                          <input type="text" name="leg_pers_DGAJ" value="{{ $sumario-> leg_pers_DGAJ }}" id="multicol-leg_pers_DGAJ" class="form-control" placeholder="Escribir el legajo personal" />
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="multicol-dependen_DGAJ">Dependencia</label>
                            <x-adminlte-select2 name="dependen_DGAJ" value="{{ $sumario->dependen_DGAJ }}">
                                <option value="">Seleccionar la dependencia</option>
                                @foreach($dependencias as $dependencia)
                                    <option value="{{ $dependencia->nombre_dep }}" {{ $sumario->dependen_DGAJ == $dependencia->nombre_dep ? 'selected' : '' }}>
                                        {{ $dependencia->nombre_dep }}
                                    </option>
                                @endforeach
                            </x-adminlte-select2>
                        </div>


                        <div class="col-md-6 select2-primary">
                          <label class="form-label" for="multicol-jerarquia_DGAJ">Jerarquía</label>
                          <x-adminlte-select2 name="jerarquia_DGAJ" class="select2 form-select">
                              <option value="">Seleccionar la jerarquía</option>
                              @foreach($jerarquias as $jerarquia)
                                  <option value="{{ $jerarquia->nombre_jer }}" @if ($sumario->jerarquia_DGAJ == $jerarquia->nombre_jer) selected @endif>
                                      {{ $jerarquia->nombre_jer }}
                                  </option>
                              @endforeach
                          </x-adminlte-select2>
                      </div>


              </div> 

                  <hr class="my-4 mx-n4" />
                  <h4 class="fw-normal">6. Carga de movimientos y sugerencias del instructor de la Direccion General de Asuntos Judiciales </h4>
              <div class="row g-3">
                      
                    
                        <div class="col-md-6">
                        <label class="form-label" for="multicol-fecha_mov_proceDGAJ"> Fecha de Procedencia</label>
                          <input type="date" name="fecha_mov_proceDGAJ" value="{{ $sumario-> fecha_mov_proceDGAJ }}" id="multicol-fecha_mov_proceDGAJ" class="form-control" placeholder="Fecha de pase del expediente " />
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="multicol-destin_proced_DGAJ">Lugar de Procedencia</label>
                            <x-adminlte-select2 name="destin_proced_DGAJ" value="{{ $sumario->destin_proced_DGAJ }}" class="select2 form-select">
                                <option value="">Seleccionar la dependencia</option>
                                @foreach($dependencias as $dependencia)
                                    <option value="{{ $dependencia->nombre_dep }}" {{ $sumario->destin_proced_DGAJ == $dependencia->nombre_dep ? 'selected' : '' }}>
                                        {{ $dependencia->nombre_dep }}
                                    </option>
                                @endforeach
                            </x-adminlte-select2>
                        </div>
                       
                        <div class="col-md-6">
                            <label class="form-label" for="multicol-sugerencia_DGAJ">Sugerencia DGAJ</label>
                            <textarea name="sugerencia_DGAJ" id="multicol-sugerencia_DGAJ" class="form-control">{{ $sumario->sugerencia_DGAJ }}</textarea>
                        </div>


                        <div class="col-md-6">
                          <label class="form-label" for="multicol-obs_proced_DGAJ">Observaciones de Procedencia</label>
                          <input type="text" name="obs_proced_DGAJ" value="{{ $sumario-> obs_proced_DGAJ }}" id="multicol-obs_proced_DGAJ" class="form-control" placeholder="Escribir observaciones de la procedencia" />
                        </div>
                        
                        <div class="col-md-6">
                          <label class="form-label" for="multicol-fecha_mov_destDGAJ"> Fecha de Pase</label>
                          <input type="date" name="fecha_mov_destDGAJ" value="{{ $sumario-> fecha_mov_destDGAJ }}" id="multicol-fecha_mov_destDGAJ" class="form-control" placeholder="Fecha de pase del expediente " />
                        </div>


                        <div class="col-md-6">
                            <label class="form-label" for="multicol-destin_pase_DGAJ">Lugar de Pase</label>
                            <x-adminlte-select2 name="destin_pase_DGAJ" value="{{ $sumario->destin_pase_DGAJ }}" class="select2 form-select">
                                <option value="">Seleccionar la dependencia</option>
                                @foreach($dependencias as $dependencia)
                                    <option value="{{ $dependencia->nombre_dep }}" {{ $sumario->destin_pase_DGAJ == $dependencia->nombre_dep ? 'selected' : '' }}>
                                        {{ $dependencia->nombre_dep }}
                                    </option>
                                @endforeach
                            </x-adminlte-select2>
                        </div>

                        <div class="col-md-6">
                          <label class="form-label" for="multicol-obs_pase_DGAJ">Observaciones del Pase</label>
                          <input type="text" name="obs_pase_DGAJ" value="{{ $sumario-> obs_pase_DGAJ }}" id="multicol-obs_pase_DGAJ" class="form-control" placeholder="Escribir observaciones para el pase" />
                        </div>

                        <div class="col-md-6">
                          <label class="form-label" for="multicol-concluido_DGAJ">Concluido</label>
                          <x-adminlte-select2 name="concluido_DGAJ" value="{{ $sumario-> concluido_DGAJ }}" class="select2 form-select" >
                            <option value="">Seleccione</option>
                            <option value="Si" @if ($sumario->concluido_DGAJ == 'Si') selected @endif 'Si'>Si</option>
                            <option value="No" @if ($sumario->concluido_DGAJ == 'No') selected @endif 'No'>No</option>
                          </x-adminlte-select2>
                        </div>
                    
              </div>
              @endcan

              @can('EditarSumarioDGAL')
              
                  <div class="hidden-view">
                    <x-adminlte-select  name="apellido_nombre_inf[]" id="apellido_nombre_inf" class="form-control selectpicker" data-style="btn-primary" title="Seleccionar Infractores" multiple>
                              @foreach ($infractores as $infractor) 
                              <option value="{{$infractor->id}}">{{$infractor->apellido_nombre_inf}}</option>
                              @endforeach
                    </x-adminlte-select>
                  </div>

                  <hr class="my-4 mx-n4" />
                  <h4 class="fw-normal">7. Carga de datos del personal instructor de Asesoria Letrada</h4>
              <div class="row g-3">

                        <div class="col-md-6">
                          <label class="form-label" for="multicol-apellido_nombre_AL">Apellido y Nombre</label>
                          <input type="text" name="apellido_nombre_AL" value="{{ $sumario-> apellido_nombre_AL }}" id="multicol-apellido_nombre_AL" class="form-control" placeholder="Escribir el apellido y nombre"/>
                        </div>

                        <div class="col-md-6">
                          <label class="form-label" for="multicol-leg_pers_AL">Legajo Personal</label>
                          <input type="text" name="leg_pers_AL" value="{{ $sumario-> leg_pers_AL }}" id="multicol-leg_pers_AL" class="form-control" placeholder="Escribir el legajo personal" />
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="multicol-dependen_AL">Dependencia</label>
                            <x-adminlte-select2 name="dependen_AL" value="{{ $sumario->dependen_AL }}" class="select2 form-select">
                                <option value="">Seleccionar la dependencia</option>
                                @foreach($dependencias as $dependencia)
                                    <option value="{{ $dependencia->nombre_dep }}" {{ $sumario->dependen_AL == $dependencia->nombre_dep ? 'selected' : '' }}>
                                        {{ $dependencia->nombre_dep }}
                                    </option>
                                @endforeach
                            </x-adminlte-select2>
                        </div>

                        <div class="col-md-6 select2-primary">
                          <label class="form-label" for="multicol-jerarquia_AL">Jerarquía</label>
                          <x-adminlte-select2 name="jerarquia_AL" class="select2 form-select">
                              <option value="">Seleccionar la jerarquía</option>
                              @foreach($jerarquias as $jerarquia)
                                  <option value="{{ $jerarquia->nombre_jer }}" @if ($sumario->jerarquia_AL == $jerarquia->nombre_jer) selected @endif>
                                      {{ $jerarquia->nombre_jer }}
                                  </option>
                              @endforeach
                          </x-adminlte-select2>
                      </div>


              </div> 

                  <hr class="my-4 mx-n4" />
                  <h4 class="fw-normal">8. Carga de movimientos y sugerencias del instructor de Asesoria Letrada</h4>
              <div class="row g-3">

                    <div class="col-md-6">
                        <label class="form-label" for="multicol-reg_interno_AL">Registro Interno</label>
                        <input type="text" name="reg_interno_AL" value="{{ $sumario-> reg_interno_AL }}" id="multicol-reg_interno_AL" class="form-control" placeholder="Registro interno" />
                    </div>
                  
                    <div class="col-md-6">
                      <label class="form-label" for="multicol-fecha_mov_procAL"> Fecha de Procedencia</label>
                      <input type="date" name="fecha_mov_procAL" value="{{ $sumario-> fecha_mov_procAL }}" id="multicol-fecha_mov_procAL" class="form-control" placeholder="Fecha de pase del expediente " />
                    </div>

                    <div class="col-md-6">
                        <label class="form-label" for="multicol-destin_proceden_AL">Lugar de Procedencia</label>
                        <x-adminlte-select2 name="destin_proceden_AL" value="{{ $sumario->destin_proceden_AL }}" class="select2 form-select">
                            <option value="">Seleccionar la dependencia</option>
                            @foreach($dependencias as $dependencia)
                                <option value="{{ $dependencia->nombre_dep }}" {{ $sumario->destin_proceden_AL == $dependencia->nombre_dep ? 'selected' : '' }}>
                                    {{ $dependencia->nombre_dep }}
                                </option>
                            @endforeach
                        </x-adminlte-select2>
                    </div>
                 

                    <div class="col-md-6">
                        <label class="form-label" for="multicol-sugerencia_AL">Sugerencia AL</label>
                        <textarea name="sugerencia_AL" id="multicol-sugerencia_AL" class="form-control">{{ $sumario->sugerencia_AL }}</textarea>
                    </div>

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-obs_proced_AL">Observaciones de Procedencia</label>
                      <input type="text" name="obs_proced_AL" value="{{ $sumario-> obs_proced_AL }}" id="multicol-obs_proced_AL" class="form-control" placeholder="Escribir observaciones de la procedencia" />
                    </div>
                  
                    <div class="col-md-6">
                      <label class="form-label" for="multicol-fecha_mov_paseAL"> Fecha de Pase</label>
                      <input type="date" name="fecha_mov_paseAL" value="{{ $sumario-> fecha_mov_paseAL }}" id="multicol-fecha_mov_paseAL" class="form-control" placeholder="Fecha de pase del expediente " />
                    </div>

                    <div class="col-md-6">
                        <label class="form-label" for="multicol-destin_pase_AL">Lugar de Pase</label>
                        <x-adminlte-select2 name="destin_pase_AL" value="{{ $sumario->destin_pase_AL }}" class="select2 form-select">
                            <option value="">Seleccionar la dependencia</option>
                            @foreach($dependencias as $dependencia)
                                <option value="{{ $dependencia->nombre_dep }}" {{ $sumario->destin_pase_AL == $dependencia->nombre_dep ? 'selected' : '' }}>
                                    {{ $dependencia->nombre_dep }}
                                </option>
                            @endforeach
                        </x-adminlte-select2>
                    </div>
                 

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-obs_pase_AL">Observaciones del Pase</label>
                      <input type="text" name="obs_pase_AL" value="{{ $sumario-> obs_pase_AL}}" id="multicol-obs_pase_AL" class="form-control" placeholder="Escribir observaciones para el pase" />
                    </div>

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-concluido_AL">Concluido</label>
                      <x-adminlte-select2  name="concluido_AL" value="{{ $sumario-> concluido_AL }}" class="select2 form-select">
                        <option value="">Seleccione</option>
                        <option value="Si" @if ($sumario->concluido_AL == 'Si') selected @endif 'Si'>Si</option>
                        <option value="No" @if ($sumario->concluido_AL == 'No') selected @endif 'No'>No</option>
                      </x-adminlte-select2>
                    </div>
                    
              </div>
              @endcan

              @can('EditarSumarioDGRRHH')
              
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
                        <input type="text" name="apellido_nombre_DGRRHH" value="{{ $sumario-> apellido_nombre_DGRRHH}}" id="multicol-apellido_nombre_DGRRHH" class="form-control" placeholder="Escribir el apellido y nombre"/>
                      </div>

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-leg_pers_DGRRHH">Legajo Personal</label>
                      <input type="text" name="leg_pers_DGRRHH" value="{{ $sumario-> leg_pers_DGRRHH}}" id="multicol-leg_pers_DGRRHH" class="form-control" placeholder="Escribir el legajo personal" />
                    </div>
                    
                    <div class="col-md-6">
                      <label class="form-label" for="multicol-dependen_DGRRHH">Dependencia</label>
                      <x-adminlte-select2 name="dependen_DGRRHH" class="select2 form-select">
                          <option value="">Seleccionar la dependencia</option>
                          @foreach($dependencias as $dependencia)
                              <option value="{{ $dependencia->nombre_dep }}" {{ $sumario->dependen_DGRRHH == $dependencia->nombre_dep ? 'selected' : '' }}>
                                  {{ $dependencia->nombre_dep }}
                              </option>
                          @endforeach
                      </x-adminlte-select2>
                  </div>

                  <div class="col-md-6 select2-primary">
                      <label class="form-label" for="multicol-jerarquia_DGRRHH">Jerarquía</label>
                      <x-adminlte-select2 name="jerarquia_DGRRHH" class="select2 form-select">
                          <option value="">Seleccionar la jerarquía</option>
                          @foreach($jerarquias as $jerarquia)
                              <option value="{{ $jerarquia->nombre_jer }}" @if ($sumario->jerarquia_DGRRHH == $jerarquia->nombre_jer) selected @endif>
                                  {{ $jerarquia->nombre_jer }}
                              </option>
                          @endforeach
                      </x-adminlte-select2>
                  </div>


              </div> 

                  <hr class="my-4 mx-n4" />
                  <h4 class="fw-normal">10. Carga de movimientos y resolucion final del instructor de la Direccion General de Recursos Humanos</h4>
              <div class="row g-3">

                      <div class="col-md-6">
                          <label class="form-label" for="multicol-reg_interno_DGRRHH">Registro Interno</label>
                          <input type="text" name="reg_interno_DGRRHH" value="{{ $sumario-> reg_interno_DGRRHH}}" id="multicol-reg_interno_DGRRHH" class="form-control" placeholder="Registro interno" />
                      </div>
                    
                      <div class="col-md-6">
                        <label class="form-label" for="multicol-fecha_mov_proceDGRRHH"> Fecha de Procedencia</label>
                        <input type="date" name="fecha_mov_proceDGRRHH" value="{{ $sumario-> fecha_mov_proceDGRRHH}}" id="multicol-fecha_mov_proceDGRRHH" class="form-control" placeholder="Fecha de pase del expediente " />
                      </div>

                      <div class="col-md-6">
                          <label class="form-label" for="multicol-destin_proceden_DGRRHH">Lugar de Procedencia</label>
                          <x-adminlte-select2 name="destin_proceden_DGRRHH" class="select2 form-select">
                              <option value="">Seleccionar la dependencia</option>
                              @foreach($dependencias as $dependencia)
                                  <option value="{{ $dependencia->nombre_dep }}" {{ $sumario->destin_proceden_DGRRHH == $dependencia->nombre_dep ? 'selected' : '' }}>
                                      {{ $dependencia->nombre_dep }}
                                  </option>
                              @endforeach
                          </x-adminlte-select2>
                      </div>

                     
                      <div class="col-md-6">
                          <label class="form-label" for="multicol-resol_final_DGRRHH">Resolucion Final</label>
                          <textarea name="resol_final_DGRRHH" id="multicol-resol_final_DGRRHH" class="form-control">{{ $sumario->resol_final_DGRRHH }}</textarea>
                      </div>

                      <div class="col-md-6">
                        <label class="form-label" for="multicol-obs_proced_DGRRHH">Observaciones de Procedencia</label>
                        <input type="text" name="obs_proced_DGRRHH"  value="{{ $sumario-> obs_proced_DGRRHH}}" id="multicol-obs_proced_DGRRHH" class="form-control" placeholder="Escribir observaciones de la procedencia" />
                      </div>
                    
                      <div class="col-md-6">
                        <label class="form-label" for="multicol-fecha_mov_paseDGRRHH"> Fecha de Pase</label>
                        <input type="date" name="fecha_mov_paseDGRRHH" value="{{ $sumario-> fecha_mov_paseDGRRHH}}" id="multicol-fecha_mov_paseDGRRHH" class="form-control" placeholder="Fecha de pase del expediente " />
                      </div>

                      <div class="col-md-6">
                          <label class="form-label" for="multicol-destin_pase_DGRRHH">Lugar de Pase</label>
                          <x-adminlte-select2 name="destin_pase_DGRRHH" class="select2 form-select">
                              <option value="">Seleccionar la dependencia</option>
                              @foreach($dependencias as $dependencia)
                                  <option value="{{ $dependencia->nombre_dep }}" {{ $sumario->destin_pase_DGRRHH == $dependencia->nombre_dep ? 'selected' : '' }}>
                                      {{ $dependencia->nombre_dep }}
                                  </option>
                              @endforeach
                          </x-adminlte-select2>
                      </div>

                      <div class="col-md-6">
                        <label class="form-label" for="multicol-obs_pase_DGRRHH">Observaciones del Pase</label>
                        <input type="text" name="obs_pase_DGRRHH" value="{{ $sumario-> obs_pase_DGRRHH}}" id="multicol-obs_pase_DGRRHH" class="form-control" placeholder="Escribir observaciones para el pase" />
                      </div>

                      <div class="col-md-6">
                        <label class="form-label" for="multicol-concluido_DGRRHH">Concluido</label>
                        <x-adminlte-select2  name="concluido_DGRRHH" value="{{ $sumario-> concluido_DGRRHH}}" class="select2 form-select">
                          <option value="">Seleccione</option>
                          <option value="Si" @if ($sumario->concluido_DGRRHH == 'Si') selected @endif 'Si'>Si</option>
                          <option value="No" @if ($sumario->concluido_DGRRHH == 'No') selected @endif 'No'>No</option>
                        </x-adminlte-select2>
                      </div>

                      <div class="col-md-6">
                        <label class="form-label" for="multicol-DGRRHH_N°">DGRRHH N°</label>
                        <input type="text" name="DGRRHH_N°" id="multicol-DGRRHH_N°" value="{{ $sumario-> DGRRHH_N°}}" class="form-control" placeholder="Escribir N° de resolucion" />
                      </div>

                      <div class="col-md-6">
                        <label class="form-label" for="multicol-fecha_notificacion"> Fecha de Notificacion</label>
                        <input type="date" name="fecha_notificacion" id="multicol-fecha_notificacion" value="{{ $sumario-> fecha_notificacion}}" class="form-control" placeholder="Fecha de notificacion de la resolucion" />
                      </div>
                      
              </div>
              @endcan
    
                  <div class="pt-4">
                      <button type="submit" class="btn btn-primary me-sm-3 me-1">Guardar</button>
                      <button type="button" class="btn btn-secondary" onClick="location.href='/sumarios'">Cancelar</button>
                  </div>
      </form>

  </div>
@endsection

@section('scripts')
<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

<script>
  

  $(document).ready(function() {
        // Inicializar select2 con etiquetas dentro del campo y sin tildes
        $('#nombre_mot').select2({
            tags: true,                    // Permite agregar etiquetas personalizadas
            tokenSeparators: [','],        // Los tokens se separan por coma
            placeholder: "Seleccionar motivos", // Texto de ejemplo
            allowClear: true,              // Permite limpiar las selecciones
            closeOnSelect: false,          // Evita que el select2 se cierre al seleccionar
            dropdownAutoWidth: true,       // Ajusta el ancho del dropdown al contenido
            width: '100%'                  // Asegura que el select2 ocupe todo el ancho disponible
        });
    });

  $(document).ready(function() {
      // Inicializar select2 con etiquetas dentro del campo y sin tildes
      $('#apellido_nombre_inf').select2({
          tags: true,                    // Permite agregar etiquetas personalizadas
          tokenSeparators: [','],        // Los tokens se separan por coma
          placeholder: "Seleccionar Infractores", // Texto de ejemplo
          allowClear: true,              // Permite limpiar las selecciones
          closeOnSelect: false,          // Evita que el select2 se cierre al seleccionar
          dropdownAutoWidth: true,       // Ajusta el ancho del dropdown al contenido
          width: '100%'                  // Asegura que el select2 ocupe todo el ancho disponible
      });
  });  
</script>

@endsection
