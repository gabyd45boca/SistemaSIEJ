@extends('adminlte::page')

@section('title', 'SIEA')

@section('content_header')
    <h1 class="m-0 text-dark">Registrar Sancion Directa</h1>
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
    
  <form method="POST" action="{{ route ('sancion.store')}}" class="card-body">
       @csrf
       <h4 class="fw-normal">1. Carga de datos del expediente</h4>
      <div class="row g-3">

            <div class="col-md-6">
                <label class="form-label" for="num_dj"> N° DJ</label>
                <input type="text" name="num_dj" id="num_dj" class="form-control" placeholder="Numero de DJ" value="{{old('num_dj')}}" required/>
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
                <label class="form-label" for="multicol-username"> Fecha de Ingreso</label>
                <input type="date" name="fecha_ingreso" id="multicol-fecha_ingreso" class="form-control" value="{{old('fecha_ingreso')}}" placeholder="Fecha de inicio de actuaciones " required/>
            </div>
         

            <div class="col-md-6">
              <label class="form-label" for="multicol-username"> Fecha Inicio de Actuaciones</label>
              <input type="date" name="fecha_inicio" id="multicol-fecha_inicio" class="form-control" placeholder="Fecha de inicio de actuaciones" value="{{old('fecha_inicio')}}" required/>
            </div>
                      
            <div class="col-md-6">
                <label class="form-label" for="multicol-fojas">Fojas</label>
                <input type="text" name="fojas" id="multicol-fojas" class="form-control" value="{{old('fojas')}}" placeholder="Cantidad de fojas" required/>
            </div>

            <div class="col-md-6">
                <label class="form-label" for="multicol-tipo_denuncia">Tipo de Denuncia</label>
                <x-adminlte-select2 name="tipo_denuncia" class="select2 form-select" required>
                    <option value="" {{ old('tipo_denuncia') == '' ? 'selected' : '' }}>Seleccionar el tipo</option>
                    <option value="Comparendo" {{ old('tipo_denuncia') == 'Comparendo' ? 'selected' : '' }}>Comparendo</option>
                    <option value="Denuncia" {{ old('tipo_denuncia') == 'Denuncia' ? 'selected' : '' }}>Denuncia</option>
                    <option value="Oficio" {{ old('tipo_denuncia') == 'Oficio' ? 'selected' : '' }}>Oficio</option>
                    <option value="Exposicion" {{ old('tipo_denuncia') == 'Exposicion' ? 'selected' : '' }}>Exposicion</option>
                    <option value="Otro" {{ old('tipo_denuncia') == 'Otro' ? 'selected' : '' }}>Otro</option>
                </x-adminlte-select2>
            </div>


            <div class="col-md-6">
                <label class="form-label" for="multicol-motivo">Motivo</label>
                <x-adminlte-select2 name="motivo" required>
                    <option value="">Seleccionar el tipo</option>
                    @foreach($motivos as $motivo)
                        <option value="{{ $motivo->nombre_mot }}" {{ old('motivo') == $motivo->nombre_mot ? 'selected' : '' }}>
                            {{ $motivo->nombre_mot }}
                        </option>
                    @endforeach
                </x-adminlte-select2>
            </div>


            <div class="col-md-6">
                <label class="form-label" for="multicol-primera_interv">Primera Intervencion</label>
                <textarea name="primera_interv" id="multicol-primera_interv" class="form-control" placeholder="Escribir la primera intervención">{{ old('primera_interv') }}</textarea>
            </div>

         
            <div class="col-md-6">
              <label class="form-label" for="multicol-fecha_pase"> Fecha de Pase</label>
              <input type="date" name="fecha_pase" id="multicol-fecha_pase" class="form-control" value="{{old('fecha_pase')}}" placeholder="Fecha de pase del expediente " required />
            </div>

            <div class="col-md-6">
              <label class="form-label" for="multicol-observaciones">Observaciones del Expediente</label>
              <input type="text" name="observaciones" id="multicol-observaciones" class="form-control" value="{{old('observaciones')}}" placeholder="Observaciones" />
            </div>
            
            <div class="col-md-6">
                <label class="form-label" for="multicol-lugar_pase">Lugar de Pase</label>
                <x-adminlte-select2 name="lugar_pase" required>
                    <option value="">Seleccionar la dependencia</option>
                    @foreach($dependencias as $dependencia)
                        <option value="{{ $dependencia->nombre_dep  }}" {{ old('lugar_pase') == $dependencia->nombre_dep  ? 'selected' : '' }}>
                            {{ $dependencia->nombre_dep  }}
                        </option>
                    @endforeach
                </x-adminlte-select2>
            </div>
           
                                 
          </div>

          <hr class="my-4 mx-n4" />
          <h4 class="fw-normal">2. Carga del personal infractor</h4>
          <div class="row g-3">
            
            <div class="col-md-12">
                <label class="form-label" for="multicol-apellido_nombre_inf">Apellido y Nombres</label>
                <x-adminlte-select name="apellido_nombre_inf[]" id="apellido_nombre_inf" class="form-control selectpicker" title="Seleccionar infractores" data-style="btn-primary" multiple required>
                    @foreach ($infractores as $infractor) 
                    <option value="{{$infractor->id}}" {{ collect(old('apellido_nombre_inf'))->contains($infractor->id) ? 'selected' : '' }}>
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
          <h4 class="fw-normal">3. Carga de datos del personal instructor de la Direccion General de Asuntos Judiciales</h4>
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
                  <label class="form-label" for="multicol-jerarquia_DGAJ">Jerarquia</label>
                  <x-adminlte-select2 name="jerarquia_DGAJ" class="select2 form-select">
                      <option value="">Seleccionar la jerarquia</option>
                      <option value="Agente" {{ old('jerarquia_DGAJ') == 'Agente' ? 'selected' : '' }}>Agente</option>
                      <option value="Oficial ayudante" {{ old('jerarquia_DGAJ') == 'Oficial ayudante' ? 'selected' : '' }}>Oficial ayudante</option>
                      <option value="Comisario" {{ old('jerarquia_DGAJ') == 'Comisario' ? 'selected' : '' }}>Comisario</option>
                  </x-adminlte-select2>
               </div>


          </div> 

          <hr class="my-4 mx-n4" />
          <h4 class="fw-normal">4. Carga de movimientos y sugerencias del instructor de la Direccion General de Asuntos Judiciales </h4>
            <div class="row g-3">
             
            
                <div class="col-md-6">
                  <label class="form-label" for="multicol-fecha_reingreso_DGAJ"> Fecha de Reingreso</label>
                  <input type="date" name="fecha_reingreso_DGAJ" id="multicol-fecha_reingreso_DGAJ" class="form-control" value="{{old('fecha_reingreso_DGAJ')}}" placeholder="Fecha de pase del expediente " />
                </div>          

                <div class="col-md-6">
                  <label class="form-label" for="multicol-obs_reingreso_DGAJ">Observaciones del Reingreso</label>
                  <input type="text" name="obs_reingreso_DGAJ" id="multicol-obs_reingreso_DGAJ" class="form-control" value="{{old('obs_reingreso_DGAJ')}}" placeholder="Escribir observaciones de la procedencia" />
                </div>

                <div class="col-md-6">
                    <label class="form-label" for="multicol-opinion_cierre_DGAJ">Opinion de Cierre</label>
                    <textarea name="opinion_cierre_DGAJ" id="multicol-opinion_cierre_DGAJ" class="form-control" placeholder="Escribir la sugerencia">{{ old('opinion_cierre_DGAJ') }}</textarea>
                </div>

                
                <div class="col-md-6">
                  <label class="form-label" for="multicol-fecha_pase_DGAJ"> Fecha de Pase</label>
                  <input type="date" name="fecha_pase_DGAJ" id="multicol-fecha_pase_DGAJ" value="{{old('fecha_pase_DGAJ')}}" class="form-control" value="{{old('fecha_pase_DGAJ')}}" placeholder="Fecha de pase del expediente " />
                </div>


                <div class="col-md-6">
                    <label class="form-label" for="multicol-lugar_pase_DGAJ">Lugar de Pase</label>
                    <x-adminlte-select2 name="lugar_pase_DGAJ" class="select2 form-select">
                        <option value="">Seleccionar la dependencia</option>
                        @foreach($dependencias as $dependencia)
                            <option value="{{ $dependencia->nombre_dep }}" {{ old('lugar_pase_DGAJ') == $dependencia->nombre_dep ? 'selected' : '' }}>
                                {{ $dependencia->nombre_dep }}
                            </option>
                        @endforeach
                    </x-adminlte-select2>
                </div>
             

                <div class="col-md-6">
                  <label class="form-label" for="multicol-obs_pase_DGAJ">Observaciones de Pase</label>
                  <input type="text" name="obs_pase_DGAJ" id="multicol-obs_pase_DGAJ"value="{{old('obs_pase_DGAJ')}}"  class="form-control" placeholder="Escribir observaciones para el pase" />
                </div>
              
            
             </div>

          
          <hr class="my-4 mx-n4" />
          <h4 class="fw-normal">5. Carga de datos del personal instructor de Asesoria Letrada</h4>
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
                  <label class="form-label" for="multicol-jerarquia_AL">Jerarquia</label>
                  <x-adminlte-select2 name="jerarquia_AL" class="select2 form-select">
                      <option value="">Seleccionar la jerarquia</option>
                      <option value="Agente" {{ old('jerarquia_AL') == 'Agente' ? 'selected' : '' }}>Agente</option>
                      <option value="Oficial ayudante" {{ old('jerarquia_AL') == 'Oficial ayudante' ? 'selected' : '' }}>Oficial ayudante</option>
                      <option value="Comisario" {{ old('jerarquia_AL') == 'Comisario' ? 'selected' : '' }}>Comisario</option>
                  </x-adminlte-select2>
               </div>


            </div> 

          <hr class="my-4 mx-n4" />
          <h4 class="fw-normal">6. Carga de movimientos y sugerencias del instructor de Asesoria Letrada</h4>
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
                        <option value="{{$dependencia->nombre_dep }}" {{ old('destin_proceden_AL') == $dependencia->nombre_dep ? 'selected' : '' }}>
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
        
            
          </div>


          <hr class="my-4 mx-n4" />
          <h4 class="fw-normal">7. Carga de datos del personal instructor de la Secretaria de Seguridad</h4>
          <div class="row g-3">

                <div class="col-md-6">
                  <label class="form-label" for="multicol-apellido_nombre_AL">Apellido y Nombre</label>
                  <input type="text" name="apellido_nombre_SS" id="multicol-apellido_nombre_SS" class="form-control" value="{{old('apellido_nombre_SS')}}" placeholder="Escribir el apellido y nombre"/>
                </div>

                <div class="col-md-6">
                  <label class="form-label" for="multicol-leg_pers_AL">Legajo Personal</label>
                  <input type="text" name="leg_pers_SS" id="multicol-leg_pers_SS" class="form-control" value="{{old('leg_pers_SS')}}" placeholder="Escribir el legajo personal" />
                </div>

                <div class="col-md-6">
                    <label class="form-label" for="multicol-dependen_SS">Dependencia</label>
                    <x-adminlte-select2 name="dependen_SS" class="select2 form-select">
                        <option value="">Seleccionar la dependencia</option>
                        @foreach($dependencias as $dependencia)
                            <option value="{{ $dependencia->nombre_dep }}" {{ old('dependen_SS') == $dependencia->nombre_dep ? 'selected' : '' }}>
                                {{ $dependencia->nombre_dep}}
                            </option>
                        @endforeach
                    </x-adminlte-select2>
                </div>

                <div class="col-md-6 select2-primary">
                    <label class="form-label" for="multicol-jerarquia_SS">Jerarquia</label>
                    <x-adminlte-select2 name="jerarquia_SS" class="select2 form-select">
                        <option value="">Seleccionar la jerarquia</option>
                        <option value="Agente" {{ old('jerarquia_SS') == 'Agente' ? 'selected' : '' }}>Agente</option>
                        <option value="Oficial ayudante" {{ old('jerarquia_SS') == 'Oficial ayudante' ? 'selected' : '' }}>Oficial ayudante</option>
                        <option value="Comisario" {{ old('jerarquia_SS') == 'Comisario' ? 'selected' : '' }}>Comisario</option>
                    </x-adminlte-select2>
                </div>


            </div> 

          <hr class="my-4 mx-n4" />
          <h4 class="fw-normal">8. Carga de movimientos y sugerencias del instructor de la Secretaria de Seguridad</h4>
          <div class="row g-3">

            <div class="col-md-6">
                <label class="form-label" for="multicol-reg_interno_AL">Registro Interno</label>
                <input type="text" name="reg_interno_SS" id="multicol-reg_interno_SS" value="{{old('reg_interno_SS')}}" class="form-control" placeholder="Registro interno" />
            </div>
          
            <div class="col-md-6">
              <label class="form-label" for="multicol-fecha_proced_SS"> Fecha de Procedencia</label>
              <input type="date" name="fecha_proced_SS" id="multicol-fecha_proced_SS" class="form-control" value="{{old('fecha_proced_SS')}}" placeholder="Fecha de pase del expediente " />
            </div>

            <div class="col-md-6">
                <label class="form-label" for="multicol-lugar_proceden_SS">Lugar de Procedencia</label>
                <x-adminlte-select2 name="lugar_proceden_SS" class="select2 form-select">
                    <option value="">Seleccionar la dependencia</option>
                    @foreach($dependencias as $dependencia)
                        <option value="{{ $dependencia->nombre_dep }}" {{ old('lugar_proceden_SS') == $dependencia->nombre_dep ? 'selected' : '' }}>
                            {{ $dependencia->nombre_dep }}
                        </option>
                    @endforeach
                </x-adminlte-select2>
            </div>

            <div class="col-md-6">
                <label class="form-label" for="multicol-sugerencia_SS">Sugerencia</label>
                <textarea name="sugerencia_SS" id="multicol-sugerencia_SS" class="form-control" placeholder="Escribir la sugerencia">{{ old('sugerencia_SS') }}</textarea>
            </div>

            <div class="col-md-6">
              <label class="form-label" for="multicol-obs_proced_SS">Observaciones de Procedencia</label>
              <input type="text" name="obs_proced_SS" id="multicol-obs_proced_SS" class="form-control" value="{{old('obs_proced_SS')}}" placeholder="Escribir observaciones de la procedencia" />
            </div>
          
            <div class="col-md-6">
              <label class="form-label" for="multicol-fecha_pase_SS">Fecha de Pase</label>
              <input type="date" name="fecha_pase_SS" id="multicol-fecha_pase_SS" value="{{old('fecha_pase_SS')}}" class="form-control" placeholder="Fecha de pase del expediente " />
            </div>

            <div class="col-md-6">
                <label class="form-label" for="multicol-destin_pase_AL">Lugar de Pase</label>
                <x-adminlte-select2 name="lugar_pase_SS" class="select2 form-select">
                    <option value="">Seleccionar la dependencia</option>
                    @foreach($dependencias as $dependencia)
                        <option value="{{ $dependencia->nombre_dep }}" {{ old('lugar_pase_SS') == $dependencia->nombre_dep ? 'selected' : '' }}>
                            {{ $dependencia->nombre_dep }}
                        </option>
                    @endforeach
                </x-adminlte-select2>
            </div>

                  
            <div class="col-md-6">
              <label class="form-label" for="multicol-obs_pase_AL">Observaciones del Pase</label>
              <input type="text" name="obs_pase_SS" id="multicol-obs_pase_SS" value="{{old('obs_pase_SS')}}" class="form-control" placeholder="Escribir observaciones para el pase" />
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
                    <option value="">Seleccionar la dependencia</option>
                    @foreach($dependencias as $dependencia)
                        <option value="{{ $dependencia->nombre_dep }}" {{ old('dependen_DGRRHH') == $dependencia->nombre_dep ? 'selected' : '' }}>
                            {{ $dependencia->nombre_dep }}
                        </option>
                    @endforeach
                </x-adminlte-select2>
            </div>

            <div class="col-md-6 select2-primary">
                <label class="form-label" for="multicol-jerarquia_DGRRHH">Jerarquia</label>
                <x-adminlte-select2 name="jerarquia_DGRRHH" class="select2 form-select">
                    <option value="" {{ old('jerarquia_DGRRHH') == '' ? 'selected' : '' }}>Seleccionar la jerarquia</option>
                    <option value="Agente" {{ old('jerarquia_DGRRHH') == 'Agente' ? 'selected' : '' }}>Agente</option>
                    <option value="Oficial ayudante" {{ old('jerarquia_DGRRHH') == 'Oficial ayudante' ? 'selected' : '' }}>Oficial ayudante</option>
                    <option value="Comisario" {{ old('jerarquia_DGRRHH') == 'Comisario' ? 'selected' : '' }}>Comisario</option>
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
                      <option value="">Seleccionar la dependencia</option>
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
                  <label class="form-label" for="multicol-concluido_DGRRHH">Concluido por Instrucción</label>
                  <x-adminlte-select2 name="concluido_DGRRHH" class="select2 form-select">
                      <option value="">Seleccione</option>
                      <option value="Si" {{ old('concluido_DGRRHH') == "Si" ? 'selected' : '' }}>Si</option>
                      <option value="No" {{ old('concluido_DGRRHH') == "No" ? 'selected' : '' }}>No</option>
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
              <button type="reset" class="btn btn-secondary" onClick="location.href='/sancion'">Cancelar</button>
          </div>
   </form>

  </div>

   
@endsection

@section('scripts')
<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
@endsection