<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePessoasJuridicasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pessoas_juridicas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('cnpj', 14);
            $table->string('razao_social');
            $table->bigInteger('representante_id');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('representante_id')->references('id')->on('pessoas_fisicas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pessoas_juridicas');
    }
}
