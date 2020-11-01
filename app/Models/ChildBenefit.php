<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChildBenefit extends Model
{
    protected $table = 'prop_child_benefits';
    protected $fillable = [
        'proposal_id',
        'rider_code',
        'sum_assured',
        'term',
        'sum_at_risk',
        'premium',
        'child'
    ];
}
