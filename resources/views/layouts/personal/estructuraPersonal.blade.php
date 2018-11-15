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
                    Operaciones
                </div>
                <ul>
                    @switch(session('datos_usuario')['nombre_area'])
                        @case('Cocina')
                            <a href="{{route('cocinaVerPedidos')}}">
                                <li class="section">Verificar Pedidos</li>
                            </a>
                            @break
                        @case('Recepcion')
                            <a href="{{route('recepcionVerPedidos')}}">
                                <li class="section">Verificar Pedidos</li>
                            </a>
                            @break
                        @case('Bar')

                            @break

                        @case('Spa')

                            @break

                        @case('Limpieza')
                            @break                            
                    @endswitch
                        
                    
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