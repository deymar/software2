<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Pedido_Comida;
use App\DetallePedidoComida;

class CocinaController extends Controller
{
     function __construct() {
        $this->middleware('auth:personal');
    }

    public function verificarPedidos()
    {
        
        return view('personal.viewPedidos');
    }

    public function pedidosEnCola()
    {
        /**estado 1 es en cola */
        $pedidos = Pedido_Comida::getPedidosEtado(1);
        $detalles = DetallePedidoComida::getDetallesPedidoComida($pedidos);
        $data = [
            'pedidos' => $pedidos,
            'detalles' => $detalles
        ];
        return view('personal.encola' , ['pedidos_cola' => $data])
                    ->with('target' , 'enCola');
    }
    public function pedidosPreparando()
    {
        $pedidos = Pedido_Comida::getPedidosEtado(2);
        $detalles = DetallePedidoComida::getDetallesPedidoComida($pedidos);
        $data = [
            'pedidos' => $pedidos,
            'detalles' => $detalles
        ];
        return view('personal.encola', ['pedidos_cola' => $data])
                    ->with('target', 'preparando');
    }
    public function pedidosListo()
    {
        $pedidos = Pedido_Comida::getPedidosEtado(3);
        $detalles = DetallePedidoComida::getDetallesPedidoComida($pedidos);
        $data = [
            'pedidos' => $pedidos,
            'detalles' => $detalles
        ];
        return view('personal.encola', ['pedidos_cola' => $data])
                    ->with('target', 'listo');
    }

    public function cambiarEstado()
    {
        $req = request();
        $id_pedido = $req->input('id_pedido');
        $pedido = Pedido_Comida::find($id_pedido);
        $estado_actual = $pedido->estado;
        if ($estado_actual != 0) {
            $estado_actual++;
            Pedido_Comida::where('id' , $id_pedido)
                        ->update(['estado' => $estado_actual]);
            return back();
        }else{
            return back()
                ->with('error' , 'El pedido fue cancelado por el Huesped');
        }
        
    }
}
