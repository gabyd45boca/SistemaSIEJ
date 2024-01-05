@extends('adminlte::page')

@section('title', 'SIEJ')

@section('content_header')
    <h1 class="m-0 text-dark">Registrar Expediente</h1>
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
  <form method= "POST" action="{{ route ('expedientes.store')}}" class="card-body">
        @csrf
      

        <h6 class="fw-normal">1. Carga de datos del expediente</h6>
    <div class="row g-3">
    
            <div class="col-md-6">
                <label class="form-label" for="multicol-num_orden_exp"> N° Orden</label>
                <input type="text" name="num_orden_exp"  id="multicol-num_orden_exp" class="form-control" value="{{old('num_orden_exp')}}" placeholder="Escribir el N° de Orden del expediente"/> 
            </div>
           
            <div class="col-md-6">
                <label class="form-label" for="multicol-origen_exp"> Fecha de ingreso</label>
                <input type="date" name="fecha_ingreso_exp"  id="multicol-fecha_ingreso_exp" class="form-control" value="{{old('fecha_ingreso_exp')}}" placeholder="Escribir la fecha de ingreso del expediente" required/>
            </div>
            
            <div class="col-md-6">
                <label class="form-label" for="multicol-origen_exp">Origen</label>
                <input type="text" name="origen_exp" id="multicol-origen_exp" class="form-control" value="{{old('origen_exp')}}" placeholder="Escribir el origen del expediente" required/>
            </div>

            <div class="col-md-6">
                 <label class="form-label" for="multicol-tipo_exp">Tipo</label>
                <x-adminlte-select2  name="tipo_exp" class="select2 form-select" value="{{old('tipo_exp')}}">
                    <option value="">Seleccionar el tipo de expediente</option>
                    <option value="Comparendo">Comparendo</option>
                    <option value="Denuncia">Denuncia</option>
                    <option value="Oficio">Oficio</option>
                    <option value="Exposicion">Exposicion</option>
                    <option value="Otro">Otro</option>
                </x-adminlte-select2>
            </div>

            <div class="col-md-6">
                <label class="form-label" for="multicol-fojas_exp">Fojas</label>
                <input type="text" name="fojas_exp"  id="multicol-fojas_exp" class="form-control" value="{{old('fojas_exp')}}" placeholder="Cantidad de fojas del expediente" required/>
            </div>

            <div class="col-md-6">
                <label class="form-label" for="multicol-procedencia_exp">Procedencia</label>
                <x-adminlte-select2  name="procedencia_exp" class="select2 form-select" value="{{old('procedencia_exp')}}" >
                    <option value="">Seleccionar la dependencia de procedencia</option>
                    <option value="Comisaria comunitaria N° 5">Comisaria comunitaria N° 5</option>
                    <option value="D.S.C. N°1">D.S.C. N°1</option>
                    <option value="Destacamento">Destacamento</option>
                </x-adminlte-select2>
            </div>

            <div class="col-md-6">
                <label class="form-label" for="multicol-iniciador_exp">Iniciador</label>
                <input type="text" name="iniciador_exp"  id="multicol-iniciador_exp" class="form-control" value="{{old('iniciador_exp')}}" placeholder="Escribir el iniciador del expediente" required/>
            </div>

            <div class="col-md-6">
                <label class="form-label" for="multicol-extracto_exp">Extracto</label>
                <input type="text" name="extracto_exp"  id="multicol-extracto_exp" class="form-control" value="{{old('extracto_exp')}}" placeholder="Escribir el extracto" required/>
            </div>

            <div class="col-md-6">
                <label class="form-label" for="multicol-fecha_salida_exp"> Fecha de salida</label>
                <input type="date" name="fecha_salida_exp"  id="multicol-fecha_salida_exp" class="form-control" value="{{old('fecha_salida_exp')}}" placeholder="Escribir fecha de salida" required/>
            </div>

            <div class="col-md-6">
                <label class="form-label" for="multicol-destino_exp">Destino</label>
                <x-adminlte-select2  name="destino_exp"  class="select2 form-select" value="{{old('destino_exp')}}">
                    <option value="">Seleccionar la dependencia de destino</option>
                    <option value="Comisaria comunitaria N° 5">Comisaria comunitaria N° 5</option>
                    <option value="D.S.C. N°1">D.S.C. N°1</option>
                    <option value="Destacamento">Destacamento</option>
                </x-adminlte-select2>
            </div>
                         
            <div class="col-md-6">
                <label class="form-label" for="multicol-observaciones_exp">Observaciones</label>
                <input type="text" name="observaciones_exp" id="multicol-observaciones_exp" class="form-control" value="{{old('observaciones_exp')}}" placeholder="Escribir la observacion del expediente" />
            </div>
  
              
    </div>

    
    <div class="pt-4">
    <button type="submit" class="btn btn-primary me-sm-3 me-1">Guardar</button>
    <button type="button" class="btn btn-secondary" onClick="location.href='/expedientes'">Cancelar</button>
    </div>
  </form>
</div>
   
@endsection
