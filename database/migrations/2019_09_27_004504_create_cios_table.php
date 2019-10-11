<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*esse*/
        Schema::create('cios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_animals')->unsigned();
            $table->string('dt_cio');
            $table->string('dt_cobertura');
            $table->string('dt_parto_previsto');
            $table->string('dt_parto')->default('aguardando...');
            $table->string('tipo');
            $table->string('pai');
            $table->string('filho')->default('em gestação...');
            $table->string('created_by');
            $table->string('status');
            $table->foreign('id_animals')
                ->references('id')
                ->on('animals')
                ->onDelete('cascade')
                ->onUpdate('cascade');
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
        Schema::dropIfExists('cios');
    }
}
