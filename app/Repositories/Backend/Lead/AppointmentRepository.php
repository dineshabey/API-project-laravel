<?php

namespace App\Repositories\Backend\Lead;

use App\Exceptions\GeneralException;
use App\Models\Appointment;
use App\Models\Lead;
use App\Repositories\BaseRepository;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

/**
 * Class Appointment Repository.
 * @author Ashan Rajapaksha (ashan@tryonics.com)
 */
class AppointmentRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function model()
    {
        return Appointment::class;
        return Lead::class;
    }

    /**
     * @param array $data
     * @param boolean $update
     *
     * @return Appointment or false
     * @throws \Throwable
     * @throws GeneralException
     */
    public function create(array $data, $update = false)
    {
        //$lead_id = $data['lead_id'];

        return DB::transaction(function () use ($data, $update) {

            $appointment = parent::create($data);

            if ($update) {

            } else {
                if ($appointment) {
                    return $appointment;
                }
                throw new GeneralException('Appointment Create error!');
            }

        });
    }

    /**
     * @param     $lead id
     * @return bool
     */

    public function isLeadRescheduled($lead_id)
    {
        $isRescheduled = Appointment::Select('status')
            ->Where('lead_id', '=', $lead_id)
            ->where('status', '=', 'Rescheduled')->exists();

        if ($isRescheduled) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @param     $lead id
     * @return bool
     */

    public function isAppointmentPending($lead_id)
    {
        $isRescheduled = Appointment::Select('status')
            ->Where('lead_id', '=', $lead_id)
            ->where('status', '=', 'Pending')->exists();

        if ($isRescheduled) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @param     $appoitment id
     * @return bool
     */

    public function isPending($app_id)
    {
        $isRescheduled = Appointment::Select('status')
            ->Where('id', '=', $app_id)
            ->where('status', '=', 'Pending')->exists();

        if ($isRescheduled) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @param     $appoitment time
     * @param     $appoitment date
     * @param     $appoitment id
     * @return mixed
     */
    public function isTimeConflict($appointment_id, $appodate, $appotime)
    {
        // $appTime = Carbon::parse($appodate)->format("HH-mm");
        // $afterTime = $appTime->modify('+1 hours');

        $isRescheduled = Appointment::Select('id')
            ->where('id', '=', $appointment_id)
            ->where('status', '=', "Pending")
            ->orwhere('status', '=', "Rescheduled")
            ->where('date', '=', $appodate)
            ->where('time', '=', $appotime)->exists();

        if ($isRescheduled) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @param int    $appoitment id
     *
     * @return mixed
     */
    public function isRescheduleStatus($app_id)
    {
        $isRescheduled = Appointment::Select('status')
            ->Where('id', '=', $app_id)
            ->where('status', '=', 'Rescheduled')->exists();

        if ($isRescheduled) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @param int    $leadNo
     * @param string $appointment_id
     *
     * @return mixed
     */
    public function updateOtherAppoStatus($leadNo, $appointment_id)
    {
        $appointment = Appointment::Where([
            ['id', '!=', $appointment_id],
            ['lead_id', '=', $leadNo],
        ]);

        return $appointment->update([
            'status' => 'Rescheduled',
        ]);
    }

    /**
     * @param int    $leadNo
     * @param string $appointment_id
     *
     * @return mixed
     */
    public function updateRescheduledAppoStatus($appointment_id)
    {
        $appointment = Appointment::Where([
            ['id', '=', $appointment_id],
        ]);
        return $appointment->update([
            'status' => 'Rescheduled',
        ]);
    }

    /**
     * @param int    $paged
     * @param string $orderBy
     * @param string $sort
     *
     * @return mixed
     */
    public function getAppointmentList($paged = 5, $orderBy = 'created_at', $sort = 'desc', $leadNo): LengthAwarePaginator
    {
        $query = $this->model->select(
            'id',
            'lead_id',
            'date',
            'status',
            'time',
            'remarks',
            'created_at'
        );

        if (!empty($leadNo)) {
            $query->where('lead_id', 'LIKE', $leadNo);
        }

        $query->orderBy($orderBy, $sort);
        return $query->paginate($paged);

    }


      /**
     * @param int    $paged
     * @param string $orderBy
     * @param string $sort
     *
     * @return mixed
     */
    public function getDateAppointmentList($paged = 5, $orderBy = 'created_at', $sort = 'desc', $date): LengthAwarePaginator
    {
        $query = $this->model->select(
            'id',
            'lead_id',
            'date',
            'status',
            'time',
            'remarks',
            'created_at'
        );

        if (!empty($date)) {
            $query->where('date', 'LIKE', $date);
        }

        $query->orderBy($orderBy, $sort);
        return $query->paginate($paged);

    }

    /**
     * @param int    $Lead Number
     ** @return mixed
     */
    public function getCalendarAppointmentList($leadNo)
    {    
        $query = $this->model->select(
            'appointments.id',
            'appointments.remarks',
            'appointments.date',
            'appointments.remarks',
            'appointments.lead_id',
            'appointments.status',
            'appointments.time AS startStr',
            'appointments.time',
            'appointments.updated_at',
            'appointments.created_at',
            'leads.title AS lead_title',
            'leads.first_name',
            DB::raw('CONCAT(appointments.date,"T",appointments.time) AS start'),  
            DB::raw('CASE WHEN (appointments.status = "Pending") THEN "#4a913c" WHEN (appointments.status = "Rescheduled") THEN "#4a913c"  WHEN (appointments.status = "Visited") THEN "#ffcc00"  WHEN (appointments.status = "Cancelled") THEN "#cc0000" ELSE "#666633" END AS backgroundColor'));
            // DB::raw('CASE WHEN (appointments.status = "Pending") THEN "background" WHEN (appointments.status = "Rescheduled") THEN "background"  WHEN (appointments.status = "Visited") THEN "background" ELSE "yellow" END AS display'));
                   
            // $query->select(DB::raw SELECT *  (CASE WHEN (status = 'Cancelled') THEN 'Can' ELSE 'SHELLDED' END as appointment_status"));
     
            $query->join('leads','appointments.lead_id','leads.id');        

        if (!empty($leadNo)) {
           $query->where('lead_id', 'LIKE', $leadNo);
        }

          return $query->get();

    }

     /**
     * @param int    $Lead Number
     ** @return mixed
     */
    public function getCalendarAppointmentEditList($paged = 5, $orderBy = 'created_at', $sort = 'desc', $date)
    {
        $query = $this->model->select(
            'appointments.id',
            'appointments.remarks',
            'appointments.date',
            'appointments.remarks',
            'appointments.lead_id',
            'appointments.status',
            'appointments.time AS startStr',
            'appointments.time',
            'appointments.updated_at',
            'appointments.created_at');
        $query->join('leads','appointments.lead_id','leads.id');        

        if (!empty($date)) {
            $query->where('date', 'LIKE', $date);
            $query->wherein('appointments.status', ['Pending','Rescheduled']);     
        }else{
            $query->wherein('appointments.status', ['Pending','Rescheduled']);   
        }

        $query->orderBy($orderBy, $sort);
        return $query->paginate($paged);

    }

    public function getAppointment($id)
    {
        return Appointment::find($id);
    }

    /**
     * @param Appointment  $appointment
     * @param array $data
     *
     * @throws GeneralException
     * @throws \Throwable
     * @return mixed
     */
    public function update(array $data, $appointNo)
    {

        $appointment = Appointment::Where([['id', '=', $appointNo]]);

        return DB::transaction(function () use ($appointment, $data) {
            if ($appointment->update($data)) {
                return $appointment;
            }

            throw new GeneralException('appointment update error!');
        });
    }

     /**
     * @param int    $Lead Number
     ** @return mixed
     */
    public function getCalendarAllAppointments()
    {
        $query = $this->model->select(
            'appointments.id',
            'appointments.remarks',
            'appointments.date',
            'appointments.remarks',
            'appointments.lead_id',
            'appointments.status',
            'appointments.time AS startStr',
            'appointments.time',
            'appointments.updated_at',
            'appointments.created_at',
            'leads.title AS lead_title',
            'leads.first_name',
            // DB::raw('CONCAT(appointments.date,"T",appointments.time) AS start'),
            DB::raw('CONCAT(leads.title,leads.first_name) AS title'),
            // DB::raw('CASE WHEN (appointments.status = "Pending" || appointments.status = "Rescheduled") THEN "#ffcc66" ELSE "#ff0000" END AS backgroundColor'));
            // DB::raw('CASE WHEN (appointments.status = "Pending" || appointments.status = "Rescheduled") THEN "black" ELSE "black" END AS textColor'),
            // DB::raw('CASE WHEN (appointments.status = "Pending" || appointments.status = "Rescheduled") THEN "#ffcc66" ELSE "#ff0000" END AS backgroundColor'),
            DB::raw('CASE WHEN (appointments.status = "Pending" || appointments.status = "Rescheduled") THEN "background" ELSE "background" END AS display'));
            $query->wherein('appointments.status', ['Pending','Rescheduled']);     
            $query->groupBy('appointments.date') ;      
            $query->join('leads','appointments.lead_id','leads.id');        


        return $query->get();

    }
}
