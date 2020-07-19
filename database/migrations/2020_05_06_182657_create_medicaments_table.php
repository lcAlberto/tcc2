<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class  CreateMedicamentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicaments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');//nome
            $table->string('active_principle');//princípio ativo
//            $table->string('indications');//indicações
//            $table->string('laboratory');//laboratório
//            $table->enum('admission', MedicamentsAdmission::getConstantsValues());//admissão
            $table->string('grace_period_beef');//carencia corte
            $table->string('grace_period_dairy');//carencia leite
//            $table->string('dosage');//dosagem
            $table->string('flyer');//bula
            $table->string('thumbnail');//thumbnail

            $table->integer('farm_id')->unsigned();
            $table->foreign('farm_id')
                ->references('id')
                ->on('farms')
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
        Schema::dropIfExists('medicaments');
    }
}
