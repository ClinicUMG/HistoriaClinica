
@extends('theme.backoffice.layouts.admin')

@section('title', $user->name)

@section('head')

@endsection 

@section('breadcrumbs')
    <li><a href="{{ route ('backoffice.user.index')}}">Usuarios del Sistema</a></li>
    <li>{{ $user->name }}</li>
@endsection 

@section('dropdown_settings')
    <li><a href="{{ route('backoffice.user.edit', $user)}}" class="grey-text text-darken-2">Editar Usuario</a></li>
@endsection 


  @section('content')
      <!--visualizacion de la tabla rol en el template -->
    <div class="section">
        <p class="caption"><strong>Usuario:</strong>{{ $user->name }}</p>
        <div class="divider"></div>
            <div id="basic-form" class="section">
                <div class="row">
                    <div class="col s12 m8">
                        <div class="card">
                        <div class="card-content">
                            <span class="card-title">{{ $user->name }}</span>  
                            <p><strong>Edad: </strong>{{$user->age()}}</p>
                            <p><strong>Roles: </strong>{{$user->list_roles()}}</p>
                            @if($user->has_role(config('app.doctor_role')))
                                <p><strong>Especialidades: </strong>{{$user->list_specialities()}}</p>
                            @endif
                        </div>
                                <div class="card-action">
                                <a href="{{ route('backoffice.user.edit', $user) }}">EDITAR</a>
                                <a href="#" style="color: red"  onclick="enviar_formulario()">Eliminar</a>
                                </div>
                                
                        </div>
                    </div>

                    <div class="col s12 m4">
                        @include('theme.backoffice.pages.user.includes.user_nav')
                    </div>
                </div>
            </div>

    </div>
    <!--metodo para eliminar un rol -->
    <form method ="post" action="{{route('backoffice.user.destroy', $user)}}" name="delete_form">
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
              title:"Deseas eliminar este Usuario?",
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