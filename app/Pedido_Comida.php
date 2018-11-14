<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido_Comida extends Model
{
    protected $table = 'pedido_comida';

    protected $fillable = [
        'id_habitacion' ,'fecha_pedido',
    ];

    protected function newPedido($hab , $fecha)
    {
        /**
         * efectua el nuevo pedido luego retorna la id
         */
        return Pedido_Comida::create([
            'id_habitacion' => $hab,
            'fecha_pedido' => $fecha
        ])->id;
    }
    
    protected function getPedidosHuesped($hab)
    {
        return Pedido_comida::select(
            'id',
            'id_habitacion',
            'fecha_pedido',
            'estado'
            )
            ->where('id_habitacion', $hab)
            ->where('estado','!=',0)
            ->where('estado','!=',5)
            ->orderBy('fecha_pedido','asc')
            ->get();
    }

}
