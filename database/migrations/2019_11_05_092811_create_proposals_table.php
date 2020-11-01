<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProposalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proposals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('quote_ref');
            $table->string('prop_no', 42)->nullable(); // Proposal number provided by HNBA API
            $table->char('corres_pref_lang', 1)->nullable(); // Sinhala - S, Tamil - T, English - E
            $table->char('corres_media', 1)->nullable(); // Electronic(Email/SMS) - E, Letters - L
            $table->string('title', 10);
            $table->string('first_name', 60);
            $table->string('middle_name', 60)->nullable();
            $table->string('last_name', 60);
            $table->date('dob');
            $table->smallInteger('age')->default('0');
            $table->string('gender'); // Male, Female 
            $table->string('civil_status'); // Married, Single
            $table->string('nationality', 14)->nullable();
            $table->string('nic', 30)->nullable();
            $table->string('add_line_1', 100)->nullable();
            $table->string('add_line_2', 100)->nullable();
            $table->string('city', 20)->nullable();
            $table->string('mobile_no', 50);
            $table->string('residence_no', 50)->nullable();
            $table->string('office_no', 50)->nullable();
            $table->string('email', 40)->nullable();
            $table->string('country_residence', 30)->nullable();
            $table->string('country_perm_residence')->nullable();
            $table->string('other_citizenship')->nullable();
            $table->string('occupation_code');
            $table->string('occupation');
            $table->string('employer_name')->nullable();
            $table->string('emp_address_1')->nullable();
            $table->string('emp_address_2')->nullable();
            $table->string('emp_city')->nullable();
            $table->string('emp_country')->nullable();
            $table->string('emp_contact_no')->nullable();
            $table->double('monthly_income', 8, 2)->default('0');
            $table->string('nature_of_duties')->nullable();
            /** Bank account data */
            $table->string('bank_acc_name_1')->nullable();
            $table->string('bank_acc_no_1')->nullable();
            $table->string('bank_acc_name_2')->nullable();
            $table->string('bank_acc_no_2')->nullable();
            $table->string('bank_acc_open_hnb')->nullable();
            /** insured, spouse and agent signature data */
            $table->text('sig_data_insured')->nullable();
            $table->string('sig_img_url_insured')->nullable();
            $table->text('sig_data_spouse')->nullable();
            $table->string('sig_img_url_spouse')->nullable();
            $table->text('sig_data_agent')->nullable();
            $table->string('sig_img_url_agent')->nullable();
            /** Quotation related data */
            $table->string('quote_no');
            $table->string('version');
            $table->string('agent_code');
            $table->integer('channel_code');
            $table->string('branch_code');
            $table->string('user_category');
            $table->string('cluster_code');
            $table->string('zone_code');
            $table->string('user_role');
            /** proposal status data */
            $table->char('benefit', 1)->default('N'); // Step complete Y/N
            $table->char('info', 1)->default('N'); // Step complete Y/N
            $table->char('health', 1)->default('N'); // Step complete Y/N
            $table->char('final', 1)->default('N'); // Step complete Y/N
            $table->smallInteger('status')->default('1'); // 1 - Draft, 2 - Completed
            $table->timestamps();
            //$table->foreign('quote_ref')->references('id')->on('quotations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        /*  foreign key constraint 'proposals_quote_ref_foreign' are incompatible.

        Schema::table('proposals', function (Blueprint $table) {
            $table->dropForeign(['quote_ref']);
        });*/
        Schema::dropIfExists('proposals');
    }
}
