@extends('adminlte::page')

@section('title', 'SIEJ')

@section('content_header')
    <h1 class="m-0 text-dark">Mostrar Sumarisima</h1>
@endsection

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
<form method= "POST" action="{{ route ('sumarisimas.update')}}" class="card-body">
        @csrf

        <x-adminlte-input type="hidden" name="sumarisima_id" value="{{$sumarisima->id}}"/> 

        <h4 class="fw-normal">1. Datos del expediente</h4>
    <div class="row g-3">
    
            <div class="col-md-6">
                <label class="form-label" for="multicol-num_dj"> N° DJ</label>
                <span class="form-control" id="multicol-num_dj">{{ $sumarisima->num_dj }}</span>
            </div>

            <div class="col-md-6">
                <label class="form-label" for="multicol-fecha_ingreso"> Fecha de ingreso</label>
                <span class="form-control" id="multicol-fecha_ingreso">{{ $sumarisima->fecha_ingreso }}</span>
            </div>

            <div class="col-md-6">
                <label class="form-label" for="multicol-fojas">Fojas</label>
                <span class="form-control" id="multicol-fojas">{{ $sumarisima->fojas }}</span>
            </div>

            <div class="col-md-6">
                 <label class="form-label" for="multicol-tipo_denuncia">Tipo de denuncia</label>
                 <span class="form-control" id="multicol-tipo_denuncia">{{ $sumarisima->tipo_denuncia }}</span>
            </div>

            <div class="col-md-6">
                 <label class="form-label" for="multicol-motivo">Motivo</label>
                 <span class="form-control" id="multicol-motivo">{{ $sumarisima->motivo }}</span>
            </div>
            
            <div class="col-md-6">
                <label class="form-label" for="multicol-destino_proced">Destino de Procedencia</label>
                <span class="form-control" id="multicol-destino_proced">{{ $sumarisima->destino_proced }}</span>
            </div>
            
    </div>
    <hr class="my-4 mx-n4" />
    <h4 class="fw-normal">2. Datos del personal infractor</h4>
            <div class="row g-3">

                    <div class="col-md-12">
                          <label class="form-label" for="multicol-apellido_nombre_inf">Apellido y Nombres</label>
                          <br>
                          <span class="card" id="multicol-tipo_mov">
                              @foreach ($sumarisima->infractors as $infractor)
                              {{$infractor->apellido_nombre_inf}} Lp:{{$infractor->leg_pers_inf }}, 
                              @endforeach
                          </span>
                    </div>
                                
            </div>

    <hr class="my-4 mx-n4" />
    <h4 class="fw-normal">3. Datos del personal instructor de la Division de Asuntos Legales</h4>
           <div class="row g-3">
    
                <div class="col-md-6">
                    <label class="form-label" for="multicol-apellido_nombre_AL">Apellido y Nombre</label>
                    <span class="form-control" id="multicol-apellido_nombre_AL">{{ $sumarisima->apellido_nombre_AL }}</span>
                </div>
               
                <div class="col-md-6">
                    <label class="form-label" for="multicol-leg_pers_AL">Legajo Personal</label>
                    <span class="form-control" id="multicol-leg_pers_AL">{{ $sumarisima->leg_pers_AL }}</span>
                </div>

                <div class="col-md-6">
                    <label class="form-label" for="multicol-dependen_AL">Dependencia</label>
                    <span class="form-control" id="multicol-dependen_AL">{{ $sumarisima->dependen_AL }}</span>
                </div>

                <div class="col-md-6 select2-primary">
                    <label class="form-label" for="multicol-jerarquia_AL">Jerarquia</label>
                    <span class="form-control" id="multicol-jerarquia_AL">{{ $sumarisima->jerarquia_AL }}</span>
                </div>

            </div> 

    <hr class="my-4 mx-n4" />
    <h4 class="fw-normal">4. Movimientos y sugerencias del instructor de la Division de Asuntos Legales</h4>
          <div class="row g-3">

                <div class="col-md-6">
                    <label class="form-label" for="multicol-fecha_mov"> Fecha de Movimiento</label>
                    <span class="form-control" id="multicol-fecha_mov">{{ $sumarisima->fecha_mov }}</span>
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="multicol-destino_pase">Destino de Pase</label>
                    <span class="form-control" id="multicol-destino_pase">{{ $sumarisima->destino_pase }}</span>
                </div>
                
                <div class="col-md-6">
                    <label class="form-label" for="multicol-primera_interv">PRIMERA INTERVENCION</label>
                    <span class="form-control" id="multicol-primera_interv">{{ $sumarisima->primera_interv }}</span>
                </div>

                <div class="col-md-6">
                    <label class="form-label" for="multicol-tipo_mov">Tipo Movimiento</label>
                     <span class="form-control" id="multicol-tipo_mov">{{ $sumarisima->tipo_mov }}</span>
                </div>
                
                <div class="col-md-6">
                    <label class="form-label" for="multicol-observaciones">OBSERVACIONES</label>
                    <span class="form-control" id="multicol-observaciones">{{ $sumarisima->observaciones }}</span>
                </div>

                <div class="col-md-6">
                    <label class="form-label" for="multicol-fecha_reingreso"> FECHA DE REINGRESO</label>
                    <span class="form-control" id="multicol-fecha_reingreso">{{ $sumarisima->fecha_reingreso }}</span>
                </div>

                <div class="col-md-6">
                    <label class="form-label" for="multicol-opinion_final">OPINION FINAL</label>
                    <span class="form-control" id="multicol-opinion_final">{{ $sumarisima->opinion_final }}</span>
                </div>

                <div class="col-md-6">
                <label class="form-label" for="multicol-fecha_egreso"> FECHA DE EGRESO</label>
                    <span class="form-control" id="multicol-fecha_egreso">{{ $sumarisima->fecha_egreso }}</span>
                </div>
                
            </div>

    
    <div class="pt-4">
       <button type="button" class="btn btn-secondary" onClick="location.href='/sumarisimas'" >Volver</button>
    </div>
</form>
   
@endsection

@section('scripts')
<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

<script>
  $(document).ready(()=>{});
  $('#apellido_nombre_inf').selectpicker('val',@json($infractores_ids));
</script>

@endsection




