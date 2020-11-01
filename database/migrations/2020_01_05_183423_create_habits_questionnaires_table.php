<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHabitsQuestionnairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prop_habits_questionnaires', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('proposal_id')->unsigned();
            $table->string('widget_id', 30); // Widget ID 
            $table->string('quest_id', 30); // Question ID
            $table->smallInteger('quest_order_id');
            $table->char('quest_answer_in', 1)->default('N'); // Yes - Y, No - N, Not Applicable - X
            $table->char('quest_answer_sp', 1)->default('X'); // Yes - Y, No - N, Not Applicable - X
            $table->string('quest_since_when_in')->nullable(); // Since when description insured
            $table->string('quest_how_often_in')->nullable(); // How often description insured
            $table->string('quest_in_what_quantities_in')->nullable(); // In what quantities description insured
            $table->string('quest_since_when_sp')->nullable(); // Since when description spouse
            $table->string('quest_how_often_sp')->nullable(); // How often description spouse
            $table->string('quest_in_what_quantities_sp')->nullable(); // In what quantities description spouse
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
        Schema::table('prop_habits_questionnaires', function (Blueprint $table) {
            $table->dropForeign(['proposal_id']);
        });
        Schema::dropIfExists('prop_habits_questionnaires');
    }
}
