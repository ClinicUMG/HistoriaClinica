
@extends('theme.backoffice.layouts.admin')

@section('title', 'Agendar cita para: ' . $user->name)

@section('head')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/frontoffice/plugins/pickadate/themes/default.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/frontoffice/plugins/pickadate/themes/default.date.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/frontoffice/plugins/pickadate/themes/default.time.css')}}">
@endsection 

@section('breadcrumbs')
    <li><a href="{{ route ('backoffice.user.index')}}">Usuarios del Sistema</a></li>
    <li><a href="{{route('backoffice.user.show', $user)}}"> {{$user->name}}</a></li>
    <li><a href="">Agendar Cita</a></li>
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
                                <span class="card-title">
                                    @yield('title')
                                </span>
                                <form action="#" method="POST">
                                    {{ csrf_field() }}

                                    @if(Auth::user()->has_role(config('app.doctor_role')))
                                       <input type="hidden" name="speciality" value="">
                                       <input type="hidden" name="doctor" value="{{ Auth::id() }}">
                                    @else
                                        <div class="row">
                                            <div class="input-field col s12">
                                                <i class="material-icons prefix">people</i>
                                                <select name="speciality">
                                                    <option value="1">Internista</option>
                                                    <option value="2">Pediatras</option>
                                                    <option value="3">Odontólogos</option>
                                                </select>
                                                <label>Selecciona la especialidad</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s12">
                                                <i class="material-icons prefix">people</i>
                                                <select name="doctor">
                                                    <option value=""></option>
                                                </select>
                                                <label>Selecciona al doctor</label>
                                            </div>
                                        </div>
                                    @endif
                                    <div class="row">
                                        <div class="input-field col s12 m6">
                                            <i class="material-icons prefix">today</i>
                                            <input id="datepicker" type="text" name="date" class="datepicker" placeholder="Selecciona una fecha">
                                            
                                        </div>
                                        <div class="input-field col s12 m6">
                                            <i class="material-icons prefix">access_time</i>
                                            <input id="timepicker" type="text" name="time" class="timepicker" placeholder="Selecciona un horario">
                                            
                                        </div>
                                    </div>
                                    <div class="row">
                                        <button class="btn waves-effect waves-light" type="submit">Agendar <i class="material-icons rught">send</i> </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col s12 m4">
                        @include('theme.backoffice.pages.user.includes.user_nav')
                    </div>
                </div>
            </div>

    </div>
@endsection

@section('foot')
    <script type="text/javascript" src="{{asset('assets/frontoffice/plugins/pickadate/picker.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/frontoffice/plugins/pickadate/picker.date.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/frontoffice/plugins/pickadate/picker.time.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/frontoffice/plugins/pickadate/legacy.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            var input_date = $('.datepicker').pickadate({
                min: true
            });
            var date_picker = input_date.pickadate('picker');
            
            
            var input_time = $('.timepicker').pickatime({
                min: 4
            });
            var time_picker = input_time.pickatime('picker');
        })
    </script>
@endsection