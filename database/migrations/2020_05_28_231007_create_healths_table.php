<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Enums\Healths\TreatmenTypeEnum;

class CreateHealthsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('healths', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('symptom')->nullable();//sintoma
            $table->timestamp('date_symptom')->nullable();//dt_sintoma
            $table->string('disease');//doença
            $table->string('causer_agent');//agente causador
            $table->timestamp('start_of_treatment');//dt_inicial_tratamento
            $table->timestamp('end_of_treatment');//dt_final_tratamento
            $table->enum('treatment_type', TreatmenTypeEnum::getConstantsValues());//tipo do tratamento

            $table->integer('farm_id')->unsigned();
            $table->foreign('farm_id')
                ->references('id')
                ->on('farms')
                ->onDelete('cascade');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->integer('animal_id')->unsigned();
            $table->foreign('animal_id')
                ->references('id')
                ->on('animals')
                ->onDelete('cascade');

            $table->integer('medicament_id')->unsigned();
            $table->foreign('medicament_id')
                ->references('id')
                ->on('medicaments')
                ->onDelete('cascade');


            $table->softDeletes();
            $table->rememberToken();


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
        Schema::dropIfExists('healths');
    }
}
