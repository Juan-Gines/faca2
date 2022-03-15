<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->string('numero')->nullable();
            $table->integer('maquina_id')->nullable();
            $table->integer('referencia_id')->nullable();
            $table->integer('totalPiezas')->nullable();
            $table->string('estado')->nullable();
            $table->string('observaciones')->nullable();
            $table->dateTime('fechaInicio')->nullable();
            $table->dateTime('fechaFin')->nullable();
            $table->integer('tiempoCiclo')->nullable();
            $table->decimal('pesoPieza')->nullable();
            $table->integer('cavidades')->nullable();
            $table->string('material')->nullable();
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
        Schema::dropIfExists('pedidos');
    }
}
