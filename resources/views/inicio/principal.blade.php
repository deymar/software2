@extends('./../layouts/inicio/estructura')


@section('styles')
<link rel="stylesheet" href="/css/principal.css">
@endsection

{{-- seccion donde se define el titulo de la pagina --}}
@section('title') Pagina Principal @endsection

@section('imagen_fondo')
    <img src="/imagenes/fondo.jpg" alt="Fondo">
@endsection


{{-- seccion donde se define el contenido que tendra la pagina --}}
@section('content')
    <div class="container">
        <div class="left">
            <div class="title">
                Hotel Empresarial
            </div>
        </div>
        
        <div class="right">
            <ul class="sessiones">
            <a href="{{ route('loginPersonal') }}">
                    <li class="tipo-session">
                        Personal
                    </li>
                </a>
                <a href="{{ route('loginCliente') }}">
                    <li class="tipo-session">
                        Atencion al Cliente
                    </li>
                </a>
            </ul>
        </div>
    </div>
@endsection


{{-- seccion donde se definen los scripts que se usaran para el content --}}
@section('scripts')

@endsection
