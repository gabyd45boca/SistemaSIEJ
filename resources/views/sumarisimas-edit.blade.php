@extends('adminlte::page')

@section('title', 'SIEJ')

@section('content_header')
    <h1 class="m-0 text-dark">Editar Sumarisima</h1>
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

        <h4 class="fw-normal">1. Carga de datos del expediente</h4>
    <div class="row g-3">
    
            <div class="col-md-6">
                <label class="form-label" for="multicol-username"> N° DJ</label>
                <input type="text" name="num_dj" value="{{ $sumarisima-> num_dj }}" id="multicol-num_dj" class="form-control" placeholder="Numero de DJ" required />
            </div>

            <div class="col-md-6">
                <label class="form-label" for="multicol-username"> Fecha de ingreso</label>
                <input type="date" name="fecha_ingreso" value="{{ $sumarisima-> fecha_ingreso }}" id="multicol-fecha_ingreso" class="form-control" placeholder="Fecha de inicio de actuaciones " required/>
            </div>

            <div class="col-md-6">
                <label class="form-label" for="multicol-fojas">Fojas</label>
                <input type="text" name="fojas" value="{{ $sumarisima-> fojas }}" id="multicol-fojas" class="form-control" placeholder="Cantidad de fojas" required/>
            </div>

            <div class="col-md-6">
                 <label class="form-label" for="multicol-tipo_denuncia">Tipo de denuncia</label>
                <x-adminlte-select2  name="tipo_denuncia" value="{{ $sumarisima->tipo_denuncia }}" class="select2 form-select">
                    <option value="">Seleccionar el tipo</option>
                    <option value="Comparendo" @if ($sumarisima->tipo_denuncia == 'Comparendo') selected @endif 'Comparendo'>Comparendo</option>
                    <option value="Denuncia" @if ($sumarisima->tipo_denuncia == 'Denuncia') selected @endif 'Denuncia'>Denuncia</option>
                    <option value="Oficio" @if ($sumarisima->tipo_denuncia == 'Oficio') selected @endif 'Oficio'>Oficio</option>
                    <option value="Exposicion" @if ($sumarisima->tipo_denuncia == 'exposicion') selected @endif 'Exposicion'>Exposicion</option>
                    <option value="Otro" @if ($sumarisima->tipo_denuncia == 'Otro') selected @endif 'Otro'>Otro</option>
                </x-adminlte-select2>
            </div>

            <div class="col-md-6">
                 <label class="form-label" for="multicol-motivo">Motivo</label>
                <x-adminlte-select2  name="motivo" value="{{ $sumarisima-> motivo }}" class="select2 form-select" >
                    <option value="">Seleccionar el tipo</option>
                    <option value="Violencia de genero" @if ($sumarisima->motivo == 'Violencia de genero') selected @endif 'Violencia de genero' >Violencia de genero</option>
                    <option value="Perdida Arma Reglamentaria" @if ($sumarisima->motivo == 'Perdida Arma Reglamentaria') selected @endif 'Perdida Arma Reglamentaria'>Perdida Arma Reglamentaria</option>
                    <option value="Falta al servicio" @if ($sumarisima->motivo == 'Falta al servicio') selected @endif 'Falta al servicio'>Falta al servicio</option>
                    <option value="Ebriedad" @if ($sumarisima->motivo == 'Ebriedad') selected @endif 'Ebriedad'>Ebriedad</option>
                    <option value="Ausentismo Laboral" @if ($sumarisima->motivo == 'Ausentismo Laboral') selected @endif 'Ausentismo Laboral'>Ausentismo Laboral</option>
                    <option value="Otro" @if ($sumarisima->motivo == 'Otro') selected @endif 'Otro'>Otro</option>
                </x-adminlte-select2>
            </div>
            <div class="col-md-6">
                <label class="form-label" for="multicol-destino_proced">Destino de Procedencia</label>
                <x-adminlte-select2  name="destino_proced" value="{{ $sumarisima-> destino_proced }}" class="select2 form-select" >
                    <option value="">Seleccionar la dependencia</option>
                    <option value="Comisaria Comunitaria" @if ($sumarisima->destino_proced == 'Comisaria Comunitaria') selected @endif 'Comisaria Comunitaria'>Comisaria Comunitaria</option>
                    <option value="Departamental" @if ($sumarisima->destino_proced == 'Departamental') selected @endif 'Departamental'>Departamental</option>
                    <option value="Destacamento" @if ($sumarisima->destino_proced == 'Destacamento') selected @endif 'Destacamento'>Destacamento</option>
                </x-adminlte-select2>
            </div>
            
    </div>
    <hr class="my-4 mx-n4" />
    <h4 class="fw-normal">2. Carga de datos del personal infractor</h4>
            <div class="row g-3">

                   <div class="col-md-12">
                          <label class="form-label" for="multicol-apellido_nombre_inf">Apellido y Nombres</label>
                          <x-adminlte-select  name="apellido_nombre_inf[]" id="apellido_nombre_inf" class="form-control selectpicker" data-style="btn-primary" title="Seleccionar Infractores" multiple required >
                              @foreach ($infractores as $infractor) 
                              <option value="{{$infractor->id}}">{{$infractor->apellido_nombre_inf}} Lp: {{$infractor->leg_pers_inf }}</option>
                              @endforeach
                          </x-adminlte-select>
                          @if ($errors->has('apellido_nombre_inf'))
                          <span class="text-danger">
                              <strong>{{$errors->first('apellido_nombre_inf') }}</strong>
                          </span>
                          @endif  
                   </div>
                                
            </div>

    <hr class="my-4 mx-n4" />
    <h4 class="fw-normal">3. Carga de datos del personal instructor de la Division de Asuntos Legales</h4>
           <div class="row g-3">
    
                <div class="col-md-6">
                    <label class="form-label" for="multicol-apellido_nombre_AL">Apellido y Nombre</label>
                    <input type="text" name="apellido_nombre_AL" value="{{ $sumarisima-> apellido_nombre_AL }}" id="multicol-apellido_AL" class="form-control" placeholder="Escribir el apellido y nombre"/>
                </div>
               
                <div class="col-md-6">
                    <label class="form-label" for="multicol-leg_pers_AL">Legajo Personal</label>
                    <input type="text" name="leg_pers_AL" value="{{ $sumarisima-> leg_pers_AL }}" id="multicol-leg_pers_AL" class="form-control" placeholder="Escribir el legajo personal" />
                </div>

                <div class="col-md-6">
                    <label class="form-label" for="multicol-dependen_AL">Dependencia</label>
                    <x-adminlte-select2  name="dependen_AL" value="{{ $sumarisima-> dependen_AL }}" class="select2 form-select">
                        <option value="">Seleccionar la dependencia</option>
                        <option value="Comisaria Comunitaria" @if ($sumarisima->dependen_AL == 'Comisaria Comunitaria') selected @endif 'Comisaria Comunitaria'>Comisaria Comunitaria</option>
                        <option value="Departamental" @if ($sumarisima->dependen_AL == 'Departamental') selected @endif 'Departamental'>Departamental</option>
                        <option value="Destacamento" @if ($sumarisima->dependen_AL == 'Destacamento') selected @endif 'Destacamento'>Destacamento</option>
                    </x-adminlte-select2>
                </div>

                <div class="col-md-6 select2-primary">
                <label class="form-label" for="multicol-jerarquia_AL">Jerarquia</label>
                    <x-adminlte-select2 name="jerarquia_AL" value="{{ $sumarisima-> jerarquia_AL }}" class="select2 form-select">
                        <option value="">Seleccionar la jerarquia</option>
                        <option value="agente" @if ($sumarisima->jerarquia_AL == 'agente') selected @endif 'agente'>agente</option>
                        <option value="oficial_ayudante" @if ($sumarisima->jerarquia_AL == 'oficial_ayudante') selected @endif 'oficial_ayudante'>oficial ayudante</option>
                        <option value="comisario" @if ($sumarisima->jerarquia_AL == 'comisario') selected @endif 'comisario'>comisario</option>
                    </x-adminlte-select2>
                </div>

            </div> 

    <hr class="my-4 mx-n4" />
    <h4 class="fw-normal">4. Carga de movimientos y sugerencias del instructor de la Division de Asuntos Legales</h4>
          <div class="row g-3">

                <div class="col-md-6">
                    <label class="form-label" for="multicol-fecha_mov"> Fecha de Movimiento</label>
                    <input type="date" name="fecha_mov" value="{{ $sumarisima-> fecha_mov }}" id="multicol-fecha_mov" class="form-control" placeholder="Fecha de pase del expediente " />
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="multicol-destino_pase">Destino de Pase</label>
                    <x-adminlte-select2  name="destino_pase" value="{{ $sumarisima-> destino_pase }}" class="select2 form-select" >
                        <option value="">Seleccionar la dependencia</option>
                        <option value="Comisaria Comunitaria" @if ($sumarisima->destino_pase == 'Comisaria Comunitaria') selected @endif 'Comisaria Comunitaria'>Comisaria Comunitaria</option>
                        <option value="Departamental" @if ($sumarisima->destino_pase == 'Departamental') selected @endif 'Departamental'>Departamental</option>
                        <option value="Destacamento" @if ($sumarisima->destino_pase == 'Destacamento') selected @endif 'Destacamento'>Destacamento</option>
                    </x-adminlte-select2>
                </div>
                <div class="col-md-6">
                <label class="form-label" for="multicol-primera_interv">PRIMERA INTERVENCION</label>
                    <input type="text" name="primera_interv" value="{{ $sumarisima-> primera_interv }}" id="multicol-primera_interv" class="form-control" placeholder="Escribir la sugerencia " />
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="multicol-tipo_mov">Tipo Movimiento</label>
                    <x-adminlte-select2 name="tipo_mov" value="{{ $sumarisima-> tipo_mov }}" class="select2 form-select">
                        <option value="">Seleccionar el tipo de movimiento</option>
                        <option value="Salida" @if ($sumarisima->tipo_mov == 'Salida') selected @endif 'Salida'>Salida</option>
                        <option value="Ingreso" @if ($sumarisima->tipo_mov == 'Ingreso') selected @endif 'Ingreso'>Ingreso</option>
                        <option value="ReIngreso" @if ($sumarisima->tipo_mov == 'ReIngreso') selected @endif 'ReIngreso'>ReIngreso</option>
                    </x-adminlte-select2>

                </div>
                
                <div class="col-md-6">
                    <label class="form-label" for="multicol-observaciones">OBSERVACIONES</label>
                    <input type="text" name="observaciones" value="{{ $sumarisima-> observaciones }}" id="multicol-observaciones" class="form-control" placeholder="Escribir la observacion" />
                </div>
                <div class="col-md-6">
                <label class="form-label" for="multicol-fecha_reingreso"> FECHA DE REINGRESO</label>
                    <input type="date" name="fecha_reingreso" value="{{ $sumarisima-> fecha_reingreso }}" id="multicol-fecha_reingreso" class="form-control" placeholder="Fecha de reingreso " />
                </div>

                <div class="col-md-6">
                    <label class="form-label" for="multicol-opinion_final">OPINION FINAL</label>
                    <input type="text" name="opinion_final" value="{{ $sumarisima-> opinion_final }}" id="multicol-opinion_final" class="form-control" placeholder="Escribir la sugerencia " />
                </div>
                <div class="col-md-6">
                <label class="form-label" for="multicol-fecha_egreso"> FECHA DE EGRESO</label>
                    <input type="date" name="fecha_egreso" value="{{ $sumarisima-> fecha_egreso }}" id="multicol-fecha_egreso" class="form-control" placeholder="Fecha de reingreso " />
                </div>
                
            </div>

    
    <div class="pt-4">
    <button type="submit" class="btn btn-primary me-sm-3 me-1">Guardar</button>
    <button type="button" class="btn btn-secondary" onClick="location.href='/sumarisimas'" >Cancelar</button>
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




