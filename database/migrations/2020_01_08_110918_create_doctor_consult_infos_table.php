<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoctorConsultInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prop_doctor_consult_questionnaires', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('proposal_id')->unsigned();
            $table->string('widget_id', 30); // Widget ID 
            $table->char('quest_answer_in', 1)->default('N'); // Yes - Y, No - N, Not Applicable - X
            $table->string('doctor_name_in', 60)->nullable(); // Doctor name insured 
            $table->string('doctor_address_in', 60)->nullable(); // Doctor address insured
            $table->string('doctor_tele_in', 60)->nullable(); // Doctor telephone insured 
            $table->date('doctor_last_consultation_in')->nullable(); // Doctor last consultation date insured
            $table->string('doctor_reason_in')->nullable();
            $table->char('quest_answer_sp', 1)->default('X'); // Yes - Y, No - N, Not Applicable - X
            $table->string('doctor_name_sp', 60)->nullable(); // Doctor name spouse 
            $table->string('doctor_address_sp', 60)->nullable(); // Doctor address spouse
            $table->string('doctor_tele_sp', 60)->nullable(); // Doctor telephone spouse 
            $table->date('doctor_last_consultation_sp')->nullable(); // Doctor last consultation date spouse
            $table->string('doctor_reason_sp')->nullable();
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
        Schema::dropIfExists('prop_doctor_consult_questionnaires');
    }
}
