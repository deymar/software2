@extends('../layouts/inicio/estructura')


    <link rel="stylesheet" href="/css/huesped/principal.css">


@section('content')
    <div class="container">
        <header class="header">
            <div class="Logo">
                Hotel Empresarial
            </div>
            <a class="right-pos exit" href="{{ route('logout') }}">
                <div class="der">
                    Cerrar Session
                </div>
            </a>
            <div class="right-pos">
                Usuario: {{ auth()->user()->user_name }}
            </div>
        </header>
        
        <div class="body">
            
            <nav class="navegacionHuesped">
                <div class="title">
                    Servicios
                </div>
                <ul>
                <a href="{{route('servicioHabitacion')}}">
                        <li class="section">Servicio a la Habitacion</li>
                    </a>
                    <li class="section">Lavanderia</li>
                    <li class="section">Piscina</li>
                    <li class="section">Spa</li>
                    <li class="section">Otro</li>
                </ul>
            </nav>

            <div class="content-section">
                <div class="coler">
                    @yield('body-personal')
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
  
@endsection