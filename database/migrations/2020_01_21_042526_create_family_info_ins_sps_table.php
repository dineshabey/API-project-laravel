<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFamilyInfoInsSpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prop_family_info_ins_sps', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('proposal_id')->unsigned();
            $table->string('widget_id', 30); // Widget ID 
            $table->string('quest_id', 30); // Question ID
            $table->smallInteger('quest_order_id');
            $table->string('mother_alive_dead_in', 5)->nullable(); // Alive/Dead Status
            $table->smallInteger('mother_age_in')->nullable(); //If dead age of death/ If alive - age
            $table->string('mother_state_of_health_in')->nullable(); // State of health / cause of death
            $table->string('father_alive_dead_in', 5)->nullable(); // Alive/Dead Status
            $table->smallInteger('father_age_in')->nullable(); //If dead age of death/ If alive - age
            $table->string('father_state_of_health_in')->nullable(); // State of health / cause of death
            //Other Field 1 Insured
            $table->string('other_relationship_in', 15)->nullable(); // Relationship
            $table->string('other_alive_dead_in', 5)->nullable(); // Alive/Dead Status
            $table->smallInteger('other_age_in')->nullable(); //If dead age of death/ If alive - age
            $table->string('other_state_of_health_in')->nullable(); // State of health / cause of death
            //Other Field 2 Insured
            $table->string('other1_relationship_in', 15)->nullable(); // Relationship
            $table->string('other1_alive_dead_in', 5)->nullable(); // Alive/Dead Status
            $table->smallInteger('other1_age_in')->nullable(); //If dead age of death/ If alive - age
            $table->string('other1_state_of_health_in')->nullable(); // State of health / cause of death
            //Other Field 3 Insured
            $table->string('other2_relationship_in', 15)->nullable(); // Relationship
            $table->string('other2_alive_dead_in', 5)->nullable(); // Alive/Dead Status
            $table->smallInteger('other2_age_in')->nullable(); //If dead age of death/ If alive - age
            $table->string('other2_state_of_health_in')->nullable(); // State of health / cause of death
            /** Spouse */
            $table->string('mother_alive_dead_sp', 5)->nullable(); // Alive/Dead Status
            $table->smallInteger('mother_age_sp')->nullable(); //If dead age of death/ If alive - age
            $table->string('mother_state_of_health_sp')->nullable(); // State of health / cause of death
            $table->string('father_alive_dead_sp', 5)->nullable(); // Alive/Dead Status
            $table->smallInteger('father_age_sp')->nullable(); //If dead age of death/ If alive - age
            $table->string('father_state_of_health_sp')->nullable(); // State of health / cause of death
            //Other Field 1 Spouse
            $table->string('other_relationship_sp', 15)->nullable(); // Relationship
            $table->string('other_alive_dead_sp', 5)->nullable(); // Alive/Dead Status
            $table->smallInteger('other_age_sp')->nullable(); //If dead age of death/ If alive - age
            $table->string('other_state_of_health_sp')->nullable(); // State of health / cause of death
            //Other Field 2 Spouse
            $table->string('other1_relationship_sp', 15)->nullable(); // Relationship
            $table->string('other1_alive_dead_sp', 5)->nullable(); // Alive/Dead Status
            $table->smallInteger('other1_age_sp')->nullable(); //If dead age of death/ If alive - age
            $table->string('other1_state_of_health_sp')->nullable(); // State of health / cause of death
            //Other Field 3 Spouse
            $table->string('other2_relationship_sp', 15)->nullable(); // Relationship
            $table->string('other2_alive_dead_sp', 5)->nullable(); // Alive/Dead Status
            $table->smallInteger('other2_age_sp')->nullable(); //If dead age of death/ If alive - age
            $table->string('other2_state_of_health_sp')->nullable(); // State of health / cause of death

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
        Schema::table('prop_family_info_ins_sps', function (Blueprint $table) {
            $table->dropForeign(['proposal_id']);
        });
        Schema::dropIfExists('prop_family_info_ins_sps');
    }
}
