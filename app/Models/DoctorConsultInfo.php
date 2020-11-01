<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DoctorConsultInfo extends Model
{
    protected $table = 'prop_doctor_consult_questionnaires';
    protected $fillable = [
        'proposal_id',
        'widget_id',
        'quest_answer_in',
        'quest_answer_sp',
        'doctor_name_in',
        'doctor_address_in',
        'doctor_tele_in',
        'doctor_last_consultation_in',
        'doctor_reason_in',
        'doctor_name_sp',
        'doctor_address_sp',
        'doctor_tele_sp',
        'doctor_last_consultation_sp',
        'doctor_reason_sp'
    ];
}
