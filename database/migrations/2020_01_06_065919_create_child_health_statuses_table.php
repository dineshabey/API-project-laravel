<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChildHealthStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prop_child_health_questionnaires', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('proposal_id')->unsigned();
            $table->string('widget_id', 30); // Widget ID 
            $table->string('quest_id', 30); // Question ID
            $table->smallInteger('quest_order_id');
            $table->char('quest_answer_ch1', 1)->default('X'); // Yes - Y, No - N, Not Applicable - X
            $table->char('quest_answer_ch2', 1)->default('X'); // Yes - Y, No - N, Not Applicable - X
            $table->char('quest_answer_ch3', 1)->default('X'); // Yes - Y, No - N, Not Applicable - X
            $table->char('quest_answer_ch4', 1)->default('X'); // Yes - Y, No - N, Not Applicable - X
            $table->string('quest_yes_reason_ch1')->nullable();
            $table->string('quest_yes_reason_ch2')->nullable();
            $table->string('quest_yes_reason_ch3')->nullable();
            $table->string('quest_yes_reason_ch4')->nullable();
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
        Schema::table('prop_child_health_questionnaires', function (Blueprint $table) {
            $table->dropForeign(['proposal_id']);
        });
        Schema::dropIfExists('prop_child_health_questionnaires');
    }
}
