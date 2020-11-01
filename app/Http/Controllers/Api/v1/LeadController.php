<?php

namespace App\Http\Controllers\Api\V1;

use App\Helpers\Utility\ExportHelper;
use App\Http\Controllers\Controller;
use App\Repositories\Backend\Lead\AppointmentRepository;
use App\Repositories\Backend\Lead\LeadRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

/**
 * Class QuotationController.
 *
 * @author Rakitha Dissanayake <rakithadd@gmail.com>
 */
class LeadController extends Controller
{
    /**
     * @var LeadRepository
     */
    protected $leadRepo;

    /**
     * @var AppointmentRepository
     */
    protected $appointRepo;

    public function __construct(LeadRepository $leadRepo, AppointmentRepository $appointRepo)
    {
        $this->leadRepo = $leadRepo;
        $this->appointRepo = $appointRepo;
    }

    public function getLead(Request $request)
    {
        $leadNo = request('ref_no');

        $lead = $this->leadRepo->getLead($leadNo);

        //  $dataObj =  unserialize($lead);
        if ($lead) {

            return response()->json([
                'meta' => [
                    'status' => 'true',
                    'status_message' => 'Data found',
                    'timestamp' => Carbon::now(),
                ],
                'data' => $lead,
            ]);
        } else {
            return response()->json([
                'meta' => [
                    'status' => 'false',
                    'status_message' => 'Data Not found',
                    'timestamp' => Carbon::now(),
                ],
            ]);
        }
    }

    public function leadList(Request $request)
    {
        $conditions = [];
        $name = " ";

        $leads = $this->leadRepo->getPaginated(10, 'id', 'desc', $conditions, $name)->toArray();

        if ($leads) {

            return response()->json([
                'meta' => [
                    'status' => 'true',
                    'status_message' => 'Data found',
                    'timestamp' => Carbon::now(),
                ],
                'data' => $leads['data'],
                'current_page' => $leads['current_page'],
                'from' => $leads['from'],
                'last_page' => $leads['last_page'],
                'next_page_url' => $leads['next_page_url'],
                'per_page' => $leads['per_page'],
                'prev_page_url' => $leads['prev_page_url'],
                'to' => $leads['to'],
                'total' => $leads['total'],
            ]);
        } else {
            return response()->json([
                'meta' => [
                    'status' => 'false',
                    'status_message' => 'Data Not found',
                    'timestamp' => Carbon::now(),
                ],
            ]);
        }

    }

    public function addLead(Request $request)
    {
        $data = [];
        $bodyContent = json_decode($request->getContent(), true);
        $data = $bodyContent['data']['new_lead'];

        // dd($bodyContent['data']['new_lead']);
        //  dd($data['contacted_date']);

        $saveData = $this->buildSaveStab($data);
        $res = $this->leadRepo->create($saveData);

        if ($res) {
            return response()->json([
                'meta' => [
                    'status' => 'true',
                    'status_message' => 'Lead has been created successfully',
                    'data' => $data,
                ],
            ], 200);
        } else {
            return response()->json([
                'meta' => [
                    'status' => 'false',
                    'status_message' => "Error occurred while creating Lead!",
                ],
            ], 200);
        }
    }

    public function updateLead(Request $request)
    {
        $data = [];
        $bodyContent = json_decode($request->getContent(), true);
        $data = $bodyContent['data']['update_lead'];
        $leadNo = $bodyContent['data']['leadNo'];

        $saveData = $this->buildSaveStab($data);
        $res = $this->leadRepo->update($saveData, $leadNo);

        if ($res) {
            return response()->json([
                'meta' => [
                    'status' => 'true',
                    'status_message' => 'Lead has been updated successfully',
                    'data' => $data,
                ],
            ], 200);
        } else {
            return response()->json([
                'meta' => [
                    'status' => 'false',
                    'status_message' => "Error occurred while updating Lead!",
                ],
            ], 200);
        }
    }


    public function CloseLead(Request $request){
        $data = [];
        $bodyContent = json_decode($request->getContent(), true);
        $leadNo = $bodyContent['data']['leadNo'];

       // ddcors($leadNo);die;
        $res = $this->leadRepo->close($leadNo);

        if ($res) {
            return response()->json([
                'meta' => [
                    'status' => 'true',
                    'status_message' => 'Lead has been closed successfully',
                    'data' => $data,
                ],
            ], 200);
        } else {
            return response()->json([
                'meta' => [
                    'status' => 'false',
                    'status_message' => "Error occurred while closing Lead!",
                ],
            ], 200);
        }
    }


    public function rejectLead(Request $request){
        $data = [];
        $bodyContent = json_decode($request->getContent(), true);
        $leadNo = $bodyContent['data']['leadNo'];

       // ddcors($leadNo);die;
        $res = $this->leadRepo->reject($leadNo);

        if ($res) {
            return response()->json([
                'meta' => [
                    'status' => 'true',
                    'status_message' => 'Lead has been Rejected successfully',
                    'data' => $data,
                ],
            ], 200);
        } else {
            return response()->json([
                'meta' => [
                    'status' => 'false',
                    'status_message' => "Error occurred while rejecting Lead!",
                ],
            ], 200);
        }
    }

    /** Lead Data */
    private function buildSaveStab(array $data)
    {
        $saveData = [];
        $saveData['title'] = $data['title'];
        $saveData['first_name'] = strtoupper($data['first_name']);
        $saveData['middle_name'] = strtoupper($data['middle_name']);
        $saveData['last_name'] = strtoupper($data['last_name']);
        $saveData['nic'] = $data['nic'];
        $saveData['contact'] = $data['contact'];
        $saveData['email'] = $data['email'];
        $saveData['residence_area'] = strtoupper($data['residence_area']);
        $saveData['dob'] = $data['dob'];
        $saveData['contacted_date'] = $data['contacted_date'];
        $saveData['gender'] = $data['gender'];
        return $saveData;
    }

    /** Appontment List */
    public function appointmentList(Request $request)
    {
        $conditions = [];
        $lead_no = $request['lead_no'];

        $appointment = $this->appointRepo->getAppointmentList(5, 'id', 'desc', $lead_no)->toArray();

        if ($appointment) {

            return response()->json([
                'meta' => [
                    'status' => 'true',
                    'status_message' => 'Data found',
                    'timestamp' => Carbon::now(),
                ],
                'data' => $appointment['data'],
                'current_page' => $appointment['current_page'],
                'from' => $appointment['from'],
                'last_page' => $appointment['last_page'],
                'next_page_url' => $appointment['next_page_url'],
                'per_page' => $appointment['per_page'],
                'prev_page_url' => $appointment['prev_page_url'],
                'to' => $appointment['to'],
                'total' => $appointment['total'],

            ]);
        } else {
            return response()->json([
                'meta' => [
                    'status' => 'false',
                    'status_message' => 'Data Not found',
                    'timestamp' => Carbon::now(),
                ],
            ]);
        }

    }

    /** Get Single Appointment */
    public function getSingleAppointment(Request $request){

        $appointment_no = $request['appointment_no'];

        $appointment = $this->appointRepo->getAppointment($appointment_no)->toArray();
    
        if ($appointment) {

            return response()->json([
                'meta' => [
                    'status' => 'true',
                    'status_message' => 'Data found',
                    'timestamp' => Carbon::now(),
                ],
                'data' => $appointment,               
            ]);
        } else {
            return response()->json([
                'meta' => [
                    'status' => 'false',
                    'status_message' => 'Data Not found',
                    'timestamp' => Carbon::now(),
                ],
            ]);
        }
    }

    /** Appontment List */
    public function getCalendarAppointmentList(Request $request)
    {
            $conditions = [];
            $lead_no = $request['lead_no'];
    
            $appointments = $this->appointRepo->getCalendarAppointmentList($lead_no)->toArray();
    
            if ($appointments) {
    
                return response()->json([
                    'meta' => [
                        'status' => 'true',
                        'status_message' => 'Data found',
                        'timestamp' => Carbon::now(),
                    ],
                    'data' => $appointments,
                    
    
                ]);
            } else {
                return response()->json([
                    'meta' => [
                        'status' => 'false',
                        'status_message' => 'Data Not found',
                        'timestamp' => Carbon::now(),
                    ],
                ]);
            }
    
    }

    public function addAppointment(Request $request)
    {
        $data = [];
        $bodyContent = json_decode($request->getContent(), true);
        $data = $bodyContent['data']['new_appointment'];

        $appStatus = $data['status'];
        $appointmentDate = $data['date'];
        $appTime = $data['time'];
        $appRemarks = $data['remarks'];
        $appodate = Carbon::parse($appointmentDate)->format('Y-m-d');
        $today = Carbon::now()->format('Y-m-d');

        // return response()->json([
        //     'meta' => [
        //         'status' => 'false',
        //         'status_message' => "Please select a valid status for entered date",
        //         'data' => $appodate,
        //     ],
        // ], 200);

        if (($appodate > $today) && ($appStatus == "Visited")) {
            return response()->json([
                'meta' => [
                    'status' => 'false',
                   'status_message' => "Please select a valid status for entered date",
                    'data' => $data,
                ],
            ], 200);
        } else if (($appodate < $today) && ($appStatus == "")) {
            return response()->json([
                'meta' => [
                    'status' => 'false',
                    'status_message' => "Please select a valid status for entered date",
                    'data' => $data,
                ],
            ], 200);
        } else if ((empty($appRemarks)) && ($appStatus == "Cancelled")) {
            return response()->json([
                'meta' => [
                    'status' => 'false',
                    'status_message' => "Please enter remarks for cancelling appointment",
                    'data' => $data,
                ],
            ], 200);
        }

        //dd($data['date']);
        $isRescheduled = $this->appointRepo->isLeadRescheduled($data['lead_id']);
        $isPending = $this->appointRepo->isAppointmentPending($data['lead_id']);

        if ($isRescheduled || $isPending) {
            return response()->json([
                'meta' => [
                    'status' => 'false',
                    'status_message' => "Pending or rescheduled appointment already exists!",
                    'data' => $data,
                ],
            ], 200);
        } else {

            $saveData = $this->appointmentSaveStab($data);
            $res = $this->appointRepo->create($saveData);

            if ($res) {
                return response()->json([
                    'meta' => [
                        'status' => 'true',
                        'status_message' => 'Appointment has been created successfully',
                        'data' => $data,
                    ],
                ], 200);
            } else {
                return response()->json([
                    'meta' => [
                        'status' => 'false',
                        'status_message' => "Error occurred while creating Appointment!",
                    ],
                ], 200);
            }
        }

    }

    /** Appointment Data */
    private function appointmentSaveStab(array $data)
    {
        $saveData = [];
        $saveData['lead_id'] = $data['lead_id'];
        $saveData['date'] = $data['date'];
        $saveData['time'] = $data['time'];
        $saveData['remarks'] = $data['remarks'];
        if (empty($data['status'])) {
            $saveData['status'] = 'Pending';
        } else {
            $saveData['status'] = $data['status'];
        }

        return $saveData;
    }

    public function updateAppointment(Request $request)
    {
        $data = [];
        $bodyContent = json_decode($request->getContent(), true);
        $data = $bodyContent['data']['update_appointment'];
        $appointmentNo = $bodyContent['data']['appointmentNo'];
        $appointmentStatus = $bodyContent['data']['update_appointment']['status'];

        $appStatus = $data['status'];
        $appointmentDate = $data['date'];
        $appTime = $data['time'];
        $appRemarks = $data['remarks'];
        $appodate = Carbon::parse($appointmentDate)->format('Y-m-d');
        $today = Carbon::now()->format('Y-m-d');

        if (($appodate > $today) && ($appStatus == "Visited")) {
            return response()->json([
                'meta' => [
                    'status' => 'false',
                    'status_message' => "Please select a valid status for entered date",
                    'data' => $data,
                ],
            ], 200);
        } else if (($appodate < $today) && ($appStatus == "")) {
            return response()->json([
                'meta' => [
                    'status' => 'false',
                    'status_message' => "Please select a valid status for entered date",
                    'data' => $data,
                ],
            ], 200);
        } else if ((empty($appRemarks)) && ($appStatus == "Cancelled")) {
            return response()->json([
                'meta' => [
                    'status' => 'false',
                    'status_message' => "Please enter remarks for cancelling appointment",
                    'data' => $data,
                ],
            ], 200);
        }

        // $appointmentDate = $bodyContent['data']['update_appointment']['date'];
        // $appointmentTime = $bodyContent['data']['update_appointment']['time'];

        // $appTimes = Carbon::now()->addHours(5)->setTimezone('Asia/Colombo')->toDateTimeString();
        // dd($appTimes);

        // $appTime = Carbon::parse($appointmentTime)->format("HH-mm");
        // $afterTime = $appTime->modify('+15 minutes');

        // $isTimeConflict = $this->appointRepo->isTimeConflict($appointmentNo, $appointmentDate, $appointmentTime);

        // if ($isTimeConflict) {
        //     return response()->json([
        //         'meta' => [
        //             'status' => 'false',
        //             'status_message' => 'Appointment Exists for this Time',
        //             'data' => $data,
        //         ],
        //     ], 200);
        // }

        $isPending = $this->appointRepo->isPending($appointmentNo);
        $isRescheduleStatus = $this->appointRepo->isRescheduleStatus($appointmentNo);

        $saveData = $this->buildAppointmentTab($data);
        $res = $this->appointRepo->update($saveData, $appointmentNo);

        if (($isPending || $isRescheduleStatus) && ($appointmentStatus == "Pending" || $appointmentStatus == "Rescheduled")) {
            //Update Pending|Rescheduled Appointment State to Rescheduled
            $this->appointRepo->updateRescheduledAppoStatus($appointmentNo);
        }

        if ($res) {
            return response()->json([
                'meta' => [
                    'status' => 'true',
                    'status_message' => 'Appointment has been updated successfully',
                    'data' => $data,
                ],
            ], 200);
        } else {
            return response()->json([
                'meta' => [
                    'status' => 'false',
                    'status_message' => "Error occurred while updating Appointment!",
                ],
            ], 200);
        }
    }

    /** Appointment Data */
    private function buildAppointmentTab(array $data)
    {
        $saveData = [];
        $saveData['date'] = strtoupper($data['date']);
        $saveData['time'] = $data['time'];
        $saveData['remarks'] = strtoupper($data['remarks']);
        $saveData['status'] = $data['status'];
        if (empty($data['status'])) {
            $saveData['status'] = 'Rescheduled';
        } else {
            $saveData['status'] = $data['status'];
        }

        return $saveData;
    }

    public function getLeadExport(Request $request)
    {
        // $leads = $this->leadRepo->getExportData();
        $leads = $this->leadRepo->getExport($request);
       
       // passing the columns which I want from the result set. Useful when we have not selected required fields
	    $arrColumns = array('full_name');
	    
	    // define the first row which will come as the first row in the csv
	    $arrFirstRow = array('Full Name');
	    
	    // building the options array
	    $options = array(
	        'columns' => $arrColumns,
	        'firstRow' => $arrFirstRow,
	    );
	    // creating the Files object from the Utility package.
	    // $file = new ExportHelper;
	   
	    // $csv_data =  $file->convertTOCSV($leads, $options);

        // return $csv_data;

        if ($leads) {
            return response()->json([
                'meta' => [
                    'status' => 'true',
                    'status_message' => 'Data found',
                      'data' => $leads,
                ],
            ]);

        } else {
            return response()->json([
                'meta' => [
                    'status' => 'false',
                    'status_message' => 'Data Not found',
                    'timestamp' => Carbon::now(),
                ],
            ]);
        }
    }


   /** Appontment List */
   public function eventCalendarEditList(Request $request)
   {
       $conditions = [];
       $selected_date = $request['selected_date'];
       $appointment = $this->appointRepo->getCalendarAppointmentEditList(5, 'id', 'desc', $selected_date)->toArray();

       if ($appointment) {

           return response()->json([
               'meta' => [
                   'status' => 'true',
                   'status_message' => 'Data found',
                   'timestamp' => Carbon::now(),
               ],
               'data' => $appointment['data'],
               'current_page' => $appointment['current_page'],
               'from' => $appointment['from'],
               'last_page' => $appointment['last_page'],
               'next_page_url' => $appointment['next_page_url'],
               'per_page' => $appointment['per_page'],
               'prev_page_url' => $appointment['prev_page_url'],
               'to' => $appointment['to'],
               'total' => $appointment['total'],

           ]);
       } else {
           return response()->json([
               'meta' => [
                   'status' => 'false',
                   'status_message' => 'Data Not found',
                   'timestamp' => Carbon::now(),
               ],
           ]);
       }

   }


     /** All Calendar Appontments */
     public function getCalendarAllAppointmentList()
     {
     
             $appointments = $this->appointRepo->getCalendarAllAppointments()->toArray();
     
             if ($appointments) {
     
                 return response()->json([
                     'meta' => [
                         'status' => 'true',
                         'status_message' => 'Data found',
                         'timestamp' => Carbon::now(),
                     ],
                     'data' => $appointments,
                     
     
                 ]);
             } else {
                 return response()->json([
                     'meta' => [
                         'status' => 'false',
                         'status_message' => 'Data Not found',
                         'timestamp' => Carbon::now(),
                     ],
                 ]);
             }
     
     }

     /** Add Quotation No to Lead When Creating Quotation by Lead*/
     public function addQuoteDetails(Request $request){
        $data = [];
        $data['leadNo'] = $request['leadNo'];
        $data['quoteNo'] = $request['quoteNo'];

        $res = $this->leadRepo->addQuoteNo($data);

        if ($res) {
            return response()->json([
                'meta' => [
                    'status' => 'true',
                    'status_message' => 'quote no added to lead',
                    'data' => $res,
                ],
            ], 200);
        } else {
            return response()->json([
                'meta' => [
                    'status' => 'false',
                    'status_message' => "Error occurred while adding quote no to  Lead!",
                ],
            ], 200);
        }
    }
}
