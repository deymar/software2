@extends('./../layouts/huesped/estructuraHuesped')

{{-- funciones php --}}
@php

    // dd(session()->get('pedidos_comidas'));
    function verificar($id){
        /*con esta funcion se verifica si sierto producto de de determinada id esta añadido al pedido
        */
        $sw = false;
        $pedidos = session()->get('pedidos_comidas');
        if($pedidos != null){
            foreach ($pedidos as $pedido) {
                if($pedido['id_comida'] == $id)
                 {   $sw = true;
                    break;}
            }
        }
        return $sw;
    }
@endphp

@section('styles')
<link rel="stylesheet" href="/css/huesped/restaurante.css">
@endsection
@section('body-huesped')
    <div class="title-section">
        Restaurante
    </div>
    <div class="contenedor-comidas">
        @if ( count($comidas) != 0)
            @php
                $section = 'dd';
            @endphp
            @foreach ($comidas as $comida)
            @if ($section != $comida->nombre_tipo)
                @php
                    $section = $comida->nombre_tipo;
                @endphp
                <h1>{{$section}}</h1>
            @endif

                @php
                    $verified = verificar($comida->id);
                @endphp
            <form  
                id="formulario_pedido" 
                action="{{  $verified?
                            route('quitarComidaPedido'):
                            route('agregarComidaPedido')
                        }}"
                method="POST">
                
                @csrf
                <div class="comida">
                <div class="nombre-comida">
                    {{$comida->nombre_comida}}
                </div>
                <div class="muestra">
                    <div class="content-img">
                        <img src="{{$comida->dir_img}}" alt="">
                    </div>
                    <div class="descripcion">
                        {{$comida->descripcion}}
                    </div>
                    <div class="pedido">
                        <button class="btn-peq">
                            {{$verified?"Quitar":"agregar"}}
                        </button>
                        <input
                            class="id_comida"
                            type="hidden"
                            name="id_comida"
                            value="{{$comida->id}}">
                        <input  
                            type="hidden" 
                            name="comidaName"
                            value="{{$comida->nombre_comida}}">
                        @if (!$verified)
                            <input  name="cantidad" class="input-peq" type="text" placeholder="cantidad"
                            autocomplete="off">
                        @endif
                    </div>
                </div>
                </div>
            </form>
            @endforeach

            @endif
            
           
        </div>
@endsection
@section('scripts')
@parent
<script src="/js/jquery-3.3.1.min.js"></script>
<script src="/js/servicios/addComida.js"></script>
@endsection