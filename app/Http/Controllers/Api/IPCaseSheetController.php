<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use App\Http\Resources\IPcasesheetResource;
use App\Models\IPCasesheet;
use App\Models\CaseSheet;
use App\Models\IpConsultation; 
use App\Models\Staff;
use App\Models\Treatment;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Validator;
use App\Helpers\Helper;

class IPCaseSheetController extends BaseController
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

        $ipcasesheets = IPCasesheet::all()->sortDesc();
        return $this->sendResponse("ipipcasesheets", IPcasesheetResource::collection($ipcasesheets),'1', 'Record Sheets retrieved successfully.');

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
    
       
    //IP Wise Consultation
    public function getIPlastConsultations($IpNum)
    {
        $consultations = IpConsultation::where('ip_id', $IpNum)
                                        ->orderBy('id', 'desc')
                                        ->first(['id', 'ip_consultation_no']);
        return response()->json($consultations);
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
            'ip_no_id' => ['required', 'max:100'],
            'consultation_id' => ['nullable', 'max:50'],
            'morning_session' => ['nullable', 'max:50'],
            'afternoon_session' => ['nullable', 'max:50'],
            'mrng_staff_id' => ['nullable'],
            'evng_staff_id' => ['nullable'],
            'vital_dates' => ['nullable','max:500'],
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

        $IpMorningCaseSheetExists = IPCasesheet::where('date', $date)
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

        if ($morningCaseSheetExists || $IpMorningCaseSheetExists) {
            return $this->sendResponse("casesheets", 'Exists', '3', 'Morning Staff already assigned for the selected date');
        }else{
            if ($afternoonCaseSheetExists || $IpAfternoonCaseSheetExists) {
                return $this->sendResponse("casesheets", 'Exists', '4', 'Afternoon Staff already assigned for the selected date');
            }
        }

        $validatedValues = $validator->validated();

        $count_casesheet = IPCasesheet::count();
        if ($count_casesheet > 0) {
            $max_id = IPCasesheet::max('id') + 1;
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
            'ip_no_id' => $validatedValues['ip_no_id'],
            'consultation_id' => $validatedValues['consultation_id'],
            'morning_session' => Helper::ZeroValue($validatedValues['morning_session']),
            'afternoon_session' => Helper::ZeroValue($validatedValues['afternoon_session']),
            'mrng_staff_id' => $validatedValues['mrng_staff_id'],
            'evng_staff_id' => $validatedValues['evng_staff_id'],
            'vital_dates' => $validatedValues['vital_dates'],
            'treatment_cost' => $TreatmentCost,
            'ip_casesheet_bill_no' => "Bill/tret/" . sprintf("%04d", $max_id + 1),
        ];

        $ipcasesheets = IPCasesheet::create($InputArray);
        return $this->sendResponse("ipcasesheets", new IPcasesheetResource($ipcasesheets), '1', 'Record Sheet created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\IPCasesheet  $ipcasesheets
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ipcasesheets = IPCasesheet::find($id);

        if (is_null($ipcasesheets)) {
            return $this->sendError('Record Sheet not found.');
        }

        return $this->sendResponse("ipcasesheets", new IPcasesheetResource($ipcasesheets), '1', 'Record Sheet Retreived successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\IPCasesheet  $ipcasesheets
     * @return \Illuminate\Http\Response
     */
    public function edit(IPCasesheet $ipcasesheets)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\IPCasesheet  $ipcasesheets
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $ipcasesheets = IPCasesheet::find($id);

        $input = $request->all();

        $validator = Validator::make($input, [
            'date' => ['required', 'max:100'],
            'ip_no_id' => ['required', 'max:100'],
            'consultation_id' => ['nullable', 'max:50'],
            'morning_session' => ['nullable', 'max:50'],
            'afternoon_session' => ['nullable', 'max:50'],
            'vital_dates' => ['nullable','max:500'],
            'mrng_staff_id' => ['nullable'],
            'evng_staff_id' => ['nullable'],
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error', $validator->errors());

        }

        $date = $input['date'];
        $mrngStaffId = $input['mrng_staff_id'];
        $evngStaffId = $input['evng_staff_id'];

        $IPMorningCaseSheetExists = IPCasesheet::where('id', '<>', $id)
            ->where('date', $date)
            ->where(function ($query) use ($mrngStaffId) {
                $query->where('mrng_staff_id', '<>', 0)
                ->whereNotNull('mrng_staff_id')
                ->where('mrng_staff_id', $mrngStaffId);
                    
            })

        ->exists();
        $morningCaseSheetExists = CaseSheet::where('id', '<>', $id)->where('date', $date)
        ->where(function ($query) use ($mrngStaffId) {
            $query->where('mrng_staff_id', '<>', 0)
            ->whereNotNull('mrng_staff_id')
            ->where('mrng_staff_id', $mrngStaffId);
                
        })
        ->exists();

        $afternoonCaseSheetExists = IPCasesheet::where('id', '<>', $id)
            ->where('date', $date)
            ->where(function ($query) use ($evngStaffId) {
                $query->where('evng_staff_id', '<>', 0)
                ->whereNotNull('evng_staff_id')
                ->where('mrng_staff_id', $evngStaffId);
                   
            })
            ->exists();

        $IPAfternoonCaseSheetExists = CaseSheet::where('id', '<>', $id)->where('date', $date)
        ->where(function ($query) use ($evngStaffId) {
            $query->where('evng_staff_id', '<>', 0)
            ->whereNotNull('evng_staff_id')
            ->where('evng_staff_id', $evngStaffId);
                
        })
        ->exists();

        if ($morningCaseSheetExists || $IPMorningCaseSheetExists) {
            return $this->sendResponse("casesheets", 'Exists', '3', 'Morning Staff already assigned for the selected date');
        }else{
            if ($afternoonCaseSheetExists || $IPAfternoonCaseSheetExists) {
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

        $ipcasesheets->date = $input['date'];
        $ipcasesheets->ip_no_id = $input['ip_no_id'];
        $ipcasesheets->consultation_id = $input['consultation_id'];
        $ipcasesheets->morning_session = $input['morning_session'];
        $ipcasesheets->afternoon_session = $input['afternoon_session'];
        $ipcasesheets->vital_dates = $input['vital_dates'];
        $ipcasesheets->mrng_staff_id = $input['mrng_staff_id'];
        $ipcasesheets->evng_staff_id = $input['evng_staff_id'];
        $ipcasesheets->treatment_cost = $TreatmentCost; // Update treatment cost
        $ipcasesheets->save();          
        return $this->sendResponse("ipcasesheets", new IPcasesheetResource($ipcasesheets), '1', 'Record  Updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\IPCasesheet  $ipcasesheets
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ipcasesheets = IPCasesheet::find($id);

        if (is_null($ipcasesheets)) {
            return $this->sendError('Record Sheet not found.');
        }
        
        $ipcasesheets->delete();

        return $this->sendResponse("ipcasesheets", new IPcasesheetResource($ipcasesheets),'1', 'Record Sheet Deleted successfully.');
    }
}
