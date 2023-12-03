<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use App\Http\Resources\IPresource;
use App\Models\IP;
use App\Models\IPBMI;
use App\Models\Room;
use App\Models\IPCasesheet;
use App\Models\IpConsultation;  
use App\Models\IPDietChart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Carbon\Carbon;

class IPController extends BaseController
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function index()
     {
 
         $ips = IP::all();
  
       
         return $this->sendResponse("ips", IPresource::collection($ips), '1', 'Record retrieved successfully.');
 
         
     }
 
     public function maxip()
     {
         try {

            $ipPrefix = env('IP_PREFIX');

             $count_ip = DB::table('ips')->count();
 
             if ($count_ip > 0) {
                 $max_id = DB::table('ips')->max('id') + 1;
             } else {
                 $max_id = 1;
             }
 
             $max_ip = $ipPrefix . Str::padLeft($max_id, 7, '0') . "/23/24";
         } catch (\Exception $e) {
 
         }
 
         return $this->sendResponse("max_ip_no", $max_ip,'1', 'Max ip No Retreived Successfully.');
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
 
        try {
            $ipPrefix = env('IP_PREFIX');

            $input = $request->all();
 
             $validator = Validator::make($input, [
                 'ip_no' => ['nullable'],
                 'ip_date' => ['required'],
                 'op_id' => ['required'],
                 'RoomType_id' =>['required'],
                 'Room_id' =>['required'],
                //  'consultation_id' =>['max:20'],
                 'name' => ['required', 'max:50'],
                 'age' => ['required'],
                 'gender' => ['required'],
                 'email' => ['nullable'],
                 'full_address' => ['max:500'],
                 'phone_no' => ['max:15'],
                 'mobile_no' => ['required', 'max:15'],
                 'occupation' => ['max:100'],
                 'marital_status' => ['nullable'],
                 'local_address' => ['max:500'],
                 'branch_id' => 'nullable',
                 'doctor_id' => ['required'],
                 'consultation_fees' => ['nullable'],
                 'mode_of_payment_id' => ['nullable'],
                 'ip_consultation_no' => [ 'max:50'],
                 'consultation_date' => ['required'],

             ]);
 
             if ($validator->fails()) {
                return $this->sendError('Validation Error', $validator->errors());
            }

            $count_ip = DB::table('ips')->count();

            if ($count_ip > 0) {
                $max_iP_id = DB::table('ips')->max('id')+1;
            } else {
                $max_iP_id = 1;
            }




          

             // Extract the data for each table
            $ipsData = [
                'ip_no' => $ipPrefix . Str::padLeft($max_iP_id, 4, '0'),
                'ip_date' => $input['ip_date'],
                'op_id' => $input['op_id'],
                'RoomType_id' => $input['RoomType_id'],
                'Room_id' => $input['Room_id'],
                // 'consultation_id' => $input['consultation_id'],
                'name' => $input['name'],
                'age' => $input['age'],
                'gender' => $input['gender'],
                'email' => $input['email'],
                'full_address' => $input['full_address'],
                'phone_no' => $input['phone_no'],
                'mobile_no' => $input['mobile_no'],
                'occupation' => $input['occupation'],
                'marital_status' => $input['marital_status'],
                'local_address' => $input['local_address'],
                'branch_id' => $input['branch_id'],                
            ];

            // Save data in the 'ips' table
            $ip = IP::create($ipsData);
            $id = $ip->id; 

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
            
                $token_no = $max_token_no + 1;
            } else {
                $token_no = 1;
            }




            $ipConsultationsData = [
                'consultation_date' => $input['ip_date'],
                'ip_id' => $id,
                'doctor_id' => $input['doctor_id'],
                'consultation_fees' => $input['consultation_fees'],
                'mode_of_payment_id' => $input['mode_of_payment_id'],
                'branch_id' => $input['branch_id'],
                'ip_consultation_no' => $consultationdisplayDate . "/". Str::padLeft($date_id_con, 3, '0'),
                'ip_consultation_bill_no' => "Bill/IPCON/" . Str::padLeft($max_id + 1, 4, '0'),
                'token_no' => $token_no, // Use the calculated token_no value
                'registration_fees'=> "50"

            ];

            DB::table('rooms')
            ->where('id', $input['Room_id'])
            ->update(['is_maintenence' => 1]);

            // Save data in the 'ip_consultations' table
            $ipConsultation = IpConsultation::create($ipConsultationsData);

          

        } catch (exception $e) {

        }

        return $this->sendResponse("ip_id", $id, '1', 'Record created successfully.');
    }


     /**
      * Display the specified resource.
      *
      * @param  \App\Models\IP  $Ip
      * @return \Illuminate\Http\Response
      */
     public function show(int $id)
     {
         $ip = IP::find($id);
 
         if (is_null($ip)) {
             return $this->sendError('Ip not found.');
         }
 
         return $this->sendResponse("ips", $ip,'1', 'Record retrieved successfully.');
     }
 
     /**
      * Display the specified resource.
      *
      * @param  \App\Models\IP  $Ip
      * @return \Illuminate\Http\Response
      */
     public function getIpByIpId($ipid)
     {
         $ip = DB::table('ips')->where('id', $ipid)->first();
 
         if (is_null($ip)) {
             return $this->sendError('ip not found.');
         }
 
         return $this->sendResponse("ips", $ip, '1', 'Record retrieved successfully.');
     }
 
     /**
      * Show the form for editing the specified resource.
      *
      * @param  \App\Models\IP  $Ip
      * @return \Illuminate\Http\Response
      */
     public function edit(Ip $Ip)
     {
         //
     }
 
     /**
      * Update the specified resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @param  \App\Models\IP  $Ip
      * @return \Illuminate\Http\Response
      */
     public function update(Request $request, $id)
     {
        $ips = IP::find($id);

        $input = $request->all();

        $validator = Validator::make($input, [
            
            'ip_no' => ['nullable'],
            'ip_date' => ['required'],
            'op_id' => ['required'],
            'RoomType_id' =>['required'],
            'Room_id' =>['required'],
            // 'consultation_id' =>['max:20'],
            'name' => ['required', 'max:50'],
            'age' => ['required'],
            'gender' => ['required'],
            'email' => ['nullable'],
            'full_address' => ['max:500'],
            'phone_no' => ['max:15'],
            'mobile_no' => ['required', 'max:15'],
            'occupation' => ['max:100'],
            'marital_status' => ['nullable'],
            'local_address' => ['max:500'],
            'branch_id' => 'nullable',

        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error', $validator->errors());
 
        }
        else {

            $ips->op_id = $input['op_id'];
            $ips->ip_no = $input['ip_no'];
            $ips->RoomType_id = $input['RoomType_id'];
            $ips->Room_id = $input['Room_id'];
            // $ips->consultation_id = $input['consultation_id'];
            $ips->ip_date = $input['ip_date'];
            $ips->name = $input['name'];
            $ips->age = $input['age'];
            $ips->gender = $input['gender'];
            $ips->email = $input['email'];
            $ips->full_address = $input['full_address'];
            $ips->phone_no = $input['phone_no'];
            $ips->mobile_no = $input['mobile_no'];
            $ips->occupation = $input['occupation'];
            $ips->marital_status = $input['marital_status'];
            $ips->local_address = $input['local_address'];
            $ips->branch_id = $input['branch_id'];
            $ips->save();           
            return $this->sendResponse("ips", new IPresource($ips), '1', 'Record Updated successfully');
        }
    }
     /**
      * Remove the specified resource from storage.
      *
      * @param  \App\Models\IP  $Ip
      * @return \Illuminate\Http\Response
      */
     public function destroy($id)
     {
         try {
 
             $ip = IP::find($id);
 
             if (is_null($ip)) {
                 return $this->sendError('Record not found.');
             }
             $CheckIPBMIExists = IPBMI::select('ip_no_id') -> where( 'ip_no_id', '=' , $id) -> get();
             $CheckIPDietChartExists = IPDietChart::select('ip_no_id') -> where( 'ip_no_id', '=' , $id) -> get();
             $CheckIPCaseSheetExists = IPCasesheet::select('ip_no_id') -> where( 'ip_no_id', '=' , $id) -> get();
 
             if (count($CheckIPBMIExists)  > 0  || count($CheckIPDietChartExists ) > 0 || count($CheckIPCaseSheetExists ) > 0) {
                 return $this->sendResponse("deleted_rows_count", 'Exists' , '0', 'Can`t delete this record because it is in use');
             } else {  
                $deleted = $ip->delete();
             }
             
         } catch (\Exception $e) {
            return "error";
         }
 
         return $this->sendResponse("deleted_rows_count", $deleted, '1', 'Record deleted successfully.');
     }
 }
 
 