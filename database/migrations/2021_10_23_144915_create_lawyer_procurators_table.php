<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLawyerProcuratorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lawyer_procurators', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_lawyer');
            $table->unsignedBigInteger('id_procurator');
            $table->timestamps();

            $table->foreign('id_lawyer')->references('id')->on('lawyers')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_procurator')->references('id')->on('procurators')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lawyer_procurators');
    }
}
