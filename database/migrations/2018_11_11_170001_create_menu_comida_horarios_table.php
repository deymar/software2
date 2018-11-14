<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuComidaHorariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_comida_horario', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_horario_alimenticio');
            $table->unsignedInteger('id_menu_comida');
            $table->foreign('id_horario_alimenticio')->references('id')->on('horario_alimenticio');
            $table->foreign('id_menu_comida')->references('id')->on('menu_comida');
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
        Schema::dropIfExists('menu_comida_horario');
    }
}
