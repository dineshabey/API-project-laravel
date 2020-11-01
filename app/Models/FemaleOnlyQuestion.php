<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FemaleOnlyQuestion extends Model
{
    protected $table = 'prop_female_only_questions';
    protected $fillable = [
        'proposal_id',
        'widget_id',
        'quest_id',
        'quest_order_id',
        'quest_answer_pregnant',
        'pregnant_delivery_date',
        'pregnant_how_many_months',
        'quest_reason_pregnant',
        'quest_answer_gynecological',
        'quest_reason_gynecological',
    ];
}
