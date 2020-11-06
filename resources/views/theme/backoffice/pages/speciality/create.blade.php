
@extends('theme.backoffice.layouts.admin')
  
  @section('title','Crear especialidad')
  
  @section('head')
  
  @endsection 

  @section('breadcrumbs')
     <li><a href="{{ route ('backoffice.speciality.index')}}">Especialidades medicas</a></li>
     <li><a href="" class="active">Crear especialidad</a></li>
    
  @endsection 

  
  @section('content')
    <div class="section">
        <p class="caption">Introduce los datos para crear una nueva especialidad.</p>
        <div class="divider"></div>
            <div class="section">
                <div class="row">
                    <div class="col s12 m8 offset-m2">
                        <div class="card">
                        <div class="card-content">
                            <span class="card-title">Crear especialidad</span>
                                <div class="row">
                                    <form class="col s12" method="post" action="{{route('backoffice.speciality.store')}}">

                                        {{ csrf_field() }}

                                        <div class="row">
                                            <div class="input-field col s12">
                                                <input id="name" type="text" name="name">
                                                <label for="name">Nombre de la especialidad</label>
                                                @if($errors->has('name'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong style="color:red">{{ $errors->first('name') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        
                                        <div class="row">
                                           
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