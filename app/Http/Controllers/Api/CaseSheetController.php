<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use App\Http\Resources\CaseSheetResource;
use App\Models\CaseSheet;
use App\Models\IPCasesheet;
use App\Models\Consultation;
use App\Models\Staff;
use App\Models\Treatment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Helpers\Helper;
// use Illuminate\Support\Facades\DB;


class CaseSheetController extends BaseController
{
         /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // if (!auth()->user()) {
        //    return $this->sendError('Access Denied.', ["You dont have privilege to access this page . Sorry Contact Administrator"]);
        // }

        $casesheets = CaseSheet::all()->sortDesc();
        return $this->sendResponse("casesheets", CaseSheetResource::collection($casesheets),'1', 'Record retrieved successfully.');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    } 

    //Check Therapist 

    public function checkTherapist(Request $request)
    {
        $therapistId = $request->input('therapistId');
        $selectedDate = $request->input('date');
        
        // Fetch the therapist's name
        $therapist = Staff::find($therapistId);
        $therapistName = $therapist ? $therapist->name : '';
    
        // Initialize an array to store the schedule for the next 10 days
        $schedule = [];
    
        // Loop through the next 10 days
        for ($i = 0; $i < 10; $i++) {
            $date = date('Y-m-d', strtotime($selectedDate . ' + ' . $i . ' days'));
    
            // Perform the database check for morning therapist in CaseSheet
            $morningTherapistCaseSheet = CaseSheet::where('mrng_staff_id', $therapistId)
                ->whereDate('date', $date)
                ->exists();
    
            // Perform the database check for morning therapist in IPCasesheet
            $morningTherapistIPCasesheet = IPCasesheet::where('mrng_staff_id', $therapistId)
                ->whereDate('date', $date)
                ->exists();
    
            // Combine morning session availability from both tables
            $morningAvailability = $morningTherapistCaseSheet || $morningTherapistIPCasesheet ? 'UnAvailable' : 'available';
    
            // Perform the database check for evening therapist in CaseSheet
            $eveningTherapistCaseSheet = CaseSheet::where('evng_staff_id', $therapistId)
                ->whereDate('date', $date)
                ->exists();
    
            // Perform the database check for evening therapist in IPCasesheet
            $eveningTherapistIPCasesheet = IPCasesheet::where('evng_staff_id', $therapistId)
                ->whereDate('date', $date)
                ->exists();
    
            // Combine evening session availability from both tables
            $eveningAvailability = $eveningTherapistCaseSheet || $eveningTherapistIPCasesheet ? 'UnAvailable' : 'available';
    
            // Prepare the schedule data for the current date
            $schedule[] = [
                'date' => $date,
                'morningTherapist' => $morningAvailability,
                'eveningTherapist' => $eveningAvailability,
            ];
        }
    
        // Prepare the response data
        $response = [
            'therapistName' => $therapistName,
            'schedule' => $schedule
        ];
    
        // Return the response
        return response()->json($response);
    }
       
    //Op Wise Consultation
    public function getConsultations($opId)
    {
        $consultations = Consultation::where('op_id', $opId)->
                                        select('id', 'consultation_no') 
                                        ->orderBy('id', 'desc')
                                        ->get();
        return response()->json($consultations);
    }

    //Op Wise Consultation for last Consultation Number
    public function getlastConsultations($opId)
    {
        $consultation = Consultation::where('op_id', $opId)
            ->orderBy('id', 'desc')
            ->first(['id', 'consultation_no']);
        
        return response()->json($consultation);
    }
   

    //Gender Wise Therapist 
    public function getTherapists($gender)
    {

        $therapists = Staff::join('departments', 'departments.id', '=', 'staffs.department_id')
                            ->where('departments.name', 'Therapist')
                            ->where('staffs.gender', $gender)
                            ->select('staffs.id', 'staffs.name')
                            ->get();

        return response()->json($therapists);
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'date' => ['required', 'max:100'],
            'op_no_id' => ['required', 'max:100'],
            'consultation_id' => ['nullable', 'max:50'],
            'morning_session' => ['nullable', 'max:50'],
            'afternoon_session' => ['nullable', 'max:50'],
            'mrng_staff_id' => ['nullable'],
            'evng_staff_id' => ['nullable'],
            'vital_dates' => ['nullable', 'max:500'],
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error', $validator->errors());
        }

        $date = $input['date'];
        $mrngStaffId = $input['mrng_staff_id'];
        $evngStaffId = $input['evng_staff_id'];

        $morningCaseSheetExists = CaseSheet::where('date', $date)
            ->where(function ($query) use ($mrngStaffId) {
                $query->where('mrng_staff_id', '<>', 0)
                ->whereNotNull('mrng_staff_id')
                ->where('mrng_staff_id', $mrngStaffId);                      
            })
            ->exists();

        $ipMorningCaseSheetExists = IPCasesheet::where('date', $date)
        ->where(function ($query) use ($mrngStaffId) {
            $query->where('mrng_staff_id', '<>', 0)
            ->whereNotNull('mrng_staff_id')
            ->where('mrng_staff_id', $mrngStaffId);  
        })
        ->exists();

        $afternoonCaseSheetExists = CaseSheet::where('date', $date)
            ->where(function ($query) use ($evngStaffId) {
                $query->where('evng_staff_id', '<>', 0)
                ->whereNotNull('evng_staff_id')
                ->where('evng_staff_id', $evngStaffId);                      
            })
            ->exists();
        $IpAfternoonCaseSheetExists = IPCasesheet::where('date', $date)
        ->where(function ($query) use ($evngStaffId) {
            $query->where('evng_staff_id', '<>', 0)
            ->whereNotNull('evng_staff_id')
            ->where('evng_staff_id', $evngStaffId);                   
        })
        ->exists();

        if ($morningCaseSheetExists || $ipMorningCaseSheetExists) {
            return $this->sendResponse("casesheets", 'Exists', '3', 'Morning Staff already assigned for the selected date');
        }else{
            if ($afternoonCaseSheetExists || $IpAfternoonCaseSheetExists ) {
                return $this->sendResponse("casesheets", 'Exists', '4', 'Afternoon Staff already assigned for the selected date');
            }
        }

        $validatedValues = $validator->validated();

        $count_casesheet = CaseSheet::count();
        if ($count_casesheet > 0) {
            $max_id = CaseSheet::max('id') + 1;
        } else {
            $max_id = 1;
        }


        //Morning Session Cost Calculation
        $morningTreatmentIds = explode(',', $validatedValues['morning_session']);
        $morningTreatmentCost = Treatment::whereIn('id', $morningTreatmentIds)->sum('cost');
        
        //Afternoon Session Cost Calculation
        $afternoonTreatmentIds = explode(',', $validatedValues['afternoon_session']);
        $afternoonTreatmentCost = Treatment::whereIn('id', $afternoonTreatmentIds)->sum('cost');

        $TreatmentCost= $morningTreatmentCost +  $afternoonTreatmentCost;
        
        $InputArray = [
            'date' => $validatedValues['date'],
            'op_no_id' => $validatedValues['op_no_id'],
            'consultation_id' => $validatedValues['consultation_id'],
            'morning_session' => Helper::ZeroValue($validatedValues['morning_session']),
            'afternoon_session' => Helper::ZeroValue($validatedValues['afternoon_session']),
            'mrng_staff_id' => $validatedValues['mrng_staff_id'],
            'evng_staff_id' => $validatedValues['evng_staff_id'],
            'vital_dates' => $validatedValues['vital_dates'],
            'treatment_cost' => $TreatmentCost,
            'casesheet_bill_no' => "Bill/tret/" . sprintf("%04d", $max_id + 1),
        ];

        $casesheets = CaseSheet::create($InputArray);
        return $this->sendResponse("casesheets", new CaseSheetResource($casesheets), '1', 'Record created successfully');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CaseSheet  $casesheets
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $casesheets = CaseSheet::find($id);

        if (is_null($casesheets)) {
            return $this->sendError('Record not found.');
        }

        return $this->sendResponse("casesheets", new CaseSheetResource($casesheets), '1', 'Record Retreived successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CaseSheet  $casesheets
     * @return \Illuminate\Http\Response
     */
    public function edit(CaseSheet $casesheets)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CaseSheet  $casesheets
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $casesheets = CaseSheet::find($id);

        $input = $request->all();

        $validator = Validator::make($input, [
            'date' => ['required', 'max:100'],
            'op_no_id' => ['required', 'max:100'],
            'consultation_id' => ['nullable', 'max:50'],
            'morning_session' => ['nullable', 'max:50'],
            'afternoon_session' => ['nullable', 'max:50'],
            'vital_dates' => ['nullable', 'max:500'],
            'mrng_staff_id' => ['nullable'],
            'evng_staff_id' => ['nullable'],
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error', $validator->errors());
        }

        $date = $input['date'];
        $mrngStaffId = $input['mrng_staff_id'];
        $evngStaffId = $input['evng_staff_id'];

        $morningCaseSheetExists = CaseSheet::where('id', '<>', $id)
            ->where('date', $date)
            ->where(function ($query) use ($mrngStaffId) {
                $query->where('mrng_staff_id', '<>', 0)
                ->whereNotNull('mrng_staff_id')
                ->where('mrng_staff_id', $mrngStaffId);                    
            })
            ->exists();

        $ipMorningCaseSheetExists = IPCasesheet::where('id', '<>', $id)->where('date', $date)
        ->where(function ($query) use ($mrngStaffId) {
            $query->where('mrng_staff_id', '<>', 0)
            ->whereNotNull('mrng_staff_id')
            ->where('mrng_staff_id', $mrngStaffId);
        })
        ->exists();

        $afternoonCaseSheetExists = CaseSheet::where('id', '<>', $id)->where('date', $date)
        ->where(function ($query) use ($evngStaffId) {
            $query->where('evng_staff_id', '<>', 0)
                ->whereNotNull('evng_staff_id')
                ->where('evng_staff_id', $evngStaffId);
        })
        ->exists();

        $IpAfternoonCaseSheetExists = IPCasesheet::where('id', '<>', $id)->where('date', $date)
        ->where(function ($query) use ($evngStaffId) {
            $query->where('evng_staff_id', '<>', 0)
            ->whereNotNull('evng_staff_id')
            ->where('evng_staff_id', $evngStaffId);                
        })
        ->exists();

        if ($morningCaseSheetExists || $ipMorningCaseSheetExists) {
            return $this->sendResponse("casesheets", 'Exists', '3', 'Morning Staff already assigned for the selected date');
        }else{
            if ($afternoonCaseSheetExists || $IpAfternoonCaseSheetExists) {
                return $this->sendResponse("casesheets", 'Exists', '4', 'Afternoon Staff already assigned for the selected date');
            }
        }
        $validatedValues = $validator->validated();

        // Morning Session Cost Calculation
        $morningTreatmentIds = explode(',', $validatedValues['morning_session']);
        $morningTreatmentCost = Treatment::whereIn('id', $morningTreatmentIds)->sum('cost');
    
        // Afternoon Session Cost Calculation
        $afternoonTreatmentIds = explode(',', $validatedValues['afternoon_session']);
        $afternoonTreatmentCost = Treatment::whereIn('id', $afternoonTreatmentIds)->sum('cost');
    
        $TreatmentCost = $morningTreatmentCost + $afternoonTreatmentCost;

        $casesheets->date = $input['date'];
        $casesheets->op_no_id = $input['op_no_id'];
        $casesheets->consultation_id = $input['consultation_id'];
        $casesheets->morning_session = $input['morning_session'];
        $casesheets->afternoon_session = $input['afternoon_session'];
        $casesheets->vital_dates = $input['vital_dates'];
        $casesheets->mrng_staff_id = $input['mrng_staff_id'];
        $casesheets->evng_staff_id = $input['evng_staff_id'];
        $casesheets->treatment_cost = $TreatmentCost; // Update treatment cost
        $casesheets->save();

        return $this->sendResponse("casesheets", new CaseSheetResource($casesheets), '1', 'Record Updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CaseSheet  $casesheets
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $casesheets = CaseSheet::find($id);

        if (is_null($casesheets)) {
            return $this->sendError('Case Sheet not found.');
        }
        else {  
            $casesheets->delete();
            return $this->sendResponse("casesheets", new CaseSheetResource($casesheets),'1', 'Record Deleted successfully.');
        }
    }



    //Get Therapist Schedule

    public function gettherapistschedule(Request $request)
    {

        $date = date('Y-m-d', strtotime($request['date']));
        $mrngtherapist = CaseSheet::select(
            'case_sheets.id',
            'ops.op_no',
            'ops.name',
            'ops.age',
            'consultations.consultation_no',
            'case_sheets.date',
            'case_sheets.vital_dates',
            'case_sheets.morning_session',
            'case_sheets.afternoon_session',
            'case_sheets.mrng_staff_id',
            'staffs.name AS StaffName',
            'case_sheets.morning_session AS TreatmentIds' // Include the TreatmentIds column
        )
            ->join('ops', 'case_sheets.op_no_id', '=', 'ops.id')
            ->join('staffs', 'case_sheets.mrng_staff_id', '=', 'staffs.id')
            ->leftJoin('consultations', 'case_sheets.consultation_id', '=', 'consultations.id')
            ->whereDate('case_sheets.date', $date)
            ->where('case_sheets.mrng_staff_id', $request["therapistid"])
            ->get();
        
        $mrngtherapist->transform(function ($item) {
            $treatmentIds = explode(',', $item->TreatmentIds);
            $treatmentNames = Treatment::whereIn('id', $treatmentIds)->pluck('name')->toArray();
            $item->TreatmentName = implode(', ', $treatmentNames);
            return $item;
        });

        $afternoontherapist = CaseSheet::select( 'case_sheets.id','ops.op_no','ops.name','ops.age','consultations.consultation_no','case_sheets.date',
                                'case_sheets.vital_dates','case_sheets.morning_session','case_sheets.afternoon_session',
                                'case_sheets.evng_staff_id','staffs.name AS StaffName','case_sheets.afternoon_session AS AfternoonTreatmentIds' )
                            ->join('staffs', 'case_sheets.mrng_staff_id', '=', 'staffs.id')
                            ->join('ops', 'case_sheets.op_no_id', '=', 'ops.id')
                            ->leftJoin('consultations','case_sheets.consultation_id','=','consultations.id')
                            ->whereDate('case_sheets.date', $date)
                            ->where('case_sheets.evng_staff_id', $request["therapistid"])
                            ->get();

        $afternoontherapist->transform(function ($item) {
            $afternoontreatmentIds = explode(',', $item->AfternoonTreatmentIds);
            $aftrtreatmentNames = Treatment::whereIn('id', $afternoontreatmentIds)->pluck('name')->toArray();
            $item->TreatmentName = implode(', ', $aftrtreatmentNames);
            return $item;
        });

        //IP Mrng Therapist
        $IPmrngtherapist = IPCasesheet::select(
            'i_p_casesheets.id',
            'ips.ip_no',
            'ips.name',
            'ips.age',
            'ip_consultations.ip_consultation_no',
            'i_p_casesheets.date',
            'i_p_casesheets.vital_dates',
            'i_p_casesheets.morning_session',
            'i_p_casesheets.afternoon_session',
            'i_p_casesheets.mrng_staff_id',
            'staffs.name AS StaffName',
            'i_p_casesheets.morning_session AS TreatmentIds' // Include the TreatmentIds column
        )
            ->join('ips', 'i_p_casesheets.ip_no_id', '=', 'ips.id')
            ->join('staffs', 'i_p_casesheets.mrng_staff_id', '=', 'staffs.id')
            ->leftJoin('ip_consultations', 'i_p_casesheets.consultation_id', '=', 'ip_consultations.id')
            ->whereDate('i_p_casesheets.date', $date)
            ->where('i_p_casesheets.mrng_staff_id', $request["therapistid"])
            ->get();
        
        $IPmrngtherapist->transform(function ($item) {
            $treatmentIds = explode(',', $item->TreatmentIds);
            $treatmentNames = Treatment::whereIn('id', $treatmentIds)->pluck('name')->toArray();
            $item->TreatmentName = implode(', ', $treatmentNames);
            return $item;
        });

        //IP Afternoon
        $IPafternoontherapist = IPCasesheet::select(
                                        'i_p_casesheets.id',
                                        'ips.ip_no',
                                        'ips.name',
                                        'ips.age',
                                        'ip_consultations.ip_consultation_no',
                                        'i_p_casesheets.date',
                                        'i_p_casesheets.vital_dates',
                                        'i_p_casesheets.morning_session',
                                        'i_p_casesheets.afternoon_session',
                                        'i_p_casesheets.mrng_staff_id',
                                        'staffs.name AS StaffName',
                                        'i_p_casesheets.morning_session AS AfternoonTreatmentIds' // Include the TreatmentIds column
                                    )
                                        ->join('ips', 'i_p_casesheets.ip_no_id', '=', 'ips.id')
                                        ->join('staffs', 'i_p_casesheets.mrng_staff_id', '=', 'staffs.id')
                                        ->leftJoin('ip_consultations', 'i_p_casesheets.consultation_id', '=', 'ip_consultations.id')
                                        ->whereDate('i_p_casesheets.date', $date)
                                        ->where('i_p_casesheets.evng_staff_id', $request["therapistid"])
                                        ->get();

            $IPafternoontherapist->transform(function ($item) {
            $afternoontreatmentIds = explode(',', $item->AfternoonTreatmentIds);
            $aftrtreatmentNames = Treatment::whereIn('id', $afternoontreatmentIds)->pluck('name')->toArray();
            $item->TreatmentName = implode(', ', $aftrtreatmentNames);
            return $item;
        });

        if (is_null($mrngtherapist) || is_null($afternoontherapist) || is_null($IPmrngtherapist) || is_null($IPafternoontherapist) ) {
            return $this->sendError('Record not found.');
        }
        
        $response = [
            'data' => [
                'morning_session' => $mrngtherapist,
                'afternoon_session' => $afternoontherapist,
                'ipmorning_session' => $IPmrngtherapist,
                'ipafternoon_session' => $IPafternoontherapist,
            ]
        ];
        
        return $this->sendResponse('case_sheets', $response, '1', 'Records retrieved successfully.');
    }
}
