
@extends('theme.backoffice.layouts.admin')
  
  @section('title',$permission->name)
  
  @section('head')
  
  @endsection 

  @section('breadcrumbs')
     <li><a href="{{ route ('backoffice.role.index')}}">Roles del Sistema</a></li>
     <li><a href="{{ route ('backoffice.role.show', $permission->role) }}">Rol: {{$permission->role->name}}</a></li>
     <li>{{ $permission->name }}</li>
  @endsection 

  
  @section('content')
      <!--visualizacion de la tabla rol en el template -->
  <div class="section">
        <p class="caption"><strong>Permiso:</strong>{{ $permission->name }}</p>
        <div class="divider"></div>
            <div id="basic-form" class="section">
                <div class="row">
                    <div class="col s12 m8 offset-m2">
                        <div class="card">
                        <div class="card-content">
                            <span class="card-title">{{ $permission->name}}</span>
                                    <p><strong>Slug: </strong>{{$permission->slug}}</p>
                                    <p><strong>Descripcion: </strong>{{$permission->descripcion}}</p>
                                    
                                    
                                </div>
                                <div class="card-title">
                                <a href="{{ route('backoffice.permission.edit', $permission) }}">EDITAR</a>
                                <a href="#" style="color: red"  onclick="enviar_formulario()">Eliminar</a>
                                </div>
                                
                        </div>
                    </div>
                </div>
                
            </div>
    </div>
    <!--metodo para eliminar un rol -->
    <form method ="post" action="{{route('backoffice.permission.destroy', $permission)}}" name="delete_form">
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
              title:"Deseas eliminar este permiso?",
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