<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChildInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prop_child_infos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('proposal_id')->unsigned();
            $table->string('ch_title', 10);
            $table->string('ch_first_name', 60);
            $table->string('ch_middle_name', 60)->nullable();
            $table->string('ch_last_name', 20);
            $table->date('ch_dob');
            $table->smallInteger('ch_age')->default('0');
            $table->string('ch_gender'); // Male, Female
            $table->string('ch_birth_place', 14)->nullable();
            $table->string('ch_relationship', 14)->nullable();
            $table->smallInteger('ch_height')->default('0');
            $table->smallInteger('ch_weight')->default('0');
            $table->smallInteger('child_number');
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
        Schema::table('prop_child_infos', function (Blueprint $table) {
            $table->dropForeign(['proposal_id']);
        });
        Schema::dropIfExists('prop_child_infos');
    }
}