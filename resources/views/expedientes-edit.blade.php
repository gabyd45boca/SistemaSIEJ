@extends('adminlte::page')

@section('title', 'SIEJ')

@section('content_header')
    <h1 class="m-0 text-dark">Editar Expediente</h1>
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
  <form method= "POST" action="{{ route ('expedientes.update')}}" class="card-body">
        @csrf

        <x-adminlte-input type="hidden" name="expediente_id" value="{{$expediente->id}}"/> 

        <h6 class="fw-normal">1. Carga de datos del expediente</h6>
    <div class="row g-3">
    
            <div class="col-md-6">
                <label class="form-label" for="multicol-num_orden_exp"> N° Orden</label>
                <input type="text" name="num_orden_exp" value="{{ $expediente-> num_orden_exp }}" id="multicol-num_orden_exp" class="form-control" placeholder="Escribir el N° de Orden del expediente"/> 
            </div>
           
            <div class="col-md-6">
                <label class="form-label" for="multicol-origen_exp"> Fecha de ingreso</label>
                <input type="date" name="fecha_ingreso_exp" value="{{ $expediente-> fecha_ingreso_exp }}" id="multicol-fecha_ingreso_exp" class="form-control" placeholder="Escribir la fecha de ingreso del expediente" required/>
            </div>
           
          
            <div class="col-md-6">
                <label class="form-label" for="multicol-origen_exp">Origen</label>
                <select name="origen_exp" class="form-control" id="multicol-origen_exp">
                    <option value="">Seleccionar la dependencia de procedencia</option>
                    @foreach($dependencias as $dependencia)
                        <option value="{{ $dependencia->nombre_dep }}" {{ $expediente->origen_exp == $dependencia->nombre_dep ? 'selected' : '' }}>
                            {{ $dependencia->nombre_dep }}
                        </option>
                    @endforeach
                </select>
            </div>


            <div class="col-md-6">
                <label class="form-label" for="multicol-tipo_exp">Tipo de Denuncia</label>
                <x-adminlte-select2 name="tipo_exp" required>
                    <option value="">Seleccionar el tipo</option>
                    @foreach($tipo_denuncias as $tipo_denuncia)
                        <option value="{{ $tipo_denuncia->nombre_tipoDen }}" {{ $expediente->tipo_exp == $tipo_denuncia->nombre_tipoDen ? 'selected' : '' }}>
                            {{ $tipo_denuncia->nombre_tipoDen}}
                        </option>
                    @endforeach
                </x-adminlte-select2>
            </div>

            <div class="col-md-6">
                <label class="form-label" for="multicol-fojas_exp">Fojas</label>
                <input type="text" name="fojas_exp" value="{{ $expediente-> fojas_exp}}" id="multicol-fojas_exp" class="form-control" placeholder="Cantidad de fojas del expediente" required/>
            </div>

            <div class="col-md-6">
                <label class="form-label" for="multicol-procedencia_exp">Procedencia</label>
                <select name="procedencia_exp" class="form-control" id="multicol-procedencia_exp">
                    <option value="">Seleccionar la dependencia de procedencia</option>
                    @foreach($dependencias as $dependencia)
                        <option value="{{ $dependencia->nombre_dep }}" {{ $expediente->procedencia_exp == $dependencia->nombre_dep ? 'selected' : '' }}>
                            {{ $dependencia->nombre_dep }}
                        </option>
                    @endforeach
                </select>
            </div>


            <div class="col-md-6">
                <label class="form-label" for="multicol-iniciador_exp">Iniciador</label>
                <input type="text" name="iniciador_exp" value="{{ $expediente-> iniciador_exp}}" id="multicol-iniciador_exp" class="form-control" placeholder="Escribir el iniciador del expediente" required/>
            </div>

            <div class="col-md-6">
                <label class="form-label" for="multicol-extracto_exp">Extracto</label>
                <input type="text" name="extracto_exp" value="{{ $expediente-> extracto_exp}}" id="multicol-extracto_exp" class="form-control" placeholder="Escribir el extracto" required/>
            </div>

            <div class="col-md-6">
                <label class="form-label" for="multicol-fecha_salida_exp"> Fecha de salida</label>
                <input type="date" name="fecha_salida_exp" value="{{ $expediente-> fecha_salida_exp}}" id="multicol-fecha_salida_exp" class="form-control" placeholder="Escribir fecha de salida" required/>
            </div>
          

            <div class="col-md-6">
                <label class="form-label" for="multicol-destino_exp">Destino</label>
                <select name="destino_exp" class="form-control" id="multicol-destino_exp">
                    <option value="">Seleccionar la dependencia de procedencia</option>
                    @foreach($dependencias as $dependencia)
                        <option value="{{ $dependencia->nombre_dep }}" {{ $expediente->destino_exp == $dependencia->nombre_dep ? 'selected' : '' }}>
                            {{ $dependencia->nombre_dep }}
                        </option>
                    @endforeach
                </select>
            </div>

                         
            <div class="col-md-6">
                <label class="form-label" for="multicol-observaciones_exp">Observaciones</label>
                <input type="text" name="observaciones_exp" value="{{ $expediente-> observaciones_exp}}" id="multicol-observaciones_exp" class="form-control" placeholder="Escribir la observacion del expediente" />
            </div>
  
              
    </div>

    
    <div class="pt-4">
        <button type="submit" class="btn btn-primary me-sm-3 me-1">Guardar</button>
        <button type="button" class="btn btn-secondary" onClick="location.href='/expedientes'">Cancelar</button>
    </div>
  </form>
</div>
   
@endsection
