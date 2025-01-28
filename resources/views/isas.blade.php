@extends('adminlte::page')

@section('title', 'SIEJ')

@section('content_header')
    <h1 class="m-0 text-dark">Isas</h1>
@stop

@section('content')

@if ($errors->any())
        <div class="alert alert-danger">
            <ul>
               @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
     @endif

     <form method="GET" action="/isas/filtrado">
        <div class="row g-3 align-items-end">
            <div class="col-md-3">
                <label class="form-label">Fecha Inicial</label>
                <x-adminlte-input type="date" name="fechaInicial" value="{{ request('fechaInicial', old('fechaInicial')) }}" class="form-control"/>
            </div>
            <div class="col-md-3">
                <label class="form-label">Fecha Final</label>
                <x-adminlte-input type="date" name="fechaFinal" value="{{ request('fechaFinal', old('fechaFinal')) }}" class="form-control"/>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary w-100">Filtrar</button>
            </div>
            <div class="col-md-2">
                <a href="/isas" class="btn btn-secondary w-100">Restablecer</a>
            </div>

            <div class="col-md-2">
                <button type="button" class="btn btn-success  w-100" onclick="exportExcel()">Exportar Excel</button>
            </div>
         
        </div>
    </form>


<!-- Basic Bootstrap Table --> 
<div class="card">
  <h5 class="card-header">Lista de Isas</h5>
  <div class="table-responsive text-nowrap">
    <table id="isas" class="table table-stripted shadow-lg mt-4" with-buttons>
      <thead class="bg-dark text-white">
        <tr>
          <th>ID</th>
          <th>N° DJA</th>
          <th>N° DJA ORIGINAL</th>
          <th>MOTIVO</th>
          <th>LEGAJO PERSONAL</th>
          <th>APELLIDO INFRACTOR</th>
          <th>NOMBRE INFRACTOR</th>
          <th>TIPO DENUNCIA</th>
          <th>CONVERSION CONVALIDAR</th>
          <th>FECHA INGRESO</th>
          <th>ACCION</th>

        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
         @foreach ($isas as $isa)
             <tr>

                    <td>{{$isa->id}}</td>   
                    <td>{{$isa->num_dja}} </td>   
                    <td>{{$isa->num_dja_original}}</td>   
                                <td>
                                    @foreach ($isa->motivos as $motivo)
                                    {{$motivo->nombre_mot}} <br>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ($isa->infractors as $infractor)
                                    {{$infractor->leg_pers_inf }} <br>
                                    @endforeach
                                </td>
                   
                                <td>
                                    @foreach ($isa->infractors as $infractor)
                                    {{$infractor->apellido_inf}} <br>
                                    @endforeach
                                </td>
                                
                                <td>
                                    @foreach ($isa->infractors as $infractor)
                                    {{$infractor->nombre_inf}} <br>
                                    @endforeach
                                </td>   
                    <td>{{$isa->tipo_denun}}</td>
                    <td>{{$isa->conversion_convalid}}</td>      
                    <td>{{$isa->fecha_ingreso}}</td>  
                                      
                    <td> 
                        <form action="{{route('isas.destroy', $isa->id) }}" class="formEliminar" method="POST">
                            @csrf
                            @method('delete')

                          <a href="{{ route ('isas.show', $isa->id) }}" class="btn btn-secondary btn-sm" title="Ver"> 
                           <i class="fas fa-eye"></i>
                          </a>

                          <a href="{{ route ('isas.edit', $isa->id) }}" class="btn btn-primary btn-sm" title="Editar"> 
                           <i class="fas fa-edit"></i>
                          </a>
                          @can('Reingreso')   
                          <a href="{{ route('isas.reingreso.create', $isa->id) }}" class="btn btn-success btn-sm" title="Reingreso">
                                <i class="fas fa-redo-alt"></i>
                            </a>
                          @endcan  
             
                          @can('EliminarIsa') 
                             <button type="submit" class="btn btn-danger btn-sm" title="Eliminar">
                                    <i class="fas fa-trash"></i>
                             </button>
                          @endcan

                        </form> 
                    </td>   
              </tr>
         @endforeach
      </tbody>
    </table>
  </div>
</div>
<!--/ Basic Bootstrap Table -->
@endsection

@section('content_header')
    <h1 class="m-0 text-dark">Isas</h1>
@stop

@section('css')

  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css "> 

@endsection

@section('js')
   <script> src="https://code.jquery.com/jquery-3.7.0.js" </script>
   <script> src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js" </script>
   <script> src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js" </script>

   <script>
       $(document).ready(function(){
             // Inicializa DataTable
             let dataTable = $('#isas').DataTable({
                      "language": {
                          "search": "Buscar",
                          "lengthMenu": "Mostrar _MENU_ registros por página",
                          "info": "Mostrando página _PAGE_ de _PAGES_",
                          "paginate": {
                              "previous": "Anterior",
                              "next": "Siguiente",
                              "first": "Primero",
                              "last": "Último"
                          }
                      }
             });

             // Agrega el manejador de eventos para el formulario de eliminación
             $('.formEliminar').submit(function(e){
                 e.preventDefault();
                 Swal.fire({
                      title: "¿Estás seguro?",
                      text: "Se eliminará el registro",
                      icon: "warning",
                      showCancelButton: true,
                      confirmButtonColor: "#3085d6",
                      cancelButtonColor: "#d33",
                      confirmButtonText: "Sí, eliminar"
                  }).then((result) => {
                    if (result.isConfirmed) {
                          this.submit();
                    }
                  });
             });

             // Agrega el manejador de eventos al evento draw.dt para las nuevas páginas
             dataTable.on('draw.dt', function () {
                 $('.formEliminar').submit(function(e){
                     e.preventDefault();
                     Swal.fire({
                          title: "¿Estás seguro?",
                          text: "Se eliminará el registro",
                          icon: "warning",
                          showCancelButton: true,
                          confirmButtonColor: "#3085d6",
                          cancelButtonColor: "#d33",
                          confirmButtonText: "Sí, eliminar"
                      }).then((result) => {
                        if (result.isConfirmed) {
                              this.submit();
                        }
                      });
                 });
             });
       });
   </script>

@if (session("message"))      
   <script>
      $(document).ready(function(){
            let mensaje = "{{ session ('message')}}";                 
            Swal.fire({
                'title': 'Resultado',
                'text': mensaje,
                'icon': "success"                                               
            })
       })
    </script>
   @endif   

@endsection

