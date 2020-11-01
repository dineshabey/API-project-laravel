<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChildHealthStatus extends Model
{
    protected $table = 'prop_child_health_questionnaires';
    protected $fillable = [
        'proposal_id',
        'widget_id',
        'quest_id',
        'quest_order_id',
        'quest_answer_ch1',
        'quest_answer_ch2',
        'quest_answer_ch3',
        'quest_answer_ch4',
        'quest_yes_reason_ch1',
        'quest_yes_reason_ch2',
        'quest_yes_reason_ch3',
        'quest_yes_reason_ch4'
    ];
}
