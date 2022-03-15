<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReferenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('referencias', function (Blueprint $table) {
            $table->id();
            $table->integer('molde_id');
            $table->string('numero')->nullable();
            $table->string('tipo')->nullable();            
            $table->string('descripcion')->nullable();
            $table->string('ubicacion')->nullable();
            $table->string('estado')->nullable();
            $table->string('estadoTexto')->nullable();
            $table->string('cavidades')->nullable();
            $table->text('comentario')->nullable();
            $table->string('fotoPieza')->nullable();            
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
        Schema::dropIfExists('referencias');
    }
}
