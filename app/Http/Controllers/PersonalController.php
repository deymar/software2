<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Area;

class PersonalController extends Controller
{

    protected $redirectTo = '/';
    function __construct() {

        $this->middleware('auth:personal');
    }

    public function paginaPrincipal()
    {
        // $menu;

        // switch ($area->nombre_area) {
            //     case 'Cocina':
            //         $menu = [
        //             [   'opcion' => 'Verificar Pedidos',
        //                 'ruta' => 'cocinaVerPedidos'] 
        //         ];
        //         break;
        //     case 'Recepcion':
        //         $menu = [
        //             [   'opcion' => 'Verificar Pedidos',
        //                 'ruta' => 'recepcionVerPedidos'] 
        //         ];
        //         break;
        
        //     case 'Bar':
        
        //         break;
        //     case 'Restaurant':
        
        //         break;    
        //     case 'Spa':
        
        //         break;
        //     case 'Limpieza':
        
        //         break;
        //     }
        $id_area = Auth::user()->id_area;
        $area = Area::getArea($id_area);        
        $session = request()->session();
        $datos_usuario = [
            'nombre_area' => $area->nombre_area
        ];

        $session->put('datos_usuario' , $datos_usuario);
        return view('personal.principal');
    }
}
