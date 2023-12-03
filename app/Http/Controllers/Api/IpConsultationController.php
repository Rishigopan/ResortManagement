<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use App\Models\IpConsultation;
use App\Models\Doctor;
use App\Models\DoctorConsultation;
use App\Models\IP;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Carbon\Carbon;


class IpConsultationController extends BaseController
{
    /**
 * Display a listing of the resource.
 *
 * @return \Illuminate\Http\Response
 */

    public function index()
    {

        $consultations = DB::table('ip_consultations')
            ->join('doctors', 'ip_consultations.doctor_id', '=', 'doctors.id')
            ->join('ips', 'ip_consultations.ip_id', '=', 'ips.id')
            ->select('ip_consultations.*', 'doctors.name', 'ips.ip_no')
            ->get();

        return $this->sendResponse("consultations", $consultations,'1',  'Record retrieved successfully.');

    }

    public function maxconsultation()
    {
        try {
            $count_consultation = DB::table('ip_consultations')->count();

            if ($count_consultation > 0) {
                $max_id = DB::table('ip_consultations')->max('id');
            } else {
                $max_id = 1;
            }

            $max_consultation = "Bet/IpCon/" . Str::padLeft($max_id, 7, '0') . "/23-24";
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
                    'ip_consultation_no' => [ 'max:50'],
                    'consultation_date' => ['required'],
                    'ip_id' => ['required'],
                    'doctor_id' => ['required'],
                    'consultation_fees' => ['nullable'],
                    'mode_of_payment_id' => ['nullable'],
                    'branch_id' => ['nullable'],
                    
                ]);

                if ($validator->fails()) {
                    return $this->sendError('Validation Error.', $validator->errors());
                }


                // Check if OpNumber exists for the selected date
                $CheckOpExists = IpConsultation::where('consultation_date', $input['consultation_date'])
                ->where('ip_id', $input['ip_id'])
                ->where('doctor_id', $input['doctor_id'])
                ->exists();

                if ($CheckOpExists) {
                    return $this->sendResponse("ipconsultation", 'Exists', '0', 'IP Number is already assigned for the selected date');
                }

                $consultationDate = Carbon::parse($input['consultation_date'])->toDateString();
                $consultationdisplayDate = Carbon::parse($input['consultation_date'])->format('d M y');//ForDisplay
                $count_consultation_date = DB::table('ip_consultations')
                    ->whereDate('consultation_date', $consultationDate)
                    ->count();
                    if ($count_consultation_date > 0) {
                        $date_id_con =$count_consultation_date + 1;
                    } else {
                        $date_id_con = 1;
                    }

                $count_consultation = DB::table('ip_consultations')->count();

                if ($count_consultation > 0) {
                    $max_id = DB::table('ip_consultations')->max('id') + 1;
                } else {
                    $max_id = 1;
                }

                $max_token_no_count = DB::table('ip_consultations')
                    ->whereDate('consultation_date', Carbon::now())
                    ->count();
                if ($max_token_no_count > 0) {
                    $max_token_no = DB::table('ip_consultations')
                        ->whereDate('consultation_date', Carbon::now())
                        ->max('token_no');
                    $input['token_no'] = $max_token_no + 1;
                } else {
                    $input['token_no'] = 1;
                }

                $input['ip_consultation_no'] = $consultationdisplayDate . "/". Str::padLeft($date_id_con, 3, '0');


                $input['ip_consultation_bill_no'] = "Bill/IPCON/" . Str::padLeft($max_id + 1, 4, '0');
                $input['registration_fees'] = 50;

                $response = IpConsultation::create($input);

            } catch (\Exception $e) {

            }

            return $this->sendResponse("ipconsultation", $response,'1', 'Record created successfully.');
        });
    }

    /**
     * Display the specified resource.
    *
    * @param  \App\Models\IpConsultation  $ipconsultation
    * @return \Illuminate\Http\Response
    */
    public function show(int $id)
    {
        $ipconsultation = IpConsultation::find($id);

        if (is_null($ipconsultation)) {
            return $this->sendError('Record not found.');
        }

        return $this->sendResponse("ipconsultation", $ipconsultation,'1', 'Record retrieved successfully.');
    }

    public function getConsultationByDateandDoctor(Request $request)
    {
        //return $this->sendResponse("consultations",$request["doctorid"], 'Consultation Records retrieved successfully.');

        $consultation_date = Carbon::parse($request['date'])->format('Y-m-d');

        $ipconsultation = DB::table('ip_consultations')
            ->join('doctors', 'consultations.doctor_id', '=', 'doctors.id')
            ->join('ops', 'consultations.op_id', '=', 'ops.id')
            ->select('consultations.*', 'doctors.name', 'ops.op_no', 'ops.op_date', 'ops.name', 'ops.age', 'ops.gender')
            ->whereDate('consultation_date', $consultation_date)
            ->where('doctor_id', $request["doctorid"])
            ->get();

        if (is_null($ipconsultation)) {
            return $this->sendError('Record not found.');
        }

        //return $request['doctorid'];
        return $this->sendResponse("ipconsultation", $ipconsultation,'1', 'Records retrieved successfully.');
    }

    /**
     * Show the form for editing the specified resource.
    *
    * @param  \App\Models\IpConsultation  $ipconsultation
    * @return \Illuminate\Http\Response
    */
    public function edit(IpConsultation $ipconsultation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Models\IpConsultation  $ipconsultation
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, $id)
    {
        try {

            $input = $request->all();

            $validator = Validator::make($input, [
                'ip_consultation_no' => [ 'max:50'],
                'consultation_date' => ['required'],
                'ip_id' => ['required'],
                'doctor_id' => ['required'],
                'consultation_fees' => ['nullable'],
                'mode_of_payment_id' => ['nullable'],
                'branch_id' => ['nullable'],

            ]);

            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }

            $affected = DB::table('ip_consultations')->where('id', $id)->update([
                'ip_consultation_no' => $input['ip_consultation_no'],
                'consultation_date' => $input['consultation_date'],
                'ip_id' => $input['ip_id'],
                'doctor_id' => $input['doctor_id'],
                'consultation_fees' => $input['consultation_fees'],
                'mode_of_payment_id' => $input['mode_of_payment_id'],
                'branch_id' => $input['branch_id'],
            ]);

        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return $this->sendResponse("updated_rows_count", $affected,'1', 'Record updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
    *
    * @param  \App\Models\IpConsultation  $consultation
    * @return \Illuminate\Http\Response
    */
    public function destroy($id)
    {
        try {
 
             $ipconsultation = IpConsultation::find($id);
 
             if (is_null($ipconsultation)) {
                 return $this->sendError('Record not found.');
             }
            //  $CheckBMIExists = BMI::select('consultation_id') -> where( 'consultation_id', '=' , $id) -> get();
            //  $CheckDietChartExists = DietChart::select('consultation_id') -> where( 'consultation_id', '=' , $id) -> get();
            //  $CheckCaseSheetExists = CaseSheet::select('consultation_id') -> where( 'consultation_id', '=' , $id) -> get();
            //  $CheckIPBMIExists = IPBMI::select('consultation_id') -> where( 'consultation_id', '=' , $id) -> get();
            //  $CheckIPDietchartExists = IPDietChart::select('consultation_id') -> where( 'consultation_id', '=' , $id) -> get();
            //  $CheckIPCasesheetExists = IPCasesheet::select('consultation_id') -> where( 'consultation_id', '=' , $id) -> get();
            //  $CheckIPExists = IP::select('consultation_id') -> where( 'consultation_id', '=' , $id) -> get();
 
            //  if (count($CheckIPBMIExists)  > 0  || count($CheckBMIExists ) > 0 || count($CheckDietChartExists ) > 0 ||
            //       count($CheckCaseSheetExists ) > 0 || count($CheckIPDietchartExists ) > 0 || 
            //       count($CheckIPCasesheetExists ) > 0 || count($CheckIPExists ) > 0) {
            //      return $this->sendResponse("deleted_rows_count", 'Exists' , '0', 'Can`t delete this record because it is in use'); }
             else {  
             $deleted = $ipconsultation->delete();
             }
         } catch (\exception $e) {
 
         }
 
         return $this->sendResponse("deleted_rows_count", $deleted,'1', 'Record deleted successfully.');
    }
 
 
 
    //IP Doctor No Fees     
    
    public function calculateFees(Request $request)
    {
        $doctor = $request["doctorid"];
        $patient = $request["ipid"];
        $ConsultationDate = Carbon::parse($request["condate"]);

        //Consultation Fees For This Selected OP And Doctor
        $consultationFee = DoctorConsultation:: select('ip_consultation_fees') 
                                                        ->where(['doctor_id'=> $doctor ])
                                                        ->get()->last()->ip_consultation_fees;

        //The Doctors Fees Days
        $consultationFeesDays = DoctorConsultation:: select('ip_no_fee_days') 
                                                        ->where(['doctor_id'=> $doctor ])
                                                        ->get()->last()->ip_no_fee_days;


        //Last Visited Days 
        $LastConsultationDaysExists =  IpConsultation::select('consultation_date')
                                                    ->where(['ip_id'=> $patient])
                                                    ->where(['doctor_id'=> $doctor])
                                                    ->get()->last(); 

        //Last Fees Paid Days
        $checkConsultationExists  = IpConsultation::select('consultation_date')
                                                    ->where('ip_id', $patient)
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
