
@extends('theme.backoffice.layouts.admin')
  
  @section('title','Crear permiso')
  
  @section('head')
  
  @endsection 

  @section('breadcrumbs')
     
     <li>Crear Permiso</li>
  @endsection 

  
  @section('content')
    <div class="section">
        <p class="caption">Introduce los datos para crear un nuevo permiso</p>
        <div class="divider"></div>
            <div class="section">
                <div class="row">
                    <div class="col s12 m8 offset-m2">
                        <div class="card">
                        <div class="card-content">
                            <span class="card-title">Crear Permiso</span>
                                <div class="row">
                                    <form class="col s12" method="post" action="{{route('backoffice.permission.store')}}">

                                        {{ csrf_field() }}

                                        <div class="row">
                                            <div class="input-field col s12">
                                                <input id="name" type="text" name="name">
                                                <label for="name">Nombre del Permiso</label>
                                                @if($errors->has('name'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong style="color: red">{{ $errors->first('name') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="row">
                                                <div class="input-field col s12">
                                                    <select name="role_id">
                                                    <option value="" disabled="" selected="">Selecciona un rol</option>
                                                    @foreach($roles as $role)
                                                        <option value="{{$role->id}}">{{ $role->name}}</option>
                                                    @endforeach
                                                    </select>
                                                    
                                                    @if($errors->has('role_id'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong style="color:red">{{ $errors->first('role_id') }}</strong>
                                                    </span>
                                                @endif


                                                </div> 
                                            </div>   

                                        <div class="row">
                                            <div class="input-field col s12">
                                                <textarea id="description" class="materialize-textarea"name="description"></textarea>
                                                <label for="description">Descripción del Permiso</label>
                                                @if ($errors->has('description'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong style="color:red">{{ $errors->first('description') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s12">
                                                <button class="btn waves-effect waves-light right" type="submit">Guardar
                                                    <i class="material-icons right">send</i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
  @endsection
  
  @section('foot')
  
  @endsection