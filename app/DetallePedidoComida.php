<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DetallePedidoComida extends Model
{
    protected $table = "detalle_pedido_comida";
    protected $fillable = [
        'id_pedido_comida' ,'id_menu_comida_horario', 'cantidad',
    ];

    protected function addDetalle($idPedido , $detalles)
    {
        foreach ($detalles as $detalle) {
          DetallePedidoComida::create([
              'id_pedido_comida' => $idPedido,
              'id_menu_comida_horario' => $detalle['id_comida'],
              'cantidad' => $detalle['cantidad']
          ]); 
        }
    }

    protected function getDetallesPedidoComida($pedidos)
    {
        $detalles = [];
        $detalle;
        foreach ($pedidos as $pedido) {
            $detalle = DB::table('detalle_pedido_comida As dpc')
            ->select('dpc.id_pedido_comida',
                    'mc.nombre_comida',
                    'mc.descripcion',
                    'mc.dir_img',
                    'tc.nombre_tipo',
                    'dpc.cantidad')
            ->join('menu_comida_horario As mch','mch.id','=','dpc.id_menu_comida_horario')
            ->join('menu_comida As mc' , 'mc.id' ,'=' ,'mch.id_menu_comida')
            ->join('tipo_comida As tc', 'tc.id' , '=', 'mc.id_tipo_comida')
            ->where('dpc.id_pedido_comida', $pedido->id)
            ->get();

            array_push($detalles , $detalle );

        }

        return $detalles;
    }
}
