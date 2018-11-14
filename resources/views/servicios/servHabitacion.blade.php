@extends('./../layouts/huesped/estructuraHuesped')

@section('styles')
<link rel="stylesheet" href="/css/huesped/atteCliente.css">
@endsection
@section('title')
    Servicio a la habitacion
@endsection

@section('body-huesped')

    <div class="title-section">
        Servicio a la habitacion
    </div>

    <div class="content-areas">
        <a href="{{route('servRestaurante')}}">
            <div class="area">
                Restaurante
            </div>
        </a>

        <a href="{{route('servBar')}}">
            <div class="area">
                Bar
            </div>
        </a>
    </div>
@endsection