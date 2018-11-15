<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\MenuComidaHorario;

class servicioController extends Controller
{
    protected $redirectTo = '/login/cliente';
    function __construct() {
        $this->middleware('auth:huesped');
    }

    public function servHabitacion()
    {
        return view('servicios.servHabitacion');
    }

    public function servRestaurante()
    {
        $query = [];
        // $hora = Carbon::now()->format('H');
        $hora = 14;

        if($hora >= 7 && $hora <= 10){
            $query = MenuComidaHorario::get_comidas('desayuno');
        }elseif($hora >= 12 && $hora <= 15){
            $query = MenuComidaHorario::get_comidas('almuerzo');
        }elseif($hora >= 19 && $hora <=21){
            $query = MenuComidaHorario::get_comidas('cena');
        }
        
        return view('servicios.servRestaurante', [ 'comidas' => $query]);
    }

    public function servBar()
    {
        return "hola";
    }




}
