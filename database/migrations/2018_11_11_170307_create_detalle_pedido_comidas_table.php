<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetallePedidoComidasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_pedido_comida', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_pedido_comida');
            $table->unsignedInteger('id_menu_comida_horario');
            $table->integer('cantidad');
            $table->foreign('id_pedido_comida')->references('id')->on('pedido_comida');
            $table->foreign('id_menu_comida_horario')->references('id')->on('menu_comida_horario');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_pedido_comida');
    }
}
