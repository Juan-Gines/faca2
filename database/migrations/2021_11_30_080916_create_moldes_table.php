<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoldesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('moldes', function (Blueprint $table) {
            $table->id();
            $table->string('numero')->unique();
            $table->string('nombre')->nullable();
            $table->string('ubicacionReal')->unique()->nullable();
            $table->string('ubicacionActual')->nullable();
            $table->string('versionActual')->nullable();
            $table->string('estado');
            $table->string('estadoTexto');
            $table->string('cavidades')->nullable();
            $table->text('comentario')->nullable();
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
        Schema::dropIfExists('moldes');
    }
}
