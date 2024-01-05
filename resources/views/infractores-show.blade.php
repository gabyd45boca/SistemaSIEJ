@extends('adminlte::page')

@section('title', 'SIEJ')

@section('content_header')
    <h1 class="m-0 text-dark">Editar Infractor</h1>
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
                  <h6 class="fw-normal">2. Carga de datos del personal infractor</h6>
                  <div class="row g-3">
                    
                    <div class="col-md-6">
                      <label class="form-label" for="multicol-apellido_nombre_inf">Apellido y Nombre</label>
                      <input type="text" name="apellido_nombre_inf" value="{{ $infractor-> apellido_nombre_inf }}" id="multicol-apellido_nombre_inf" class="form-control" placeholder="Escribir el apellido y nombre"/>
                    </div>

                                             
                    <div class="col-md-6">
                      <label class="form-label" for="multicol-leg_pers_inf">Legajo Personal</label>
                      <input type="text" name= "leg_pers_inf" value="{{ $infractor-> leg_pers_inf }}" id="multicol-leg_pers_inf" class="form-control" placeholder="Escribir el legajo personal" />
                    </div>

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-dependen_inf">Dependencia</label>
                      <x-adminlte-select2  name="dependen_inf" value="{{ $infractor-> dependen_inf }}">
                        <option value="">Seleccionar la dependencia</option>
                        <option value="Comisaria Comunitaria" @if ($infractor->dependen_inf == 'Comisaria Comunitaria') selected @endif 'Comisaria Comunitaria'>Comisaria Comunitaria</option>
                        <option value="Departamental" @if ($infractor->dependen_inf == 'Departamental') selected @endif 'Departamental'>Departamental</option>
                        <option value="Destacamento" @if ($infractor->dependen_inf == 'Destacamento') selected @endif 'Destacamento'>Destacamento</option>
                      </x-adminlte-select2>
                    </div>

                    <div class="col-md-6 select2-primary">
                          <label class="form-label" for="multicol-jerarquia_inf">Jerarquia</label>
                          <x-adminlte-select2  name="jerarquia_inf" value="{{ $infractor-> jerarquia_inf }}" class="select2 form-select" >
                            <option value="">Seleccionar la jerarquia</option>
                            <option value="agente" @if ($infractor->jerarquia_inf == 'agente') selected @endif 'agente'>agente</option>
                            <option value="oficial_ayudante" @if ($infractor->jerarquia_inf == 'oficial ayudante') selected @endif 'oficial ayudante'>oficial ayudante</option>
                            <option value="comisario" @if ($infractor->jerarquia_inf == 'comisario') selected @endif 'comisario'>comisario</option>
                          </x-adminlte-select2>
                    </div>

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-retirado">Retirado</label>
                      <x-adminlte-select2  name="retirado" value="{{ $infractor-> retirado }}">
                        <option value="">Seleccione</option>
                        <option value="Si" @if ($infractor->retirado == 'Si') selected @endif 'Si'>Si</option>
                        <option value="No" @if ($infractor->retirado == 'No') selected @endif 'Si'>No</option>
                      </x-adminlte-select2>
                    </div>
                    
                    <div class="col-md-6">
                      <label class="form-label" for="multicol-detenido">Detenido</label>
                      <x-adminlte-select2  name="detenido" value="{{ $infractor-> detenido }}">
                        <option value="">Seleccione</option>
                        <option value="Si" @if ($infractor->detenido == 'Si') selected @endif 'Si'>Si</option>
                        <option value="No" @if ($infractor->detenido == 'No') selected @endif 'Si'>No</option>
                      </x-adminlte-select2>
                    </div>
                   
                    <div class="col-md-6">
                      <label class="form-label" for="multicol-dispon_prev">Disponibilidad Preventiva</label>
                      <x-adminlte-select2  name="dispon_prev" value="{{ $infractor-> dispon_prev }}">
                        <option value="">Seleccione</option>
                        <option value="Si" @if ($infractor->dispon_prev == 'Si') selected @endif 'Si'>Si</option>
                        <option value="No" @if ($infractor->dispon_prev == 'No') selected @endif 'No'>No</option>
                      </x-adminlte-select2>
                    </div>

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-levan_disp_prev">Levantamiento Disponibilidad Preventiva</label>
                      <x-adminlte-select2  name="levan_disp_prev" value="{{ $infractor-> levan_disp_prev }}">
                        <option value="">Seleccione</option>
                        <option value="Si" @if ($infractor->levan_disp_prev == 'Si') selected @endif 'Si'>Si</option>
                        <option value="No" @if ($infractor->levan_disp_prev == 'No') selected @endif 'No'>No</option>
                      </x-adminlte-select2>
                    </div>

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-fecha_disp_prev"> Fecha Disponibilidad Preventiva</label>
                      <input type="date" name="fecha_disp_prev" value="{{ $infractor-> fecha_disp_prev }}" id="multicol-fecha_disp_prev" class="form-control" placeholder="Fecha de disponibilidad " />
                    </div>

                    <div class="col-md-6">
                    <label class="form-label" for="multicol-fecha_lev_disp_prev"> Fecha Levantamiento Disponibilidad Preventiva</label>
                      <input type="date" name="fecha_lev_disp_prev" value="{{ $infractor-> fecha_lev_disp_prev }}" id="multicol-fecha_lev_disp_prev" class="form-control" placeholder="Fecha de levantamiento " />
                    </div>

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-resol_disp_prev">Resolucion Disponibilidad Preventiva</label>
                      <input type="text" name="resol_disp_prev" value="{{ $infractor-> resol_disp_prev }}" id="multicol-resol_disp_prev" class="form-control" placeholder="Escribir la identificacion de la resolucion"/>
                    </div>

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-resol_levan_disp_prev">Resolucion Levantamiento Disponibilidad Preventiva</label>
                      <input type="text" name= "resol_levan_disp_prev" value="{{ $infractor-> resol_levan_disp_prev }}" id="multicol-resol_levan_disp_prev" class="form-control" placeholder="Escribir la identificacion de la resolucion" />
                    </div>

                  </div>



                  <div class="pt-4">
                      <button type="submit" class="btn btn-primary me-sm-3 me-1">Guardar</button>
                      <button type="button" class="btn btn-secondary" onClick="location.href='/infractores'">Cancelar</button>
                  </div>
      </form>

  </div>
@endsection


