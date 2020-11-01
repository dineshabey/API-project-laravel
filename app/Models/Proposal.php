<?php

namespace App\Models;

use App\Models\Benefit;
use App\Models\SpouseInfo;
use App\Models\InsuredBenefit;
use App\Models\ChildBenefit;
use App\Models\SpouseBenefit;
use App\Models\DynamicQuestion;
use App\Models\PresentStateOfHealth;
use App\Models\ChildHealthStatus;
use App\Models\DoctorConsultInfo;
use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'quote_ref',
        'prop_no',
        'corres_pref_lang',
        'corres_media',
        'title',
        'first_name',
        'middle_name',
        'last_name',
        'dob',
        'age',
        'gender',
        'has_spouse',
        'no_of_children',
        'civil_status',
        'religion',
        'nic',
        'add_line_1',
        'add_line_2',
        'city',
        'mobile_no',
        'residence_no',
        'office_no',
        'email',
        'public_position_held',
        'contribution_paid_by',
        'citizenship',
        'occupation_code',
        'occupation',
        'employer_name',
        'emp_address_1',
        'emp_address_2',
        'emp_city',
        'emp_country',
        'emp_contact_no',
        'monthly_income',
        'nature_of_duties',
        /** Bank account data */
        'bank_acc_name_1',
        'bank_acc_no_1',
        'bank_acc_name_2',
        'bank_acc_no_2',
        'bank_acc_open_hnb',
        /** Customer and agent signature data */
        'sig_data_customer',
        'sig_img_url_customer',
        'sig_data_agent',
        'sig_img_url_agent',
         /** Quotation related data */
        'quote_no',
        'version',
        'agent_code',
        'channel_code',
        'branch_code',
        'user_category',
        'cluster_code',
        'zone_code',
        'user_role',
        /** proposal status data */
        'benefit',
        'info',
        'health',
        'final',
        'status',
        'fund_type'
    ];

    /** Common Benefits table relationship */
    public function benefits()
    {
        return $this->hasOne(Benefit::class, 'proposal_id');
    }

    /** Spouse information table relationship */
    public function spouseInfo()
    {
        return $this->hasOne(SpouseInfo::class, 'proposal_id');
    }

    /** Children Information table relationship */
    public function childInfo()
    {
        return $this->hasMany(ChildInfo::class, 'proposal_id');
    }

    /** Insured Benefits table relationship */
    public function insuredBenefits()
    {
        return $this->hasMany(InsuredBenefit::class, 'proposal_id');
    }

    /** Spouse Benefits table relationship */
    public function spouseBenefits()
    {
        return $this->hasMany(SpouseBenefit::class, 'proposal_id');
    }

    /** Children Benefits table relationship */
    public function childrenBenefits()
    {
        return $this->hasMany(ChildBenefit::class, 'proposal_id');
    }

    /** Dynamic questionnaires table relationship */
    public function dynamicQuestions()
    {
        return $this->hasMany(DynamicQuestion::class, 'proposal_id');
    }

    /** Present state of health questionnaires table relationship */
    public function presentStateOfHealthQuestions()
    {
        return $this->hasMany(PresentStateOfHealth::class, 'proposal_id');
    }

    /** Child health questionnaires table relationship */
    public function childHealthQuestions()
    {
        return $this->hasMany(ChildHealthStatus::class, 'proposal_id');
    }
    /** Doctor consultation information table relationship */
    public function doctorConsultationInfo()
    {
        return $this->hasOne(DoctorConsultInfo::class, 'proposal_id');
    }
}
