<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InsuredBenefit extends Model
{
    protected $table = 'prop_insured_benefits';
    protected $fillable = [
        'proposal_id',
        'rider_code',
        'sum_assured',
        'term',
        'sum_at_risk',
        'premium',
        'oe_val',
        'oe_premium',
        'he_val',
        'he_premium'
    ];
}
