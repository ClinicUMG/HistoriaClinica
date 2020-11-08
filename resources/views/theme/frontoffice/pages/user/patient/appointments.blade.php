
@extends('theme.frontoffice.layouts.main')

@section('title', 'Mis Citas')

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
                        <table>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Especialista</th>
                                    <th>Fecha</th>
                                    <th>Estado</th> {{--Finalizado, pagado, pendiente, cancelado--}}
                                </tr>
                            </thead>
                            <tbody>
                                
                                    <tr>
                                        <td>1</td>
                                        <td>Jose</td>
                                        <td>28/11/2020</td>
                                        <td>Pendiente</td>
                                    </tr>
                               
                               
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('foot')
    
@endsection