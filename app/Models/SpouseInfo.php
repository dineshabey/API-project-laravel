<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SpouseInfo extends Model
{
    protected $table = 'prop_spouse_infos';
    protected $fillable = [
        'proposal_id',
        'sp_title',
        'sp_first_name',
        'sp_middle_name',
        'sp_last_name',
        'sp_dob',
        'sp_age',
        'sp_gender',
        'sp_occupation_code',
        'sp_occupation',
        'sp_employer_name',
        'sp_emp_address_1',
        'sp_emp_address_2',
        'sp_emp_city',
        'sp_emp_country',
        'sp_emp_contact_no',
        'sp_monthly_income',
        'sp_nature_of_duties',
        'sp_religion',
        'sp_citizenship'
    ];
}
