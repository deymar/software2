@extends('./../layouts/huesped/estructuraHuesped')

@section('title')
    Pedidos del cliente
@endsection
@section('styles')
@parent
<link rel="stylesheet" href="/css/pedido/vista_pedidos.css">
@endsection

@section('body-huesped')
    @if (isset($pedidos['comida_agregada']) && count($pedidos['comida_agregada'])>0)
        
    <div class="title-section">
        Alimentos Seleccionados
    </div>
    <div class="table-content">
        <table class="table">
            <thead class="thead">
                <tr>
                    <th class="tencabezado" >Nombre</th>
                    <th class="tencabezado" >Cantidad</th>
                    <th class="tencabezado" >Accion</th>
                </tr>
            </thead>
            <tbody class="tbody">
                @foreach ($pedidos['comida_agregada'] as $comida)
                <tr class="fila" >
                    <td class="tcol" >{{$comida['nombre_comida']}}</td>
                    <td class="tcol" >{{$comida['cantidad']}}</td>
                    <td class="tcol" >Accion</td>
                </tr>    
                @endforeach
            </tbody>
        </table>
        <form action="{{route('efectuarPedido')}}" method="POST">
            @csrf
                <input class="btn-mediano" type="submit" value="Efectuar Pedido">
        </form>
    </div>
    @endif


    @if (count($pedidos['comida_pedida']) > 0)
        <div class="title-section">
            Pedidos de Comida Enviados    
        </div>

        <div class="table-content">
            @for ($i = 0; $i < count($pedidos['comida_pedida']); $i++)
            
            <div class="content-pedido">
                <div class="barra-estado">
                    <div class="estado">
                        @php
                            $estate = 'En Cola';
                            $num_estate = $pedidos['comida_pedida'][$i]->estado;
                            if ($num_estate == 2) {
                                $estate = 'Preparando';
                            }elseif ($num_estate == 3) {
                                $estate = 'Listo';
                            }elseif ($num_estate == 4) {
                                $estate = 'Enviando';
                            }
                        @endphp
                        {{$estate}}
                    </div>
                    <div class="estado">
                        Ver Detalle
                    </div>

                    @if ($num_estate == 1)
                        <div class="estado">
                        <form action="{{route('cancelarPedidoComida')}}" method="POST">
                            @csrf
                                <input type="hidden" name="id_pedido" value="{{$pedidos['comida_pedida'][$i]->id}}">
                                <button class="btn color-red">Cancelar Pedido</button>
                        </form>
                        </div>
                    @endif
                </div>

                <table class="table">
                        <thead class="thead">
                            <tr>
                                <th class="tencabezado" >Nombre Comida</th>
                                <th class="tencabezado" >Cantidad</th>
                            </tr>
                        </thead>
                        <tbody class="tbody">
                         
                            @foreach ($pedidos['detalle_comida'][$i] as $comida)
                            <tr class="fila" >
                                <td class="tcol" >{{$comida->nombre_comida}}</td>
                                <td class="tcol" >{{$comida->cantidad}}</td>
                            </tr>    
                            @endforeach
                        </tbody>
                    </table>
            </div>
             
                {{--  --}}
            @endfor
        </div>

    @endif
    @endsection
    