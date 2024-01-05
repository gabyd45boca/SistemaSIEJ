@extends('adminlte::page')

@section('title', 'SIEJ')

@section('content_header')
    <h1 class="m-0 text-dark">Agregar Rol</h1>
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
  <form method= "POST" action="{{ route ('roles.store')}}" class="card-body">
        @csrf
      

        <h6 class="fw-normal">1.Registro del rol</h6>
    <div class="row g-3">
    
            <div class="col-md-6">
                <label class="form-label" for="multicol-name">Nombre</label>
                <input type="text" name="name"  id="multicol-name" class="form-control" value="{{old('name')}}" placeholder="Escribir el nombre del rol"/> 
            </div>
                   
    </div>

    <div class="pt-4">
    <button type="submit" class="btn btn-primary me-sm-3 me-1">Guardar</button>
    <button type="button" class="btn btn-secondary" onClick="location.href='/roles'">Cancelar</button>
    </div>
  </form>
</div>
   
@endsection
