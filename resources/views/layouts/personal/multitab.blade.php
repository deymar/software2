@extends('./layouts/personal/estructuraPersonal')

@section('styles')
@parent
<link rel="stylesheet" href="/css/personal/personal.css">
@endsection

@section('body-personal')
    <div class="multitab">
    {{-- {{dd(session('target'))}} --}}
    
    @php
        $marcado = null;

        if(isset($target)){
            $marcado = $target;
        }
    @endphp

    @switch(session('datos_usuario')['nombre_area'])
        @case('Cocina')
            <a class="tab {{$marcado=='enCola'?'target-tab':'noClass'}}" href="{{route('cocinaEnCola')}}">
            <div >En Cola</div>
            </a>
            
            <a class="tab {{$marcado=='preparando'?'target-tab':'noClass'}}" href="{{route('cocinaPreparando')}}">
            <div >Preparando</div>
            </a>
            <a class="tab {{$marcado=='listo'?'target-tab':'noClass'}}" href="{{route('cocinaListo')}}">
            <div>Listo</div>
            </a> 
            @break
        @case('Recepcion')

            <a class="tab {{$marcado=='listo'?'target-tab':'noClass'}}" href="{{route('recepcionVerListos')}}">
            <div >Listo</div>
            </a>
            
            <a class="tab {{$marcado=='enviando'?'target-tab':'noClass'}}" href="{{route('recepcionVerEnviados')}}">
            <div >Enviando</div>
            </a>
            <a class="tab {{$marcado=='entregado'?'target-tab':'noClass'}}" href="{{route('recepcionVerEntregados')}}">
            <div>Entregado</div>
            </a>
            @break
        @default
            
    @endswitch
    </div>
    @yield('section-tab')
@endsection

@section('scripts')
    @parent
@endsection