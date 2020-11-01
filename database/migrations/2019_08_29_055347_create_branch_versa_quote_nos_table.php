<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBranchVersaQuoteNosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branch_versa_quote_nos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('year');
            $table->string('branch_code');
            $table->integer('quote_no');
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
        Schema::dropIfExists('branch_versa_quote_nos');
    }
}
