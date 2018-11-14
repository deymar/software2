<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuComidasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_comida', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_tipo_comida');
            $table->string('nombre_comida');
            $table->string('descripcion', 255);
            $table->integer('estado')->default(1);
            $table->string('dir_img',100);
            $table->timestamps();
            $table->foreign('id_tipo_comida')->references('id')->on('tipo_comida');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menu__comida');
    }
}
