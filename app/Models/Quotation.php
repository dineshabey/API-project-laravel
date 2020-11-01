<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'quote_no',
        'version',
        'agent_code',
        'user_category',
        'zone_code',
        'cluster_code',
        'channel_code',
        'branch_code',
        'user_role',
        'cover_multiple',
        'frequency',
        'monthly_basic_premium',
        'policy_term',
        'premium_term',
        'primary_need',
        'med_rem3_floater',
        'status',
        'title',
        'first_name',
        'middle_name',
        'last_name',
        'gender',
        'dob',
        'telephone',
        'email',
        'nic',
        'occupation',
        'has_spouse',
        'marital_status',
        'children',
        'sum_at_risk_prev_policy',
        'no_of_sum_ass_times',
        'riders',
        'sp_title',
        'sp_first_name',
        'sp_middle_name',
        'sp_last_name',
        'sp_gender',
        'sp_dob',
        'sp_occupation',
        'sp_sum_at_risk_prev_policy',
        'sp_riders',
        'ch1_title',
        'ch1_first_name',
        'ch1_middle_name',
        'ch1_last_name',
        'ch1_gender',
        'ch1_age',
        'ch1_dob',
        'ch2_title',
        'ch2_first_name',
        'ch2_middle_name',
        'ch2_last_name',
        'ch2_gender',
        'ch2_age',
        'ch2_dob',
        'ch3_title',
        'ch3_first_name',
        'ch3_middle_name',
        'ch3_last_name',
        'ch3_gender',
        'ch3_age',
        'ch3_dob',
        'ch4_title',
        'ch4_first_name',
        'ch4_middle_name',
        'ch4_last_name',
        'ch4_gender',
        'ch4_age',
        'ch4_dob',
        'data_obj',
        'res_obj',
        'product'
    ];

    protected $appends = ['name'];

    public function getNameAttribute()
    {
        return $this->middle_name
            ? $this->first_name.' '. $this->middle_name.' '.$this->last_name
            : $this->first_name.' '.$this->last_name;
    }
}
