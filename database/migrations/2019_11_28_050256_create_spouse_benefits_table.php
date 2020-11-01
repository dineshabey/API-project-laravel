<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpouseBenefitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prop_spouse_benefits', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('proposal_id')->unsigned();
            $table->string('rider_code', 15); // Rider code
            $table->integer('sum_assured'); // Rider sum assured 
            $table->integer('term')->default('0'); // Term
            $table->integer('sum_at_risk')->default('0'); // Sum at risk
            $table->double('premium', 8, 2); // Rider premium
            $table->integer('oe_val')->default('0'); // Occupation extra value
            $table->double('oe_premium', 8, 2)->default('0'); // Occupation loading premium
            $table->integer('he_val')->default('0'); // Health extra value
            $table->double('he_premium', 8, 2)->default('0'); // Health extra premium
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
        Schema::table('prop_spouse_benefits', function (Blueprint $table) {
            $table->dropForeign(['proposal_id']);
        });
        Schema::dropIfExists('prop_spouse_benefits');
    }
}
