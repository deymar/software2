<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Pedido_Comida;
use App\DetallePedidoComida;
class HuespedController extends Controller
{

    
    protected $redirectTo = '/';
    function __construct() {
        $this->middleware('auth:huesped');
    }


    public function principalHuesped()
    {
        return view('huesped.principal');
    }

    public function verPedidos()
    {
        $pedido = request()->session()->get('pedidos_comidas');
        $id_habitacion = Auth::user()->id;
        $pedidos_efectuados = Pedido_Comida::getPedidosHuesped($id_habitacion);
        $detalles_pedidos = DetallePedidoComida::getDetallesPedidoComida($pedidos_efectuados);
        
        $pedidos = [
            'comida_agregada' => $pedido,
            'comida_pedida' => $pedidos_efectuados,
            'detalle_comida' =>$detalles_pedidos
        ];
        return view('huesped.viewPedidos' , ['pedidos' => $pedidos]);
    }

    public function efectuarPedido()
    {
        $detalles = request()->session()->get('pedidos_comidas');
        $id_habitacion = Auth::user()->id;
        $fecha = Carbon::now()->format('Y-m-d H:i:s');

        $id_pedido = Pedido_comida::newPedido($id_habitacion , $fecha);
                    DetallePedidoComida::addDetalle($id_pedido , $detalles);


        request()->session()->forget('pedidos_comidas');

        return back()
                ->with('message' , 'El pedido se envio exitosamente');
    }

    public function cancelarPedidoComida()
    {
        $id_pedido = request()->input('id_pedido');
        $estado_actual = Pedido_comida::find($id_pedido);

        if($estado_actual->estado == 1){
            
            $cambio_estado = Pedido_Comida::where('id' , $id_pedido)
                                    ->update(['estado' => 0]);
            return back()
                    ->with('message' , 'El pedido fue cancelado');

        }else{
            return back()
                    ->with('error' , 'No se pudo Cancelar el pedido (estan preparando la orden)');
        }
            
    }

    // public function username()
    // {
    //     return 'user_name';
    // }

    
}
