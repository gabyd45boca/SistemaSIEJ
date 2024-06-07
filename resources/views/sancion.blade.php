@extends('adminlte::page')

@section('title', 'SIEA')

@section('content_header')
    <h1 class="m-0 text-dark">Sanciones Directas</h1>
@stop

@section('content')
<!-- Basic Bootstrap Table --> 
<div class="card">
  <h5 class="card-header">Lista de Sanciones Directas</h5>
  <div class="table-responsive text-nowrap">
       
    <table id="sanciones"  class="table table-stripted shadow-lg mt-4" with-buttons>
      <thead class="bg-dark text-white">
        <tr>
          <th>ID</th>
          <th>N° DJ</th>
          <th>MOTIVO</th>
          <th>LEGAJO PERSONAL</th>
          <th>INFRACTOR</th>
          <th>INSTRUCTOR</th>
          <th>FECHA INGRESO</th>
          <th>CONCLUIDO</th>
          <th>ACCION</th>

        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
         @foreach ($sanciones as $sancion)
             <tr>

                    <td>{{$sancion->id}}</td>   
                    <td>{{$sancion->num_dj}} </td>   
                    <td>{{$sancion->motivo}}</td>   
                                <td>
                                    @foreach ($sancion->infractors as $infractor)
                                    {{$infractor->leg_pers_inf }} <br>
                                    @endforeach
                                </td>
                   
                                <td>
                                    @foreach ($sancion->infractors as $infractor)
                                    {{$infractor->apellido_nombre_inf}} <br>
                                    @endforeach
                                </td>
                    
                    <td>{{$sancion->apellido_nombre_AL}} </td>   
                    <td>{{$sancion->fecha_ingreso}}</td>
                    <td>{{$sancion->concluido_DGRRHH}}</td>      
                                         
                    <td>
                        <form action="{{route('sancion.destroy', $sancion->id) }}" class="formEliminar" method="POST">
                          <a href="{{ route ('sancion.show', $sancion->id) }}" class="btn btn-secondary btn-sm" title="Ver" > 
                            <i class="fas fa-eye"></i>
                          </a>
                          <a href="{{ route ('sancion.edit', $sancion->id) }}" class="btn btn-primary btn-sm" title="Editar"> 
                            <i class="fas fa-edit"></i>
                          </a>
                          @csrf
                          @method('delete')

                          @can('EliminarSancion') 
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
    <h1 class="m-0 text-dark">Sanciones Directas</h1>
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
             let dataTable = $('#sanciones').DataTable({
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

