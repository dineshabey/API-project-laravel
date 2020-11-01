<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuotationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('quote_no');
            $table->string('version')->default(0);
            $table->string('agent_code');
            $table->integer('channel_code');
            $table->string('branch_code');
            $table->string('user_category');
            $table->string('cluster_code');
            $table->string('zone_code');
            $table->string('user_role');
            $table->integer('cover_multiple');
            $table->string('frequency');
            $table->decimal('monthly_basic_premium',9,3);
            $table->integer('policy_term');
            $table->integer('premium_term');
            $table->string('primary_need');
            $table->string('status');
            $table->string('title');
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->string('gender');
            $table->date('dob');
            $table->string('telephone');
            $table->string('email')->nullable();
            $table->string('nic');
            $table->string('occupation');
            $table->string('has_spouse');
            $table->string('marital_status');
            $table->integer('children');
            $table->decimal('sum_at_risk_prev_policy',9,3);
            $table->integer('no_of_sum_ass_times');
            $table->text('riders')->nullable();
            $table->string('sp_title')->nullable();
            $table->string('sp_first_name')->nullable();
            $table->string('sp_middle_name')->nullable();
            $table->string('sp_last_name')->nullable();
            $table->string('sp_gender')->nullable();
            $table->date('sp_dob')->nullable();
            $table->string('sp_occupation')->nullable();
            $table->decimal('sp_sum_at_risk_prev_policy',9,3)->nullable();
            $table->text('sp_riders')->nullable();
            $table->string('ch1_title')->nullable();
            $table->string('ch1_first_name')->nullable();
            $table->string('ch1_middle_name')->nullable();
            $table->string('ch1_last_name')->nullable();
            $table->string('ch1_gender')->nullable();
            $table->string('ch1_age')->nullable();
            $table->date('ch1_dob')->nullable();
            $table->string('ch2_title')->nullable();
            $table->string('ch2_first_name')->nullable();
            $table->string('ch2_middle_name')->nullable();
            $table->string('ch2_last_name')->nullable();
            $table->string('ch2_gender')->nullable();
            $table->string('ch2_age')->nullable();
            $table->date('ch2_dob')->nullable();
            $table->string('ch3_title')->nullable();
            $table->string('ch3_first_name')->nullable();
            $table->string('ch3_middle_name')->nullable();
            $table->string('ch3_last_name')->nullable();
            $table->string('ch3_gender')->nullable();
            $table->string('ch3_age')->nullable();
            $table->date('ch3_dob')->nullable();
            $table->string('ch4_title')->nullable();
            $table->string('ch4_first_name')->nullable();
            $table->string('ch4_middle_name')->nullable();
            $table->string('ch4_last_name')->nullable();
            $table->string('ch4_gender')->nullable();
            $table->string('ch4_age')->nullable();
            $table->date('ch4_dob')->nullable();
            $table->text('child_riders')->nullable();
            $table->text('data_obj');
            $table->text('res_obj');
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
        Schema::dropIfExists('quotations');
    }
}
