<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnimalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome')->nullable();
            $table->string('dt_nascimento');//birth
            $table->string('sexo');//gender
            $table->string('classificacao');//classification
            $table->string('raca')->nullable()->default('Não Definida');//breed
            $table->string('filho')->nullable();//son
            $table->string('mae')->nullable();//mother
            $table->string('pai')->nullable();//father
            $table->string('status')->default('Ativo');//ativo //vendido //morto
            $table->string('profile')->nullable();//profile
            $table->string('idade')->nullable();//age
            $table->string('created_by');//created_by
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
        Schema::dropIfExists('animals');
    }
}
