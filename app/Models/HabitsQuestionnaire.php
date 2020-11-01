<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HabitsQuestionnaire extends Model
{
    protected $table = 'prop_habits_questionnaires';
    protected $fillable = [
        'proposal_id',
        'widget_id',
        'quest_id',
        'quest_order_id',
        'quest_answer_in',
        'quest_answer_sp',
        'quest_since_when',
        'quest_how_often',
        'quest_in_what_quantities'
    ];
}
