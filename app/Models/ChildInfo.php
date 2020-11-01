<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChildInfo extends Model
{
    protected $table = 'prop_child_infos';
    protected $fillable = [
        'proposal_id',
        'ch_title',
        'ch_first_name',
        'ch_middle_name',
        'ch_last_name',
        'ch_dob',
        'ch_age',
        'ch_gender',
        'ch_birth_place',
        'ch_relationship',
        'ch_height',
        'ch_weight',
        'child_number'
    ];
}
