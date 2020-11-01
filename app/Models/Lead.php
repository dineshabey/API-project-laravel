<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
      'title',
      'first_name',
      'middle_name',
      'last_name',
      'nic',
      'contact',
      'email',
      'residence_area',
      'dob',
      'gender',
      'contacted_date',
      'presentation_data',
      'proposal_accepted',
      'proposal_submitted_date',
      'quotation_no',
      'quotation_created_date',
      'agent_code',
      'proposal_no',
      'status',
    
    ];

    protected $appends = ['name'];

    public function getNameAttribute()
    {
        return $this->middle_name
            ? $this->first_name.' '. $this->middle_name.' '.$this->last_name
            : $this->first_name.' '.$this->last_name;
    }

    // public function getLeadStatusAttribute()
    // {
    //   switch ($this->attributes['status']) {
    //   // switch ($this->status) {
    //     case '1':
    //       return "NEW";
    //       break;
    //     case '2':
    //       return "QUOTATION CREATED";
    //       break;
    //     case '3':
    //       return "PROPOSAL CREATED";
    //       break;
    //     case '4':
    //       return "REJECTED";
    //       break;
    //     case '5':
    //       return "CLOSED";
    //       break;
  
    //     default:
    //      return "N/A";
    //       break;
    //   }
    // }
}
