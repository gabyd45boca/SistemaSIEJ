@extends('adminlte::page')

@section('title', 'SIEJ')

@section('content_header')
    <h1 class="m-0 text-dark">Registrar Isa</h1>
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
    
  <form method="POST" action="{{ route ('sumarios.store')}}" class="card-body">
       @csrf
       <h4 class="fw-normal">1. Carga de datos del expediente</h4>
      <div class="row g-3">

            <div class="col-md-6">
              <label class="form-label" for="multicol-num_dja">N° DJA</label>
              <input type="text" name="num_dja" id="multicol-num_dja" class="form-control" placeholder="Numero de DJA " value="{{old('num_dja')}}" required/>
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
              <label class="form-label" for="multicol-infraccion">Infraccion</label>
              <input type="text" name="infraccion" id="multicol-infraccion" class="form-control" value="{{old('infraccion')}}" placeholder="Infraccion cometida" required/>
            </div>

            <div class="col-md-6">
              <label class="form-label" for="multicol-motivo">Motivo</label>
              <x-adminlte-select2 name="motivo"  value="{{old('motivo')}}" required>
                <option value="">Seleccionar el tipo</option>
                <option value="Violencia de genero">Violencia de genero</option>
                <option value="Perdida Arma Reglamentaria">Perdida Arma Reglamentaria</option>
                <option value="Falta al servicio">Falta al servicio</option>
                <option value="Ebriedad">Ebriedad</option>
                <option value="Ausentismo Laboral">Ausentismo Laboral</option>
                <option value="Otro">Otro</option>
              </x-adminlte-select2>
            </div>

            <div class="col-md-6">
                      <label class="form-label" for="multicol-extracto">Extracto</label>
                      <input type="text" name="extracto" id="multicol-extracto" class="form-control" value="{{old('extracto')}}" placeholder="Extracto" />
                    </div>

            <div class="col-md-6">
              <label class="form-label" for="multicol-tipo_denun">Tipo de denuncia</label>
              <x-adminlte-select2  name="tipo_denun" value="{{old('tipo_denun')}}" required>
                <option value="">Seleccionar el tipo</option>
                <option value="Comparendo">Comparendo</option>
                <option value="Denuncia">Denuncia</option>
                <option value="Oficio">Oficio</option>
                <option value="Exposicion">Exposicion</option>
                <option value="Otro">Otro</option>
              </x-adminlte-select2>
            </div>
          
            <div class="col-md-6">
              <label class="form-label" for="multicol-fecha_movimiento"> Fecha de Movimiento</label>
              <input type="date" name="fecha_movimiento" id="multicol-fecha_movimiento" class="form-control" value="{{old('fecha_movimiento')}}" placeholder="Fecha de pase del expediente " required />
            </div>
            
            <div class="col-md-6">
              <label class="form-label" for="multicol-destino_pase">Destino de Pase</label>
              <x-adminlte-select2  name="destino_pase" value="{{old('destino_pase')}}" required>
                <option value="">Seleccionar la dependencia</option>
                <option value="Asuntos Interno">Asuntos Interno</option>
                <option value="Comisaria">Comisaria</option>
                <option value="Departamental">Departamental</option>
              </x-adminlte-select2>
            </div>

            <div class="col-md-6">
              <label class="form-label" for="multicol-observaciones">Observaciones del expediente</label>
              <input type="text" name="observaciones" id="multicol-observaciones" class="form-control" value="{{old('observaciones')}}" placeholder="Observaciones" />
            </div>

            <div class="col-md-6">
              <label class="form-label" for="multicol-tipo_mov">Tipo Movimiento</label>
              <x-adminlte-select2  name="tipo_mov" value="{{old('tipo_mov')}}" required>
                <option value="">Seleccionar el tipo de movimiento</option>
                <option value="Salida">Salida</option>
                <option value="Ingreso">Ingreso</option>
                <option value="ReIngreso">ReIngreso</option>
              </x-adminlte-select2>
            </div>
                      
          </div>

          <hr class="my-4 mx-n4" />
          <h4 class="fw-normal">2. Carga de datos del personal infractor</h4>
          <div class="row g-3">
            
            <div class="col-md-12">
              <label class="form-label" for="multicol-apellido_nombre_inf">Apellido y Nombres</label>
              <x-adminlte-select  name="apellido_nombre_inf[]" id="apellido_nombre_inf" class="form-control selectpicker" title="Seleccionar infractores" data-style="btn-primary"  multiple required  >
                  @foreach ($infractores as $infractor) 
                  <option value="{{$infractor->id}}">{{$infractor->apellido_nombre_inf}}</option>
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
              <x-adminlte-select2  name="dependen_DAI" value="{{old('dependen_DAI')}}">
                <option value="">Seleccionar la dependencia</option>
                <option value="Direccion de Asuntos Internos">Direccion de Asuntos Internos</option>
                <option value="Departamental">Departamental</option>
                <option value="Destacamento">Destacamento</option>
              </x-adminlte-select2>
            </div>

            <div class="col-md-6 select2-primary">
                  <label class="form-label" for="multicol-jerarquia_DGAJ">Jerarquia</label>
                  <x-adminlte-select2  name="jerarquia_DGAJ" value="{{old('jerarquia_DGAJ')}}" class="select2 form-select" >
                    <option value="">Seleccionar la jerarquia</option>
                    <option value="Agente">Agente</option>
                    <option value="Oficial ayudante">Oficial ayudante</option>
                    <option value="Comisario">Comisario</option>
                  </x-adminlte-select2>
            </div>
                    

          </div> 

          <hr class="my-4 mx-n4" />
          <h4 class="fw-normal">4. Carga de movimientos y sugerencias del instructor de la Direccion de Asuntos Internos </h4>
          <div class="row g-3">

          <div class="col-md-6">
            <label class="form-label" for="multicol-reg_interno_DAI">Registro Interno</label>
              <input type="text" name="reg_interno_DAI" id="multicol-reg_interno_DAI" class="form-control" placeholder="Registro interno" />
            </div>

            <div class="col-md-6">
              <label class="form-label" for="multicol-fecha_mov_DAI"> Fecha de Movimiento Procedencia</label>
              <input type="date" name="fecha_mov_DAI" id="multicol-fecha_mov_DAI" class="form-control" value="{{old('fecha_mov_DAI')}}" placeholder="Fecha de pase del expediente " />
            </div>

            <div class="col-md-6">
              <label class="form-label" for="multicol-destin_proceden_DAI">Destino de Procedencia</label>
              <x-adminlte-select2  name="destin_proceden_DAI" value="{{old('destin_proceden_DAI')}}"  class="select2 form-select">
                <option value="">Seleccionar la dependencia</option>
                <option value="Direccion General Asuntos Judiciales">Direccion General Asuntos Judiciales</option>
                <option value="D.S.C. N°1">D.S.C. N°1</option>
                <option value="DESTACAMENTO">DESTACAMENTO</option>
              </x-adminlte-select2>
            </div>

            <div class="col-md-6">
              <label class="form-label" for="multicol-obs_proced_DAI">Observaciones de procedencia</label>
              <input type="text" name="obs_proced_DAI" id="multicol-obs_proced_DAI" class="form-control" placeholder="Observaciones de la procedencia" />
            </div>

            <div class="col-md-6">
              <label class="form-label" for="multicol-tipo_mov_proce_DAI">Tipo Movimiento Procedencia</label>
              <x-adminlte-select2  name="tipo_mov_proce_DAI"  value="{{old('tipo_mov_proce_DAI')}}" class="select2 form-select" >
                <option value="">Seleccionar el tipo de movimiento</option>
                <option value="salida">Salida</option>
                <option value="ingreso">Ingreso</option>
                <option value="reingreso">ReIngreso</option>
              </x-adminlte-select2>
            </div>
            
            <div class="col-md-6">
              <label class="form-label" for="multicol-sugerencia_DAI">Sugerencia Sede Instruccion</label>
              <input type="text" name="sugerencia_DAI" id="multicol-sugerencia_DAI" value="{{old('sugerencia_DAI')}}" class="form-control" placeholder="Escribir la sugerencia " />
            </div>

            <div class="col-md-6">
            <label class="form-label" for="multicol-fecha_elev_inst_DAI"> Fecha de  Elevado por Instruccion</label>
              <input type="date" name="fecha_elev_inst_DAI" id="multicol-fecha_elev_inst_DAI" class="form-control" value="{{old('fecha_elev_inst_DAI')}}" placeholder="Fecha elevado por insruccion " />
            </div>

            <div class="col-md-6">
              <label class="form-label" for="multicol-fecha_movimien"> Fecha de Movimiento Pase</label>
              <input type="date" name="fecha_movimien" id="multicol-fecha_movimien" class="form-control" value="{{old('fecha_movimien')}}" placeholder="Fecha de pase del expediente " />
            </div>

            <div class="col-md-6">
              <label class="form-label" for="multicol-destin_pase_DAI">Destino de Pase</label>
              <x-adminlte-select2  name="destin_pase_DAI" value="{{old('destin_pase_DAI')}}" class="select2 form-select">
                <option value="">Seleccionar la dependencia</option>
                <option value="Direccion General Asuntos Judiciales">Direccion General Asuntos Judiciales</option>
                <option value="D.S.C. N°1">D.S.C. N°1</option>
                <option value="DESTACAMENTO">DESTACAMENTO</option>
              </x-adminlte-select2>
            </div>

            <div class="col-md-6">
              <label class="form-label" for="multicol-obs_pase_DAI">Observaciones del pase</label>
              <input type="text" name="obs_pase_DAI" id="multicol-obs_pase_DAI" class="form-control" value="{{old('obs_pase_DAI')}}" placeholder="Observaciones" />
            </div>

            <div class="col-md-6">
              <label class="form-label" for="multicol-tipo_mov_pase_DAI">Tipo Movimiento Pase</label>
              <x-adminlte-select2  name="tipo_mov_pase_DAI" value="{{old('tipo_mov_pase_DAI')}}" class="select2 form-select" >
                <option value="">Seleccionar el tipo de movimiento</option>
                <option value="salida">Salida</option>
                <option value="ingreso">Ingreso</option>
                <option value="reingreso">ReIngreso</option>
              </x-adminlte-select2>

            </div>

            <div class="col-md-6">
            <label class="form-label" for="multicol-concluido_DAI">Concluido por Instruccion</label>
              <x-adminlte-select2  name="concluido_DAI" value="{{old('concluido_DAI')}}" class="select2 form-select" >
                <option value="">Seleccione</option>
                <option value="Si">Si</option>
                <option value="No">No</option>
              </x-adminlte-select2>
            </div>


          </div>

          <hr class="my-4 mx-n4" />
          <h4 class="fw-normal">5. Carga de datos del personal instructor de la Direccion General de Asuntos Judiciales</h4>
          <div class="row g-3">

                <div class="col-md-6">
                  <label class="form-label" for="multicol-apellido_nombre_DGAJ">Apellido y Nombre</label>
                  <input type="text" name="apellido_nombre_DGAJ" id="multicol-apellido_nombre_DGAJ" class="form-control" placeholder="Escribir el apellido y nombre"/>
                </div>
               
                <div class="col-md-6">
                  <label class="form-label" for="multicol-leg_pers_DGAJ">Legajo Personal</label>
                  <input type="text" name="leg_pers_DGAJ" id="multicol-leg_pers_DGAJ" class="form-control" value="{{old('leg_pers_DGAJ')}}" placeholder="Escribir el legajo personal" />
                </div>

                <div class="col-md-6">
                  <label class="form-label" for="multicol-leg_pers_DGAJ">Dependencia</label>
                  <x-adminlte-select2  name="leg_pers_DGAJ"  class="select2 form-select" value="{{old('leg_pers_DGAJ')}}" >
                    <option value="">Seleccionar la dependencia</option>
                    <option value="Direccion General de Asuntos Judiciales">Direccion General de Asuntos Judiciales</option>
                    <option value="D.S.C. N°1">D.S.C. N°1</option>
                    <option value="DESTACAMENTO">DESTACAMENTO</option>
                  </x-adminlte-select2>
                </div>

                <div class="col-md-6 select2-primary">
                  <label class="form-label" for="multicol-jerarquia_DGAJ">Jerarquia</label>
                  <x-adminlte-select2  name="jerarquia_DGAJ"  class="select2 form-select" >
                    <option value="">Seleccionar la jerarquia</option>
                    <option value="Agente">Agente</option>
                    <option value="Oficial ayudante">Oficial ayudante</option>
                    <option value="Comisario">Comisario</option>
                  </x-adminlte-select2>
                </div>

          </div> 

          <hr class="my-4 mx-n4" />
          <h4 class="fw-normal">6. Carga de movimientos y sugerencias del instructor de la Direccion General de Asuntos Judiciales </h4>
            <div class="row g-3">

                <div class="col-md-6">
                  <label class="form-label" for="multicol-reg_interno_DGAJ">Registro Interno</label>
                    <input type="text" name="reg_interno_DGAJ" id="multicol-reg_interno_DGAJ" class="form-control"value="{{old('reg_interno_DGAJ')}}" placeholder="Registro interno" />
                </div>
            
                <div class="col-md-6">
                <label class="form-label" for="multicol-fecha_mov_proceDGAJ"> Fecha de Movimiento procedencia</label>
                  <input type="date" name="fecha_mov_proceDGAJ" id="multicol-fecha_mov_proceDGAJ" class="form-control" value="{{old('fecha_mov_proceDGAJ')}}" placeholder="Fecha de pase del expediente " />
                </div>

                <div class="col-md-6">
                  <label class="form-label" for="multicol-destin_proced_DGAJ">Destino de Procedencia</label>
                  <x-adminlte-select2  name="destin_proced_DGAJ" value="{{old('destin_proced_DGAJ')}}" class="select2 form-select" >
                    <option value="">Seleccionar la dependencia</option>
                    <option value="Asuntos Internos">Asuntos Internos</option>
                    <option value="D.S.C. N°1">D.S.C. N°1</option>
                    <option value="DESTACAMENTO">DESTACAMENTO</option>
                  </x-adminlte-select2>
                </div>

                <div class="col-md-6">
                  <label class="form-label" for="multicol-tipo_mov_proce_DGAJ">Tipo Movimiento Procedencia</label>
                  <x-adminlte-select2  name="tipo_mov_proce_DGAJ" value="{{old('tipo_mov_proce_DGAJ')}}" class="select2 form-select">
                    <option value="">Seleccionar el tipo de movimiento</option>
                    <option value="salida">Salida</option>
                    <option value="ingreso">Ingreso</option>
                    <option value="reingreso">ReIngreso</option>
                  </x-adminlte-select2>
                </div>

                <div class="col-md-6">
                  <label class="form-label" for="multicol-sugerencia_DGAJ">Sugerencia DGAJ</label>
                  <input type="text" name="sugerencia_DGAJ" id="multicol-sugerencia_DGAJ" class="form-control" placeholder="Escribir la sugerencia " />
                </div>

                <div class="col-md-6">
                  <label class="form-label" for="multicol-obs_proced_DGAJ">Observaciones de procedencia</label>
                  <input type="text" name="obs_proced_DGAJ" id="multicol-obs_proced_DGAJ" class="form-control" value="{{old('obs_proced_DGAJ')}}" placeholder="Escribir observaciones de la procedencia" />
                </div>
                
                <div class="col-md-6">
                  <label class="form-label" for="multicol-fecha_mov_destDGAJ"> Fecha de Movimiento Pase</label>
                  <input type="date" name="fecha_mov_destDGAJ" id="multicol-fecha_mov_destDGAJ" class="form-control" value="{{old('fecha_mov_destDGAJ')}}" placeholder="Fecha de pase del expediente " />
                </div>


                <div class="col-md-6">
                <label class="form-label" for="multicol-destin_pase_DGAJ">Destino de Pase</label>
                  <x-adminlte-select2  name="destin_pase_DGAJ" value="{{old('destin_pase_DGAJ')}}"  class="select2 form-select" >
                    <option value="">Seleccionar la dependencia</option>
                    <option value="Asesoria Letrada">Asesoria Letrada</option>
                    <option value="D.S.C. N°1">D.S.C. N°1</option>
                    <option value="DESTACAMENTO">DESTACAMENTO</option>
                  </x-adminlte-select2>
                </div>

                <div class="col-md-6">
                  <label class="form-label" for="multicol-tipo_mov_pase_DGAJ">Tipo Movimiento Pase</label>
                  <x-adminlte-select2  name="tipo_mov_pase_DGAJ" value="{{old('tipo_mov_pase_DGAJ')}}" class="select2 form-select" >
                    <option value="">Seleccionar el tipo de movimiento</option>
                    <option value="salida">Salida</option>
                    <option value="ingreso">Ingreso</option>
                    <option value="reingreso">ReIngreso</option>
                  </x-adminlte-select2>
                </div>

                <div class="col-md-6">
                  <label class="form-label" for="multicol-obs_pase_DGAJ">Observaciones del pase</label>
                  <input type="text" name="obs_pase_DGAJ" id="multicol-obs_pase_DGAJ"value="{{old('obs_pase_DGAJ')}}"  class="form-control" placeholder="Escribir observaciones para el pase" />
                </div>

                <div class="col-md-6">
                  <label class="form-label" for="multicol-concluido_DGAJ">Concluido por Instruccion</label>
                  <x-adminlte-select2 name="concluido_DGAJ" value="{{old('concluido_DGAJ')}}"  class="select2 form-select" >
                    <option value="">Seleccione</option>
                    <option value="Si">Si</option>
                    <option value="No">No</option>
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
                  <x-adminlte-select2  name="dependen_AL" value="{{old('dependen_AL')}}" class="select2 form-select">
                    <option value="">Seleccionar la dependencia</option>
                    <option value="Asesoria Letrada">Asesoria Letrada</option>
                    <option value="D.S.C. N°1">D.S.C. N°1</option>
                    <option value="DESTACAMENTO">DESTACAMENTO</option>
                  </x-adminlte-select2>
                </div>

                <div class="col-md-6 select2-primary">
                  <label class="form-label" for="multicol-jerarquia_AL">Jerarquia</label>
                  <x-adminlte-select2  name="jerarquia_AL" value="{{old('jerarquia_AL')}}" class="select2 form-select">
                    <option value="">Seleccionar la jerarquia</option>
                    <option value="Agente">Agente</option>
                    <option value="Oficial ayudante">Oficial ayudante</option>
                    <option value="Comisario">Comisario</option>
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
              <label class="form-label" for="multicol-fecha_mov_procAL"> Fecha de Movimiento Procedencia</label>
              <input type="date" name="fecha_mov_procAL" id="multicol-fecha_mov_procAL" class="form-control" value="{{old('fecha_mov_procAL')}}" placeholder="Fecha de pase del expediente " />
            </div>

            <div class="col-md-6">
              <label class="form-label" for="multicol-destin_proceden_AL">Destino de Procedencia</label>
              <x-adminlte-select2  name="destin_proceden_AL" value="{{old('destin_proceden_AL')}}" class="select2 form-select" >
                <option value="">Seleccionar la dependencia</option>
                <option value="Direccion General de Asuntos Judiciales">Direccion General de Asuntos Judiciales</option>
                <option value="D.S.C. N°1">D.S.C. N°1</option>
                <option value="DESTACAMENTO">DESTACAMENTO</option>
              </x-adminlte-select2>
            </div>

            <div class="col-md-6">
              <label class="form-label" for="multicol-tipo_mov_proce_AL">Tipo Movimiento Procedencia</label>
              <x-adminlte-select2 name="tipo_mov_proce_AL" class="select2 form-select" value="{{old('tipo_mov_proce_AL')}}" >
                <option value="">Seleccionar el tipo de movimiento</option>
                <option value="salida">Salida</option>
                <option value="ingreso">Ingreso</option>
                <option value="reingreso">ReIngreso</option>
              </x-adminlte-select2>
            </div>

            <div class="col-md-6">
              <label class="form-label" for="multicol-sugerencia_AL">Sugerencia</label>
              <input type="text" name="sugerencia_AL" id="multicol-sugerencia_AL" class="form-control" value="{{old('sugerencia_AL')}}" placeholder="Escribir la sugerencia " />
            </div>

            <div class="col-md-6">
              <label class="form-label" for="multicol-obs_proced_AL">Observaciones de procedencia</label>
              <input type="text" name="obs_proced_AL" id="multicol-obs_proced_AL" class="form-control" value="{{old('obs_proced_AL')}}" placeholder="Escribir observaciones de la procedencia" />
            </div>
          
            <div class="col-md-6">
              <label class="form-label" for="multicol-fecha_mov_paseAL"> Fecha de Movimiento Pase</label>
              <input type="date" name="fecha_mov_paseAL" id="multicol-fecha_mov_paseAL" value="{{old('fecha_mov_paseAL')}}" class="form-control" placeholder="Fecha de pase del expediente " />
            </div>

            <div class="col-md-6">
              <label class="form-label" for="multicol-destin_pase_AL">Destino de Pase</label>
              <x-adminlte-select2  name="destin_pase_AL" value="{{old('destin_pase_AL')}}" class="select2 form-select">
                <option value="">Seleccionar la dependencia</option>
                <option value="Direccion General Recursos Humanos">Direccion General Recursos Humanos</option>
                <option value="D.S.C. N°1">D.S.C. N°1</option>
                <option value="DESTACAMENTO">DESTACAMENTO</option>
              </x-adminlte-select2>
            </div>

            <div class="col-md-6">
              <label class="form-label" for="multicol-tipo_mov_pase_AL">Tipo Movimiento Pase</label>
              <x-adminlte-select2  name="tipo_mov_pase_AL" value="{{old('tipo_mov_pase_AL')}}" class="select2 form-select" >
                <option value="">Seleccionar el tipo de movimiento</option>
                <option value="salida">Salida</option>
                <option value="ingreso">Ingreso</option>
                <option value="reingreso">ReIngreso</option>
              </x-adminlte-select2>
            </div>

            <div class="col-md-6">
              <label class="form-label" for="multicol-obs_pase_AL">Observaciones del pase</label>
              <input type="text" name="obs_pase_AL" id="multicol-obs_pase_AL" value="{{old('obs_pase_AL')}}" class="form-control" placeholder="Escribir observaciones para el pase" />
            </div>

            <div class="col-md-6">
              <label class="form-label" for="multicol-concluido_AL">Concluido por Instruccion</label>
              <x-adminlte-select2  name="concluido_AL" value="{{old('concluido_AL')}}" class="select2 form-select">
                <option value="">Seleccione</option>
                <option value="Si">Si</option>
                <option value="No">No</option>
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
              <x-adminlte-select2  name="dependen_DGRRHH" value="{{old('dependen_DGRRHH')}}" class="select2 form-select" >
                <option value="">Seleccionar la dependencia</option>
                <option value="Direccion General de Recursos Humanos">Direccion General de Recursos Humanos</option>
                <option value="D.S.C. N°1">D.S.C. N°1</option>
                <option value="DESTACAMENTO">DESTACAMENTO</option>
              </x-adminlte-select2>
            </div>

            <div class="col-md-6 select2-primary">
              <label class="form-label" for="multicol-jerarquia_DGRRHH">Jerarquia</label>
              <x-adminlte-select2  name="jerarquia_DGRRHH" value="{{old('jerarquia_DGRRHH')}}" class="select2 form-select" >
                <option value="">Seleccionar la jerarquia</option>
                <option value="Agente">Agente</option>
                <option value="Oficial ayudante">Oficial ayudante</option>
                <option value="Comisario">Comisario</option>
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
                <label class="form-label" for="multicol-fecha_mov_proceDGRRHH"> Fecha de Movimiento Procedencia</label>
                <input type="date" name="fecha_mov_proceDGRRHH" id="multicol-fecha_mov_proceDGRRHH" value="{{old('fecha_mov_proceDGRRHH')}}" class="form-control" placeholder="Fecha de pase del expediente " />
              </div>

              <div class="col-md-6">
                <label class="form-label" for="multicol-destin_proceden_DGRRHH">Destino de Procedencia</label>
                <x-adminlte-select2  name="destin_proceden_DGRRHH" value="{{old('destin_proceden_DGRRHH')}}" class="select2 form-select">
                  <option value="">Seleccionar la dependencia</option>
                  <option value="Asesoria Letrada">Asesoria Letrada</option>
                  <option value="D.S.C. N°1">D.S.C. N°1</option>
                  <option value="DESTACAMENTO">DESTACAMENTO</option>
                </x-adminlte-select2>
              </div>

              <div class="col-md-6">
              <label class="form-label" for="multicol-tipo_mov_proce_DGRRHH">Tipo Movimiento Procedencia</label>
                <x-adminlte-select2 name="tipo_mov_proce_DGRRHH" value="{{old('tipo_mov_proce_DGRRHH')}}" class="select2 form-select" >
                  <option value="">Seleccionar el tipo de movimiento</option>
                  <option value="salida">Salida</option>
                  <option value="ingreso">Ingreso</option>
                  <option value="reingreso">ReIngreso</option>
                </x-adminlte-select2>
              </div>

              <div class="col-md-6">
                <label class="form-label" for="multicol-resol_final_DGRRHH">Resolucion Final</label>
                <input type="text" name="resol_final_DGRRHH" id="multicol-resol_final_DGRRHH" value="{{old('resol_final_DGRRHH')}}" class="form-control" placeholder="Escribir la sugerencia " />
              </div>

              <div class="col-md-6">
                <label class="form-label" for="multicol-observaciones">Observaciones de procedencia</label>
                <input type="text" name="observaciones" id="multicol-observaciones" class="form-control" value="{{old('observaciones')}}" placeholder="Escribir observaciones de la procedencia" />
              </div>
            
              <div class="col-md-6">
                <label class="form-label" for="multicol-fecha_mov_paseDGRRHH"> Fecha de Movimiento Pase</label>
                <input type="date" name="fecha_mov_paseDGRRHH" id="multicol-fecha_mov_paseDGRRHH" value="{{old('fecha_mov_paseDGRRHH')}}" class="form-control" placeholder="Fecha de pase del expediente " />
              </div>

              <div class="col-md-6">
              <label class="form-label" for="multicol-destin_pase_DGRRHH">Destino de Pase</label>
                <x-adminlte-select2 name="destin_pase_DGRRHH" value="{{old('destin_pase_DGRRHH')}}" class="select2 form-select" >
                  <option value="">Seleccionar la dependencia</option>
                  <option value="Secretaria">Secretaria</option>
                  <option value="D.S.C. N°1">D.S.C. N°1</option>
                  <option value="DESTACAMENTO">DESTACAMENTO</option>
                </x-adminlte-select2>
              </div>

              <div class="col-md-6">
              <label class="form-label" for="multicol-tipo_mov_pase_DGRRHH">Tipo Movimiento Pase</label>
                <x-adminlte-select2  name="tipo_mov_pase_DGRRHH" value="{{old('tipo_mov_pase_DGRRHH')}}" class="select2 form-select">
                  <option value="">Seleccionar el tipo de movimiento</option>
                  <option value="salida">Salida</option>
                  <option value="ingreso">Ingreso</option>
                  <option value="reingreso">ReIngreso</option>
                </x-adminlte-select2>
              </div>

              <div class="col-md-6">
                <label class="form-label" for="multicol-obs_pase_DGRRHH">Observaciones del pase</label>
                <input type="text" name="obs_pase_DGRRHH" id="multicol-obs_pase_DGRRHH" value="{{old('obs_pase_DGRRHH')}}" class="form-control" placeholder="Escribir observaciones para el pase" />
              </div>

              <div class="col-md-6">
                <label class="form-label" for="multicol-concluido_DGRRHH">Concluido por Instruccion</label>
                <x-adminlte-select2  name="concluido_DGRRHH" value="{{old('concluido_DGRRHH')}}" class="select2 form-select">
                  <option value="">Seleccione</option>
                  <option value="Si">Si</option>
                  <option value="No">No</option>
                </x-adminlte-select2>
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