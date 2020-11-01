<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFemaleOnlyQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prop_female_only_questions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('proposal_id')->unsigned();
            $table->string('widget_id', 30); // Widget ID 
            $table->string('quest_id', 30); // Question ID
            $table->smallInteger('quest_order_id');
            $table->char('quest_answer_pregnant', 1)->default('N'); // Yes - Y, No - N, Not Applicable - X
            $table->string('quest_reason_pregnant')->nullable();
            $table->date('pregnant_delivery_date')->nullable();
            $table->smallInteger('pregnant_how_many_months')->default('0');
            $table->char('quest_answer_gynecological', 1)->default('N'); // Yes - Y, No - N, Not Applicable - X
            $table->string('quest_reason_gynecological')->nullable();
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
        Schema::table('prop_female_only_questions', function (Blueprint $table) {
            $table->dropForeign(['proposal_id']);
        });
        Schema::dropIfExists('prop_female_only_questions');
    }
}
