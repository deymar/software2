@extends('./layouts/personal/multitab')

@section('title')
    Pedidos
@endsection


@section('section-tab')
    @if (count($conjunto_pedidos['pedidos']) > 0)
    <div class="content-tab">
        <div class="title-section">
            Pedidos:
        </div>

        <div class="table-content">
            <div class="content-pedido">
                <table class="table">
                        <thead class="thead">
                            <tr>
                                <th class="tencabezado" ># Pedido</th>
                                <th class="tencabezado"># habitacion</th>
                                <th class="tencabezado" >Fecha Pedido</th>
                                <th class="tencabezado" >Estado</th>
                                <th class="tencabezado" >Operacion</th>
                            </tr>
                        </thead>
                        <tbody class="tbody">

                            @php
                                $state = 'Listo';
                                $actual = $conjunto_pedidos['pedidos'][0]->estado; 
                                if($actual == 4){
                                    $state = 'Enviando';
                                }else if($actual == 5){
                                    $state = 'Entregado';
                                }
                            @endphp
                         
                            @foreach ($conjunto_pedidos['pedidos'] as $pedido)
                            <tr class="fila" >
                                <td class="tcol" >{{$pedido->id}}</td>
                                <td class="tcol">{{$pedido->nro_puerta}}</td>
                                <td class="tcol" >{{$pedido->fecha_pedido}}</td>
                                <td class="tcol" >{{$state}}</td>
                                <td class="tcol" >
                                    @if ($pedido->estado != 5)
                                        
                                    <form action="{{route('recepcionCambiarEstado')}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id_pedido" value="{{$pedido->id}}">
                                        <input class="btn color-green" type="submit" value="Siguiente Estado">    
                                    </form>    
                                    @else
                                        Ninguna
                                    @endif
                                </td>                                
                            </tr>    
                            @endforeach
                        </tbody>
                    </table>
            </div>
    </div>
    @else
        <div class="bienvenida">
            No hay Pedidos para esta seccion
        </div>
    @endif
@endsection

@section('scripts')
    @parent
@endsection