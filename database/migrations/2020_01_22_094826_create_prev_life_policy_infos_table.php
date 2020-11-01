<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrevLifePolicyInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prop_prev_life_policy_infos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('proposal_id')->unsigned();
            $table->string('widget_id', 30); // Widget ID 
            $table->string('quest_id', 30); // Question ID
            $table->smallInteger('quest_order_id');
            $table->char('quest_answer_in', 1)->default('N'); // Yes - Y, No - N, Not Applicable - X
            $table->char('quest_answer_sp', 1)->default('X'); // Yes - Y, No - N, Not Applicable - X
            // Insured
            $table->string('name_of_insurance_comp_in')->nullable(); // Name of insurance company insured
            $table->string('policy_number_in')->nullable(); // Policy or proposal number insured
            $table->string('sum_assured_in')->nullable(); // Sum assured insured
            $table->string('plan_of_insurance_in')->nullable(); // Plan of insurance insured
            $table->string('is_in_force_in')->nullable(); // Whether the policy is in force insured
            $table->string('life_application_declined_in')->nullable(); // Life application declined insured
            // Spouse
            $table->string('name_of_insurance_comp_sp')->nullable(); // Name of insurance company spouse
            $table->string('policy_number_sp')->nullable(); // Policy or proposal number spouse
            $table->string('sum_assured_sp')->nullable(); // Sum assured spouse
            $table->string('plan_of_insurance_sp')->nullable(); // Plan of insurance spouse
            $table->string('is_in_force_sp')->nullable(); // Whether the policy is in force spouse
            $table->string('life_application_declined_sp')->nullable(); // Life application declined spouse
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
        Schema::table('prop_prev_life_policy_infos', function (Blueprint $table) {
            $table->dropForeign(['proposal_id']);
        });
        Schema::dropIfExists('prop_prev_life_policy_infos');
    }
}
