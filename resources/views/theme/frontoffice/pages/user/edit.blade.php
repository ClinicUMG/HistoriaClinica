@extends('theme.frontoffice.layouts.main')

@section('title', 'Editar Perfil')

@section('head')
    
@endsection

@section('content')
    <div class="container">
        <div class="row">
            @include('theme.frontoffice.pages.user.includes.nav')
            {{-- Sección Principal --}}
            <div class="col s12 m8">
                <div class="card">
                    <div class="card-content">
                        <span class="card-title">
                            @yield('title')
                        </span>
                        <div class="row">
                            <form class="col s12" action="{{route('frontoffice.user.update', [$user, 'view=frontoffice'])}}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('PUT')}}

                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="name" type="text" name="name" value="{{$user->name}}">
                                        <label for="name">Nombre del usuario</label>
                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong style="color:red">{{$errors->first('name')}}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="dob" type="date" name="dob" value="{{$user->dob->format('Y-m-d')}}">
                                        <label for="dob">Fecha de nacimiento del usuario</label>
                                        @if ($errors->has('dob'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong style="color:red">{{$errors->first('dob')}}</strong>
                                            </span>
                                        @endif
                                    </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="email" type="email" name="email" value="{{$user->email}}">
                                        <label for="email">Correo electrónico del usuario</label>
                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong style="color:red">{{$errors->first('email')}}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <button class="btn waves-effect waves-light right" type="submit">Actualizar <i class="material-icons right">send</i></button>
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