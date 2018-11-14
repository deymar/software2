<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePedidoComidasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedido_comida', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_habitacion');
            $table->timestamp('fecha_pedido');
            $table->integer('estado')->default(1);
            $table->timestamps();
            $table->foreign('id_habitacion')->references('id')->on('habitacion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedido_comida');
    }
}


