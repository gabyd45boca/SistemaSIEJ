@extends('adminlte::page')

@section('title', 'SIEJ')

@section('content_header')
    <h1 class="m-0 text-dark">Mostrar Dependencia</h1>
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
      <form method= "POST" action="{{ route ('dependencias.update')}}" class="card-body">
              @csrf

              <x-adminlte-input type="hidden" name="dependencia_id" value="{{ $dependencias->id}}"/> 
                            
                  <hr class="my-4 mx-n4" />
                  <h6 class="fw-normal">1. Datos de la Dependencia</h6>
                  <div class="row g-3">
                    
                      <div class="col-md-6">
                        <label class="form-label" for="multicol-nombre_dep">Nombre de Dependencia</label>
                        <span class="form-control" id="multicol-nombre_dep">{{ $dependencias-> nombre_dep}}</span>
                      </div>

                      <div class="col-md-6">
                        <label class="form-label" for="multicol-departamental_dep">Numero de Departamental</label>
                        <span class="form-control" id="multicol-departamental_dep">{{ $dependencias-> departamental_dep}}</span>
                      </div>
                  
                  </div>

                  <div class="pt-4">
                    
                      <button type="button" class="btn btn-secondary" onClick="location.href='/dependencias'">Volver</button>
                  </div>
      </form>

  </div>
@endsection


