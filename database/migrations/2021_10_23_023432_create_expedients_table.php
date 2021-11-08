<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpedientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expedients', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->date('fecha_creacion');
            $table->string('estado')->default('pendiente');
            $table->unsignedBigInteger('id_client'); //pertenece a un cliente
            $table->unsignedBigInteger('id_lawyer');  //a cargos de un abogado
            $table->unsignedBigInteger('id_procurator');  //trabajado por un procurador
            $table->unsignedBigInteger('id_typecase');  //pertenece a un tipo de caso 

            $table->foreign('id_client')->references('id')->on('clients')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_lawyer')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_procurator')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_typecase')->references('id')->on('type_of_cases')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('expedients');
    }
}
