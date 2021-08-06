<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrabajadoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trabajadors', function (Blueprint $table) {
            $table->id();
            $table->string('Nombres', 40);
            $table->string('Apellidos', 40);
            $table->string('Codigo', 10);
            $table->string('sexo', 10);
            $table->string('DNI', 10);
            $table->string('estado', 10);
            $table->string('edad', 3);
            $table->date('Fnacimiento');
            $table->date('Finicio');
            
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
        Schema::dropIfExists('trabajadors');
    }
}
