<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePresentStateOfHealthsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prop_state_of_health_questionnaires', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('proposal_id')->unsigned();
            $table->string('widget_id', 30); // Widget ID 
            $table->string('quest_id', 30); // Question ID
            $table->smallInteger('quest_order_id');
            $table->char('quest_answer_in', 1)->default('N'); // Yes - Y, No - N, Not Applicable - X
            $table->char('quest_answer_sp', 1)->default('X'); // Yes - Y, No - N, Not Applicable - X
            $table->string('quest_yes_reason_in')->nullable();
            $table->string('quest_yes_reason_sp')->nullable();
            $table->smallInteger('quest_height_in')->nullable(); // Height of Insured
            $table->smallInteger('quest_weight_in')->nullable(); // Weight of Insured
            $table->smallInteger('quest_height_sp')->nullable(); // Height of Spouse
            $table->smallInteger('quest_weight_sp')->nullable(); // Weight of Spouse
            $table->timestamps();
            $table->foreign('proposal_id')->references('id')->on('proposals')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('prop_state_of_health_questionnaires', function (Blueprint $table) {
            $table->dropForeign(['proposal_id']);
        });
        Schema::dropIfExists('prop_state_of_health_questionnaires');
    }
}
