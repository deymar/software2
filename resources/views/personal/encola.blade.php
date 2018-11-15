@extends('./layouts/personal/multitab')

@section('title')
    Pedidos del huesped
@endsection


@section('section-tab')
    
    @if (count($pedidos_cola['pedidos']) > 0)
    <div class="content-tab">
        <div class="title-section">
            Pedidos:
        </div>

        <div class="table-content">
            @for ($i = 0; $i < count($pedidos_cola['pedidos']); $i++)
            
            <div class="content-pedido">
                <div class="barra-estado">
                    <div class="estado">
                        # Pedido: {{$pedidos_cola['pedidos'][$i]->id}}
                    </div>
                    <div class="estado">
                        Fecha del Pedido : {{$pedidos_cola['pedidos'][$i]->fecha_pedido}}
                    </div>
                                <div class="estado">
                                    @php
                                        $estate = 'En Cola';
                                        $num_estate = $pedidos_cola['pedidos'][$i]->estado;
                                        if ($num_estate == 2) {
                                            $estate = 'Preparando';
                                        }elseif ($num_estate == 3) {
                                            $estate = 'Listo';
                                        }elseif ($num_estate == 4) {
                                            $estate = 'Enviando';
                                        }
                                    @endphp
                                    Estado : {{$estate}}
                                </div>

                    @if ($num_estate != 3)
                        <div class="estado">
                        <form action="{{route('cambiarEstadoPedidoComida')}}" method="POST">
                            @csrf
                                <input type="hidden" name="id_pedido" value="{{$pedidos_cola['pedidos'][$i]->id}}">
                                <button class="btn color-green">Siguiente Estado</button>
                        </form> 
                        </div>
                    @endif
                </div>

                <table class="table">
                        <thead class="thead">
                            <tr>
                                <th class="tencabezado" >Nombre Comida</th>
                                <th class="tencabezado">Categoria</th>
                                <th class="tencabezado" >Cantidad</th>
                            </tr>
                        </thead>
                        <tbody class="tbody">
                         
                            @foreach ($pedidos_cola['detalles'][$i] as $comida)
                            <tr class="fila" >
                                <td class="tcol" >{{$comida->nombre_comida}}</td>
                                <td class="tcol">{{$comida->nombre_tipo}}</td>
                                <td class="tcol" >{{$comida->cantidad}}</td>
                            </tr>    
                            @endforeach
                        </tbody>
                    </table>
            </div>
             
                {{--  --}}
            @endfor
    </d iv>
    @else
        <div class="bienvenida">
            No hay Pedidos para esta seccion
        </div>
    @endif

@endsection

@section('scripts')
    @parent
@endsection