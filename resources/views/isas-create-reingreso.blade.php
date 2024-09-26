@extends('adminlte::page')

@section('title', 'SIEJ')

@section('content_header')
    <h1 class="m-0 text-dark">Reingreso Isa</h1>
@endsection

@section('styles')
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
@endsection

@section('content')

@if ($errors->any())
        <div class="alert alert-danger">
            <ul>
               @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
     @endif

<div class ="row">

     <div class="col-lg-12">
     
     <div class="card mb-4">
    
  <form method="POST" action="{{ route ('isas.reingreso.store',$isa->id)}}" class="card-body">
       @csrf
       <h4 class="fw-normal">1. Carga de datos del expediente</h4>
      <div class="row g-3">

            <div class="col-md-6">
                      <label class="form-label" for="multicol-username">N° DJA ORIGINAL</label>
                      <span class="form-control" id="multicol-num_dja">{{ $isa-> num_dja}}</span>
            </div>

            <div class="col-md-6">
                <label class="form-label" for="multicol-lugar_proced">Lugar de Procedencia</label>
                <x-adminlte-select2 name="lugar_proced" class="select2 form-select" required>
                    <option value="">Seleccionar la dependencia</option>
                    @foreach($dependencias as $dependencia)
                        <option value="{{ $dependencia->nombre_dep }}" {{ old('lugar_proced') == $dependencia->nombre_dep ? 'selected' : '' }}>
                            {{ $dependencia->nombre_dep }}
                        </option>
                    @endforeach
                </x-adminlte-select2>
            </div>

            <div class="col-md-6">
            <label class="form-label" for="multicol-username"> Fecha Ingreso</label>
              <input type="date" name="fecha_ingreso" id="multicol-fecha_ingreso" class="form-control" value="{{old('fecha_ingreso')}}" placeholder="Fecha de ingreso " required/>
            </div>

            <div class="col-md-6">
              <label class="form-label" for="multicol-username"> N° DJ</label>
              <input type="text" name="num_dj" id="multicol-num_dj" class="form-control" placeholder="Numero de DJ" value="{{old('num_dj')}}" required/>
            </div>

            <div class="col-md-6">
              <label class="form-label" for="multicol-username"> Fecha Inicio de Actuaciones</label>
              <input type="date" name="fecha_inicio" id="multicol-fecha_inicio" class="form-control" placeholder="Fecha de inicio de actuaciones" value="{{old('fecha_inicio')}}" required/>
            </div>

            <div class="col-md-6">
              <label class="form-label" for="multicol-username">Fojas</label>
              <input type="text" name="fojas" id="multicol-fojas" class="form-control" value="{{old('fojas')}}" placeholder="Cantidad de fojas" required/>
            </div>

            <div class="col-md-6">
              <label class="form-label" for="multicol-deslindar_resp">Deslindar Responsabilidad</label>
              <input type="text" name="deslindar_resp" id="multicol-deslindar_resp" class="form-control" value="{{old('deslindar_resp')}}" placeholder="Deslindar responsabilidad" required/>
            </div>

            <div class="col-md-6">
              <label class="form-label" for="multicol-nombre_mot">Motivo</label>
              <x-adminlte-select name="nombre_mot[]" id="nombre_mot" class="form-control selectpicker" title="Seleccionar motivos" data-style="btn-primary" multiple required>
                  @foreach ($motivos as $motivo) 
                      <option value="{{$motivo->id}}" {{ collect(old('nombre_mot'))->contains($motivo->id) ? 'selected' : '' }}>
                          {{$motivo->nombre_mot}} 
                      </option>
                  @endforeach
              </x-adminlte-select>

              @if ($errors->has('motivo'))
                  <span class="text-danger">
                      <strong>{{$errors->first('motivo') }}</strong>
                  </span>
              @endif  
            </div>

            <div class="col-md-6">
                <label class="form-label" for="multicol-tipo_denuncia">Tipo de Denuncia</label>
                <x-adminlte-select2 name="tipo_denuncia" class="select2 form-select" required>
                    <option value="" {{ old('tipo_denuncia') == '' ? 'selected' : '' }}>Seleccionar el tipo</option>
                    @foreach($tipo_denuncias as $tipo_denuncia)
                        <option value="{{ $tipo_denuncia->nombre_tipoDen }}" {{ old('tipo_denuncia') == $tipo_denuncia->nombre_tipoDen ? 'selected' : '' }}>
                            {{ $tipo_denuncia->nombre_tipoDen }}
                        </option>
                    @endforeach
                </x-adminlte-select2>
            </div>
                     
            <div class="col-md-6">
              <label class="form-label" for="multicol-fecha_movimiento"> Fecha de Pase</label>
              <input type="date" name="fecha_movimiento" id="multicol-fecha_movimiento" class="form-control" value="{{old('fecha_movimiento')}}" placeholder="Fecha de pase del expediente " required />
            </div>
            
            <div class="col-md-6">
                <label class="form-label" for="multicol-destino_pase">Lugar de Pase</label>
                <x-adminlte-select2 name="destino_pase" required>
                    <option value="">Seleccionar la dependencia</option>
                    @foreach($dependencias as $dependencia)
                        <option value="{{ $dependencia->nombre_dep }}" {{ old('destino_pase') == $dependencia->nombre_dep ? 'selected' : '' }}>
                            {{ $dependencia->nombre_dep }}
                        </option>
                    @endforeach
                </x-adminlte-select2>
            </div>
        

            <div class="col-md-6">
              <label class="form-label" for="multicol-observaciones">Observaciones del Expediente</label>
              <input type="text" name="observaciones" id="multicol-observaciones" class="form-control" value="{{old('observaciones')}}" placeholder="Escribir observaciones para el pase" />
            </div>

            <div class="col-md-6">
                <label class="form-label" for="multicol-elevado_por_instruccion">Elevado por Instrucción</label>
                <x-adminlte-select2 name="elevado_por_instruccion" class="select2 form-select">
                    <option value="" {{ old('elevado_por_instruccion') == '' ? 'selected' : '' }}>Seleccione</option>
                    <option value="Si" {{ old('elevado_por_instruccion') == 'Si' ? 'selected' : '' }}>Si</option>
                    <option value="No" {{ old('elevado_por_instruccion') == 'No' ? 'selected' : '' }}>No</option>
                </x-adminlte-select2>
            </div>


            <div class="col-md-6">
                <label class="form-label" for="multicol-opinion_sede_inst">Opinion Sede Inst</label>
                <textarea name="opinion_sede_inst" id="multicol-opinion_sede_inst" class="form-control" placeholder="Escribir la sugerencia">{{ old('opinion_sede_inst') }}</textarea>
            </div>

            <div class="col-md-6">
                <label class="form-label" for="multicol-conversion_convalid">Conversion y Convalidacion</label>
                <x-adminlte-select2 name="conversion_convalid" class="select2 form-select">
                    <option value="" {{ old('conversion_convalid') == "" ? 'selected' : '' }}>Seleccione</option>
                    <option value="Si" {{ old('conversion_convalid') == "Si" ? 'selected' : '' }}>Si</option>
                    <option value="No" {{ old('conversion_convalid') == "No" ? 'selected' : '' }}>No</option>
                </x-adminlte-select2>
            </div>

                                
          </div>

          <hr class="my-4 mx-n4" />
          <h4 class="fw-normal">2. Carga de datos del personal infractor</h4>
          <div class="row g-3">
            
              <div class="col-md-12">
                  <label class="form-label" for="multicol-apellido_nombre_inf">Apellido y Nombres</label>
                  <x-adminlte-select name="apellido_nombre_inf[]" id="apellido_nombre_inf" class="form-control selectpicker" title="Seleccionar infractores" data-style="btn-primary" multiple required>
                      @foreach ($infractores as $infractor)
                      <option value="{{$infractor->id}}" {{ (collect(old('apellido_nombre_inf'))->contains($infractor->id)) ? 'selected' : '' }}>
                          {{$infractor->apellido_nombre_inf}} Lp: {{$infractor->leg_pers_inf }}
                      </option>
                      @endforeach
                  </x-adminlte-select>

                  @if ($errors->has('apellido_nombre_inf'))
                  <span class="text-danger">
                      <strong>{{$errors->first('apellido_nombre_inf') }}</strong>
                  </span>
                  @endif
              </div>
                     

          </div>


          <hr class="my-4 mx-n4" />
          <h4 class="fw-normal">3. Carga de datos del personal instructor de la Direccion de Asuntos Internos</h4>
          <div class="row g-3">

            <div class="col-md-6">
              <label class="form-label" for="multicol-apellido_nombre_DAI">Apellido y Nombre</label>
              <input type="text" name="apellido_nombre_DAI" id="multicol-apellido_nombre_DAI" class="form-control" value="{{old('apellido_nombre_DAI')}}" placeholder="Escribir el apellido y nombre"/>
            </div>

            <div class="col-md-6">
              <label class="form-label" for="multicol-leg_pers_DAI">Legajo Personal</label>
              <input type="text" name="leg_pers_DAI" id="multicol-leg_pers_DAI" class="form-control" value="{{old('leg_pers_DAI')}}" placeholder="Escribir el legajo personal" />
            </div>

            <div class="col-md-6">
                <label class="form-label" for="multicol-dependen_DAI">Dependencia</label>
                <x-adminlte-select2 name="dependen_DAI">
                    <option value="">Seleccionar la dependencia</option>
                    @foreach($dependencias as $dependencia)
                        <option value="{{ $dependencia->nombre_dep }}" {{ old('dependen_DAI') == $dependencia->nombre_dep ? 'selected' : '' }}>
                            {{ $dependencia->nombre_dep }}
                        </option>
                    @endforeach
                </x-adminlte-select2>
            </div>


            <div class="col-md-6 select2-primary">
                <label class="form-label" for="multicol-jerarquia_DAI">Jerarquía</label>
                <x-adminlte-select2 name="jerarquia_DAI">
                    <option value="">Seleccionar la jerarquía</option>
                    @foreach($jerarquias as $jerarquia)
                        <option value="{{ $jerarquia->nombre_jer }}" {{ old('jerarquia_DAI') == $jerarquia->nombre_jer ? 'selected' : '' }}>
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
              <input type="text" name="reg_interno_DAI" id="multicol-reg_interno_DAI" class="form-control" value="{{old('reg_interno_DAI')}}" placeholder="Registro interno" />
            </div>

            <div class="col-md-6">
              <label class="form-label" for="multicol-fecha_mov_proceDAI"> Fecha de Procedencia</label>
              <input type="date" name="fecha_mov_proceDAI" id="multicol-fecha_mov_proceDAI" class="form-control" value="{{old('fecha_mov_proceDAI')}}" placeholder="Fecha de pase del expediente " />
            </div>

            <div class="col-md-6">
                <label class="form-label" for="multicol-destin_proceden_DAI">Lugar de Procedencia</label>
                <x-adminlte-select2 name="destin_proceden_DAI" class="select2 form-select">
                    <option value="">Seleccionar la dependencia</option>
                    @foreach($dependencias as $dependencia)
                        <option value="{{ $dependencia->nombre_dep }}" {{ old('destin_proceden_DAI') == $dependencia->nombre_dep ? 'selected' : '' }}>
                            {{ $dependencia->nombre_dep }}
                        </option>
                    @endforeach
                </x-adminlte-select2>
            </div>


            <div class="col-md-6">
              <label class="form-label" for="multicol-obs_proced_DAI">Observaciones de Procedencia</label>
              <input type="text" name="obs_proced_DAI" id="multicol-obs_proced_DAI" class="form-control" value="{{old('obs_proced_DAI')}}" placeholder="Observaciones de la procedencia" />
            </div>
         
            
            <div class="col-md-6">
                <label class="form-label" for="multicol-sugerencia_DAI">Sugerencia DAI</label>
                <textarea name="sugerencia_DAI" id="multicol-sugerencia_DAI" class="form-control" placeholder="Escribir la sugerencia">{{ old('sugerencia_DAI') }}</textarea>
            </div>

            <div class="col-md-6">
            <label class="form-label" for="multicol-fecha_elev_inst_DAI"> Fecha de  Elevado por Instruccion</label>
              <input type="date" name="fecha_elev_inst_DAI" id="multicol-fecha_elev_inst_DAI" class="form-control" value="{{old('fecha_elev_inst_DAI')}}" placeholder="Fecha elevado por insruccion " />
            </div>

            <div class="col-md-6">
              <label class="form-label" for="multicol-fecha_mov_paseDAI"> Fecha de Pase</label>
              <input type="date" name="fecha_mov_paseDAI" id="multicol-fecha_mov_paseDAI" class="form-control" value="{{old('fecha_mov_paseDAI')}}" placeholder="Fecha de pase del expediente " />
            </div>

            <div class="col-md-6">
                <label class="form-label" for="multicol-destin_pase_DAI">Lugar de Pase</label>
                <x-adminlte-select2 name="destin_pase_DAI" class="select2 form-select">
                    <option value="">Seleccionar la dependencia</option>
                    @foreach($dependencias as $dependencia)
                        <option value="{{ $dependencia->nombre_dep }}" {{ old('destin_pase_DAI') == $dependencia->nombre_dep ? 'selected' : '' }}>
                            {{ $dependencia->nombre_dep }}
                        </option>
                    @endforeach
                </x-adminlte-select2>
            </div>


            <div class="col-md-6">
              <label class="form-label" for="multicol-obs_pase_DAI">Observaciones del Pase</label>
              <input type="text" name="obs_pase_DAI" id="multicol-obs_pase_DAI" class="form-control" value="{{old('obs_pase_DAI')}}" placeholder="Observaciones" />
            </div>

            <div class="col-md-6">
                <label class="form-label" for="multicol-concluido_DAI">Concluido por Instruccion</label>
                <x-adminlte-select2 name="concluido_DAI" class="select2 form-select">
                    <option value="">Seleccione</option>
                    <option value="Si" {{ old('concluido_DAI') == 'Si' ? 'selected' : '' }}>Si</option>
                    <option value="No" {{ old('concluido_DAI') == 'No' ? 'selected' : '' }}>No</option>
                </x-adminlte-select2>
            </div>

          </div>

          <hr class="my-4 mx-n4" />
          <h4 class="fw-normal">5. Carga de datos del personal instructor de la Direccion General de Asuntos Judiciales</h4>
          <div class="row g-3">

                <div class="col-md-6">
                  <label class="form-label" for="multicol-apellido_nombre_DGAJ">Apellido y Nombre</label>
                  <input type="text" name="apellido_nombre_DGAJ" id="multicol-apellido_nombre_DGAJ" value="{{old('apellido_nombre_DGAJ')}}" class="form-control" placeholder="Escribir el apellido y nombre"/>
                </div>
               
                <div class="col-md-6">
                  <label class="form-label" for="multicol-leg_pers_DGAJ">Legajo Personal</label>
                  <input type="text" name="leg_pers_DGAJ" id="multicol-leg_pers_DGAJ" class="form-control" value="{{old('leg_pers_DGAJ')}}" placeholder="Escribir el legajo personal" />
                </div>

                <div class="col-md-6">
                    <label class="form-label" for="multicol-dependen_DGAJ">Dependencia</label>
                    <x-adminlte-select2 name="dependen_DGAJ" class="select2 form-select">
                        <option value="">Seleccionar la dependencia</option>
                        @foreach($dependencias as $dependencia)
                            <option value="{{ $dependencia->nombre_dep }}" {{ old('dependen_DGAJ') == $dependencia->nombre_dep ? 'selected' : '' }}>
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
                            <option value="{{ $jerarquia->nombre_jer }}" {{ old('jerarquia_DGAJ') == $jerarquia->nombre_jer ? 'selected' : '' }}>
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
                  <input type="date" name="fecha_mov_proceDGAJ" id="multicol-fecha_mov_proceDGAJ" class="form-control" value="{{old('fecha_mov_proceDGAJ')}}" placeholder="Fecha de pase del expediente " />
                </div>

                <div class="col-md-6">
                    <label class="form-label" for="multicol-destin_proced_DGAJ">Lugar de Procedencia</label>
                    <x-adminlte-select2 name="destin_proced_DGAJ" class="select2 form-select">
                        <option value="">Seleccionar la dependencia</option>
                        @foreach($dependencias as $dependencia)
                            <option value="{{ $dependencia->nombre_dep }}" {{ old('destin_proced_DGAJ') == $dependencia->nombre_dep ? 'selected' : '' }}>
                                {{ $dependencia->nombre_dep }}
                            </option>
                        @endforeach
                    </x-adminlte-select2>
                </div>
               
                <div class="col-md-6">
                    <label class="form-label" for="multicol-sugerencia_DGAJ">Sugerencia DGAJ</label>
                    <textarea name="sugerencia_DGAJ" id="multicol-sugerencia_DGAJ" class="form-control" placeholder="Escribir la sugerencia">{{ old('sugerencia_DGAJ') }}</textarea>
                </div>


                <div class="col-md-6">
                  <label class="form-label" for="multicol-obs_proced_DGAJ">Observaciones de Procedencia</label>
                  <input type="text" name="obs_proced_DGAJ" id="multicol-obs_proced_DGAJ" class="form-control" value="{{old('obs_proced_DGAJ')}}" placeholder="Escribir observaciones de la procedencia" />
                </div>
                
                <div class="col-md-6">
                  <label class="form-label" for="multicol-fecha_mov_destDGAJ"> Fecha de Movimiento Pase</label>
                  <input type="date" name="fecha_mov_destDGAJ" id="multicol-fecha_mov_destDGAJ" class="form-control" value="{{old('fecha_mov_destDGAJ')}}" placeholder="Fecha de pase del expediente " />
                </div>


                <div class="col-md-6">
                    <label class="form-label" for="multicol-destin_pase_DGAJ">Lugar de Pase</label>
                    <x-adminlte-select2 name="destin_pase_DGAJ" class="select2 form-select">
                        <option value="">Seleccionar la dependencia</option>
                        @foreach($dependencias as $dependencia)
                            <option value="{{ $dependencia->nombre_dep }}" {{ old('destin_pase_DGAJ') == $dependencia->nombre_dep ? 'selected' : '' }}>
                                {{ $dependencia->nombre_dep }}
                            </option>
                        @endforeach
                    </x-adminlte-select2>
                </div>
             
                <div class="col-md-6">
                  <label class="form-label" for="multicol-obs_pase_DGAJ">Observaciones del Pase</label>
                  <input type="text" name="obs_pase_DGAJ" id="multicol-obs_pase_DGAJ"value="{{old('obs_pase_DGAJ')}}"  class="form-control" placeholder="Escribir observaciones para el pase" />
                </div>

                <div class="col-md-6">
                    <label class="form-label" for="multicol-concluido_DGAJ">Concluido por Instrucción</label>
                    <x-adminlte-select2 name="concluido_DGAJ" class="select2 form-select">
                        <option value="">Seleccione</option>
                        <option value="Si" {{ old('concluido_DGAJ') == 'Si' ? 'selected' : '' }}>Si</option>
                        <option value="No" {{ old('concluido_DGAJ') == 'No' ? 'selected' : '' }}>No</option>
                    </x-adminlte-select2>
                </div>

            
             </div>

          
          <hr class="my-4 mx-n4" />
          <h4 class="fw-normal">7. Carga de datos del personal instructor de Asesoria Letrada</h4>
          <div class="row g-3">

                <div class="col-md-6">
                  <label class="form-label" for="multicol-apellido_nombre_AL">Apellido y Nombre</label>
                  <input type="text" name="apellido_nombre_AL" id="multicol-apellido_nombre_AL" class="form-control" value="{{old('apellido_nombre_AL')}}" placeholder="Escribir el apellido y nombre"/>
                </div>

                <div class="col-md-6">
                  <label class="form-label" for="multicol-leg_pers_AL">Legajo Personal</label>
                  <input type="text" name="leg_pers_AL" id="multicol-leg_pers_AL" class="form-control" value="{{old('leg_pers_AL')}}" placeholder="Escribir el legajo personal" />
                </div>

                <div class="col-md-6">
                    <label class="form-label" for="multicol-dependen_AL">Dependencia</label>
                    <x-adminlte-select2 name="dependen_AL" class="select2 form-select">
                        <option value="">Seleccionar la dependencia</option>
                        @foreach($dependencias as $dependencia)
                            <option value="{{ $dependencia->nombre_dep }}" {{ old('dependen_AL') == $dependencia->nombre_dep ? 'selected' : '' }}>
                                {{ $dependencia->nombre_dep }}
                            </option>
                        @endforeach
                    </x-adminlte-select2>
                </div>

                <div class="col-md-6 select2-primary">
                    <label class="form-label" for="multicol-jerarquia_AL">Jerarquía</label>
                    <x-adminlte-select2 name="jerarquia_AL" class="select2 form-select">
                        <option value="" {{ old('jerarquia_AL') == '' ? 'selected' : '' }}>Seleccionar la jerarquía</option>
                        @foreach($jerarquias as $jerarquia)
                            <option value="{{ $jerarquia->nombre_jer }}" {{ old('jerarquia_AL') == $jerarquia->nombre_jer ? 'selected' : '' }}>
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
                <input type="text" name="reg_interno_AL" id="multicol-reg_interno_AL" value="{{old('reg_interno_AL')}}" class="form-control" placeholder="Registro interno" />
            </div>
          
            <div class="col-md-6">
              <label class="form-label" for="multicol-fecha_mov_procAL"> Fecha de Procedencia</label>
              <input type="date" name="fecha_mov_procAL" id="multicol-fecha_mov_procAL" class="form-control" value="{{old('fecha_mov_procAL')}}" placeholder="Fecha de pase del expediente " />
            </div>

            <div class="col-md-6">
                <label class="form-label" for="multicol-destin_proceden_AL">Lugar de Procedencia</label>
                <x-adminlte-select2 name="destin_proceden_AL" class="select2 form-select">
                    <option value="">Seleccionar la dependencia</option>
                    @foreach($dependencias as $dependencia)
                        <option value="{{ $dependencia->nombre_dep }}" {{ old('destin_proceden_AL') == $dependencia->nombre_dep ? 'selected' : '' }}>
                            {{ $dependencia->nombre_dep }}
                        </option>
                    @endforeach
                </x-adminlte-select2>
            </div>

            <div class="col-md-6">
                <label class="form-label" for="multicol-sugerencia_AL">Sugerencia AL</label>
                <textarea name="sugerencia_AL" id="multicol-sugerencia_AL" class="form-control" placeholder="Escribir la sugerencia">{{ old('sugerencia_AL') }}</textarea>
            </div>

            <div class="col-md-6">
              <label class="form-label" for="multicol-obs_proced_AL">Observaciones de Procedencia</label>
              <input type="text" name="obs_proced_AL" id="multicol-obs_proced_AL" class="form-control" value="{{old('obs_proced_AL')}}" placeholder="Escribir observaciones de la procedencia" />
            </div>
          
            <div class="col-md-6">
              <label class="form-label" for="multicol-fecha_mov_paseAL"> Fecha de Pase</label>
              <input type="date" name="fecha_mov_paseAL" id="multicol-fecha_mov_paseAL" value="{{old('fecha_mov_paseAL')}}" class="form-control" placeholder="Fecha de pase del expediente " />
            </div>

            <div class="col-md-6">
                <label class="form-label" for="multicol-destin_pase_AL">Lugar de Pase</label>
                <x-adminlte-select2 name="destin_pase_AL" class="select2 form-select">
                    <option value="">Seleccionar la dependencia</option>
                    @foreach($dependencias as $dependencia)
                        <option value="{{ $dependencia->nombre_dep }}" {{ old('destin_pase_AL') == $dependencia->nombre_dep ? 'selected' : '' }}>
                            {{ $dependencia->nombre_dep }}
                        </option>
                    @endforeach
                </x-adminlte-select2>
            </div>

            <div class="col-md-6">
              <label class="form-label" for="multicol-obs_pase_AL">Observaciones del Pase</label>
              <input type="text" name="obs_pase_AL" id="multicol-obs_pase_AL" value="{{old('obs_pase_AL')}}" class="form-control" placeholder="Escribir observaciones para el pase" />
            </div>

            <div class="col-md-6">
                <label class="form-label" for="multicol-concluido_AL">Concluido por Instrucción</label>
                <x-adminlte-select2 name="concluido_AL" class="select2 form-select">
                    <option value="" {{ old('concluido_AL') == '' ? 'selected' : '' }}>Seleccione</option>
                    <option value="Si" {{ old('concluido_AL') == 'Si' ? 'selected' : '' }}>Si</option>
                    <option value="No" {{ old('concluido_AL') == 'No' ? 'selected' : '' }}>No</option>
                </x-adminlte-select2>
            </div>

            
          </div>

          <hr class="my-4 mx-n4" />
            <h4 class="fw-normal">9. Carga de datos del personal instructor de la Direccion General de Recursos Humanos</h4>
          <div class="row g-3">
              <div class="col-md-6">
                <label class="form-label" for="multicol-apellido_nombre_DGRRHH">Apellido y Nombre</label>
                <input type="text" name="apellido_nombre_DGRRHH" id="multicol-apellido_nombre_DGRRHH" value="{{old('apellido_nombre_DGRRHH')}}" class="form-control" placeholder="Escribir el apellido y nombre"/>
              </div>

            <div class="col-md-6">
              <label class="form-label" for="multicol-leg_pers_DGRRHH">Legajo Personal</label>
              <input type="text" name="leg_pers_DGRRHH" id="multicol-leg_pers_DGRRHH" class="form-control" value="{{old('leg_pers_DGRRHH')}}" placeholder="Escribir el legajo personal" />
            </div>

            <div class="col-md-6">
                <label class="form-label" for="multicol-dependen_DGRRHH">Dependencia</label>
                <x-adminlte-select2 name="dependen_DGRRHH" class="select2 form-select">
                    <option value="" {{ old('dependen_DGRRHH') == '' ? 'selected' : '' }}>Seleccionar la dependencia</option>
                    @foreach($dependencias as $dependencia)
                        <option value="{{ $dependencia->nombre_dep }}" {{ old('dependen_DGRRHH') == $dependencia->nombre_dep ? 'selected' : '' }}>
                            {{ $dependencia->nombre_dep }}
                        </option>
                    @endforeach
                </x-adminlte-select2>
            </div>

            <div class="col-md-6 select2-primary">
                <label class="form-label" for="multicol-jerarquia_DGRRHH">Jerarquía</label>
                <x-adminlte-select2 name="jerarquia_DGRRHH" class="select2 form-select">
                    <option value="" {{ old('jerarquia_DGRRHH') == '' ? 'selected' : '' }}>Seleccionar la jerarquía</option>
                    @foreach($jerarquias as $jerarquia)
                        <option value="{{ $jerarquia->nombre_jer }}" {{ old('jerarquia_DGRRHH') == $jerarquia->nombre_jer ? 'selected' : '' }}>
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
                  <input type="text" name="reg_interno_DGRRHH" id="multicol-reg_interno_DGRRHH" value="{{old('reg_interno_DGRRHH')}}" class="form-control" placeholder="Registro interno" />
              </div>
            
              <div class="col-md-6">
                <label class="form-label" for="multicol-fecha_mov_proceDGRRHH"> Fecha de Procedencia</label>
                <input type="date" name="fecha_mov_proceDGRRHH" id="multicol-fecha_mov_proceDGRRHH" value="{{old('fecha_mov_proceDGRRHH')}}" class="form-control" placeholder="Fecha de pase del expediente " />
              </div>

              <div class="col-md-6">
                    <label class="form-label" for="multicol-destin_proceden_DGRRHH">Lugar de Procedencia</label>
                    <x-adminlte-select2 name="destin_proceden_DGRRHH" class="select2 form-select">
                        <option value="" {{ old('destin_proceden_DGRRHH') == '' ? 'selected' : '' }}>Seleccionar la dependencia</option>
                        @foreach($dependencias as $dependencia)
                            <option value="{{ $dependencia->nombre_dep }}" {{ old('destin_proceden_DGRRHH') == $dependencia->nombre_dep ? 'selected' : '' }}>
                                {{ $dependencia->nombre_dep }}
                            </option>
                        @endforeach
                    </x-adminlte-select2>
                </div>


              <div class="col-md-6">
                  <label class="form-label" for="multicol-resol_final_DGRRHH">Resolucion Final</label>
                  <textarea name="resol_final_DGRRHH" id="multicol-resol_final_DGRRHH" class="form-control" placeholder="Escribir la resolución final">{{ old('resol_final_DGRRHH') }}</textarea>
              </div>

              <div class="col-md-6">
                <label class="form-label" for="multicol-obs_proced_DGRRHH">Observaciones de Procedencia</label>
                <input type="text" name="obs_proced_DGRRHH" id="multicol-obs_proced_DGRRHH" class="form-control" value="{{old('obs_proced_DGRRHH')}}" placeholder="Escribir observaciones de la procedencia" />
              </div>
            
              <div class="col-md-6">
                <label class="form-label" for="multicol-fecha_mov_paseDGRRHH"> Fecha de Pase</label>
                <input type="date" name="fecha_mov_paseDGRRHH" id="multicol-fecha_mov_paseDGRRHH" value="{{old('fecha_mov_paseDGRRHH')}}" class="form-control" placeholder="Fecha de pase del expediente " />
              </div>

              <div class="col-md-6">
                <label class="form-label" for="multicol-destin_pase_DGRRHH">Lugar de Pase</label>
                <x-adminlte-select2 name="destin_pase_DGRRHH" class="select2 form-select">
                    <option value="" {{ old('destin_pase_DGRRHH') == '' ? 'selected' : '' }}>Seleccionar la dependencia</option>
                    @foreach($dependencias as $dependencia)
                        <option value="{{ $dependencia->nombre_dep }}" {{ old('destin_pase_DGRRHH') == $dependencia->nombre_dep ? 'selected' : '' }}>
                            {{ $dependencia->nombre_dep }}
                        </option>
                    @endforeach
                </x-adminlte-select2>
              </div>


              <div class="col-md-6">
                <label class="form-label" for="multicol-obs_pase_DGRRHH">Observaciones del Pase</label>
                <input type="text" name="obs_pase_DGRRHH" id="multicol-obs_pase_DGRRHH" value="{{old('obs_pase_DGRRHH')}}" class="form-control" placeholder="Escribir observaciones para el pase" />
              </div>

              <div class="col-md-6">
                  <label class="form-label" for="multicol-concluido_DGRRHH">Concluido por Instrucción</label>
                  <x-adminlte-select2 name="concluido_DGRRHH" class="select2 form-select">
                      <option value="" {{ old('concluido_DGRRHH') == '' ? 'selected' : '' }}>Seleccione</option>
                      <option value="Si" {{ old('concluido_DGRRHH') == 'Si' ? 'selected' : '' }}>Si</option>
                      <option value="No" {{ old('concluido_DGRRHH') == 'No' ? 'selected' : '' }}>No</option>
                  </x-adminlte-select2>
              </div>

              <div class="col-md-6">
                <label class="form-label" for="multicol-DGRRHH_N°">DGRRHH N°</label>
                <input type="text" name="DGRRHH_N°" id="multicol-DGRRHH_N°" value="{{old('DGRRHH_N°')}}" class="form-control" placeholder="Escribir N° de resolucion" />
              </div>

              <div class="col-md-6">
                <label class="form-label" for="multicol-fecha_notificacion"> Fecha de Notificacion</label>
                <input type="date" name="fecha_notificacion" id="multicol-fecha_notificacion" value="{{old('fecha_notificacion')}}" class="form-control" placeholder="Fecha de notificacion de la resolucion" />
              </div>
              
            </div>

          <div class="pt-4">
              <button type="submit" class="btn btn-primary me-sm-3 me-1">Guardar</button>
              <button type="reset" class="btn btn-secondary" onClick="location.href='/isas'">Cancelar</button>
          </div>
   </form>

  </div>

   
@endsection

@section('scripts')
<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
@endsection