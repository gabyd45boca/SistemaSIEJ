@extends('adminlte::page')

@section('title', 'SIEJ')

@section('content_header')
    <h1 class="m-0 text-dark">USUARIOS Y ROLES</h1>
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
             
               <p>{{$user->name}}</p>    
            </div>
            <div class="card-body">
                <h5 class="fw-normal">Lista de roles</h5>
                    {!! Form::model($user, ['route' => ['asignar.update', $user],'method'=>'put']) !!}
                        @foreach  ($roles as $role)
                        <div >
                            <label> 
                                {!! Form::checkbox ('roles[]', $role->id, $user->hasAnyRole($role->id) ? : false , ['class'=>'mr-1']) !!}
                                {{$role->name}}
                            </label>
                        </div>

                        @endforeach
                        {!! Form::submit('Asignar Roles',['class'=>'btn btn-primary mt-3']) !!}
                        <a href="{{url('/usuarios')}}" class="btn btn-secondary mt-3">Volver</a>
                    {!! Form::close() !!}          
            </div>
        </div>
   
   
</div>
   
@endsection

