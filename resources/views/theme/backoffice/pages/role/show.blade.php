
@extends('theme.backoffice.layouts.admin')
  
  @section('title','Seminario')
  
  @section('head')
  
  @endsection 
  
  @section('content')
      <!--visualizacion de la tabla rol en el template -->
  <div class="section">
        <p class="caption"><strong>Rol:</strong>{{ $role->name }}</p>
        <div class="divider"></div>
            <div id="basic-form" class="section">
                <div class="row">
                    <div class="col s12 m8 offset-m2">
                        <div class="card-panel">
                            <h4 class="header2">Usuarios con el rol de {{$role->name }}</h4>
                                <div class="row">
                                    <p><strong>Slug: </strong>{{$role->slug}}</p>
                                    <p><strong>Descripcion: </strong>{{$role->descripcion}}</p>
                                    <p><a href="#" style="color: red"  onclick="enviar_formulario()">Eliminar</a></p>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <!--metodo para eliminar un rol -->
    <form method ="post" action="{{route('backoffice.role.destroy', $role)}}" name="delete_form">
        {{csrf_field() }}
        {{method_field('DELETE') }}

    </form>
  @endsection
  
  @section('foot')
  <!--identificacion del formulario con el que se va eliminar -->
  <script>
      function enviar_formulario()
      {
          swal({
              title:"Deseas eliminar este Rol?",
              text:"Esta accion no se puede deshacer",
              type:"warning",
              showCancelButton: true,
              confirmButtonText: "Si, continuar",
              cancelButtonText: "No, Cancelar",

          }).then((result)=>{
              if(result.value){
                  document.delete_form.submit();
              }else{
                  swal(
                      'Operacion Cancelada',
                      'Registro no eliminado',
                      'error'
                  )
              }
          });
      }
  </script>
  
  @endsection 