<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accions', function (Blueprint $table) {
            $table->id();
            $table->integer('referencia_id')->index();            
            $table->string('tipo')->nullable()->default("reparacion");
            $table->string('lugar')->nullable();                                    
            $table->text('descripcion')->nullable();
            $table->text('reparacion')->nullable();
            $table->date('fechaEntrada')->nullable();
            $table->date('fechaSalida')->nullable();
            $table->text('fechaPrueba')->nullable();
            $table->string('ok')->nullable();
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
        Schema::dropIfExists('accions');
    }
}
