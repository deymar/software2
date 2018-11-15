@extends('./../layouts/huesped/estructuraHuesped')
@section('styles')
    @parent
    <link rel="stylesheet" href="/css/huesped/bienvenida.css">
@endsection

@section('title')
    Servicios
@endsection

@section('body-huesped')
    <div class="bienvenida">
        Bienvenido a la habitacion  {{auth('huesped')->user()->nro_puerta}}
    </div>
@endsection

@section('scripts')
 @parent
    
@endsection