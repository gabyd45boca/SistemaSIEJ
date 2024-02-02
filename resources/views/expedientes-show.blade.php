@extends('adminlte::page')

@section('title', 'SIEJ')

@section('content_header')
    <h1 class="m-0 text-dark">Mostrar Expediente</h1>
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

        <h6 class="fw-normal">1. Datos del expediente</h6>
    <div class="row g-3">
    
            <div class="col-md-6">
                <label class="form-label" for="multicol-num_orden_exp"> N° Orden</label>
                <span class="form-control" id="multicol-num_orden_exp">{{ $expediente-> num_orden_exp}}</span>
            </div>
           
            <div class="col-md-6">
                <label class="form-label" for="multicol-fecha_ingreso_exp"> Fecha de ingreso</label>
                <span class="form-control" id="multicol-fecha_ingreso_exp">{{ $expediente-> fecha_ingreso_exp}}</span>
            </div>
            
            <div class="col-md-6">
                <label class="form-label" for="multicol-origen_exp">Origen</label>
                <span class="form-control" id="multicol-origen_exp">{{ $expediente-> origen_exp}}</span>
            </div>

            <div class="col-md-6">
                 <label class="form-label" for="multicol-tipo_exp">Tipo</label>
                 <span class="form-control" id="multicol-tipo_exp">{{ $expediente-> tipo_exp}}</span>
            </div>

            <div class="col-md-6">
                <label class="form-label" for="multicol-fojas_exp">Fojas</label>
                <span class="form-control" id="multicol-fojas_exp">{{ $expediente-> fojas_exp}}</span>
            </div>

            <div class="col-md-6">
                <label class="form-label" for="multicol-procedencia_exp">Procedencia</label>
                <span class="form-control" id="multicol-procedencia_exp">{{ $expediente-> procedencia_exp}}</span>
            </div>

            <div class="col-md-6">
                <label class="form-label" for="multicol-iniciador_exp">Iniciador</label>
                <span class="form-control" id="multicol-iniciador_exp">{{ $expediente-> iniciador_exp}}</span>
            </div>

            <div class="col-md-6">
                <label class="form-label" for="multicol-extracto_exp">Extracto</label>
                <span class="form-control" id="multicol-extracto_exp">{{ $expediente-> extracto_exp}}</span>
            </div>

            <div class="col-md-6">
                <label class="form-label" for="multicol-fecha_salida_exp"> Fecha de salida</label>
                <span class="form-control" id="multicol-fecha_salida_exp">{{ $expediente-> fecha_salida_exp}}</span>
            </div>

            <div class="col-md-6">
                <label class="form-label" for="multicol-destino_exp">Destino</label>
                <span class="form-control" id="multicol-destino_exp">{{ $expediente-> destino_exp}}</span>
            </div>
                         
            <div class="col-md-6">
                <label class="form-label" for="multicol-observaciones_exp">Observaciones</label>
                <span class="form-control" id="multicol-observaciones_exp">{{ $expediente-> observaciones_exp}}</span>
            </div>
  
              
    </div>

    
    <div class="pt-4">
        <button type="button" class="btn btn-secondary" onClick="location.href='/expedientes'">Volver</button>
    </div>
  </form>
</div>
   
@endsection
