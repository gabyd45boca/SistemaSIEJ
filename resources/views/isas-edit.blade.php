@extends('adminlte::page')

@section('title', 'SIEJ')

@section('content_header')
<style>
        .hidden-view {
            display: none;
        }
</style>
    <h1 class="m-0 text-dark">Editar Isa</h1>
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
      <form method= "POST" action="{{ route ('isas.update')}}" class="card-body">
              @csrf
             
              <div class="hidden-view">
              <x-adminlte-input type="hidden" name="isa_id"   value="{{$isa->id}}"/> 
              <x-adminlte-input type="hidden" name="num_dja"   value="{{$isa->num_dja}}"/>
              <x-adminlte-input type="hidden" name="lugar_proced"    value="{{$isa->lugar_proced}}"/>  
              <x-adminlte-input type="hidden" name="fecha_ingreso"    value="{{$isa->fecha_ingreso}}"/> 
              <x-adminlte-input type="hidden" name="num_dj"   value="{{$isa->num_dj}}"/> 
              <x-adminlte-input type="hidden" name="fecha_inicio"    value="{{$isa->fecha_inicio}}"/>
              <x-adminlte-input type="hidden" name="fojas"   value="{{$isa->fojas}}"/> 
              <x-adminlte-input type="hidden" name="deslindar_resp"    value="{{$isa->deslindar_resp}}"/> 
              <x-adminlte-input type="hidden" name="tipo_denun"  value="{{$isa->tipo_denun}}"/>
              <x-adminlte-input type="hidden" name="fecha_movimiento"  value="{{$isa->fecha_movimiento}}"/> 
              <x-adminlte-input type="hidden" name="destino_pase"  value="{{$isa->destino_pase}}"/> 
              <x-adminlte-input type="hidden" name="observaciones"  value="{{$isa->observaciones}}"/> 
              <x-adminlte-input type="hidden" name="elevado_por_instruccion"  value="{{$isa->elevado_por_instruccion}}"/>
              <x-adminlte-input type="hidden" name="opinion_sede_inst"   value="{{$isa->opinion_sede_inst}}"/>
              <x-adminlte-input type="hidden" name="conversion_convalid"   value="{{$isa->conversion_convalid}}"/>
              
              <x-adminlte-input type="hidden" name="apellido_nombre_DAI"   value="{{$isa->apellido_nombre_DAI}}"/> 
              <x-adminlte-input type="hidden" name="leg_pers_DAI"    value="{{$isa->leg_pers_DAI}}"/> 
              <x-adminlte-input type="hidden" name="dependen_DAI"   value="{{$isa->dependen_DAI}}"/> 
              <x-adminlte-input type="hidden" name="jerarquia_DAI"    value="{{$isa->jerarquia_DAI}}"/>
              <x-adminlte-input type="hidden" name="reg_interno_DAI"   value="{{$isa->reg_interno_DAI}}"/> 
              <x-adminlte-input type="hidden" name="fecha_mov_proceDAI"    value="{{$isa->fecha_mov_proceDAI}}"/> 
              <x-adminlte-input type="hidden" name="destin_proceden_DAI"  value="{{$isa->destin_proceden_DAI}}"/> 
              <x-adminlte-input type="hidden" name="obs_proced_DAI"  value="{{$isa->obs_proced_DAI}}"/>
              <x-adminlte-input type="hidden" name="sugerencia_DAI"  value="{{$isa->sugerencia_DAI}}"/>
              <x-adminlte-input type="hidden" name="fecha_elev_inst_DAI"  value="{{$isa->fecha_elev_inst_DAI}}"/> 
              <x-adminlte-input type="hidden" name="fecha_mov_paseDAI"  value="{{$isa->fecha_mov_paseDAI}}"/> 
              <x-adminlte-input type="hidden" name="destin_pase_DAI"  value="{{$isa->destin_pase_DAI}}"/> 
              <x-adminlte-input type="hidden" name="obs_pase_DAI"  value="{{$isa->obs_pase_DAI}}"/>
              <x-adminlte-input type="hidden" name="concluido_DAI"  value="{{$isa->concluido_DAI}}"/>

              <x-adminlte-input type="hidden" name="apellido_nombre_DGAJ"  value="{{$isa->apellido_nombre_DGAJ}}"/>
              <x-adminlte-input type="hidden" name="leg_pers_DGAJ"   value="{{$isa->leg_pers_DGAJ}}"/> 
              <x-adminlte-input type="hidden" name="dependen_DGAJ"    value="{{$isa->dependen_DGAJ}}"/> 
              <x-adminlte-input type="hidden" name="jerarquia_DGAJ"   value="{{$isa->jerarquia_DGAJ}}"/> 
              <x-adminlte-input type="hidden" name="fecha_mov_proceDGAJ"   value="{{$isa->fecha_mov_proceDGAJ}}"/> 
              <x-adminlte-input type="hidden" name="destin_proced_DGAJ"    value="{{$isa->destin_proced_DGAJ}}"/> 
              <x-adminlte-input type="hidden" name="sugerencia_DGAJ"  value="{{$isa->sugerencia_DGAJ}}"/>
              <x-adminlte-input type="hidden" name="obs_proced_DGAJ"  value="{{$isa->obs_proced_DGAJ}}"/>
              <x-adminlte-input type="hidden" name="fecha_mov_destDGAJ"  value="{{$isa->fecha_mov_destDGAJ}}"/>
              <x-adminlte-input type="hidden" name="destin_pase_DGAJ"  value="{{$isa->destin_pase_DGAJ}}"/> 
              <x-adminlte-input type="hidden" name="obs_pase_DGAJ"  value="{{$isa->obs_pase_DGAJ}}"/> 
              <x-adminlte-input type="hidden" name="concluido_DGAJ"  value="{{$isa->concluido_DGAJ}}"/>

              <x-adminlte-input type="hidden" name="apellido_nombre_AL"  value="{{$isa->apellido_nombre_AL}}"/>
              <x-adminlte-input type="hidden" name="leg_pers_AL"   value="{{$isa->leg_pers_AL}}"/> 
              <x-adminlte-input type="hidden" name="dependen_AL"    value="{{$isa->dependen_AL}}"/> 
              <x-adminlte-input type="hidden" name="jerarquia_AL"   value="{{$isa->jerarquia_AL}}"/> 
              <x-adminlte-input type="hidden" name="reg_interno_AL"    value="{{$isa->reg_interno_AL}}"/>
              <x-adminlte-input type="hidden" name="fecha_mov_procAL"   value="{{$isa->fecha_mov_procAL}}"/> 
              <x-adminlte-input type="hidden" name="destin_proceden_AL"    value="{{$isa->destin_proceden_AL}}"/> 
              <x-adminlte-input type="hidden" name="sugerencia_AL"  value="{{$isa->sugerencia_AL}}"/>
              <x-adminlte-input type="hidden" name="obs_proced_AL"  value="{{$isa->obs_proced_AL}}"/>
              <x-adminlte-input type="hidden" name="fecha_mov_paseAL"  value="{{$isa->fecha_mov_paseAL}}"/>
              <x-adminlte-input type="hidden" name="destin_pase_AL"  value="{{$isa->destin_pase_AL}}"/> 
              <x-adminlte-input type="hidden" name="obs_pase_AL"  value="{{$isa->obs_pase_AL}}"/> 
              <x-adminlte-input type="hidden" name="concluido_AL"  value="{{$isa->concluido_AL}}"/>
              <x-adminlte-input type="hidden" name="apellido_nombre_DGRRHH"  value="{{$isa->apellido_nombre_DGRRHH}}"/>
              <x-adminlte-input type="hidden" name="leg_pers_DGRRHH"   value="{{$isa->leg_pers_DGRRHH}}"/> 
              <x-adminlte-input type="hidden" name="dependen_DGRRHH"    value="{{$isa->dependen_DGRRHH}}"/> 
              <x-adminlte-input type="hidden" name="jerarquia_DGRRHH"   value="{{$isa->jerarquia_DGRRHH}}"/> 
              <x-adminlte-input type="hidden" name="reg_interno_DGRRHH"    value="{{$isa->reg_interno_DGRRHH}}"/>
              <x-adminlte-input type="hidden" name="fecha_mov_proceDGRRHH"   value="{{$isa->fecha_mov_proceDGRRHH}}"/> 
              <x-adminlte-input type="hidden" name="destin_proceden_DGRRHH"    value="{{$isa->destin_proceden_DGRRHH}}"/>
              <x-adminlte-input type="hidden" name="resol_final_DGRRHH"  value="{{$isa->resol_final_DGRRHH}}"/>
              <x-adminlte-input type="hidden" name="obs_proced_DGRRHH"  value="{{$isa->obs_proced_DGRRHH}}"/>
              <x-adminlte-input type="hidden" name="fecha_mov_paseDGRRHH"  value="{{$isa->fecha_mov_paseDGRRHH}}"/>
              <x-adminlte-input type="hidden" name="destin_pase_DGRRHH"  value="{{$isa->destin_pase_DGRRHH}}"/> 
              <x-adminlte-input type="hidden" name="obs_pase_DGRRHH"  value="{{$isa->obs_pase_DGRRHH}}"/>
              <x-adminlte-input type="hidden" name="concluido_DGRRHH"  value="{{$isa->concluido_DGRRHH}}"/>
              <x-adminlte-input type="hidden" name="DGRRHH_N°"  value="{{$isa->DGRRHH_N°}}"/>
              <x-adminlte-input type="hidden" name="fecha_notificacion"  value="{{$isa->fecha_notificacion}}"/>


              </div>
            <div class="table-responsive text-nowrap">
              <table id="isas" class="table table-stripted shadow-lg mt-4" with-buttons>
              <thead class="bg-dark text-white">
              <tr>
                <th>ID</th>
                <th>N° DJA</th>
                <th>N° DJ</th>
                <th>MOTIVO</th>
                <th>LEGAJO PERSONAL</th>
                <th>APELLIDO INFRACTOR</th>
                <th>NOMBRE INFRACTOR</th>
                <th>TIPO DENUNCIA</th>
                <th>CONVERSION CONVALIDAR</th>
                <th>FECHA INGRESO</th>
                     
              </tr>
              </thead>

              <tbody class="table-border-bottom-0">
              <tr>
              <td>{{$isa->id}}</td>   
                    <td>{{$isa->num_dja}} </td>   
                    <td>{{$isa->num_dj}}</td>
                                <td>
                                    @foreach ($isa->motivos as $motivo)
                                    {{$motivo->nombre_mot}} <br>
                                    @endforeach
                                </td>   
                                <td>
                                    @foreach ($isa->infractors as $infractor)
                                    {{$infractor->leg_pers_inf }} <br>
                                    @endforeach
                                </td>
                   
                                <td>
                                    @foreach ($isa->infractors as $infractor)
                                    {{$infractor->apellido_inf}} <br>
                                    @endforeach
                                </td>
                                
                                <td>
                                    @foreach ($isa->infractors as $infractor)
                                    {{$infractor->nombre_inf}} <br>
                                    @endforeach
                                </td>   
                    <td>{{$isa->conversion_convalid}}</td>   
                    <td>{{$isa->fecha_ingreso}}</td>  
                    <td>{{$isa->elevado_por_instruccion}}</td>
              </tr>
              </tbody>
              </table>
            </div>  
              <br>
              <br>                  
                  @can('EditarIsaDGAJ')
                

                  <h4 class="fw-normal">1. Carga de datos del expediente</h4>
                  <div class="row g-3">

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-username">N° DJA</label>
                      <input type="text" name= "num_dja" value="{{ $isa-> num_dja }}" id="multicol-num_dja" class="form-control" placeholder="Numero de DJA " required/>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label" for="multicol-lugar_proced">Lugar de Procedencia</label>
                        <x-adminlte-select2 name="lugar_proced" class="select2 form-select" required>
                            <option value="">Seleccionar la dependencia</option>
                            @foreach($dependencias as $dependencia)
                                <option value="{{ $dependencia->nombre_dep }}" {{ $isa->lugar_proced == $dependencia->nombre_dep ? 'selected' : '' }}>
                                    {{ $dependencia->nombre_dep }}
                                </option>
                            @endforeach
                        </x-adminlte-select2>
                    </div>
                    

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-username"> Fecha Ingreso</label>
                      <input type="date" name="fecha_ingreso" value="{{ $isa-> fecha_ingreso }}" id="multicol-fecha_ingreso" class="form-control" placeholder="Fecha de ingreso " required/>
                    </div>

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-username"> N° DJ</label>
                      <input type="text" name="num_dj" value="{{ $isa-> num_dj }}" id="multicol-num_dj" class="form-control" placeholder="Numero de DJ" required/>
                    </div>

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-username"> Fecha Inicio de Actuaciones</label>
                      <input type="date" name="fecha_inicio" value="{{ $isa-> fecha_inicio }}" id="multicol-fecha_inicio" class="form-control" placeholder="Fecha de inicio de actuaciones " required/>
                    </div>

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-username">Fojas</label>
                      <input type="text" name="fojas" value="{{ $isa-> fojas }}" id="multicol-fojas" class="form-control" placeholder="Cantidad de fojas" required/>
                    </div>

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-deslindar_resp">Deslindar responsabilidad</label>
                      <input type="text" name="deslindar_resp" value="{{ $isa-> deslindar_resp }}" id="multicol-deslindar_resp" class="form-control" placeholder="Deslindar responsabilidad" required/>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label" for="multicol-nombre_mot">Motivo</label>
                        <x-adminlte-select2 name="nombre_mot[]" id="nombre_mot" class="form-control" title="Seleccionar motivos" multiple required data-placeholder="Seleccionar motivos" data-allow-clear="true">
                            @foreach ($motivos as $motivo)
                                <option value="{{$motivo->id}}" 
                                    {{ in_array($motivo->id, old('nombre_mot', $isa->motivos->pluck('id')->toArray())) ? 'selected' : '' }}>
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
                        <label class="form-label" for="multicol-tipo_denun">Tipo de Denuncia</label>
                        <x-adminlte-select2 name="tipo_denun" required>
                            <option value="">Seleccionar el tipo</option>
                            @foreach($tipo_denuncias as $tipo_denuncia)
                                <option value="{{ $tipo_denuncia->nombre_tipoDen }}" {{ $isa->tipo_denun == $tipo_denuncia->nombre_tipoDen ? 'selected' : '' }}>
                                    {{ $tipo_denuncia->nombre_tipoDen}}
                                </option>
                            @endforeach
                        </x-adminlte-select2>
                    </div>
                  
                    <div class="col-md-6">
                      <label class="form-label" for="multicol-fecha_movimiento"> Fecha de Pase</label>
                      <input type="date" name="fecha_movimiento" value="{{ $isa-> fecha_movimiento }}" id="multicol-fecha_movimiento" class="form-control" placeholder="Fecha de pase del expediente " required />
                    </div>
                    
                    <div class="col-md-6">
                        <label class="form-label" for="multicol-destino_pase">Lugar de Pase</label>
                        <x-adminlte-select2 name="destino_pase" required>
                            <option value="">Seleccionar la dependencia</option>
                            @foreach($dependencias as $dependencia)
                                <option value="{{ $dependencia->nombre_dep }}" {{$isa->destino_pase == $dependencia->nombre_dep ? 'selected' : '' }}>
                                    {{ $dependencia->nombre_dep }}
                                </option>
                            @endforeach
                        </x-adminlte-select2>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label" for="multicol-observaciones">Observaciones del expediente</label>
                        <input type="text" name="observaciones" value="{{ $isa->observaciones}}" id="multicol-observaciones" class="form-control" placeholder="Escribir observaciones para el pase" />
                    </div>

                    <div class="col-md-6">
                    <label class="form-label" for="multicol-elevado_por_instruccion">Elevado por instruccion</label>
                      <x-adminlte-select2  name="elevado_por_instruccion" value="{{ $isa-> elevado_por_instruccion }}" class="select2 form-select" >
                        <option value="">Seleccione</option>
                        <option value="Si" @if ($isa->elevado_por_instruccion == 'Si') selected @endif 'Si'>Si</option>
                        <option value="No" @if ($isa->elevado_por_instruccion == 'No') selected @endif 'No'>No</option>
                      </x-adminlte-select2>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label" for="multicol-opinion_sede_inst">Opinion Sede Inst</label>
                        <textarea name="opinion_sede_inst" id="multicol-opinion_sede_inst" class="form-control">{{ $isa->opinion_sede_inst }}</textarea>
                    </div>
                

                    <div class="col-md-6">
                    <label class="form-label" for="multicol-conversion_convalid">Conversion y convalidacion</label>
                      <x-adminlte-select2  name="conversion_convalid" value="{{ $isa-> conversion_convalid }}" class="select2 form-select" >
                        <option value="">Seleccione</option>
                        <option value="Si" @if ($isa->conversion_convalid == 'Si') selected @endif 'Si'>Si</option>
                        <option value="No" @if ($isa->conversion_convalid == 'No') selected @endif 'No'>No</option>
                      </x-adminlte-select2>
                    </div>

                              
                  </div>
                              
                  <hr class="my-4 mx-n4" />
                  <h4 class="fw-normal">2. Carga de datos del personal infractor</h4>
                  <div class="row g-3">
                    
                    <div class="col-md-12">
                        <label class="form-label" for="multicol-apellido_nombre_inf">Apellido y Nombres</label>
                        <x-adminlte-select2 name="apellido_nombre_inf[]" id="apellido_nombre_inf" class="form-control" title="Seleccionar Infractores" multiple required data-tags="true" data-token-separators="[',']" data-allow-clear="true" data-placeholder="Seleccionar Infractores">
                            @foreach ($infractores as $infractor)
                                <option value="{{$infractor->id}}" 
                                    {{ in_array($infractor->id, old('apellido_nombre_inf', $isa->infractors->pluck('id')->toArray())) ? 'selected' : '' }}>
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

                  @can('EditarIsaDGAI')
                  
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
                      <input type="text" name="apellido_nombre_DAI" value="{{ $isa-> apellido_nombre_DAI }}" id="multicol-apellido_nombre_DAI" class="form-control" placeholder="Escribir el apellido y nombre"/>
                    </div>

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-leg_pers_DAI">Legajo Personal</label>
                      <input type="text" name= "leg_pers_DAI" value="{{ $isa-> leg_pers_DAI }}" id="multicol-leg_pers_DAI" class="form-control" placeholder="Escribir el legajo personal" />
                    </div>

                    <div class="col-md-6">
                        <label class="form-label" for="multicol-dependen_DAI">Dependencia</label>
                        <x-adminlte-select2 name="dependen_DAI">
                            <option value="">Seleccionar la dependencia</option>
                            @foreach($dependencias as $dependencia)
                                <option value="{{ $dependencia->nombre_dep }}" {{ $isa->dependen_DAI == $dependencia->nombre_dep ? 'selected' : '' }}>
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
                                <option value="{{ $jerarquia->nombre_jer }}" @if ($isa->jerarquia_DAI == $jerarquia->nombre_jer) selected @endif>
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
                      <input type="text" name="reg_interno_DAI" value="{{ $isa-> reg_interno_DAI }}" id="multicol-reg_interno_DAI" class="form-control" placeholder="Registro interno" />
                    </div>

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-fecha_mov_proceDAI"> Fecha de Procedencia</label>
                      <input type="date" name="fecha_mov_proceDAI" value="{{ $isa-> fecha_mov_proceDAI }}" id="multicol-fecha_mov_proceDAI" class="form-control" placeholder="Fecha de pase del expediente " />
                    </div>

                    <div class="col-md-6">
                        <label class="form-label" for="multicol-destin_proceden_DAI">Lugar de Procedencia</label>
                        <x-adminlte-select2 name="destin_proceden_DAI">
                            <option value="">Seleccionar la dependencia</option>
                            @foreach($dependencias as $dependencia)
                                <option value="{{ $dependencia->nombre_dep }}" {{ $isa->destin_proceden_DAI == $dependencia->nombre_dep ? 'selected' : '' }}>
                                    {{ $dependencia->nombre_dep }}
                                </option>
                            @endforeach
                        </x-adminlte-select2>
                    </div>


                    <div class="col-md-6">
                      <label class="form-label" for="multicol-obs_proced_DAI">Observaciones de la procedencia</label>
                      <input type="text" name="obs_proced_DAI" value="{{ $isa-> obs_proced_DAI }}" id="multicol-obs_proced_DAI" class="form-control" placeholder="Observaciones" />
                    </div>
                  
                    
                    <div class="col-md-6">
                        <label class="form-label" for="multicol-sugerencia_DAI">Sugerencia DAI</label>
                        <textarea name="sugerencia_DAI" id="multicol-sugerencia_DAI" class="form-control">{{ $isa->sugerencia_DAI }}</textarea>
                    </div>

                    <div class="col-md-6">
                    <label class="form-label" for="multicol-fecha_elev_inst_DAI"> Fecha de Elevado por Instruccion</label>
                      <input type="date" name="fecha_elev_inst_DAI" value="{{ $isa-> fecha_elev_inst_DAI }}" id="multicol-fecha_elev_inst_DAI" class="form-control" placeholder="Fecha elevado por insruccion " />
                    </div>

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-fecha_mov_paseDAI"> Fecha de Pase</label>
                      <input type="date" name="fecha_mov_paseDAI" value="{{ $isa-> fecha_mov_paseDAI }}" id="multicol-fecha_mov_paseDAI" class="form-control" placeholder="Fecha de pase del expediente " />
                    </div>

                    <div class="col-md-6">
                        <label class="form-label" for="multicol-destin_pase_DAI">Lugar de Pase</label>
                        <x-adminlte-select2 name="destin_pase_DAI">
                            <option value="">Seleccionar la dependencia</option>
                            @foreach($dependencias as $dependencia)
                                <option value="{{ $dependencia->nombre_dep }}" {{ $isa->destin_pase_DAI == $dependencia->nombre_dep ? 'selected' : '' }}>
                                    {{ $dependencia->nombre_dep }}
                                </option>
                            @endforeach
                        </x-adminlte-select2>
                    </div>


                    <div class="col-md-6">
                      <label class="form-label" for="multicol-obs_pase_DAI">Observaciones del Pase</label>
                      <input type="text" name="obs_pase_DAI" value="{{ $isa-> obs_pase_DAI }}" id="multicol-obs_pase_DAI" class="form-control" placeholder="Observaciones" />
                    </div>
                    

                    <div class="col-md-6">
                    <label class="form-label" for="multicol-concluido_DAI">Concluido por Instruccion</label>
                      <x-adminlte-select2  name="concluido_DAI" value="{{ $isa-> concluido_DAI }}" class="select2 form-select" >
                        <option value="">Seleccione</option>
                        <option value="Si" @if ($isa->concluido_DAI == 'Si') selected @endif 'Si'>Si</option>
                        <option value="No" @if ($isa->concluido_DAI == 'No') selected @endif 'No'>No</option>
                      </x-adminlte-select2>
                    </div>
              </div>
              @endcan

  
              @can('EditarIsaDGAJ')  
                  <hr class="my-4 mx-n4" />
                  <h4 class="fw-normal">5. Carga de datos del personal instructor de la Direccion General de Asuntos Judiciales</h4>
              <div class="row g-3">

                        <div class="col-md-6">
                          <label class="form-label" for="multicol-apellido_nombre_DGAJ">Apellido y Nombre</label>
                          <input type="text" name="apellido_nombre_DGAJ" value="{{ $isa-> apellido_nombre_DGAJ }}" id="multicol-apellido_nombre_DGAJ" class="form-control" placeholder="Escribir el apellido y nombre"/>
                        </div>

                        <div class="col-md-6">
                          <label class="form-label" for="multicol-leg_pers_DGAJ">Legajo Personal</label>
                          <input type="text" name="leg_pers_DGAJ" value="{{ $isa-> leg_pers_DGAJ }}" id="multicol-leg_pers_DGAJ" class="form-control" placeholder="Escribir el legajo personal" />
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="multicol-dependen_DGAJ">Dependencia</label>
                            <x-adminlte-select2 name="dependen_DGAJ">
                                <option value="">Seleccionar la dependencia</option>
                                @foreach($dependencias as $dependencia)
                                    <option value="{{ $dependencia->nombre_dep }}" {{ $isa->dependen_DGAJ == $dependencia->nombre_dep ? 'selected' : '' }}>
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
                                  <option value="{{ $jerarquia->nombre_jer }}" @if ($isa->jerarquia_DGAJ == $jerarquia->nombre_jer) selected @endif>
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
                          <input type="date" name="fecha_mov_proceDGAJ" value="{{ $isa-> fecha_mov_proceDGAJ }}" id="multicol-fecha_mov_proceDGAJ" class="form-control" placeholder="Fecha de pase del expediente " />
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="multicol-destin_proced_DGAJ">Lugar de Procedencia</label>
                            <x-adminlte-select2 name="destin_proced_DGAJ" class="select2 form-select">
                                <option value="">Seleccionar la dependencia</option>
                                @foreach($dependencias as $dependencia)
                                    <option value="{{ $dependencia->nombre_dep }}" {{ $isa->destin_proced_DGAJ == $dependencia->nombre_dep ? 'selected' : '' }}>
                                        {{ $dependencia->nombre_dep }}
                                    </option>
                                @endforeach
                            </x-adminlte-select2>
                        </div>
                     

                        <div class="col-md-6">
                            <label class="form-label" for="multicol-sugerencia_DGAJ">Sugerencia DGAJ</label>
                            <textarea name="sugerencia_DGAJ" id="multicol-sugerencia_DGAJ" class="form-control">{{ $isa->sugerencia_DGAJ }}</textarea>
                        </div>

                        <div class="col-md-6">
                          <label class="form-label" for="multicol-obs_proced_DGAJ">Observaciones de Procedencia</label>
                          <input type="text" name="obs_proced_DGAJ" value="{{ $isa-> obs_proced_DGAJ }}" id="multicol-obs_proced_DGAJ" class="form-control" placeholder="Escribir observaciones de la procedencia" />
                        </div>
                        
                        <div class="col-md-6">
                          <label class="form-label" for="multicol-fecha_mov_destDGAJ"> Fecha de Pase</label>
                          <input type="date" name="fecha_mov_destDGAJ" value="{{ $isa-> fecha_mov_destDGAJ }}" id="multicol-fecha_mov_destDGAJ" class="form-control" placeholder="Fecha de pase del expediente " />
                        </div>


                      <div class="col-md-6">
                          <label class="form-label" for="multicol-destin_pase_DGAJ">Lugar de Pase</label>
                          <x-adminlte-select2 name="destin_pase_DGAJ" class="select2 form-select">
                              <option value="">Seleccionar la dependencia</option>
                              @foreach($dependencias as $dependencia)
                                  <option value="{{ $dependencia->nombre_dep }}" {{ $isa->destin_pase_DGAJ == $dependencia->nombre_dep ? 'selected' : '' }}>
                                      {{ $dependencia->nombre_dep }}
                                  </option>
                              @endforeach
                          </x-adminlte-select2>
                      </div>
                     

                        <div class="col-md-6">
                          <label class="form-label" for="multicol-obs_pase_DGAJ">Observaciones del Pase</label>
                          <input type="text" name="obs_pase_DGAJ" value="{{ $isa-> obs_pase_DGAJ }}" id="multicol-obs_pase_DGAJ" class="form-control" placeholder="Escribir observaciones para el pase" />
                        </div>

                        <div class="col-md-6">
                          <label class="form-label" for="multicol-concluido_DGAJ">Concluido</label>
                          <x-adminlte-select2 name="concluido_DGAJ" value="{{ $isa-> concluido_DGAJ }}" class="select2 form-select" >
                            <option value="">Seleccione</option>
                            <option value="Si" @if ($isa->concluido_DGAJ == 'Si') selected @endif 'Si'>Si</option>
                            <option value="No" @if ($isa->concluido_DGAJ == 'No') selected @endif 'No'>No</option>
                          </x-adminlte-select2>
                        </div>
                    
              </div>
              @endcan

              @can('EditarIsaDGAL')
              
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
                          <input type="text" name="apellido_nombre_AL" value="{{ $isa-> apellido_nombre_AL }}" id="multicol-apellido_nombre_AL" class="form-control" placeholder="Escribir el apellido y nombre"/>
                        </div>

                        <div class="col-md-6">
                          <label class="form-label" for="multicol-leg_pers_AL">Legajo Personal</label>
                          <input type="text" name="leg_pers_AL" value="{{ $isa-> leg_pers_AL }}" id="multicol-leg_pers_AL" class="form-control" placeholder="Escribir el legajo personal" />
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="multicol-dependen_AL">Dependencia</label>
                            <x-adminlte-select2 name="dependen_AL" class="select2 form-select">
                                <option value="">Seleccionar la dependencia</option>
                                @foreach($dependencias as $dependencia)
                                    <option value="{{ $dependencia->nombre_dep }}" {{ $isa->dependen_AL == $dependencia->nombre_dep ? 'selected' : '' }}>
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
                                  <option value="{{ $jerarquia->nombre_jer }}" @if ($isa->jerarquia_AL == $jerarquia->nombre_jer) selected @endif>
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
                        <input type="text" name="reg_interno_AL" value="{{ $isa-> reg_interno_AL }}" id="multicol-reg_interno_AL" class="form-control" placeholder="Registro interno" />
                    </div>
                  
                    <div class="col-md-6">
                      <label class="form-label" for="multicol-fecha_mov_procAL"> Fecha de Procedencia</label>
                      <input type="date" name="fecha_mov_procAL" value="{{ $isa-> fecha_mov_procAL }}" id="multicol-fecha_mov_procAL" class="form-control" placeholder="Fecha de pase del expediente " />
                    </div>

                    <div class="col-md-6">
                        <label class="form-label" for="multicol-destin_proceden_AL">Lugar de Procedencia</label>
                        <x-adminlte-select2 name="destin_proceden_AL" class="select2 form-select">
                            <option value="">Seleccionar la dependencia</option>
                            @foreach($dependencias as $dependencia)
                                <option value="{{ $dependencia->nombre_dep }}" {{ $isa->destin_proceden_AL == $dependencia->nombre_dep ? 'selected' : '' }}>
                                    {{ $dependencia->nombre_dep }}
                                </option>
                            @endforeach
                        </x-adminlte-select2>
                    </div>

                   
                    <div class="col-md-6">
                        <label class="form-label" for="multicol-sugerencia_AL">Sugerencia AL</label>
                        <textarea name="sugerencia_AL" id="multicol-sugerencia_AL" class="form-control">{{ $isa->sugerencia_AL }}</textarea>
                    </div>

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-obs_proced_AL">Observaciones de Procedencia</label>
                      <input type="text" name="obs_proced_AL" value="{{ $isa-> obs_proced_AL }}" id="multicol-obs_proced_AL" class="form-control" placeholder="Escribir observaciones de la procedencia" />
                    </div>
                  
                    <div class="col-md-6">
                      <label class="form-label" for="multicol-fecha_mov_paseAL"> Fecha de Pase</label>
                      <input type="date" name="fecha_mov_paseAL" value="{{ $isa-> fecha_mov_paseAL }}" id="multicol-fecha_mov_paseAL" class="form-control" placeholder="Fecha de pase del expediente " />
                    </div>

                    <div class="col-md-6">
                        <label class="form-label" for="multicol-destin_pase_AL">Lugar de Pase</label>
                        <x-adminlte-select2 name="destin_pase_AL" class="select2 form-select">
                            <option value="">Seleccionar la dependencia</option>
                            @foreach($dependencias as $dependencia)
                                <option value="{{ $dependencia->nombre_dep }}" {{ $isa->destin_pase_AL == $dependencia->nombre_dep ? 'selected' : '' }}>
                                    {{ $dependencia->nombre_dep }}
                                </option>
                            @endforeach
                        </x-adminlte-select2>
                    </div>
                   
                    <div class="col-md-6">
                      <label class="form-label" for="multicol-obs_pase_AL">Observaciones del Pase</label>
                      <input type="text" name="obs_pase_AL" value="{{ $isa-> obs_pase_AL}}" id="multicol-obs_pase_AL" class="form-control" placeholder="Escribir observaciones para el pase" />
                    </div>

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-concluido_AL">Concluido</label>
                      <x-adminlte-select2  name="concluido_AL" value="{{ $isa-> concluido_AL }}" class="select2 form-select">
                        <option value="">Seleccione</option>
                        <option value="Si" @if ($isa->concluido_AL == 'Si') selected @endif 'Si'>Si</option>
                        <option value="No" @if ($isa->concluido_AL == 'No') selected @endif 'No'>No</option>
                      </x-adminlte-select2>
                    </div>
                    
              </div>
              @endcan

              @can('EditarIsaDGRRHH')
              
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
                        <input type="text" name="apellido_nombre_DGRRHH" value="{{ $isa-> apellido_nombre_DGRRHH}}" id="multicol-apellido_nombre_DGRRHH" class="form-control" placeholder="Escribir el apellido y nombre"/>
                      </div>

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-leg_pers_DGRRHH">Legajo Personal</label>
                      <input type="text" name="leg_pers_DGRRHH" value="{{ $isa-> leg_pers_DGRRHH}}" id="multicol-leg_pers_DGRRHH" class="form-control" placeholder="Escribir el legajo personal" />
                    </div>
                    
                    <div class="col-md-6">
                        <label class="form-label" for="multicol-dependen_DGRRHH">Dependencia</label>
                        <x-adminlte-select2 name="dependen_DGRRHH" class="select2 form-select">
                            <option value="">Seleccionar la dependencia</option>
                            @foreach($dependencias as $dependencia)
                                <option value="{{ $dependencia->nombre_dep }}" {{ $isa->dependen_DGRRHH == $dependencia->nombre_dep ? 'selected' : '' }}>
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
                              <option value="{{ $jerarquia->nombre_jer }}" @if ($isa->jerarquia_DGRRHH == $jerarquia->nombre_jer) selected @endif>
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
                          <input type="text" name="reg_interno_DGRRHH" value="{{ $isa-> reg_interno_DGRRHH}}" id="multicol-reg_interno_DGRRHH" class="form-control" placeholder="Registro interno" />
                      </div>
                    
                      <div class="col-md-6">
                        <label class="form-label" for="multicol-fecha_mov_proceDGRRHH"> Fecha de Procedencia</label>
                        <input type="date" name="fecha_mov_proceDGRRHH" value="{{ $isa-> fecha_mov_proceDGRRHH}}" id="multicol-fecha_mov_proceDGRRHH" class="form-control" placeholder="Fecha de pase del expediente " />
                      </div>

                      <div class="col-md-6">
                          <label class="form-label" for="multicol-destin_proceden_DGRRHH">Lugar de Procedencia</label>
                          <x-adminlte-select2 name="destin_proceden_DGRRHH" class="select2 form-select">
                              <option value="">Seleccionar la dependencia</option>
                              @foreach($dependencias as $dependencia)
                                  <option value="{{ $dependencia->nombre_dep }}" {{ $isa->destin_proceden_DGRRHH == $dependencia->nombre_dep ? 'selected' : '' }}>
                                      {{ $dependencia->nombre_dep }}
                                  </option>
                              @endforeach
                          </x-adminlte-select2>
                      </div>

                     
                      <div class="col-md-6">
                          <label class="form-label" for="multicol-resol_final_DGRRHH">Resolucion Final</label>
                          <textarea name="resol_final_DGRRHH" id="multicol-resol_final_DGRRHH" class="form-control">{{ $isa->resol_final_DGRRHH }}</textarea>
                      </div>

                      <div class="col-md-6">
                        <label class="form-label" for="multicol-obs_proced_DGRRHH">Observaciones de Procedencia</label>
                        <input type="text" name="obs_proced_DGRRHH"  value="{{ $isa-> obs_proced_DGRRHH}}" id="multicol-obs_proced_DGRRHH" class="form-control" placeholder="Escribir observaciones de la procedencia" />
                      </div>
                    
                      <div class="col-md-6">
                        <label class="form-label" for="multicol-fecha_mov_paseDGRRHH"> Fecha de Pase</label>
                        <input type="date" name="fecha_mov_paseDGRRHH" value="{{ $isa-> fecha_mov_paseDGRRHH}}" id="multicol-fecha_mov_paseDGRRHH" class="form-control" placeholder="Fecha de pase del expediente " />
                      </div>

                      <div class="col-md-6">
                        <label class="form-label" for="multicol-destin_pase_DGRRHH">Lugar de Pase</label>
                        <x-adminlte-select2 name="destin_pase_DGRRHH" class="select2 form-select">
                            <option value="">Seleccionar la dependencia</option>
                            @foreach($dependencias as $dependencia)
                                <option value="{{ $dependencia->nombre_dep }}" {{ $isa->destin_pase_DGRRHH == $dependencia->nombre_dep ? 'selected' : '' }}>
                                    {{ $dependencia->nombre_dep }}
                                </option>
                            @endforeach
                        </x-adminlte-select2>
                      </div>
                     
                      <div class="col-md-6">
                        <label class="form-label" for="multicol-obs_pase_DGRRHH">Observaciones de Pase</label>
                        <input type="text" name="obs_pase_DGRRHH" value="{{ $isa-> obs_pase_DGRRHH}}" id="multicol-obs_pase_DGRRHH" class="form-control" placeholder="Escribir observaciones para el pase" />
                      </div>

                      <div class="col-md-6">
                        <label class="form-label" for="multicol-concluido_DGRRHH">Concluido</label>
                        <x-adminlte-select2  name="concluido_DGRRHH" value="{{ $isa-> concluido_DGRRHH}}" class="select2 form-select">
                          <option value="">Seleccione</option>
                          <option value="Si" @if ($isa->concluido_DGRRHH == 'Si') selected @endif 'Si'>Si</option>
                          <option value="No" @if ($isa->concluido_DGRRHH == 'No') selected @endif 'No'>No</option>
                        </x-adminlte-select2>
                      </div>

                      <div class="col-md-6">
                        <label class="form-label" for="multicol-DGRRHH_N°">DGRRHH N°</label>
                        <input type="text" name="DGRRHH_N°" id="multicol-DGRRHH_N°" value="{{ $isa-> DGRRHH_N°}}" class="form-control" placeholder="Escribir N° de resolucion" />
                      </div>

                      <div class="col-md-6">
                        <label class="form-label" for="multicol-fecha_notificacion"> Fecha de Notificacion</label>
                        <input type="date" name="fecha_notificacion" id="multicol-fecha_notificacion" value="{{ $isa-> fecha_notificacion}}" class="form-control" placeholder="Fecha de notificacion de la resolucion" />
                      </div>
                      
              </div>
              @endcan
    
                  <div class="pt-4">
                      <button type="submit" class="btn btn-primary me-sm-3 me-1">Guardar</button>
                      <button type="button" class="btn btn-secondary" onClick="location.href='/isas'">Cancelar</button>
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
