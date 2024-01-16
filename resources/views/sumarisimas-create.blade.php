@extends('adminlte::page')

@section('title', 'SIEJ')

@section('content_header')
    <h1 class="m-0 text-dark">Registrar Sumarisima</h1>
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
    
<form method= "POST" action="{{ route ('sumarisimas.store')}}" class="card-body">
        @csrf
        <h4 class="fw-normal">1. Carga de datos del expediente</h4>
    <div class="row g-3">
    
            <div class="col-md-6">
                <label class="form-label" for="num_dj"> N° DJ</label>
                <input type="text" name="num_dj" id="num_dj" class="form-control" placeholder="Numero de DJ" value="{{old('num_dj')}}" required/>
            </div>

            <div class="col-md-6">
                <label class="form-label" for="multicol-username"> Fecha de ingreso</label>
                <input type="date" name="fecha_ingreso" id="multicol-fecha_ingreso" class="form-control" value="{{old('fecha_ingreso')}}" placeholder="Fecha de inicio de actuaciones " required/>
            </div>

            <div class="col-md-6">
                <label class="form-label" for="multicol-fojas">Fojas</label>
                <input type="text" name="fojas" id="multicol-fojas" class="form-control" value="{{old('fojas')}}" placeholder="Cantidad de fojas" required/>
            </div>

            <div class="col-md-6">
                 <label class="form-label" for="multicol-tipo_denuncia">Tipo de denuncia</label>
                <x-adminlte-select2  name="tipo_denuncia" class="select2 form-select" value="{{old('tipo_denuncia')}}" required>
                    <option value="">Seleccionar el tipo</option>
                    <option value="Comparendo">Comparendo</option>
                    <option value="Denuncia">Denuncia</option>
                    <option value="Oficio">Oficio</option>
                    <option value="Exposicion">Exposicion</option>
                    <option value="Otro">Otro</option>
                </x-adminlte-select2>
            </div>

            <div class="col-md-6">
                 <label class="form-label" for="multicol-motivo">Motivo</label >
                <x-adminlte-select2  name="motivo" class="select2 form-select" required >
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
                <label class="form-label" for="multicol-destino_proced">Destino de Procedencia</label>
                <x-adminlte-select2  name="destino_proced" class="select2 form-select" required>
                    <option value="">Seleccionar la dependencia</option>
                    <option value="Comisaria Comunitaria">Comisaria Comunitaria</option>
                    <option value="Departamental">Departamental</option>
                    <option value="Destacamento">Destacamento</option>
                </x-adminlte-select2>
            </div>
            
    </div>
    <hr class="my-4 mx-n4"/>
    <h6 class="fw-normal">2. Carga de datos del personal infractor</h6>
            <div class="row g-3">

                <div class="col-md-12">
                    <label class="form-label" for="multicol-apellido_nombre_inf">Apellido y Nombres</label>
                    <x-adminlte-select  name="apellido_nombre_inf[]" id="apellido_nombre_inf" class="form-control selectpicker" title="Seleccionar infractores" data-style="btn-primary" multiple required>
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
    <h6 class="fw-normal">3. Carga de datos del personal instructor de la Division de Asuntos Legales</h6>
           <div class="row g-3">
    
                <div class="col-md-6">
                    <label class="form-label" for="multicol-apellido_nombre_AL">Apellido y Nombres</label>
                    <input type="text" name="apellido_nombre_AL" id="multicol-apellido_nombre_AL" class="form-control" placeholder="Escribir el apellido y nombres"/>
                </div>
                
                               
                <div class="col-md-6">
                    <label class="form-label" for="multicol-leg_pers_AL">Legajo Personal</label>
                    <input type="text" name="leg_pers_AL" id="multicol-leg_pers_AL" class="form-control" placeholder="Escribir el legajo personal" />
                </div>

                <div class="col-md-6">
                    <label class="form-label" for="multicol-dependen_AL">Dependencia</label>
                    <x-adminlte-select2  name="dependen_AL" class="select2 form-select">
                        <option value="">Seleccionar la dependencia</option>
                        <option value="Comisaria comunitaria N° 5">Comisaria comunitaria N° 5</option>
                        <option value="D.S.C. N°1">D.S.C. N°1</option>
                        <option value="Destacamento">Destacamento</option>
                    </x-adminlte-select2>
                </div>

                <div class="col-md-6 select2-primary">
                <label class="form-label" for="multicol-jerarquia_AL">Jerarquia</label>
                    <x-adminlte-select2 name="jerarquia_AL" class="select2 form-select">
                        <option value="">Seleccionar la jerarquia</option>
                        <option value="Agente">Agente</option>
                        <option value="Oficial ayudante">Oficial ayudante</option>
                        <option value="Comisario">Comisario</option>
                    </x-adminlte-select2>
                </div>

            </div> 

    <hr class="my-4 mx-n4" />
    <h6 class="fw-normal">4. Carga de movimientos y sugerencias del instructor de la Division de Asuntos Legales</h6>
          <div class="row g-3">

                <div class="col-md-6">
                    <label class="form-label" for="multicol-fecha_mov"> Fecha de Movimiento</label>
                    <input type="date" name="fecha_mov" id="multicol-fecha_mov" class="form-control" placeholder="Fecha de pase del expediente " />
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="multicol-destino_pase">Destino de Pase</label>
                    <x-adminlte-select2  name="destino_pase" class="select2 form-select" >
                    <option value="">Seleccionar la dependencia</option>
                    <option value="Comisaria comunitaria N° 5">Comisaria comunitaria N° 5</option>
                    <option value="D.S.C. N°1">D.S.C. N°1</option>
                    <option value="Destacamento">Destacamento</option>
                    </x-adminlte-select2>
                </div>
                <div class="col-md-6">
                <label class="form-label" for="multicol-primera_interv">PRIMERA INTERVENCION</label>
                    <input type="text" name="primera_interv" id="multicol-primera_interv" class="form-control" placeholder="Escribir la sugerencia " />
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="multicol-tipo_mov">Tipo Movimiento</label>
                    <x-adminlte-select2 name="tipo_mov" class="select2 form-select">
                    <option value="">Seleccionar el tipo de movimiento</option>
                    <option value="Salida">Salida</option>
                    <option value="Ingreso">Ingreso</option>
                    <option value="ReIngreso">ReIngreso</option>
                    </x-adminlte-select2>

                </div>
                
                <div class="col-md-6">
                    <label class="form-label" for="multicol-observaciones">OBSERVACIONES</label>
                    <input type="text" name="observaciones" id="multicol-observaciones" class="form-control" placeholder="Escribir la observacion" />
                </div>
                <div class="col-md-6">
                <label class="form-label" for="multicol-fecha_reingreso"> FECHA DE REINGRESO</label>
                    <input type="date" name="fecha_reingreso" id="multicol-fecha_reingreso" class="form-control" placeholder="Fecha de reingreso " />
                </div>

                <div class="col-md-6">
                    <label class="form-label" for="multicol-opinion_final">OPINION FINAL</label>
                    <input type="text" name="opinion_final" id="multicol-opinion_final" class="form-control" placeholder="Escribir la sugerencia " />
                </div>
                <div class="col-md-6">
                <label class="form-label" for="multicol-fecha_egreso"> FECHA DE EGRESO</label>
                    <input type="date" name="fecha_egreso" id="multicol-fecha_egreso" class="form-control" placeholder="Fecha de reingreso " />
                </div>
                
            </div>

    
    <div class="pt-4">
    <button type="submit" class="btn btn-primary me-sm-3 me-1">Guardar</button>
    <button type="button" class="btn btn-secondary" onClick="location.href='/sumarisimas'">Cancelar</button>
    </div>
</form>
  
@endsection

@section('scripts')
<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
@endsection
