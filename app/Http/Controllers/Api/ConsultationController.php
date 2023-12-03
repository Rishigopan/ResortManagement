<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use App\Models\Consultation;
use App\Models\DoctorConsultation;
use App\Models\ModeOfPay;
use App\Models\BMI;
use App\Models\DietChart;
use App\Models\CaseSheet;
use App\Models\IPBMI;
use App\Models\IPDietChart;
use App\Models\Staff;
use App\Models\IPCasesheet;
use App\Models\IP;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ConsultationController extends BaseController
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

        $consultations = DB::table('consultations')
            ->join('doctors', 'consultations.doctor_id', '=', 'doctors.id')
            ->join('ops', 'consultations.op_id', '=', 'ops.id')
            ->select('consultations.*', 'doctors.name', 'ops.op_no')
            ->get();

        return $this->sendResponse("consultations", $consultations,'1',  'Record retrieved successfully.');

    }

    public function maxconsultation()
    {
        try { 
            $count_consultation = DB::table('consultations')->count();

            if ($count_consultation > 0) {
                $max_id = DB::table('consultations')->max('id')+1;
            } else {
                $max_id = 1;
            }

            $max_consultation = "Bet/Con/" . Str::padLeft($max_id, 7, '0') . "/23-24";
        } catch (exception $e) {

        }

        return $this->sendResponse("max_consultation", $max_consultation,'1', 'Max consultation No Retreived Successfully.');
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


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return DB::transaction(function () use ($request) {

            try {

                $input = $request->all();

                $validator = Validator::make($input, [
                    'consultation_no' => [ 'max:50'],
                    'consultation_date' => ['required'],
                    'op_id' => ['required'],
                    'doctor_id' => ['required'],
                    'consultation_fees' => ['nullable'],
                    'mode_of_payment_id' => ['nullable'],
                    'branch_id' => ['nullable'],
                ]);

                if ($validator->fails()) {
                    return $this->sendError('Validation Error.', $validator->errors());
                }

                //Registration Fees 
                $opIdExists = Consultation::where('op_id', $input['op_id'])->exists();
                $input['registration_fees'] = $opIdExists ? 0: 0;//Set the Registration fees

                $input['total'] = $input['registration_fees'] +  $input['consultation_fees'];

                // Check if OpNumber exists for the selected date
                $CheckOpExists = Consultation::where('consultation_date', $input['consultation_date'])
                ->where('op_id', $input['op_id'])
                ->where('doctor_id', $input['doctor_id'])
                ->exists();

                if ($CheckOpExists) {
                    return $this->sendResponse("consultation", 'Exists', '0', 'OP Number is already assigned for the selected date');
                }

                //Consultation Number Max
                $count_consultation = DB::table('consultations')->count();
                if ($count_consultation > 0) {
                    $max_id = DB::table('consultations')->max('id') + 1;
                } else {
                    $max_id = 1;
                }


                //Token Calculation
                $max_token_no_count = DB::table('consultations')
                    ->whereDate('consultation_date', Carbon::now())
                    ->count();
                if ($max_token_no_count > 0) {
                    $max_token_no = DB::table('consultations')
                        ->whereDate('consultation_date', Carbon::now())
                        ->max('token_no');
                    $input['token_no'] = $max_token_no + 1;
                } else {
                    $input['token_no'] = 1;
                }

                $consultationDate = Carbon::parse($input['consultation_date'])->toDateString();
                $consultationdisplayDate = Carbon::parse($input['consultation_date'])->format('d M y');//ForDisplay
                $count_consultation_date = DB::table('consultations')
                    ->whereDate('consultation_date', $consultationDate)
                    ->count();
                    if ($count_consultation_date > 0) {
                        $date_id_con =$count_consultation_date + 1;
                    } else {
                        $date_id_con = 1;
                    }
                    
                $input['consultation_no'] = $consultationdisplayDate . "/". Str::padLeft($date_id_con, 3, '0');

                $input['consultation_bill_no'] = "Bill/CON/" . Str::padLeft($max_id + 1, 4, '0');

                $response = Consultation::create($input);

            } catch (\Exception $e) {

            }

            return $this->sendResponse("consultation", $response,'1', 'Record created successfully.');
        });
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Consultation  $consultation
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $consultation = Consultation::find($id);

        if (is_null($consultation)) {
            return $this->sendError('Record not found.');
        }

        return $this->sendResponse("consultations", $consultation,'1', 'Record retrieved successfully.');
    } 

    public function getConsultationByDateandDoctor(Request $request)
    {
        //return $this->sendResponse("consultations",$request["doctorid"], 'Consultation Records retrieved successfully.');

        $consultation_date = Carbon::parse($request['date'])->format('Y-m-d');

        $consultation = DB::table('consultations')
            ->join('doctors', 'consultations.doctor_id', '=', 'doctors.id')
            ->join('ops', 'consultations.op_id', '=', 'ops.id')
            ->select('consultations.*', 'doctors.name', 'ops.op_no', 'ops.op_date', 'ops.name', 'ops.age', 'ops.gender')
            ->whereDate('consultation_date', $consultation_date)
            ->where('doctor_id', $request["doctorid"])
            ->get();

        if (is_null($consultation)) {
            return $this->sendError('Record not found.');
        }

        //return $request['doctorid'];
        return $this->sendResponse("consultations", $consultation,'1', 'Records retrieved successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Consultation  $consultation
     * @return \Illuminate\Http\Response
     */
    public function edit(Consultation $consultation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Consultation  $consultation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {

            $input = $request->all();

            $validator = Validator::make($input, [
                'consultation_no' => ['required', 'max:50'],
                'consultation_date' => ['required'],
                'op_id' => ['required'],
                'doctor_id' => ['required'],
                'consultation_fees' => ['nullable'],
                'mode_of_payment_id' => ['nullable'],
                'branch_id' => 'nullable',

            ]);

            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }

            $affected = DB::table('consultations')->where('id', $id)->update([
                'consultation_no' => $input['consultation_no'],
                'consultation_date' => $input['consultation_date'],
                'op_id' => $input['op_id'],
                'doctor_id' => $input['doctor_id'],
                'consultation_fees' => $input['consultation_fees'],
                'mode_of_payment_id' => $input['mode_of_payment_id'],
                'branch_id' => $input['branch_id'],
            ]);

        } catch (\Exception $e) {

        }

        return $this->sendResponse("updated_rows_count", $affected,'1', 'Record updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Consultation  $consultation
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {

            $consultation = Consultation::find($id);

            if (is_null($consultation)) {
                return $this->sendError('Record not found.');
            }
            $CheckBMIExists = BMI::select('consultation_id') -> where( 'consultation_id', '=' , $id) -> get();
            $CheckDietChartExists = DietChart::select('consultation_id') -> where( 'consultation_id', '=' , $id) -> get();
            $CheckCaseSheetExists = CaseSheet::select('consultation_id') -> where( 'consultation_id', '=' , $id) -> get();
            $CheckIPBMIExists = IPBMI::select('consultation_id') -> where( 'consultation_id', '=' , $id) -> get();
            $CheckIPDietchartExists = IPDietChart::select('consultation_id') -> where( 'consultation_id', '=' , $id) -> get();
            $CheckIPCasesheetExists = IPCasesheet::select('consultation_id') -> where( 'consultation_id', '=' , $id) -> get();
            $CheckIPExists = IP::select('consultation_id') -> where( 'consultation_id', '=' , $id) -> get();

            if (count($CheckIPBMIExists)  > 0  || count($CheckBMIExists ) > 0 || count($CheckDietChartExists ) > 0 ||
                 count($CheckCaseSheetExists ) > 0 || count($CheckIPDietchartExists ) > 0 || 
                 count($CheckIPCasesheetExists ) > 0 || count($CheckIPExists ) > 0) {
                return $this->sendResponse("deleted_rows_count", 'Exists' , '0', 'Can`t delete this record because it is in use');
            } else {  
            $deleted = $consultation->delete();
            }
        } catch (\exception $e) {

        }

        return $this->sendResponse("deleted_rows_count", $deleted,'1', 'Record deleted successfully.');
    }



    //OP Doctor No Fees
    
    public function calculateFees(Request $request)
    {
        $doctor = $request["doctorid"];
        $patient = $request["opid"];
        $ConsultationDate = Carbon::parse($request["condate"]);

        //Consultation Fees For This Selected OP And Doctor
        $consultationFee = DoctorConsultation:: select('op_consultation_fees') 
                                                        ->where(['doctor_id'=> $doctor ])
                                                        ->get()->last()->op_consultation_fees;

        //The Doctors Fees Days
        $consultationFeesDays = DoctorConsultation:: select('op_no_fee_days') 
                                                        ->where(['doctor_id'=> $doctor ])
                                                        ->get()->last()->op_no_fee_days;


        //Last Visited Days 
        $LastConsultationDaysExists =  Consultation::select('consultation_date')
                                                    ->where(['op_id'=> $patient])
                                                    ->where(['doctor_id'=> $doctor])
                                                    ->get()->last(); 

        //Last Fees Paid Days
        $checkConsultationExists  = Consultation::select('consultation_date')
                                                    ->where('op_id', $patient)
                                                    ->where('doctor_id', $doctor)
                                                    ->where('consultation_fees', '>', 0)
                                                    ->orderBy('consultation_date', 'desc')
                                                    ->first();

        //Last Visited Date Days Calculation                                       
        $lastVisitedDays = $LastConsultationDaysExists ? $ConsultationDate->diffInDays($LastConsultationDaysExists->consultation_date) : 0;

        if (is_null($checkConsultationExists)) {
            $checkConsultationExists = 1;
            $result = [
                'consultationFee' => $consultationFee,
                'lastVisitedDays' => $lastVisitedDays,
                'checkConsultationExists' => $checkConsultationExists,
            ];
            return $this->sendResponse("consultations", $result, '1', 'Consultation Fee Records retrieved successfully.');
        } else {
            // Last Fees Paid days
            $diffInDays = $checkConsultationExists ? $ConsultationDate->diffInDays($checkConsultationExists->consultation_date) : 0;
        
            if ($diffInDays < $consultationFeesDays) {
                $checkConsultationExists = 0;
            } else {
                $checkConsultationExists = 1;
            }
            $result = [
                'consultationFee' => $consultationFee,
                'lastVisitedDays' => $lastVisitedDays,
                'checkConsultationExists' => $checkConsultationExists,
            ];
            return $this->sendResponse("consultations", $result, '1', 'Consultation Fee Records retrieved successfully.');
        }
    }
        

        

      
    

}
