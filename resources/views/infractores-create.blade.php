@extends('adminlte::page')

@section('title', 'SIEJ')

@section('content_header')
    <h1 class="m-0 text-dark">Registrar Infractor</h1>
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
  <form method="POST" action="{{ route ('infractores.store')}}" class="card-body">
       @csrf
              
          <hr class="my-4 mx-n4" />
          <h6 class="fw-normal">1. Carga de datos del personal infractor</h6>
          <div class="row g-3">
            
            <div class="col-md-6">
              <label class="form-label" for="multicol-apellido_inf">Apellido</label>
              <input type="text" name="apellido_inf" id="multicol-apellido_inf" class="form-control" value="{{old('apellido_inf')}}" placeholder="Escribir el apellido"/>
            </div>

            <div class="col-md-6">
              <label class="form-label" for="multicol-nombre_inf">Nombres</label>
              <input type="text" name="nombre_inf" id="multicol-nombre_inf" class="form-control" value="{{old('nombre_inf')}}" placeholder="Escribir los nombres"/>
            </div>
                           
            <div class="col-md-6">
              <label class="form-label" for="multicol-leg_pers_inf">Legajo Personal</label>
              <input type="text" name= "leg_pers_inf" id="multicol-leg_pers_inf" value="{{old('leg_pers_inf')}}" class="form-control" placeholder="Escribir el legajo personal" />
            </div>
         
            <div class="col-md-6">
                <label class="form-label" for="multicol-dependen_inf">Dependencia</label>
                <x-adminlte-select2 name="dependen_inf">
                    <option value="">Seleccionar la dependencia</option>
                    @foreach($dependencias as $dependencia)
                        <option value="{{ $dependencia->nombre_dep }}" {{ old('dependen_inf') == $dependencia->nombre_dep ? 'selected' : '' }}>
                            {{ $dependencia->nombre_dep }}
                        </option>
                    @endforeach
                </x-adminlte-select2>
            </div>

            <div class="col-md-6 select2-primary">
                    <label class="form-label" for="multicol-jerarquia_inf">Jerarquía</label>
                    <x-adminlte-select2 name="jerarquia_inf" class="select2 form-select">
                        <option value="">Seleccionar la jerarquía</option>
                        @foreach($jerarquias as $jerarquia)
                            <option value="{{ $jerarquia->nombre_jer }}" {{ old('jerarquia_inf') == $jerarquia->nombre_jer ? 'selected' : '' }}>
                                {{ $jerarquia->nombre_jer }}
                            </option>
                        @endforeach
                    </x-adminlte-select2>
            </div>

            <div class="col-md-6">
              <label class="form-label" for="multicol-retirado">Retirado</label>
              <x-adminlte-select2  name="retirado" value="{{old('retirado')}}">
                <option value="">Seleccione</option>
                <option value="Si">Si</option>
                <option value="No">No</option>
              </x-adminlte-select2>
            </div>
            
            <div class="col-md-6">
              <label class="form-label" for="multicol-detenido">Detenido</label>
              <x-adminlte-select2  name="detenido" value="{{old('detenido')}}">
                <option value="">Seleccione</option>
                <option value="Si">Si</option>
                <option value="No">No</option>
              </x-adminlte-select2>
            </div>

            <div class="col-md-6">
              <label class="form-label" for="multicol-dispon_prev">Disponibilidad Preventiva</label>
              <x-adminlte-select2  name="dispon_prev" value="{{old('dispon_prev')}}">
                <option value="">Seleccione</option>
                <option value="Si">Si</option>
                <option value="No">No</option>
              </x-adminlte-select2>
            </div>

            <div class="col-md-6">
              <label class="form-label" for="multicol-levan_disp_prev">Levantamiento Disponibilidad Preventiva</label>
              <x-adminlte-select2  name="levan_disp_prev" value="{{old('levan_disp_prev')}}">
                <option value="">Seleccione</option>
                <option value="Si">Si</option>
                <option value="No">No</option>
              </x-adminlte-select2>
            </div>

            <div class="col-md-6">
            <label class="form-label" for="multicol-fecha_disp_prev"> Fecha Disponibilidad Preventiva</label>
              <input type="date" name="fecha_disp_prev" id="multicol-fecha_disp_prev" class="form-control" value="{{old('fecha_disp_prev')}}" placeholder="Fecha de disponibilidad " />
            </div>

            <div class="col-md-6">
            <label class="form-label" for="multicol-fecha_lev_disp_prev"> Fecha Levantamiento Disponibilidad Preventiva</label>
              <input type="date" name="fecha_lev_disp_prev" id="multicol-fecha_lev_disp_prev" class="form-control" value="{{old('fecha_lev_disp_prev')}}" placeholder="Fecha de levantamiento " />
            </div>

            <div class="col-md-6">
              <label class="form-label" for="multicol-resol_disp_prev">Resolucion Disponibilidad Preventiva</label>
              <input type="text" name="resol_disp_prev" id="multicol-resol_disp_prev" class="form-control" value="{{old('resol_disp_prev')}}" placeholder="Escribir la identificacion de la resolucion"/>
            </div>
            
            <div class="col-md-6">
              <label class="form-label" for="multicol-resol_levan_disp_prev">Resolucion Levantamiento Disponibilidad Preventiva</label>
              <input type="text" name="resol_levan_disp_prev" id="multicol-resol_levan_disp_prev" class="form-control" value="{{old('resol_levan_disp_prev')}}" placeholder="Escribir la identificacion de la resolucion" />
            </div>
            

          </div>


          <div class="pt-4">
              <button type="submit" class="btn btn-primary me-sm-3 me-1">Guardar</button>
              <button type="button" class="btn btn-secondary" onClick="location.href='/infractores'">Cancelar</button>
          </div>
   </form>

  </div>

   
@endsection

