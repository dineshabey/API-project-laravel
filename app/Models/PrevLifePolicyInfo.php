<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PrevLifePolicyInfo extends Model
{
    protected $table = 'prop_prev_life_policy_infos';
    protected $fillable = [
        'proposal_id',
        'widget_id',
        'quest_id',
        'quest_order_id',
        'quest_answer_in',
        'quest_answer_sp',
        // Insured
        'name_of_insurance_comp_in',
        'policy_number_in',
        'sum_assured_in',
        'plan_of_insurance_in',
        'is_in_force_in',
        'life_application_declined_in',
        // Spouse
        'name_of_insurance_comp_sp',
        'policy_number_sp',
        'sum_assured_sp',
        'plan_of_insurance_sp',
        'is_in_force_sp',
        'life_application_declined_sp'
    ];
}
