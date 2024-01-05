@extends('adminlte::page')

@section('title', 'SIEJ')

@section('content_header')
    <h1 class="m-0 text-dark">ROLES Y PERMISOS</h1>
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
  
        <div class="card">
        
            <div class="card-header">
            
               <p>{{$role->name}}</p>    
            </div>
            <div class="card-body">
                <h5 class="fw-normal">Lista de permisos</h5>
                    {!! Form::model($role, ['route' => ['roles.update', $role],'method'=>'put']) !!}
                        @foreach  ($permisos as $permiso)
                        <div >
                            <label> 
                                {!! Form::checkbox ('permisos[]', $permiso->id, $role->hasPermissionTo($permiso->id) ? : false , ['class'=>'mr-1']) !!}
                                {{$permiso->name}}
                            </label>
                        </div>

                        @endforeach
                        {!! Form::submit('Asignar Permisos',['class'=>'btn btn-primary mt-3']) !!}
                        <a href="{{url('/roles')}}" class="btn btn-secondary mt-3">Volver</a>
                    {!! Form::close() !!}
                              
            </div>
        </div>
   
   
</div>
   
@endsection

