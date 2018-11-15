<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Pedido_Comida;
use App\DetallePedidoComida;

class RecepcionController extends Controller
{
    function __construct() {
        $this->middleware('auth:personal');
    }

    public function verPedidos()
    {
        return view('personal.viewPedidos');
    }
    public function verListos()
    {
        $pedidos = Pedido_Comida::getPedidosEtado(3);
        $data = [
            'pedidos' => $pedidos
        ];
        return view('personal.recepcionViewPedidos' , ['conjunto_pedidos' => $data])
                    ->with('target' , 'listo');
    }

    public function verEnviados()
    {
        $pedidos = Pedido_Comida::getPedidosEtado(4);
        $data = [
            'pedidos' => $pedidos
        ];
        return view('personal.recepcionViewPedidos' , ['conjunto_pedidos' => $data])
                    ->with('target' , 'enviando');  
        
    }

    public function verEntregados()
    {
        $pedidos = Pedido_Comida::getPedidosEtado(5);
        $data = [
            'pedidos' => $pedidos
        ];
        return view('personal.recepcionViewPedidos' , ['conjunto_pedidos' => $data])
                    ->with('target' , 'entregado');  
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
        }
    }
}
