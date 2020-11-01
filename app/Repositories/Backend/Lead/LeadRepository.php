<?php

namespace App\Repositories\Backend\Lead;

use App\Exceptions\GeneralException;
use App\Models\Lead;
use App\Repositories\BaseRepository;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

/**
 * Class Lead Repository.
 * @author Ashan Rajapaksha (ashan@tryonics.com)
 */
class LeadRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function model()
    {
        return Lead::class;
    }

    /**
     * @param array $data
     * @param boolean $update
     *
     * @return Lead or false
     * @throws \Throwable
     * @throws GeneralException
     */
    public function create(array $data)
    {
        return DB::transaction(function () use ($data) {
            $lead = parent::create($data);

            if ($lead) {
                return $lead;
            }
            throw new GeneralException('Lead create error!');

        });
    }

    /**
     * @param Lead  $lead
     * @param array $data
     *
     * @throws GeneralException
     * @throws \Throwable
     * @return mixed
     */
    public function update(array $data, $leadNo)
    {
        $lead = Lead::Where('id', $leadNo);

        return DB::transaction(function () use ($lead, $data) {
            if ($lead->update($data)) {
                return $lead;
            }

            throw new GeneralException('lead update error!');
        });
    }

    /**
     * @param Lead  $leadNo
     *
     * @throws GeneralException
     * @throws \Throwable
     * @return mixed
     */
    public function close($data)
    {
        // $lead = Lead::set('status', 5); //Lead Status 5 Closed
        $lead = Lead::Where('id', $data['lead_no']);
        if($lead->update(['status' => 5])){
            return true;
        }
        throw new GeneralException('lead close error!');
    }


   /**
     * @param Lead  $leadNo
     *
     * @throws GeneralException
     * @throws \Throwable
     * @return mixed
     */
    public function reject($data)
    {
        // $lead = Lead::set('status', 5); //Lead Status 5 Closed
        $lead = Lead::Where('id', $data['lead_no']);
        if($lead->update(['status' => 4])){
            return true;
        }
        throw new GeneralException('lead close error!');
    }

    /**
     * @param int    $paged
     * @param string $orderBy
     * @param string $sort
     *
     * @return mixed
     */
    public function getPaginated($paged = 25, $orderBy = 'created_at', $sort = 'desc'): LengthAwarePaginator
    {
        // ddcors($this->model->find(17)->lead_status);
   
        $query = $this->model->select(
            'leads.id',
            'leads.title',
             DB::raw("CONCAT(first_name,' ',middle_name,' ',last_name) as full_name"),
            'first_name',
            'middle_name',
            'last_name',
            'nic',
            'dob',
            'gender',
            'contact',
            'email',
            'residence_area',
            'contacted_date',
            'presentation_date',
            'proposal_accepted',
            'proposal_submitted_date',
            'proposal_no',
            DB::raw(
            "(CASE WHEN leads.status = 1 
            THEN 'NEW' 
            WHEN leads.status = 2 
            THEN 'QUOTATION CREATED' 
            WHEN leads.status = 3 
            THEN 'PROPOSAL CREATED' 
            WHEN leads.status = 4 
            THEN 'REJECTED' 
            WHEN leads.status = 5 
            THEN 'CLOSED' 
            ELSE 'N/A' END) 
            AS leadstatus"),
             DB::raw("CONCAT(appointments.date,' ',appointments.time) as appointment"),
            'appointments.remarks',
            'appointments.status',
            'appointments.date',
            'appointments.time'
        );

        $name = request('name');
        $status = request('status');
        $leadstatus = request('leadstatus');
        $appointmentDate = request('appointmentDate');

        if (!empty($name)) {
            $query->where(DB::raw("CONCAT(`first_name`, ' ', `middle_name`, ' ' , `last_name` )"), 'LIKE', "%" . $name . "%");
        }

        if (!empty($status) && ($status !='All')) {
            $query = $query->where('appointments.status', 'LIKE', $status . '%');
        }

        if (!empty($leadstatus) && ($leadstatus != 'all')) {
            $query = $query->where('leads.status', 'LIKE', $leadstatus . '%');
        }

        if (!empty($appointmentDate)) {
            $appodate = Carbon::parse($appointmentDate)->format('Y-m-d');
            $query = $query->where('appointments.date', 'LIKE', $appodate . '%');
        }

        $filters = ['contact', 'nic'];

        foreach ($filters as $fil) {
            if ((request()->has($fil)) && (request()->$fil != null)) {
                $query = $query->where($fil, 'LIKE', request()->$fil . '%');
            }
        }
     
        $sub = DB::raw(" (SELECT
        appointments.date,
        appointments.lead_id,
        appointments.`status`,
        appointments.time,
        appointments.id,
        appointments.remarks,
        appointments.created_at
        FROM
        appointments
        WHERE id IN(select max(id) from
        appointments GROUP BY lead_id)
        ORDER BY
        appointments.id DESC,
        appointments.created_at DESC) AS appointments ");

        $query->leftjoin($sub, function ($join) {
            $join->on('leads.id', '=', 'appointments.lead_id');
        });

        // $query->select(DB::raw('appointments.*,leads.status AS lead_status'));
        // $query->from('appointments');
        // $query->leftjoin('leads.id', 'appointments.lead_id');
    
        $query->groupBy('leads.id');
        $query->orderBy('leads.created_at', $sort);
        $query->orderBy('appointments.created_at', 'DESC');
        return $query->paginate($paged);
    }

    public function getLead($id)
    {
        return Lead::find($id);
    }

    public function getExportData($paged = 25)
    {

        $query = $this->model->select(
            'leads.id',
            //  DB::raw("CONCAT(first_name,' ',middle_name,' ',last_name) as full_name"),
            'first_name AS First Name',
            'middle_name',
            'last_name',
            'nic',
            'contact',
            'email',
            'residence_area',
            'contacted_date',
            'presentation_date',
            'proposal_accepted',
            'proposal_submitted_date',
            'proposal_no',
            'leads.status',
            DB::raw("CONCAT(appointments.date,' ',appointments.time) as appointment"),
            'appointments.remarks',
            'appointments.status',
            'appointments.date',
            'appointments.time'
        );

        $name = request('name');
        $status = request('status');
        $leadstatus = request('leadstatus');
        $appointmentDate = request('appointmentDate');

        if (!empty($name)) {
            $query->where(DB::raw("CONCAT(`first_name`, ' ', `middle_name`, ' ' , `last_name` )"), 'LIKE', "%" . $name . "%");
        }

        if (!empty($status)) {
            $query = $query->where('appointments.status', 'LIKE', $status . '%');
        }

        if (!empty($leadstatus)) {
            $query = $query->where('leads.status', 'LIKE', $leadstatus . '%');
        }

        if (!empty($appointmentDate)) {
            $appodate = Carbon::parse($appointmentDate)->format('Y-m-d');
            $query = $query->where('appointments.date', 'LIKE', $appodate . '%');
        }

        $filters = ['contact', 'nic'];

        foreach ($filters as $fil) {
            if ((request()->has($fil)) && (request()->$fil != null)) {
                $query = $query->where($fil, 'LIKE', request()->$fil . '%');
            }
        }

        $sub = DB::raw(" (SELECT
        date,
        lead_id,
        `status`,
        time,
        id,
        remarks,
        created_at
        FROM
        appointments
        WHERE id IN(select max(id) from
        appointments GROUP BY lead_id)
        ORDER BY
        appointments.id DESC,
        appointments.created_at DESC) AS appointments ");

        $query = $query->leftjoin($sub, function ($join) {
            $join->on('leads.id', '=', 'appointments.lead_id');
        });

        $query = $query->groupBy('leads.id');
        $query->orderBy('leads.created_at', 'DESC');
        $query->orderBy('appointments.created_at', 'DESC');

        return $query->get();

    }


    //Lead Export button data fetch
    public function getExport()
    {

        $query = $this->model->select(
            'leads.id LEADID',
            'first_name AS FIRSTNAME',
            'middle_name AS MIDDLENAME',
            'last_name AS LASTNAME',
            'nic AS NIC',
            'contact AS CONTACT NO',
            'email AS EMAIL',
            'residence_area AS RESIDENCE',
            'contacted_date AS CONTACTED DATE',
            'quotation_no AS QUOTATION NO',
            'quotation_created_date AS QUOTATION CREATED DATE',
            // 'presentation_date',
            // 'proposal_accepted',
            // 'proposal_submitted_date',
            // 'proposal_no',
            'leads.status AS LEAD STATUS',
            DB::raw("CONCAT(appointments.date,' ',appointments.time) as APPOINTMENT"),
            'appointments.remarks AS APPOINTMENT REMARKS',
            'appointments.status AS APPOINTMENT STATUS',
            'appointments.date AS APPOINTMENT DATE',
            'appointments.time AS APPOINTMENT TIME'
        );

        $name = request('name');  
        $status = request('status');
        $leadstatus = request('leadstatus');
        $appointmentDate = request('appointmentDate');

        if (!empty($name)) {
            $query->where(DB::raw("CONCAT(`first_name`, ' ', `middle_name`, ' ' , `last_name` )"), 'LIKE', "%" . $name . "%");
        }

        if (!empty($status)) {
            $query = $query->where('appointments.status', 'LIKE', $status . '%');
        }

        if (!empty($leadstatus)) {
            $query = $query->where('leads.status', 'LIKE', $leadstatus . '%');
        }

        if (!empty($appointmentDate)) {
            $appodate = Carbon::parse($appointmentDate)->format('Y-m-d');
            $query = $query->where('appointments.date', 'LIKE', $appodate . '%');
        }

        $filters = ['contact', 'nic'];

        foreach ($filters as $fil) {
            if ((request()->has($fil)) && (request()->$fil != null)) {
                $query = $query->where($fil, 'LIKE', request()->$fil . '%');
            }
        }

        $sub = DB::raw(" (SELECT
        date,
        lead_id,
        `status`,
        time,
        id,
        remarks,
        created_at
        FROM
        appointments
        WHERE id IN(select max(id) from
        appointments GROUP BY lead_id)
        ORDER BY
        appointments.id DESC,
        appointments.created_at DESC) AS appointments ");

        $query = $query->leftjoin($sub, function ($join) {
            $join->on('leads.id', '=', 'appointments.lead_id');
        });

        $query = $query->groupBy('leads.id');
        $query->orderBy('leads.created_at', 'DESC');
        $query->orderBy('appointments.created_at', 'DESC');

        return $query->get();

    }


      /**
     * @param LeadNo  $LeadNo
     * @param QuotationNo $quotationNo
     *
     * @throws GeneralException
     * @throws \Throwable
     * @return mixed
     */
    public function addQuoteNo($data)
    {
        $update = DB::table('leads')
        ->where('id',$data['leadNo'])
        ->update(['quotation_no' => $data['quoteNo'], 'quotation_created_date' => Carbon::now()]);
     
        if($update){
            return true;
        }else{
            return false;
        }
        throw new GeneralException('lead close error!');
    }
}
