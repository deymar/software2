<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();

Route::get('/', function () {
    return view('inicio/principal');
})->name('principal')->middleware('guest:huesped');



Route::get('/login/personal' , 'Auth\LoginController@loginPersonal')->name('loginPersonal');
Route::post('/login/validar' , 'Auth\LoginController@validarLoginPersonal')->name('validarLoginPersonal');

Route::get('/login/cliente' , 'Auth\LoginController@loginCliente')->name('loginCliente');
Route::post('/login/huesped/validar' , 'Auth\LoginController@validarLoginCliente')->name('validarLoginHuesped');


Route::get('/logout', 'Auth\LoginController@logout')->name('logout');





Route::get('/personal' , 'PersonalController@paginaPrincipal')->name('PersonalPrincipal');



/**rutas de huesped */


Route::get('/huesped', 'HuespedController@principalHuesped')->name('principalHuesped');

/**
 * 
 * rutas de servicios
 */
    

    Route::get('/servicios/servicio_a_la_habitacion', 'ServicioController@servHabitacion')->name('servicioHabitacion');

    Route::get('/servicios/restaurante','ServicioController@servRestaurante')->name('servRestaurante');

    Route::get('/servicios/Bar','ServicioController@servBar')->name('servBar');

/**
 * pedidos
 */

Route::post('/pedido/comida','PedidoController@addPedidoComida')->name('agregarComidaPedido');

Route::post('/pedido/removeComida', 'PedidoController@removePedidoComida')->name('quitarComidaPedido');

Route::get('/huesped/verPedidos', 'HuespedController@verPedidos')->name('verMisPedidos');

Route::post('/huesped/efectuarPedido', 'HuespedController@efectuarPedido')->name('efectuarPedido');

Route::post('/huesped/cancelarPedidoComida', 'HuespedController@cancelarPedidoComida')->name('cancelarPedidoComida');







Route::get('/home', 'HomeController@index')->name('home');


Route::get('/pruebas',function ()
{
    $array = [1,2,3,4,5];
    $salida = '';
    $count = 0;
    unset($array[2]);

    dd($count, $array);

    return $salida;
});