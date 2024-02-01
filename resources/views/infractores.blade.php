@extends('adminlte::page')

@section('title', 'SIEJ')

@section('content_header')
    <h1 class="m-0 text-dark">Infractores</h1>
@stop

@section('content')

<!-- Basic Bootstrap Table --> 
<div class="card">
  <h5 class="card-header">Lista de Infractores</h5>
  <div class="table-responsive text-nowrap">
    <table id="infractores" class="table table-stripted shadow-lg mt-4" with-buttons>
      <thead class="bg-dark text-white">
        <tr>
          <th>ID</th>
          <th>APELLIDO NOMBRE</th>
          <th>DEPENDENCIA</th>
          <th>JERARQUIA</th>
          <th>LEGAJO </th>
          <th>DISPONIBLIDAD PREVENTIVA</th>
          <th>FECHA DISP PREVEN</th>
          <th>LEVANTAMIENTO DISP PREV</th>
          <th>FECHA LEVAN DISP PREVEN</th>
          <th>ACCION</th>

        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
         @foreach ($infractores as $infractor)
             <tr>

                    <td>{{$infractor->id}}</td>   
                    <td>{{$infractor->apellido_nombre_inf}} </td>   
                    <td>{{$infractor->dependen_inf}}</td>   
                    <td>{{$infractor->jerarquia_inf}} </td>   
                    <td>{{$infractor->leg_pers_inf}}</td>   
                    <td>{{$infractor->dispon_prev}}</td>
                    <td>{{$infractor->fecha_disp_prev}}</td>
                    <td>{{$infractor->levan_disp_prev}}</td>  
                    <td>{{$infractor->fecha_lev_disp_prev}}</td>
                    
                    <td> 
                        <form action="{{route('infractores.destroy', $infractor->id) }}" class="formEliminar" method="POST">
                          <a href="{{ route ('infractores.show', $infractor->id) }}" class="btn btn-secondary btn-sm"> Ver </a>
                          <a href="{{ route ('infractores.edit', $infractor->id) }}" class="btn btn-primary btn-sm"> Editar </a>
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
    <h1 class="m-0 text-dark">Infractores</h1>
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
             $('#infractores').DataTable({
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

