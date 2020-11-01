<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNomineeInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prop_nominee_info_questionnaires', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('proposal_id')->unsigned();
            $table->string('nominee_name', 60)->nullable();
            $table->date('nominee_dob')->nullable();
            $table->smallInteger('nominee_age')->default('0');
            $table->string('nominee_nic', 12)->nullable();
            $table->smallInteger('nominee_percentage')->default('0');
            $table->string('nominee_relationship', 60)->nullable();
            /** Guardian Information */
            $table->string('guardian_name', 60)->nullable();
            $table->smallInteger('guardian_age')->default('0');
            $table->string('guardian_nic', 12)->nullable();
            $table->string('guardian_relationship', 60)->nullable();
            $table->foreign('proposal_id')->references('id')->on('proposals')->onDelete('cascade');
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
        Schema::table('prop_nominee_info_questionnaires', function (Blueprint $table) {
            $table->dropForeign(['proposal_id']);
        });
        Schema::dropIfExists('prop_nominee_info_questionnaires');
    }
}
