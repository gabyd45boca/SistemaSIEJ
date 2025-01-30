@extends('adminlte::page')

@section('title', 'SIEJ')

@section('content_header')
    <h1 class="m-0 text-dark">Registrar Dependencia</h1>
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
  <form method="POST" action="{{ route ('dependencias.store')}}" class="card-body">
       @csrf
              
          <hr class="my-4 mx-n4" />
          <h6 class="fw-normal">1. Carga de datos de la dependencia</h6>
          <div class="row g-3">
            
            <div class="col-md-6">
              <label class="form-label" for="multicol-nombre_dep">Nombre de Dependencia</label>
              <input type="text" name="nombre_dep" id="multicol-nombre_dep" class="form-control" value="{{old('nombre_dep')}}" placeholder="Escribir el nombre de la dependencia"/>
            </div>

            <div class="col-md-6">
              <label class="form-label" for="multicol-departamental_dep">Numero de Departamental</label>
              <input type="text" name="departamental_dep" id="multicol-departamental_dep" class="form-control" value="{{old('departamental_dep')}}" placeholder="Escribir el numero de la departamental"/>
            </div>
          
          </div>

          <div class="pt-4">
              <button type="submit" class="btn btn-primary me-sm-3 me-1">Guardar</button>
              <button type="button" class="btn btn-secondary" onClick="location.href='/dependencias'">Cancelar</button>
          </div>
   </form>

  </div>

   
@endsection

