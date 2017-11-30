<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReciboTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recibo', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nic',7)->unique();
            $table->decimal('monto_total',8,2);
            $table->date('fecha_emision');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->date('fecha_vencimiento');
            $table->integer('tipo_recibo');
            $table->integer('id_usuario')->unsigned();
            //$table->timestamps();
            //llave foranea
            $table->foreign('id_usuario')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recibo');
    }
}
