<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProceduresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('procedures', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->date('fecha_creacion');
            $table->string('estado')->default('pendiente');
            $table->unsignedBigInteger('id_expedient');
            $table->unsignedBigInteger('id_typeprocedure');

            $table->foreign('id_expedient')->references('id')->on('expedients')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_typeprocedure')->references('id')->on('type_of_procedures')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('procedures');
    }
}
