@extends('adminlte::page')

@section('title', 'SIEJ')

@section('content_header')
<style>
        .hidden-view {
            display: none;
        }
</style>
    <h1 class="m-0 text-dark">Editar Sumario</h1>
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
      <form method= "POST" action="{{ route ('sumarios.update')}}" class="card-body">
              @csrf
             
              <div class="hidden-view">
              <x-adminlte-input type="hidden" name="sumario_id"   value="{{$sumario->id}}"/> 
              <x-adminlte-input type="hidden" name="num_dja"   value="{{$sumario->num_dja}}"/> 
              <x-adminlte-input type="hidden" name="fecha_ingreso"    value="{{$sumario->fecha_ingreso}}"/> 
              <x-adminlte-input type="hidden" name="num_dj"   value="{{$sumario->num_dj}}"/> 
              <x-adminlte-input type="hidden" name="fecha_inicio"    value="{{$sumario->fecha_inicio}}"/>
              <x-adminlte-input type="hidden" name="fojas"   value="{{$sumario->fojas}}"/> 
              <x-adminlte-input type="hidden" name="infraccion"    value="{{$sumario->infraccion}}"/> 
              <x-adminlte-input type="hidden" name="motivo"  value="{{$sumario->motivo}}"/> 
              <x-adminlte-input type="hidden" name="tipo_denun"  value="{{$sumario->tipo_denun}}"/>
              <x-adminlte-input type="hidden" name="fecha_movimiento"  value="{{$sumario->fecha_movimiento}}"/> 
              <x-adminlte-input type="hidden" name="destino_pase"  value="{{$sumario->destino_pase}}"/> 
              <x-adminlte-input type="hidden" name="extracto"  value="{{$sumario->extracto}}"/> 
              <x-adminlte-input type="hidden" name="tipo_mov"  value="{{$sumario->tipo_mov}}"/>
              <x-adminlte-input type="hidden" name="observaciones"   value="{{$sumario->observaciones}}"/> 
              
              <x-adminlte-input type="hidden" name="apellido_nombre_DAI"   value="{{$sumario->apellido_nombre_DAI}}"/> 
              <x-adminlte-input type="hidden" name="leg_pers_DAI"    value="{{$sumario->leg_pers_DAI}}"/> 
              <x-adminlte-input type="hidden" name="dependen_DAI"   value="{{$sumario->dependen_DAI}}"/> 
              <x-adminlte-input type="hidden" name="jerarquia_DAI"    value="{{$sumario->jerarquia_DAI}}"/>
              <x-adminlte-input type="hidden" name="reg_interno_DAI"   value="{{$sumario->reg_interno_DAI}}"/> 
              <x-adminlte-input type="hidden" name="fecha_mov_proceDAI"    value="{{$sumario->fecha_mov_proceDAI}}"/> 
              <x-adminlte-input type="hidden" name="destin_proceden_DAI"  value="{{$sumario->destin_proceden_DAI}}"/> 
              <x-adminlte-input type="hidden" name="obs_proced_DAI"  value="{{$sumario->obs_proced_DAI}}"/>
              <x-adminlte-input type="hidden" name="tipo_mov_proce_DAI"  value="{{$sumario->tipo_mov_proce_DAI}}"/>
              <x-adminlte-input type="hidden" name="sugerencia_DAI"  value="{{$sumario->sugerencia_DAI}}"/>
              <x-adminlte-input type="hidden" name="fecha_elev_inst_DAI"  value="{{$sumario->fecha_elev_inst_DAI}}"/> 
              <x-adminlte-input type="hidden" name="fecha_mov_paseDAI"  value="{{$sumario->fecha_mov_paseDAI}}"/> 
              <x-adminlte-input type="hidden" name="destin_pase_DAI"  value="{{$sumario->destin_pase_DAI}}"/> 
              <x-adminlte-input type="hidden" name="obs_pase_DAI"  value="{{$sumario->obs_pase_DAI}}"/>
              <x-adminlte-input type="hidden" name="tipo_mov_pase_DAI"  value="{{$sumario->tipo_mov_pase_DAI}}"/> 
              <x-adminlte-input type="hidden" name="concluido_DAI"  value="{{$sumario->concluido_DAI}}"/>

              <x-adminlte-input type="hidden" name="apellido_nombre_DGAJ"  value="{{$sumario->apellido_nombre_DGAJ}}"/>
              <x-adminlte-input type="hidden" name="leg_pers_DGAJ"   value="{{$sumario->leg_pers_DGAJ}}"/> 
              <x-adminlte-input type="hidden" name="dependen_DGAJ"    value="{{$sumario->dependen_DGAJ}}"/> 
              <x-adminlte-input type="hidden" name="jerarquia_DGAJ"   value="{{$sumario->jerarquia_DGAJ}}"/> 
              <x-adminlte-input type="hidden" name="reg_interno_DGAJ"    value="{{$sumario->reg_interno_DGAJ}}"/>
              <x-adminlte-input type="hidden" name="fecha_mov_proceDGAJ"   value="{{$sumario->fecha_mov_proceDGAJ}}"/> 
              <x-adminlte-input type="hidden" name="destin_proced_DGAJ"    value="{{$sumario->destin_proced_DGAJ}}"/> 
              <x-adminlte-input type="hidden" name="tipo_mov_proce_DGAJ"  value="{{$sumario->tipo_mov_proce_DGAJ}}"/> 
              <x-adminlte-input type="hidden" name="sugerencia_DGAJ"  value="{{$sumario->sugerencia_DGAJ}}"/>
              <x-adminlte-input type="hidden" name="obs_proced_DGAJ"  value="{{$sumario->obs_proced_DGAJ}}"/>
              <x-adminlte-input type="hidden" name="fecha_mov_destDGAJ"  value="{{$sumario->fecha_mov_destDGAJ}}"/>
              <x-adminlte-input type="hidden" name="destin_pase_DGAJ"  value="{{$sumario->destin_pase_DGAJ}}"/> 
              <x-adminlte-input type="hidden" name="tipo_mov_pase_DGAJ"  value="{{$sumario->tipo_mov_pase_DGAJ}}"/> 
              <x-adminlte-input type="hidden" name="obs_pase_DGAJ"  value="{{$sumario->obs_pase_DGAJ}}"/> 
              <x-adminlte-input type="hidden" name="concluido_DGAJ"  value="{{$sumario->concluido_DGAJ}}"/>

              <x-adminlte-input type="hidden" name="apellido_nombre_AL"  value="{{$sumario->apellido_nombre_AL}}"/>
              <x-adminlte-input type="hidden" name="leg_pers_AL"   value="{{$sumario->leg_pers_AL}}"/> 
              <x-adminlte-input type="hidden" name="dependen_AL"    value="{{$sumario->dependen_AL}}"/> 
              <x-adminlte-input type="hidden" name="jerarquia_AL"   value="{{$sumario->jerarquia_AL}}"/> 
              <x-adminlte-input type="hidden" name="reg_interno_AL"    value="{{$sumario->reg_interno_AL}}"/>
              <x-adminlte-input type="hidden" name="fecha_mov_procAL"   value="{{$sumario->fecha_mov_procAL}}"/> 
              <x-adminlte-input type="hidden" name="destin_proceden_AL"    value="{{$sumario->destin_proceden_AL}}"/> 
              <x-adminlte-input type="hidden" name="tipo_mov_proce_AL"  value="{{$sumario->tipo_mov_proce_AL}}"/> 
              <x-adminlte-input type="hidden" name="sugerencia_AL"  value="{{$sumario->sugerencia_AL}}"/>
              <x-adminlte-input type="hidden" name="obs_proced_AL"  value="{{$sumario->obs_proced_AL}}"/>
              <x-adminlte-input type="hidden" name="fecha_mov_paseAL"  value="{{$sumario->fecha_mov_paseAL}}"/>
              <x-adminlte-input type="hidden" name="destin_pase_AL"  value="{{$sumario->destin_pase_AL}}"/> 
              <x-adminlte-input type="hidden" name="tipo_mov_pase_AL"  value="{{$sumario->tipo_mov_pase_AL}}"/> 
              <x-adminlte-input type="hidden" name="obs_pase_AL"  value="{{$sumario->obs_pase_AL}}"/> 
              <x-adminlte-input type="hidden" name="concluido_AL"  value="{{$sumario->concluido_AL}}"/>

              <x-adminlte-input type="hidden" name="apellido_nombre_DGRRHH"  value="{{$sumario->apellido_nombre_DGRRHH}}"/>
              <x-adminlte-input type="hidden" name="leg_pers_DGRRHH"   value="{{$sumario->leg_pers_DGRRHH}}"/> 
              <x-adminlte-input type="hidden" name="dependen_DGRRHH"    value="{{$sumario->dependen_DGRRHH}}"/> 
              <x-adminlte-input type="hidden" name="jerarquia_DGRRHH"   value="{{$sumario->jerarquia_DGRRHH}}"/> 
              <x-adminlte-input type="hidden" name="reg_interno_DGRRHH"    value="{{$sumario->reg_interno_DGRRHH}}"/>
              <x-adminlte-input type="hidden" name="fecha_mov_proceDGRRHH"   value="{{$sumario->fecha_mov_proceDGRRHH}}"/> 
              <x-adminlte-input type="hidden" name="destin_proceden_DGRRHH"    value="{{$sumario->destin_proceden_DGRRHH}}"/>
              <x-adminlte-input type="hidden" name="tipo_mov_pase_DGRRHH"  value="{{$sumario->tipo_mov_pase_DGRRHH}}"/>
              <x-adminlte-input type="hidden" name="resol_final_DGRRHH"  value="{{$sumario->resol_final_DGRRHH}}"/>
              <x-adminlte-input type="hidden" name="obs_proced_DGRRHH"  value="{{$sumario->obs_proced_DGRRHH}}"/>
              <x-adminlte-input type="hidden" name="fecha_mov_paseDGRRHH"  value="{{$sumario->fecha_mov_paseDGRRHH}}"/>
              <x-adminlte-input type="hidden" name="destin_pase_DGRRHH"  value="{{$sumario->destin_pase_DGRRHH}}"/> 
              <x-adminlte-input type="hidden" name="tipo_mov_pase_DGRRHH"  value="{{$sumario->tipo_mov_pase_DGRRHH}}"/> 
              <x-adminlte-input type="hidden" name="obs_pase_DGRRHH"  value="{{$sumario->obs_pase_DGRRHH}}"/>
              <x-adminlte-input type="hidden" name="concluido_DGRRHH"  value="{{$sumario->concluido_DGRRHH}}"/>

              </div>
            <div class="table-responsive text-nowrap">
              <table id="sumarios" class="table table-stripted shadow-lg mt-4" with-buttons>
              <thead class="bg-dark text-white">
              <tr>
                <th>ID</th>
                <th>N° DJA</th>
                <th>N° DJ</th>
                <th>MOTIVO</th>
                <th>LEGAJO</th>
                <th>INFRACTOR</th>
                <th>TIPO DENUNCIA</th>
                <th>FECHA INGRESO</th>
                <th>INFRACCION</th>
                
              </tr>
              </thead>

              <tbody class="table-border-bottom-0">
              <tr>
              <td>{{$sumario->id}}</td>   
                    <td>{{$sumario->num_dja}} </td>   
                    <td>{{$sumario->num_dj}}</td>   
                    <td>{{$sumario->motivo}} </td>
                                <td>
                                    @foreach ($sumario->infractors as $infractor)
                                    {{$infractor->leg_pers_inf }} <br>
                                    @endforeach
                                </td>
                   
                                <td>
                                    @foreach ($sumario->infractors as $infractor)
                                    {{$infractor->apellido_nombre_inf}} <br>
                                    @endforeach
                                </td>   
                    <td>{{$sumario->tipo_denun}}</td>   
                    <td>{{$sumario->fecha_ingreso}}</td>  
                    <td>{{$sumario->infraccion}}</td>
              </tr>
              </tbody>
              </table>
            </div>  
              <br>
              <br>                  
                  @can('EditarSumarioDGAJ')
                

                  <h4 class="fw-normal">1. Carga de datos del expediente</h4>
                  <div class="row g-3">

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-username">N° DJA</label>
                      <input type="text" name= "num_dja" value="{{ $sumario-> num_dja }}" id="multicol-num_dja" class="form-control" placeholder="Numero de DJA " required/>
                    </div>

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-username"> Fecha Ingreso</label>
                      <input type="date" name="fecha_ingreso" value="{{ $sumario-> fecha_ingreso }}" id="multicol-fecha_ingreso" class="form-control" placeholder="Fecha de ingreso " required/>
                    </div>

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-username"> N° DJ</label>
                      <input type="text" name="num_dj" value="{{ $sumario-> num_dj }}" id="multicol-num_dj" class="form-control" placeholder="Numero de DJ" required/>
                    </div>

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-username"> Fecha Inicio de Actuaciones</label>
                      <input type="date" name="fecha_inicio" value="{{ $sumario-> fecha_inicio }}" id="multicol-fecha_inicio" class="form-control" placeholder="Fecha de inicio de actuaciones " required/>
                    </div>

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-username">Fojas</label>
                      <input type="text" name="fojas" value="{{ $sumario-> fojas }}" id="multicol-fojas" class="form-control" placeholder="Cantidad de fojas" required/>
                    </div>

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-username">Infraccion</label>
                      <input type="text" name="infraccion" value="{{ $sumario-> infraccion }}" id="multicol-infraccion" class="form-control" placeholder="Infraccion cometida" required/>
                    </div>

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-motivo">Motivo</label>
                      <x-adminlte-select2 name="motivo" value="{{ $sumario->motivo }}" required>
                        <option value="">Seleccionar el tipo</option>
                        <option value="Violencia de genero" @if ($sumario->motivo == 'Violencia de genero') selected @endif 'Violencia de genero' >Violencia de genero</option>
                        <option value="Perdida Arma Reglamentaria" @if ($sumario->motivo == 'Perdida Arma Reglamentaria') selected @endif 'Perdida Arma Reglamentaria'>Perdida Arma Reglamentaria</option>
                        <option value="Falta al servicio" @if ($sumario->motivo == 'Falta al servicio') selected @endif 'Falta al servicio'>Falta al servicio</option>
                        <option value="Ebriedad" @if ($sumario->motivo == 'Ebriedad') selected @endif 'Ebriedad'>Ebriedad</option>
                        <option value="Ausentismo Laboral" @if ($sumario->motivo == 'Ausentismo Laboral') selected @endif 'Ausentismo Laboral'>Ausentismo Laboral</option>
                        <option value="Otro" @if ($sumario->motivo == 'Otro') selected @endif 'Otro'>Otro</option>
                      </x-adminlte-select2>
                    </div>

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-extracto">Extracto</label>
                      <input type="text" name="extracto" value="{{ $sumario->extracto }}" id="multicol-extracto" class="form-control" placeholder="Extracto" />
                    </div>

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-tipo_denun">Tipo de denuncia</label>
                      <x-adminlte-select2  name="tipo_denun" value="{{ $sumario-> tipo_denun }}" required>
                        <option value="">Seleccionar el tipo</option>
                        <option value="Comparendo" @if ($sumario->tipo_denun == 'Comparendo') selected @endif 'Comparendo'>Comparendo</option>
                        <option value="Denuncia" @if ($sumario->tipo_denun == 'Denuncia') selected @endif 'Denuncia'>Denuncia</option>
                        <option value="Oficio" @if ($sumario->tipo_denun == 'Oficio') selected @endif 'Oficio'>Oficio</option>
                        <option value="Exposicion" @if ($sumario->tipo_denun == 'exposicion') selected @endif 'Exposicion'>Exposicion</option>
                        <option value="Otro" @if ($sumario->tipo_denun == 'Otro') selected @endif 'Otro'>Otro</option>
                      </x-adminlte-select2>
                    </div>
                  
                    <div class="col-md-6">
                      <label class="form-label" for="multicol-fecha_movimiento"> Fecha de Movimiento</label>
                      <input type="date" name="fecha_movimiento" value="{{ $sumario-> fecha_movimiento }}" id="multicol-fecha_movimiento" class="form-control" placeholder="Fecha de pase del expediente " required />
                    </div>
                    
                    <div class="col-md-6">
                      <label class="form-label" for="multicol-destino_pase">Destino de Pase</label>
                      <x-adminlte-select2  name="destino_pase" value="{{ $sumario-> destino_pase }}" required>
                        <option value="">Seleccionar la dependencia</option>
                        <option value="Asuntos Interno" @if ($sumario->destino_pase == 'Asuntos Interno') selected @endif 'Asuntos Interno'>Asuntos Interno</option>
                        <option value="Comisaria" @if ($sumario->destino_pase == 'Comisaria') selected @endif 'Comisaria'>Comisaria</option>
                        <option value="Departamental" @if ($sumario->destino_pase == 'Departamental') selected @endif 'Departamental'>Departamental</option>
                      </x-adminlte-select2>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label" for="multicol-observaciones">Observaciones del expediente</label>
                        <input type="text" name="observaciones" value="{{ $sumario-> observaciones}}" id="multicol-observaciones" class="form-control" placeholder="Escribir observaciones para el pase" />
                    </div>

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-tipo_mov">Tipo Movimiento Pase</label>
                      <x-adminlte-select2  name="tipo_mov" value="{{ $sumario-> tipo_mov }}" required>
                        <option value="">Seleccionar el tipo de movimiento</option>
                        <option value="Salida" @if ($sumario->tipo_mov == 'Salida') selected @endif 'Salida'>Salida</option>
                        <option value="Ingreso" @if ($sumario->tipo_mov == 'Ingreso') selected @endif 'Ingreso'>Ingreso</option>
                        <option value="ReIngreso" @if ($sumario->tipo_mov == 'ReIngreso') selected @endif 'ReIngreso'>ReIngreso</option>
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
                  @endcan 

                  @can('EditarSumarioDGAI')
                  
                  <div class="hidden-view">
                    <x-adminlte-select  name="apellido_nombre_inf[]" id="apellido_nombre_inf" class="form-control selectpicker" data-style="btn-primary" title="Seleccionar Infractores" multiple>
                              @foreach ($infractores as $infractor) 
                              <option value="{{$infractor->id}}">{{$infractor->apellido_nombre_inf}}</option>
                              @endforeach
                    </x-adminlte-select>
                  </div>
                                
                  <hr class="my-4 mx-n4" />
                  <h4 class="fw-normal">3. Carga de datos del personal instructor de la Direccion de Asuntos Internos</h4>
                  <div class="row g-3">

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-apellido_nombre_DAI">Apellido y Nombre</label>
                      <input type="text" name="apellido_nombre_DAI" value="{{ $sumario-> apellido_nombre_DAI }}" id="multicol-apellido_nombre_DAI" class="form-control" placeholder="Escribir el apellido y nombre"/>
                    </div>

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-leg_pers_DAI">Legajo Personal</label>
                      <input type="text" name= "leg_pers_DAI" value="{{ $sumario-> leg_pers_DAI }}" id="multicol-leg_pers_DAI" class="form-control" placeholder="Escribir el legajo personal" />
                    </div>

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-dependen_DAI">Dependencia</label>
                      <x-adminlte-select2  name="dependen_DAI" value="{{ $sumario-> dependen_DAI }}" >
                        <option value="">Seleccionar la dependencia</option>
                        <option value="Direccion de Asuntos Internos" @if ($sumario->dependen_DAI == 'Direccion de Asuntos Internos') selected @endif 'Direccion de Asuntos Internos'>Direccion de Asuntos Internos</option>
                        <option value="Departmental" @if ($sumario->dependen_DAI == 'Departamental') selected @endif 'Departamental'>Departamental</option>
                        <option value="Destacamento" @if ($sumario->dependen_DAI == 'Destacamento') selected @endif 'Destacamento'>Destacamento</option>
                      </x-adminlte-select2>
                    </div>

                    <div class="col-md-6 select2-primary">
                          <label class="form-label" for="multicol-jerarquia_DAI">Jerarquia</label>
                          <x-adminlte-select2  name="jerarquia_DAI" value="{{ $sumario-> jerarquia_DAI }}" class="select2 form-select" >
                            <option value="">Seleccionar la jerarquia</option>
                            <option value="agente" @if ($sumario->jerarquia_DAI == 'agente') selected @endif 'agente'>agente</option>
                            <option value="oficial_ayudante" @if ($sumario->jerarquia_DAI == 'oficial_ayudante') selected @endif 'oficial_ayudante'>oficial ayudante</option>
                            <option value="comisario" @if ($sumario->jerarquia_DAI == 'comisario') selected @endif 'comisario'>comisario</option>
                          </x-adminlte-select2>
                    </div>
                            

                  </div> 
           
             
                  <hr class="my-4 mx-n4" />
                  <h4 class="fw-normal">4. Carga de movimientos y sugerencias del instructor de la Direccion de Asuntos Internos </h4>
              <div class="row g-3">

                  <div class="col-md-6">
                    <label class="form-label" for="multicol-reg_interno_DAI">Registro Interno</label>
                      <input type="text" name="reg_interno_DAI" value="{{ $sumario-> reg_interno_DAI }}" id="multicol-reg_interno_DAI" class="form-control" placeholder="Registro interno" />
                    </div>

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-fecha_mov_proceDAI"> Fecha de Movimiento Procedencia</label>
                      <input type="date" name="fecha_mov_proceDAI" value="{{ $sumario-> fecha_mov_proceDAI }}" id="multicol-fecha_mov_proceDAI" class="form-control" placeholder="Fecha de pase del expediente " />
                    </div>

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-destin_proceden_DAI">Destino de Procedencia</label>
                      <x-adminlte-select2  name="destin_proceden_DAI" value="{{ $sumario-> destin_proceden_DAI }}" class="select2 form-select">
                        <option value="">Seleccionar la dependencia</option>
                        <option value="Direccion General Asuntos Judiciales" @if ($sumario->destin_proceden_DAI == 'Direccion General Asuntos Judiciales') selected @endif 'Direccion General Asuntos Judiciales'>Direccion General Asuntos Judiciales</option>
                        <option value="Comisaria" @if ($sumario->destin_proceden_DAI == 'Comisaria') selected @endif 'Comisaria'>Comisaria</option>
                        <option value="Departamental" @if ($sumario->destin_proceden_DAI == 'Departamental') selected @endif 'Departamental'>Departamental</option>
                      </x-adminlte-select2>
                    </div>

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-obs_proced_DAI">Observaciones de la procedencia</label>
                      <input type="text" name="obs_proced_DAI" value="{{ $sumario-> obs_proced_DAI }}" id="multicol-obs_proced_DAI" class="form-control" placeholder="Observaciones" />
                    </div>

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-tipo_mov_proce_DAI">Tipo Movimiento Pase</label>
                      <x-adminlte-select2  name="tipo_mov_proce_DAI" value="{{ $sumario->tipo_mov_proce_DAI }}" class="select2 form-select" >
                        <option value="">Seleccionar el tipo de movimiento</option>
                        <option value="Salida" @if ($sumario->tipo_mov_proce_DAI == 'Salida') selected @endif 'Salida'>Salida</option>
                        <option value="Ingreso" @if ($sumario->tipo_mov_proce_DAI == 'Ingreso') selected @endif 'Ingreso'>Ingreso</option>
                        <option value="ReIngreso" @if ($sumario->tipo_mov_proce_DAI == 'ReIngreso') selected @endif 'ReIngreso'>ReIngreso</option>
                      </x-adminlte-select2>
                    </div>
                    
                    <div class="col-md-6">
                      <label class="form-label" for="multicol-sugerencia_DAI">Sugerencia Sede Instruccion</label>
                      <input type="text" name= "sugerencia_DAI" value="{{ $sumario-> sugerencia_DAI }}" id="multicol-sugerencia_DAI" class="form-control" placeholder="Escribir la sugerencia " />
                    </div>

                    <div class="col-md-6">
                    <label class="form-label" for="multicol-fecha_elev_inst_DAI"> Fecha de Elevado por Instruccion</label>
                      <input type="date" name="fecha_elev_inst_DAI" value="{{ $sumario-> fecha_elev_inst_DAI }}" id="multicol-fecha_elev_inst_DAI" class="form-control" placeholder="Fecha elevado por insruccion " />
                    </div>

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-fecha_mov_paseDAI"> Fecha de Movimiento Pase</label>
                      <input type="date" name="fecha_mov_paseDAI" value="{{ $sumario-> fecha_mov_paseDAI }}" id="multicol-fecha_mov_paseDAI" class="form-control" placeholder="Fecha de pase del expediente " />
                    </div>

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-destin_pase_DAI">Destino de Pase</label>
                      <x-adminlte-select2  name="destin_pase_DAI" value="{{ $sumario-> destin_pase_DAI }}" class="select2 form-select">
                        <option value="">Seleccionar la dependencia</option>
                        <option value="Direccion General Asuntos Judiciales" @if ($sumario->destin_proceden_DAI == 'Direccion General Asuntos Judiciales') selected @endif 'Direccion General Asuntos Judiciales'>Direccion General Asuntos Judiciales</option>
                        <option value="Comisaria" @if ($sumario->destin_proceden_DAI == 'Comisaria') selected @endif 'Comisaria'>Comisaria</option>
                        <option value="Departamental" @if ($sumario->destin_proceden_DAI == 'Departamental') selected @endif 'Departamental'>Departamental</option>
                      </x-adminlte-select2>
                    </div>

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-obs_pase_DAI">Observaciones del pase</label>
                      <input type="text" name="obs_pase_DAI" value="{{ $sumario-> obs_pase_DAI }}" id="multicol-obs_pase_DAI" class="form-control" placeholder="Observaciones" />
                    </div>

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-tipo_mov_pase_DAI">Tipo Movimiento</label>
                      <x-adminlte-select2  name="tipo_mov_pase_DAI" value="{{ $sumario-> tipo_mov_pase_DAI }}" class="select2 form-select" >
                        <option value="">Seleccionar el tipo de movimiento</option>
                        <option value="Salida" @if ($sumario->tipo_mov_pase_DAI == 'Salida') selected @endif 'Salida'>Salida</option>
                        <option value="Ingreso" @if ($sumario->tipo_mov_pase_DAI == 'Ingreso') selected @endif 'Ingreso'>Ingreso</option>
                        <option value="ReIngreso" @if ($sumario->tipo_mov_pase_DAI == 'ReIngreso') selected @endif 'ReIngreso'>ReIngreso</option>
                      </x-adminlte-select2>
                    </div>

                    <div class="col-md-6">
                    <label class="form-label" for="multicol-concluido_DAI">Concluido por Instruccion</label>
                      <x-adminlte-select2  name="concluido_DAI" value="{{ $sumario-> concluido_DAI }}" class="select2 form-select" >
                        <option value="">Seleccione</option>
                        <option value="Si" @if ($sumario->concluido_DAI == 'Si') selected @endif 'Si'>Si</option>
                        <option value="No" @if ($sumario->concluido_DAI == 'No') selected @endif 'No'>No</option>
                      </x-adminlte-select2>
                    </div>
              </div>
              @endcan

  
              @can('EditarSumarioDGAJ')  
                  <hr class="my-4 mx-n4" />
                  <h4 class="fw-normal">5. Carga de datos del personal instructor de la Direccion General de Asuntos Judiciales</h4>
              <div class="row g-3">

                        <div class="col-md-6">
                          <label class="form-label" for="multicol-apellido_nombre_DGAJ">Apellido y Nombre</label>
                          <input type="text" name="apellido_nombre_DGAJ" value="{{ $sumario-> apellido_nombre_DGAJ }}" id="multicol-apellido_nombre_DGAJ" class="form-control" placeholder="Escribir el apellido y nombre"/>
                        </div>

                        <div class="col-md-6">
                          <label class="form-label" for="multicol-leg_pers_DGAJ">Legajo Personal</label>
                          <input type="text" name="leg_pers_DGAJ" value="{{ $sumario-> leg_pers_DGAJ }}" id="multicol-leg_pers_DGAJ" class="form-control" placeholder="Escribir el legajo personal" />
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="multicol-dependen_DGAJ">Dependencia</label>
                            <x-adminlte-select2  name="dependen_DGAJ" value="{{ $sumario-> dependen_DGAJ }}">
                              <option value="">Seleccionar la dependencia</option>
                              <option value="Direccion General de Asuntos Judiciales" @if ($sumario->dependen_DGAJ == 'Direccion General de Asuntos Judiciales') selected @endif 'Direccion General de Asuntos Judiciales'>Direccion General de Asuntos Judiciales</option>
                              <option value="Departamental" @if ($sumario->dependen_DGAJ == 'Departamental') selected @endif 'Departamental'>Departamental</option>
                              <option value="Destacamento" @if ($sumario->dependen_DGAJ == 'Destacamento') selected @endif 'Destacamento'>Destacamento</option>
                            </x-adminlte-select2>
                        </div>

                        <div class="col-md-6 select2-primary">
                          <label class="form-label" for="multicol-jerarquia_DGAJ">Jerarquia</label>
                          <x-adminlte-select2  name="jerarquia_DGAJ"  value="{{ $sumario-> jerarquia_DGAJ }}" class="select2 form-select" >
                            <option value="">Seleccionar la jerarquia</option>
                            <option value="agente" @if ($sumario->jerarquia_DAI == 'agente') selected @endif 'agente'>agente</option>
                            <option value="oficial ayudante" @if ($sumario->jerarquia_DAI == 'oficial ayudante') selected @endif 'oficial ayudante'>oficial ayudante</option>
                            <option value="comisario" @if ($sumario->jerarquia_DAI == 'comisario') selected @endif 'comisario'>comisario</option>
                          </x-adminlte-select2>
                        </div>

              </div> 

                  <hr class="my-4 mx-n4" />
                  <h4 class="fw-normal">6. Carga de movimientos y sugerencias del instructor de la Direccion General de Asuntos Judiciales </h4>
              <div class="row g-3">

                        <div class="col-md-6">
                          <label class="form-label" for="multicol-reg_interno_DGAJ">Registro Interno</label>
                            <input type="text" name="reg_interno_DGAJ" value="{{ $sumario-> reg_interno_DGAJ }}" id="multicol-reg_interno_DGAJ" class="form-control" placeholder="Registro interno" />
                        </div>
                    
                        <div class="col-md-6">
                        <label class="form-label" for="multicol-fecha_mov_proceDGAJ"> Fecha de Movimiento</label>
                          <input type="date" name="fecha_mov_proceDGAJ" value="{{ $sumario-> fecha_mov_proceDGAJ }}" id="multicol-fecha_mov_proceDGAJ" class="form-control" placeholder="Fecha de pase del expediente " />
                        </div>

                        <div class="col-md-6">
                          <label class="form-label" for="multicol-destin_proced_DGAJ">Destino de Procedencia</label>
                          <x-adminlte-select2  name="destin_proced_DGAJ" value="{{ $sumario-> destin_proced_DGAJ }}" class="select2 form-select" >
                            <option value="">Seleccionar la dependencia</option>
                            <option value="Asuntos Internos" @if ($sumario->destin_proced_DGAJ == 'Asuntos Internos') selected @endif 'Asuntos Internos'>Asuntos Internos</option>
                            <option value="Comisaria" @if ($sumario->destin_proced_DGAJ == 'Comisaria') selected @endif 'Comisaria'>Comisaria</option>
                            <option value="Departamental" @if ($sumario->destin_proced_DGAJ == 'Departamental') selected @endif 'Departamental'>Departamental</option>
                          </x-adminlte-select2>
                        </div>

                        <div class="col-md-6">
                          <label class="form-label" for="multicol-tipo_mov_proce_DGAJ">Tipo Movimiento</label>
                          <x-adminlte-select2  name="tipo_mov_proce_DGAJ" value="{{ $sumario-> tipo_mov_proce_DGAJ }}" class="select2 form-select">
                            <option value="">Seleccionar el tipo de movimiento</option>
                            <option value="Salida" @if ($sumario->tipo_mov_proce_DGAJ == 'Salida') selected @endif 'Salida'>Salida</option>
                            <option value="Ingreso" @if ($sumario->tipo_mov_proce_DGAJ == 'Ingreso') selected @endif 'Ingreso'>Ingreso</option>
                            <option value="ReIngreso" @if ($sumario->tipo_mov_proce_DGAJ == 'ReIngreso') selected @endif 'ReIngreso'>ReIngreso</option>
                          </x-adminlte-select2>
                        </div>

                        <div class="col-md-6">
                          <label class="form-label" for="multicol-sugerencia_DGAJ">Sugerencia DGAJ</label>
                          <input type="text" name="sugerencia_DGAJ" value="{{ $sumario-> sugerencia_DGAJ }}" id="multicol-sugerencia_DGAJ" class="form-control" placeholder="Escribir la sugerencia " />
                        </div>

                        <div class="col-md-6">
                          <label class="form-label" for="multicol-obs_proced_DGAJ">Observaciones de la procedencia</label>
                          <input type="text" name="obs_proced_DGAJ" value="{{ $sumario-> obs_proced_DGAJ }}" id="multicol-obs_proced_DGAJ" class="form-control" placeholder="Escribir observaciones de la procedencia" />
                        </div>
                        
                        <div class="col-md-6">
                          <label class="form-label" for="multicol-fecha_mov_destDGAJ"> Fecha de Movimiento</label>
                          <input type="date" name="fecha_mov_destDGAJ" value="{{ $sumario-> fecha_mov_destDGAJ }}" id="multicol-fecha_mov_destDGAJ" class="form-control" placeholder="Fecha de pase del expediente " />
                        </div>


                        <div class="col-md-6">
                        <label class="form-label" for="multicol-destin_pase_DGAJ">Destino de Pase</label>
                          <x-adminlte-select2  name="destin_pase_DGAJ" value="{{ $sumario-> destin_pase_DGAJ }}" class="select2 form-select" >
                            <option value="">Seleccionar la dependencia</option>
                            <option value="Asesoria Letrada" @if ($sumario->destin_pase_DGAJ == 'Asesoria Letrada') selected @endif 'Asesoria Letrada'>Asesoria Letrada</option>
                            <option value="Comisaria" @if ($sumario->destin_pase_DGAJ == 'Comisaria') selected @endif 'Comisaria'>Comisaria</option>
                            <option value="Departamental" @if ($sumario->destin_pase_DGAJ == 'Departamental') selected @endif 'Departamental'>Departamental</option>
                          </x-adminlte-select2>
                        </div>

                        <div class="col-md-6">
                          <label class="form-label" for="multicol-tipo_mov_pase_DGAJ">Tipo Movimiento</label>
                          <x-adminlte-select2  name="tipo_mov_pase_DGAJ" value="{{ $sumario-> tipo_mov_pase_DGAJ }}" class="select2 form-select" >
                            <option value="">Seleccionar el tipo de movimiento</option>
                            <option value="Salida" @if ($sumario->tipo_mov_pase_DGAJ == 'Salida') selected @endif 'Salida'>Salida</option>
                            <option value="Ingreso" @if ($sumario->tipo_mov_pase_DGAJ == 'Ingreso') selected @endif 'Ingreso'>Ingreso</option>
                            <option value="ReIngreso" @if ($sumario->tipo_mov_pase_DGAJ == 'ReIngreso') selected @endif 'ReIngreso'>ReIngreso</option>
                          </x-adminlte-select2>
                        </div>

                        <div class="col-md-6">
                          <label class="form-label" for="multicol-obs_pase_DGAJ">Observaciones del pase</label>
                          <input type="text" name="obs_pase_DGAJ" value="{{ $sumario-> obs_pase_DGAJ }}" id="multicol-obs_pase_DGAJ" class="form-control" placeholder="Escribir observaciones para el pase" />
                        </div>

                        <div class="col-md-6">
                          <label class="form-label" for="multicol-concluido_DGAJ">Concluido por Instruccion</label>
                          <x-adminlte-select2 name="concluido_DGAJ" value="{{ $sumario-> concluido_DGAJ }}" class="select2 form-select" >
                            <option value="">Seleccione</option>
                            <option value="Si" @if ($sumario->concluido_DGAJ == 'Si') selected @endif 'Si'>Si</option>
                            <option value="No" @if ($sumario->concluido_DGAJ == 'No') selected @endif 'No'>No</option>
                          </x-adminlte-select2>
                        </div>
                    
              </div>
              @endcan

              @can('EditarSumarioDGAL')
              
                  <div class="hidden-view">
                    <x-adminlte-select  name="apellido_nombre_inf[]" id="apellido_nombre_inf" class="form-control selectpicker" data-style="btn-primary" title="Seleccionar Infractores" multiple>
                              @foreach ($infractores as $infractor) 
                              <option value="{{$infractor->id}}">{{$infractor->apellido_nombre_inf}}</option>
                              @endforeach
                    </x-adminlte-select>
                  </div>

                  <hr class="my-4 mx-n4" />
                  <h4 class="fw-normal">7. Carga de datos del personal instructor de Asesoria Letrada</h4>
              <div class="row g-3">

                        <div class="col-md-6">
                          <label class="form-label" for="multicol-apellido_nombre_AL">Apellido y Nombre</label>
                          <input type="text" name="apellido_nombre_AL" value="{{ $sumario-> apellido_nombre_AL }}" id="multicol-apellido_nombre_AL" class="form-control" placeholder="Escribir el apellido y nombre"/>
                        </div>

                        <div class="col-md-6">
                          <label class="form-label" for="multicol-leg_pers_AL">Legajo Personal</label>
                          <input type="text" name="leg_pers_AL" value="{{ $sumario-> leg_pers_AL }}" id="multicol-leg_pers_AL" class="form-control" placeholder="Escribir el legajo personal" />
                        </div>

                        <div class="col-md-6">
                          <label class="form-label" for="multicol-dependen_AL">Dependencia</label>
                          <x-adminlte-select2  name="dependen_AL" value="{{ $sumario-> dependen_AL }}" class="select2 form-select">
                            <option value="">Seleccionar la dependencia</option>
                            <option value="Asesoria Letrada" @if ($sumario->dependen_AL == 'Asesoria Letrada') selected @endif 'Asesoria Letrada'>Asesoria Letrada</option>
                            <option value="Departmental" @if ($sumario->dependen_AL == 'Departamental') selected @endif 'Departamental'>Departamental</option>
                            <option value="Destacamento" @if ($sumario->dependen_AL == 'Destacamento') selected @endif 'Destacamento'>Destacamento</option>
                          </x-adminlte-select2>
                        </div>

                        <div class="col-md-6 select2-primary">
                          <label class="form-label" for="multicol-jerarquia_AL">Jerarquia</label>
                          <x-adminlte-select2  name="jerarquia_AL" value="{{ $sumario-> jerarquia_AL }}" class="select2 form-select">
                            <option value="">Seleccionar la jerarquia</option>
                            <option value="agente" @if ($sumario->jerarquia_AL == 'agente') selected @endif 'agente'>agente</option>
                            <option value="oficial_ayudante" @if ($sumario->jerarquia_AL == 'oficial_ayudante') selected @endif 'oficial_ayudante'>oficial ayudante</option>
                            <option value="comisario" @if ($sumario->jerarquia_AL == 'comisario') selected @endif 'comisario'>comisario</option>
                          </x-adminlte-select2>
                        </div>

              </div> 

                  <hr class="my-4 mx-n4" />
                  <h4 class="fw-normal">8. Carga de movimientos y sugerencias del instructor de Asesoria Letrada</h4>
              <div class="row g-3">

                    <div class="col-md-6">
                        <label class="form-label" for="multicol-reg_interno_AL">Registro Interno</label>
                        <input type="text" name="reg_interno_AL" value="{{ $sumario-> reg_interno_AL }}" id="multicol-reg_interno_AL" class="form-control" placeholder="Registro interno" />
                    </div>
                  
                    <div class="col-md-6">
                      <label class="form-label" for="multicol-fecha_mov_procAL"> Fecha de Movimiento</label>
                      <input type="date" name="fecha_mov_procAL" value="{{ $sumario-> fecha_mov_procAL }}" id="multicol-fecha_mov_procAL" class="form-control" placeholder="Fecha de pase del expediente " />
                    </div>

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-destin_proceden_AL">Destino de Procedencia</label>
                      <x-adminlte-select2  name="destin_proceden_AL" value="{{ $sumario-> destin_proceden_AL }}" class="select2 form-select" >
                        <option value="">Seleccionar la dependencia</option>
                        <option value="Direccion General Asuntos Judiciales" @if ($sumario->destin_proceden_AL == 'Direccion General Asuntos Judiciales') selected @endif 'Direccion General Asuntos Judiciales'>Direccion General Asuntos Judiciales</option>
                        <option value="Comisaria" @if ($sumario->destin_proceden_AL == 'Comisaria') selected @endif 'Comisaria'>Comisaria</option>
                        <option value="Departamental" @if ($sumario->destin_proceden_AL == 'Departamental') selected @endif 'Departamental'>Departamental</option>
                      </x-adminlte-select2>
                    </div>

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-tipo_mov_proce_AL">Tipo Movimiento</label>
                      <x-adminlte-select2 name="tipo_mov_proce_AL" value="{{ $sumario-> tipo_mov_proce_AL }}" class="select2 form-select" >
                        <option value="">Seleccionar el tipo de movimiento</option>
                        <option value="Salida" @if ($sumario->tipo_mov_proce_AL == 'Salida') selected @endif 'Salida'>Salida</option>
                        <option value="Ingreso" @if ($sumario->tipo_mov_proce_AL == 'Ingreso') selected @endif 'Ingreso'>Ingreso</option>
                        <option value="ReIngreso" @if ($sumario->tipo_mov_proce_AL == 'ReIngreso') selected @endif 'ReIngreso'>ReIngreso</option>
                      </x-adminlte-select2>
                    </div>

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-sugerencia_AL">Sugerencia</label>
                      <input type="text" name="sugerencia_AL" value="{{ $sumario-> sugerencia_AL }}" id="multicol-sugerencia_AL" class="form-control" placeholder="Escribir la sugerencia " />
                    </div>

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-obs_proced_AL">Observaciones de la procedencia</label>
                      <input type="text" name="obs_proced_AL" value="{{ $sumario-> obs_proced_AL }}" id="multicol-obs_proced_AL" class="form-control" placeholder="Escribir observaciones de la procedencia" />
                    </div>
                  
                    <div class="col-md-6">
                      <label class="form-label" for="multicol-fecha_mov_paseAL"> Fecha de Movimiento</label>
                      <input type="date" name="fecha_mov_paseAL" value="{{ $sumario-> fecha_mov_paseAL }}" id="multicol-fecha_mov_paseAL" class="form-control" placeholder="Fecha de pase del expediente " />
                    </div>

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-destin_pase_AL">Destino de Pase</label>
                      <x-adminlte-select2  name="destin_pase_AL" value="{{ $sumario-> destin_pase_AL }}" class="select2 form-select">
                        <option value="">Seleccionar la dependencia</option>
                        <option value="Direccion General Recursos Humanos" @if ($sumario->destin_pase_AL == 'Direccion General Recursos Humanos') selected @endif 'Direccion General Recursos Humanos'>Direccion General Recursos Humanos</option>
                        <option value="Comisaria" @if ($sumario->destin_pase_AL == 'Comisaria') selected @endif 'Comisaria'>Comisaria</option>
                        <option value="Departamental" @if ($sumario->destin_pase_AL == 'Departamental') selected @endif 'Departamental'>Departamental</option>
                      </x-adminlte-select2>
                    </div>

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-tipo_mov_pase_AL">Tipo Movimiento</label>
                      <x-adminlte-select2  name="tipo_mov_pase_AL" value="{{ $sumario-> tipo_mov_pase_AL }}" class="select2 form-select" >
                        <option value="">Seleccionar el tipo de movimiento</option>
                        <option value="Salida" @if ($sumario->tipo_mov_pase_AL == 'Salida') selected @endif 'Salida'>Salida</option>
                        <option value="Ingreso" @if ($sumario->tipo_mov_pase_AL == 'Ingreso') selected @endif 'Ingreso'>Ingreso</option>
                        <option value="ReIngreso" @if ($sumario->tipo_mov_pase_AL == 'ReIngreso') selected @endif 'ReIngreso'>ReIngreso</option>
                      </x-adminlte-select2>
                    </div>

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-obs_pase_AL">Observaciones del pase</label>
                      <input type="text" name="obs_pase_AL" value="{{ $sumario-> obs_pase_AL}}" id="multicol-obs_pase_AL" class="form-control" placeholder="Escribir observaciones para el pase" />
                    </div>

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-concluido_AL">Concluido por Instruccion</label>
                      <x-adminlte-select2  name="concluido_AL" value="{{ $sumario-> concluido_AL }}" class="select2 form-select">
                        <option value="">Seleccione</option>
                        <option value="Si" @if ($sumario->concluido_AL == 'Si') selected @endif 'Si'>Si</option>
                        <option value="No" @if ($sumario->concluido_AL == 'No') selected @endif 'No'>No</option>
                      </x-adminlte-select2>
                    </div>
                    
              </div>
              @endcan

              @can('EditarSumarioDGRRHH')
              
                 <div class="hidden-view">
                    <x-adminlte-select  name="apellido_nombre_inf[]" id="apellido_nombre_inf" class="form-control selectpicker" data-style="btn-primary" title="Seleccionar Infractores" multiple>
                              @foreach ($infractores as $infractor) 
                              <option value="{{$infractor->id}}">{{$infractor->apellido_nombre_inf}}</option>
                              @endforeach
                    </x-adminlte-select>
                  </div>

              
                  <hr class="my-4 mx-n4" />
                    <h4 class="fw-normal">9. Carga de datos del personal instructor de la Direccion General de Recursos Humanos</h4>
              <div class="row g-3">
                      <div class="col-md-6">
                        <label class="form-label" for="multicol-apellido_nombre_DGRRHH">Apellido y Nombre</label>
                        <input type="text" name="apellido_nombre_DGRRHH" value="{{ $sumario-> apellido_nombre_DGRRHH}}" id="multicol-apellido_nombre_DGRRHH" class="form-control" placeholder="Escribir el apellido y nombre"/>
                      </div>

                    <div class="col-md-6">
                      <label class="form-label" for="multicol-leg_pers_DGRRHH">Legajo Personal</label>
                      <input type="text" name="leg_pers_DGRRHH" value="{{ $sumario-> leg_pers_DGRRHH}}" id="multicol-leg_pers_DGRRHH" class="form-control" placeholder="Escribir el legajo personal" />
                    </div>
                    
                    <div class="col-md-6">
                          <label class="form-label" for="multicol-dependen_DGRRHH">Dependencia</label>
                          <x-adminlte-select2  name="dependen_DGRRHH" value="{{ $sumario-> dependen_DGRRHH }}" class="select2 form-select">
                            <option value="">Seleccionar la dependencia</option>
                            <option value="Direccion General de Recursos Humanos" @if ($sumario->dependen_DGRRHH == 'Direccion General de Recursos Humanos') selected @endif 'Direccion General de Recursos Humanos'>Direccion General de Recursos Humanos</option>
                            <option value="Departamental" @if ($sumario->dependen_DGRRHH == 'Departamental') selected @endif 'Departamental'>Departamental</option>
                            <option value="Destacamento" @if ($sumario->dependen_DGRRHH == 'Destacamento') selected @endif 'Destacamento'>Destacamento</option>
                          </x-adminlte-select2>
                        </div>

                    <div class="col-md-6 select2-primary">
                      <label class="form-label" for="multicol-jerarquia_DGRRHH">Jerarquia</label>
                      <x-adminlte-select2  name="jerarquia_DGRRHH" value="{{ $sumario-> jerarquia_DGRRHH}}" class="select2 form-select" >
                        <option value="">Seleccionar la jerarquia</option>
                        <option value="agente" @if ($sumario->jerarquia_DGRRHH == 'agente') selected @endif 'agente'>agente</option>
                        <option value="oficial_ayudante" @if ($sumario->jerarquia_DGRRHH == 'oficial_ayudante') selected @endif 'oficial_ayudante'>oficial ayudante</option>
                        <option value="comisario" @if ($sumario->jerarquia_DGRRHH == 'comisario') selected @endif 'comisario'>comisario</option>
                      </x-adminlte-select2>
                    </div>

              </div> 

                  <hr class="my-4 mx-n4" />
                  <h4 class="fw-normal">10. Carga de movimientos y resolucion final del instructor de la Direccion General de Recursos Humanos</h4>
              <div class="row g-3">

                      <div class="col-md-6">
                          <label class="form-label" for="multicol-reg_interno_DGRRHH">Registro Interno</label>
                          <input type="text" name="reg_interno_DGRRHH" value="{{ $sumario-> reg_interno_DGRRHH}}" id="multicol-reg_interno_DGRRHH" class="form-control" placeholder="Registro interno" />
                      </div>
                    
                      <div class="col-md-6">
                        <label class="form-label" for="multicol-fecha_mov_proceDGRRHH"> Fecha de Movimiento Procendencia</label>
                        <input type="date" name="fecha_mov_proceDGRRHH" value="{{ $sumario-> fecha_mov_proceDGRRHH}}" id="multicol-fecha_mov_proceDGRRHH" class="form-control" placeholder="Fecha de pase del expediente " />
                      </div>

                      <div class="col-md-6">
                        <label class="form-label" for="multicol-destin_proceden_DGRRHH">Destino de Procedencia</label>
                        <x-adminlte-select2  name="destin_proceden_DGRRHH" value="{{ $sumario-> destin_proceden_DGRRHH}}" class="select2 form-select">
                          <option value="">Seleccionar la dependencia</option>
                          <option value="Asesoria Letrada" @if ($sumario->destin_proceden_DGRRHH == 'Asesoria Letrada') selected @endif 'Asesoria Letrada'>Asesoria Letrada</option>
                          <option value="Comisaria" @if ($sumario->destin_proceden_DGRRHH == 'Comisaria') selected @endif 'Comisaria'>Comisaria</option>
                          <option value="Departamental" @if ($sumario->destin_proceden_DGRRHH == 'Departamental') selected @endif 'Departamental'>Departamental</option>
                        </x-adminlte-select2>
                      </div>

                      <div class="col-md-6">
                      <label class="form-label" for="multicol-tipo_mov_proce_DGRRHH">Tipo Movimiento Procedencia</label>
                        <x-adminlte-select2 name="tipo_mov_proce_DGRRHH" value="{{ $sumario-> tipo_mov_proce_DGRRHH}}" class="select2 form-select" >
                          <option value="">Seleccionar el tipo de movimiento</option>
                          <option value="Salida" @if ($sumario->tipo_mov_proce_DGRRHH == 'Salida') selected @endif 'Salida'>Salida</option>
                          <option value="Ingreso" @if ($sumario->tipo_mov_proce_DGRRHH == 'Ingreso') selected @endif 'Ingreso'>Ingreso</option>
                          <option value="ReIngreso" @if ($sumario->tipo_mov_proce_DGRRHH == 'ReIngreso') selected @endif 'ReIngreso'>ReIngreso</option>
                        </x-adminlte-select2>
                      </div>

                      <div class="col-md-6">
                        <label class="form-label" for="multicol-resol_final_DGRRHH">Resolucion Final</label>
                        <input type="text" name="resol_final_DGRRHH" value="{{ $sumario-> resol_final_DGRRHH}}" id="multicol-resol_final_DGRRHH" class="form-control" placeholder="Escribir la sugerencia " />
                      </div>

                      <div class="col-md-6">
                        <label class="form-label" for="multicol-obs_proced_DGRRHH">Observaciones de la procedencia</label>
                        <input type="text" name="obs_proced_DGRRHH"  value="{{ $sumario-> obs_proced_DGRRHH}}" id="multicol-obs_proced_DGRRHH" class="form-control" placeholder="Escribir observaciones de la procedencia" />
                      </div>
                    
                      <div class="col-md-6">
                        <label class="form-label" for="multicol-fecha_mov_paseDGRRHH"> Fecha de Movimiento Pase</label>
                        <input type="date" name="fecha_mov_paseDGRRHH" value="{{ $sumario-> fecha_mov_paseDGRRHH}}" id="multicol-fecha_mov_paseDGRRHH" class="form-control" placeholder="Fecha de pase del expediente " />
                      </div>

                      <div class="col-md-6">
                      <label class="form-label" for="multicol-destin_pase_DGRRHH">Destino de Pase</label>
                        <x-adminlte-select2 name="destin_pase_DGRRHH" value="{{ $sumario-> destin_pase_DGRRHH}}" class="select2 form-select" >
                          <option value="">Seleccionar la dependencia</option>
                          <option value="Secretaria" @if ($sumario->destin_pase_DGRRHH == 'Secretaria') selected @endif 'Secretaria'>Secretaria</option>
                          <option value="Comisaria" @if ($sumario->destin_pase_DGRRHH == 'Comisaria') selected @endif 'Comisaria'>Comisaria</option>
                          <option value="Departamental" @if ($sumario->destin_pase_DGRRHH == 'Departamental') selected @endif 'Departamental'>Departamental</option>
                        </x-adminlte-select2>
                      </div>

                      <div class="col-md-6">
                      <label class="form-label" for="multicol-tipo_mov_pase_DGRRHH">Tipo Movimiento Pase</label>
                        <x-adminlte-select2  name="tipo_mov_pase_DGRRHH" value="{{ $sumario-> tipo_mov_pase_DGRRHH}}" class="select2 form-select">
                          <option value="">Seleccionar el tipo de movimiento</option>
                          <option value="Salida" @if ($sumario->tipo_mov_pase_DGRRHH == 'Salida') selected @endif 'Salida'>Salida</option>
                          <option value="Ingreso" @if ($sumario->tipo_mov_pase_DGRRHH == 'Ingreso') selected @endif 'Ingreso'>Ingreso</option>
                          <option value="ReIngreso" @if ($sumario->tipo_mov_pase_DGRRHH == 'ReIngreso') selected @endif 'ReIngreso'>ReIngreso</option>
                        </x-adminlte-select2>
                      </div>

                      <div class="col-md-6">
                        <label class="form-label" for="multicol-obs_pase_DGRRHH">Observaciones del pase</label>
                        <input type="text" name="obs_pase_DGRRHH" value="{{ $sumario-> obs_pase_DGRRHH}}" id="multicol-obs_pase_DGRRHH" class="form-control" placeholder="Escribir observaciones para el pase" />
                      </div>

                      <div class="col-md-6">
                        <label class="form-label" for="multicol-concluido_DGRRHH">CONCLUIDO POR INSTRUCCION</label>
                        <x-adminlte-select2  name="concluido_DGRRHH" value="{{ $sumario-> concluido_DGRRHH}}" class="select2 form-select">
                          <option value="">Seleccione</option>
                          <option value="Si" @if ($sumario->concluido_DGRRHH == 'Si') selected @endif 'Si'>Si</option>
                          <option value="No" @if ($sumario->concluido_DGRRHH == 'No') selected @endif 'No'>No</option>
                        </x-adminlte-select2>
                      </div>
                      
              </div>
              @endcan
    
                  <div class="pt-4">
                      <button type="submit" class="btn btn-primary me-sm-3 me-1">Guardar</button>
                      <button type="button" class="btn btn-secondary" onClick="location.href='/sumarios'">Cancelar</button>
                  </div>
      </form>

  </div>
@endsection

@section('scripts')
<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

<script>
  $(document).ready(()=>{});
  $('#apellido_nombre_inf').selectpicker('val',@json($infractores_ids));
</script>

@endsection
