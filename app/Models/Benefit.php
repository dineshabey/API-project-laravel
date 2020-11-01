<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Benefit extends Model
{
    protected $table = 'prop_benefits';
    protected $fillable = [
        'proposal_id',
        'product',
        'requirement',
        'payment_method',
        'monthly_basic_premium',
        'policy_term',
        'premium_term',
        'cover_multiple',
        'sum_assured',
        'annual_premium',
        'total_premium'
    ];
}
