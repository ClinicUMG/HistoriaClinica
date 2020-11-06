
@extends('theme.backoffice.layouts.admin')
  
  @section('title','Seminario')
  
  @section('head')
  
  @endsection 

  @section('breadcrumbs')
     <li><a href="{{ route ('backoffice.speciality.index')}}">Especialidades medicas</a></li>
     <li><a href="" class="active">{{ $speciality->name }}</a></li>
  @endsection 

  @section('dropdown_settings')
    <li><a href="{{ route ('backoffice.speciality.edit', $speciality)}}" class="grey-text text-darken-2">Editar especialidad</a></li>
  @endsection 

  @section('content')
      <!--visualizacion de la tabla rol en el template -->
  <div class="section">
        <p class="caption"><strong>Especialidad:</strong>{{ $speciality->name }}</p>
        <div class="divider"></div>
            <div id="basic-form" class="section">
                <div class="row">
                    <div class="col s12 m8 offset-m2">
                        <div class="card">
                        <div class="card-content">
                            <span class="card-title">{{ $speciality->name }}</span>    
                            <table>
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th>Correo</th>
                                    </tr>
                                    
                                </thead>
                                <tbody>
                                    @forelse($users as $user)
                                        <tr>
                                            <td>{{ $user->id }}</td>
                                            <td>
                                                <a href="{{ route('backoffice.user.show', $user )}}"target="_blanck">
                                                    {{ $user->name }}
                                                </a>
                                            </td>
                                            <td>{{ $user->email }}</td>
                                        </tr>   
                                    @empty
                                        <tr>
                                            <td colspan="3"> No hay medicos registrados</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                                </table>
                                </div>
                                <div class="card-title">
                                <a href="{{ route('backoffice.speciality.edit', $speciality) }}">EDITAR</a>
                                <a href="#" style="color: red"  onclick="enviar_formulario()">Eliminar</a>
                                </div>
                                
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <!--metodo para eliminar un rol -->
    <form method ="post" action="{{route('backoffice.speciality.destroy', $speciality)}}" name="delete_form">
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
              title:"Deseas eliminar esta especialidad?",
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