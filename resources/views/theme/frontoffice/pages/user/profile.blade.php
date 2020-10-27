@extends('theme.frontoffice.layouts.main')

@section('title', 'Perfil de ' . $user->name)

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
                        <p><strong>Nombre: </strong>{{$user->name}}</p>
                        <p><strong>Edad: </strong>{{$user->age()}}</p>
                        <p><strong>Email: </strong>{{$user->email}}</p>
                        <p><strong>Miembro desde: </strong>{{$user->created_at->diffForHumans()}}</p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                        Beatae corrupti culpa modi minus placeat rem exercitationem assumenda praesentium, vero porro voluptatibus facere totam illo dignissimos, 
                        quos expedita consequatur est laboriosam.
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('foot')
    
@endsection