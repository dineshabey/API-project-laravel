<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChildBenefitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prop_child_benefits', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('proposal_id')->unsigned();
            $table->smallInteger('child'); //Child Number - 1/2/3/4
            $table->string('rider_code', 15); // Rider code
            $table->integer('sum_assured'); // Rider sum assured
            $table->integer('term')->default('0'); // Term
            $table->double('premium', 8, 2); // Rider premium
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
        Schema::table('prop_child_benefits', function (Blueprint $table) {
            $table->dropForeign(['proposal_id']);
        });
        Schema::dropIfExists('prop_child_benefits');
    }
}
