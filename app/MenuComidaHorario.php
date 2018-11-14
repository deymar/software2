<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MenuComidaHorario extends Model
{
    protected $table = 'menu_comida_horario';

    protected static function get_comidas($horario)
    {

        return MenuComidaHorario::select(
                        'menu_comida_horario.id',
                        'menu_comida.nombre_comida',
                        'menu_comida.descripcion',
                        'menu_comida.dir_img',
                        'tipo_comida.nombre_tipo',
                        'horario_alimenticio.nombre_horario'
                )
                ->join( 'horario_alimenticio',
                        'horario_alimenticio.id',
                        '=',
                        'menu_comida_horario.id_horario_alimenticio')
                ->join('menu_comida',
                        'menu_comida.id',
                        '=',
                        'menu_comida_horario.id_menu_comida')
                ->join( 'tipo_comida',
                        'tipo_comida.id',
                        '=',
                        'menu_comida.id_tipo_comida')
                ->where('horario_alimenticio.nombre_horario', $horario)
                ->where('menu_comida.estado', 1)
                ->orderBy('tipo_comida.id')
                ->get();
                            
    }
}
