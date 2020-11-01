<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NomineeInfo extends Model
{
    protected $table = 'prop_nominee_info_questionnaires';
    protected $fillable = [
        'proposal_id',
        'nominee_name',
        'nominee_dob',
        'nominee_age',
        'nominee_nic',
        'nominee_percentage',
        'nominee_relationship',
        'guardian_name',
        'guardian_age',
        'guardian_nic',
        'guardian_relationship'
    ];
}
