@extends('adminlte::page')

@section('title', 'SIEJ')

@section('content_header')
    <h1 class="m-0 text-dark">Mostrar Infractor</h1>
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
      <form method= "POST" action="{{ route ('infractores.update')}}" class="card-body">
              @csrf

              <x-adminlte-input type="hidden" name="infractor_id" value="{{ $infractor->id}}"/> 
                            
                  <hr class="my-4 mx-n4" />
                  <h6 class="fw-normal">1. Datos del personal infractor</h6>
                  <div class="row g-3">
                    
                    <div class="col-md-6">
                      <label class="form-label" for="multicol-apellido_inf">Apellido</label>
                      <span class="form-control" id="multicol-apellido_inf">{{ $infractor-> apellido_inf}}</span>
                    </div>

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-nombre_inf">Nombres</label>
                      <span class="form-control" id="multicol-nombre_inf">{{ $infractor-> nombre_inf}}</span>
                    </div>
                                             
                    <div class="col-md-6">
                      <label class="form-label" for="multicol-leg_pers_inf">Legajo Personal</label>
                      <span class="form-control" id="multicol-leg_pers_inf">{{ $infractor-> leg_pers_inf}}</span>
                    </div>

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-dependen_inf">Dependencia</label>
                      <span class="form-control" id="multicol-dependen_inf">{{ $infractor-> dependen_inf}}</span>
                    </div>

                    <div class="col-md-6 select2-primary">
                          <label class="form-label" for="multicol-jerarquia_inf">Jerarquia</label>
                          <span class="form-control" id="multicol-jerarquia_inf">{{ $infractor-> jerarquia_inf}}</span>
                    </div>

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-retirado">Retirado</label>
                      <span class="form-control" id="multicol-retirado">{{ $infractor-> retirado}}</span>
                    </div>
                    
                    <div class="col-md-6">
                      <label class="form-label" for="multicol-detenido">Detenido</label>
                      <span class="form-control" id="multicol-detenido">{{ $infractor-> retirado}}</span>
                    </div>
                   
                    <div class="col-md-6">
                      <label class="form-label" for="multicol-dispon_prev">Disponibilidad Preventiva</label>
                      <span class="form-control" id="multicol-dispon_prev">{{ $infractor-> dispon_prev}}</span>
                    </div>

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-levan_disp_prev">Levantamiento Disponibilidad Preventiva</label>
                      <span class="form-control" id="multicol-levan_disp_prev">{{ $infractor-> levan_disp_prev}}</span>
                    </div>

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-fecha_disp_prev"> Fecha Disponibilidad Preventiva</label>
                      <span class="form-control" id="multicol-fecha_disp_prev">{{ $infractor-> fecha_disp_prev}}</span>
                    </div>

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-fecha_lev_disp_prev"> Fecha Levantamiento Disponibilidad Preventiva</label>
                      <span class="form-control" id="multicol-fecha_lev_disp_prev">{{ $infractor-> fecha_lev_disp_prev}}</span>
                    </div>

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-resol_disp_prev">Resolucion Disponibilidad Preventiva</label>
                      <span class="form-control" id="multicol-resol_disp_prev">{{ $infractor-> resol_disp_prev}}</span>
                    </div>

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-resol_levan_disp_prev">Resolucion Levantamiento Disponibilidad Preventiva</label>
                      <span class="form-control" id="multicol-resol_levan_disp_prev">{{ $infractor-> resol_levan_disp_prev}}</span>
                    </div>

                  </div>



                  <div class="pt-4">
                    
                      <button type="button" class="btn btn-secondary" onClick="location.href='/infractores'">Volver</button>
                  </div>
      </form>

  </div>
@endsection


