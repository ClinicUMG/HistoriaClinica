@extends('theme.frontoffice.layouts.main')

@section('title', 'Agendar una cita')

@section('head')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/frontoffice/plugins/pickadate/themes/default.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/frontoffice/plugins/pickadate/themes/default.date.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/frontoffice/plugins/pickadate/themes/default.time.css')}}">
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
                        <form action="{{ route('frontoffice.patient.store_schedule') }}" method="POST">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">people</i>
                                    <select id="speciality" name="doctor">
                                        <option disabled="" selected="">-- Selecciona una especialidad-- </option>
                                        @foreach($specialities as $speciality)
                                            <option value="{{ $speciality->id }}">{{$speciality->name}}</option>
                                        @endforeach
                                    </select>
                                    <label>Selecciona la especialidad</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">people</i>
                                    <select id="doctor" name="doctor">
                                        <option disabled="" selected="">-- Primero selecciona una especialidad --</option>
                                    </select>
                                    <label>Selecciona al doctor</label>
                                </div>
                            </div>
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
        </div>
    </div>
@endsection

@section('foot')
    <script type="text/javascript" src="{{asset('assets/frontoffice/plugins/pickadate/picker.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/frontoffice/plugins/pickadate/picker.date.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/frontoffice/plugins/pickadate/picker.time.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/frontoffice/plugins/pickadate/legacy.js')}}"></script>
    <script type="text/javascript">
        $('select').formSelect();
        var input_date = $('.datepicker').pickadate({
            min: true,
            formatSubmit: 'yyyy-m-d'
        });
        var date_picker = input_date.pickadate('picker');
        
        
        var input_time = $('.timepicker').pickatime({
            min: [7,30],
            max:[21,0],
            formatSubmit: 'HH:i',
        });
        var time_picker = input_time.pickatime('picker');

        var speciality = $('#speciality');
        var doctor= $('#doctor');

        speciality.change(function(){
            $.ajax({
                url: "{{route('ajax.user_speciality')}}",
                method: 'GET',
                data:
                    {
                        speciality: speciality.val(),
                    },
                    success: function(data){
                        doctor.empty();
                        doctor.append('<option disabled selected>-- Selecciona un médico --</option>');
                        $.each(data, function(index, element){
                            doctor.append('<option value="'+ element.id +'">'+ element.name +'</option>')
                        });
                        doctor.formSelect();
                    }
            });
        });
      /*   doctor.change(function(){
            date_picker.set({
                disable:[
                    [2019,1,28]
                ],
            });
            time_picker.set({
                min: [7,30],
                max: [21,0],
                disable: [
                    { from:[14,0], to: [15:30 ] },
                    [10,0],
                ]
            });
        }); */ 
    </script>
@endsection