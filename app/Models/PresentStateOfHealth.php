<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PresentStateOfHealth extends Model
{
    protected $table = 'prop_state_of_health_questionnaires';
    protected $fillable = [
        'proposal_id',
        'widget_id',
        'quest_id',
        'quest_order_id',
        'quest_answer_in',
        'quest_answer_sp',
        'quest_yes_reason_in',
        'quest_yes_reason_sp',
        'quest_height',
        'quest_weight'
    ];
}
