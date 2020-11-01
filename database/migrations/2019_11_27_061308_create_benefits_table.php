<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBenefitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prop_benefits', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('proposal_id')->unsigned();
            $table->string('product', 20); // Product e.g  Privileged Life
            $table->string('requirement', 20); // Primary Need e.g Savings
            $table->string('payment_method', 15); // Frequency e.g Monthly
            $table->smallInteger('policy_term'); // Policy Term (Years)
            $table->smallInteger('premium_term'); // Premium Term (Years)
            $table->smallInteger('cover_multiple'); // Cover multiple
            $table->Integer('sum_assured');
            $table->Integer('annual_premium');
            $table->Integer('total_premium');
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
        Schema::table('prop_benefits', function (Blueprint $table) {
            $table->dropForeign(['proposal_id']);
        });
        Schema::dropIfExists('prop_benefits');
    }
}
