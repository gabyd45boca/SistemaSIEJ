@extends('adminlte::page')

@section('title', 'SIEJ')

@section('content_header')
    <h1 class="m-0 text-dark">Administracion de Usuarios y Permisos</h1>
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
<!-- Basic Bootstrap Table --> 
<div class="card">
  <h5 class="card-header">Lista de Usuarios</h5>
  
  <div class="card-header">     
  <x-adminlte-button label="+ Usuario" theme="primary"  title="Nuevo Usuario" class="float-right" data-toggle="modal" data-target="#modalPurple"/>             
  </div>
  
  <div class="table-responsive text-nowrap">
       
    <table id="roles"  class="table table-stripted shadow-lg mt-4" with-buttons>
      <thead class="bg-dark text-white">
        <tr>
          <th>ID</th>
          <th>NOMBRE</th>
          <th>EMAIL</th>
          <th>ROL</th>
          <th>ACCION</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
         @foreach ($users as $user)
             <tr>

                    <td>{{$user->id}}</td>   
                    <td>{{$user->name}} </td>
                    <td>{{$user->email}} </td>    
                    <td>
                                    @foreach ($user->roles as $role)
                                    {{$role->name}} <br>
                                    @endforeach
                    </td>  
                    <td>
                        <form action="{{route('asignar.destroy', $user)}}" class="formEliminar" method="POST">
                          <a href="{{route ('asignar.edit',$user)}}" class="btn btn-primary btn-sm"  title="Editar"> 
                            <i class="fas fa-edit"></i>
                          </a>
                          @csrf
                          @method('delete')
                            <button type="submit" class="btn btn-danger btn-sm" title="Eliminar">
                              <i class="fas fa-trash"></i>
                            </button>
                        </form>   
                    </td>   
            </tr>
         @endforeach
      </tbody>
    </table>
  </div>
</div>

<!--/ Basic Bootstrap Table -->

<x-adminlte-modal id="modalPurple" title="Nuevo Usuario" theme="dark" icon="fas fa-user" size='lg' disable-animations>
  <form action="{{ route('asignar.store') }}" method="post">
    @csrf
     <div class="row">
      <x-adminlte-input name="nombre" label="Nombre" required placeholder="Escriba nombre del usuario" fgroup-class="col-md-6" disable-feedback/>
      <x-adminlte-input name="email" label="Email" type="email" required placeholder="Escriba el correo electrónico del usuario" fgroup-class="col-md-6" disable-feedback/>
      <x-adminlte-input name="password" label="Contraseña" type="password" required placeholder="Escriba la contraseña del usuario" fgroup-class="col-md-6" disable-feedback/>
     </div>
     <x-adminlte-button type="submit" label="Guardar" theme="primary"/> 
  </form>
</x-adminlte-modal>
      
@endsection


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
             let dataTable = $('#roles').DataTable({
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


