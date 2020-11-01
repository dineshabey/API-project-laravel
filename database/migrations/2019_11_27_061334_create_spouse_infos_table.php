<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpouseInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prop_spouse_infos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('proposal_id')->unsigned();
            $table->string('sp_title', 10);
            $table->string('sp_first_name', 60);
            $table->string('sp_middle_name', 60)->nullable();
            $table->string('sp_last_name', 60);
            $table->date('sp_dob');
            $table->smallInteger('sp_age')->default('0');
            $table->string('sp_gender'); // Male, Female
            $table->string('sp_nationality', 14)->nullable();
            $table->string('sp_nic', 30)->nullable();
            $table->string('sp_add_line_1', 100)->nullable();
            $table->string('sp_add_line_2', 100)->nullable();
            $table->string('sp_city', 20)->nullable();
            $table->string('sp_mobile_no', 50)->nullable();
            $table->string('sp_residence_no', 50)->nullable();
            $table->string('sp_email', 50)->nullable();
            $table->string('sp_country_residence', 30)->nullable();
            $table->string('sp_country_perm_residence')->nullable();
            $table->string('sp_other_citizenship')->nullable();
            $table->string('sp_occupation_code');
            $table->string('sp_occupation');
            $table->string('sp_employer_name')->nullable();
            $table->string('sp_emp_address_1')->nullable();
            $table->string('sp_emp_address_2')->nullable();
            $table->string('sp_emp_city')->nullable();
            $table->string('sp_emp_country')->nullable();
            $table->string('sp_emp_contact_no')->nullable();
            $table->double('sp_monthly_income', 8, 2)->default('0');
            $table->string('sp_nature_of_duties')->nullable();
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
        Schema::table('prop_spouse_infos', function (Blueprint $table) {
            $table->dropForeign(['proposal_id']);
        });
        Schema::dropIfExists('prop_spouse_infos');
    }
}