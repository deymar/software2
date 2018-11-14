<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class PedidoController extends Controller
{
    function __construct() {
        $this->middleware('auth:huesped');
    }
    public function addPedidoComida()
    {
        if(request()->session()->get('pedidos_comidas') == null)
        {
            request()->session()->put('pedidos_comidas',[]);
        }
        $solicitud = request();
        $session = $solicitud->session();
        $id_comida = $solicitud->input('id_comida');
        $cantidad = $solicitud->input('cantidad');
        $nombre_comida = $solicitud->input('comidaName');

        if($cantidad != null){
            $pedido = [
                'id_comida' => $id_comida,
                'cantidad' => $cantidad,
                'nombre_comida' => $nombre_comida
            ];
            $pedidos = $session->get('pedidos_comidas');
            array_push($pedidos,$pedido);
            $session->put('pedidos_comidas' , $pedidos);
        }
        // dd($session->get('pedidos_comidas'));
        return back();
    }

    public function removePedidoComida()
    {
        $request = request();
        $session = $request->session();
        $id_comida = $request->input('id_comida');
        $pedidos = $session->get('pedidos_comidas');
        $aux;
        // dd(reset($pedidos));
        foreach ($pedidos as $pedido) {
            if($pedido['id_comida'] == $id_comida){
                $aux = $pedido;
                break;
            }
        }
        $indice = array_search($aux , $pedidos);
        
        unset($pedidos[$indice]);
        $session->put('pedidos_comidas' , $pedidos);
        return back();
    }
}
