<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FamilyInfoInsSp extends Model
{
    protected $table = 'prop_family_info_ins_sps';
    protected $fillable = [
        'proposal_id',
        'widget_id',
        'quest_id',
        'quest_order_id',
        //Insured
        'mother_alive_dead_in',
        'mother_age_in',
        'mother_state_of_health_in',

        'father_alive_dead_in',
        'father_age_in',
        'father_state_of_health_in',

        'other_relationship_in',
        'other_alive_dead_in',
        'other_age_in',
        'other_state_of_health_in',

        'other1_relationship_in',
        'other1_alive_dead_in',
        'other1_age_in',
        'other1_state_of_health_in',

        'other2_relationship_in',
        'other2_alive_dead_in',
        'other2_age_in',
        'other2_state_of_health_in',
        //Spouse
        'mother_alive_dead_sp',
        'mother_age_sp',
        'mother_state_of_health_sp',

        'father_alive_dead_sp',
        'father_age_sp',
        'father_state_of_health_sp',

        'other_relationship_sp',
        'other_alive_dead_sp',
        'other_age_sp',
        'other_state_of_health_sp',

        'other1_relationship_sp',
        'other1_alive_dead_sp',
        'other1_age_sp',
        'other1_state_of_health_sp',

        'other2_relationship_sp',
        'other2_alive_dead_sp',
        'other2_age_sp',
        'other2_state_of_health_sp',
    ];
}
