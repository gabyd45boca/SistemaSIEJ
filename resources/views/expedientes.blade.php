@extends('adminlte::page')

@section('title', 'SIEJ')

@section('content_header')
    <h1 class="m-0 text-dark">Expedientes</h1>
@stop

@section('content')
<!-- Basic Bootstrap Table --> 
<div class="card">
  <h5 class="card-header">Lista de Expedientes</h5>
  <div class="table-responsive text-nowrap">
       
    <table id="expedientes" class="table table-stripted shadow-lg mt-4" with-buttons>
      <thead class="bg-dark text-white">
        <tr>
          <th>ID</th>
          <th>N° ORDEN</th>
          <th>FECHA INGRESO</th>
          <th>ORIGEN</th>
          <th>TIPO</th>
          <th>FOJAS</th>
          <th>PROCEDENCIA</th>
          <th>INICIADOR</th>
          <th>EXTRACTO</th>
          <th>FECHA SALIDA</th>
          <th>DESTINO</th>
          <th>OBSERVACIONES</th>
          <th>ACCION</th>

        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
         @foreach ($expedientes as $expediente)
             <tr>

                    <td>{{$expediente->id}}</td>   
                    <td>{{$expediente->num_orden_exp}} </td>   
                    <td>{{$expediente->fecha_ingreso_exp}}</td>   
                    <td>{{$expediente->origen_exp}} </td>   
                    <td>{{$expediente->tipo_exp}}</td>   
                    <td>{{$expediente->fojas_exp}} </td>   
                    <td>{{$expediente->procedencia_exp}}</td>
                    <td>{{$expediente->iniciador_exp}}</td>
                    <td>{{$expediente->extracto_exp}}</td>   
                    <td>{{$expediente->fecha_salida_exp}} </td>   
                    <td>{{$expediente->destino_exp}}</td>
                    <td>{{$expediente->observaciones_exp}}</td>            
              
                    <td>
                        <form action="{{route('expedientes.destroy', $expediente->id) }}" class="formEliminar" method="POST">
                          <a href="{{ route ('expedientes.show', $expediente->id) }}" class="btn btn-secondary btn-sm"> Ver </a>
                          <a href="{{ route ('expedientes.edit', $expediente->id) }}" class="btn btn-primary btn-sm"> Editar </a>
                          @csrf
                          @method('delete')
                          <input type="submit" value="Eliminar" class="btn btn-danger btn-sm">
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
    <h1 class="m-0 text-dark">Expedientes</h1>
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
             $('#expedientes').DataTable({
                      "language":{
                          "search":      "Buscar",
                          "lengthMenu":  "Mostrar _MENU_ registros por pagina",
                          "info":        "Mostrando pagina _PAGE_ de _PAGES_",
                          "paginate":     {
                                              "previous":  "Anterior",
                                              "next":      "Siguiente",
                                              "first":     "Primero",
                                              "last":      "Ultimo"
                          }  

                      }

             });
       });
   </script>

<script>
    $(document).ready(function(){
      $('.formEliminar').submit(function(e){
             e.preventDefault();
             Swal.fire({
                  title: "Estas seguro?",
                  text: "Se eliminara el registro!",
                  icon: "warning",
                  showCancelButton: true,
                  confirmButtonColor: "#3085d6",
                  cancelButtonColor: "#d33",
                  confirmButtonText: "Si, eliminar!"
              }).then((result) => {
                if (result.isConfirmed) {
                      this.submit();  
                      
                }
              }); 
      })
    
    })
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


