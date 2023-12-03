<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use App\Http\Resources\OpResource;
use App\Models\Op;
use App\Models\Consultation;
use App\Models\BMI;
use App\Models\IP;
use App\Models\DietChart;
use App\Models\CaseSheet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class OpController extends BaseController
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
 
    public function index()
    {

        $ops = Op::all();

        //  if (!empty($Ops)) {
        //      foreach ($Ops as $Op) {
        //         $Op['password'] = Crypt::decryptString($Op->get('password'));
        //         $Op['confirm_password'] = Crypt::decryptString("confirm_password");
        //     }
        //  }

        return $this->sendResponse("ops", OpResource::collection($ops), '1', 'Record retrieved successfully.');

        // return $this->sendResponse("Ops", OpResource::collection($Ops), 'Ops retrieved successfully.');
        // } else {
        //     return $this->sendError('Access Denied.', ["You dont have privilege to access this page . Sorry Contact Administrator"]);
        // }
    }

    public function maxop()
    {
        try {

            $RegPrefix = env('REGISTRATION_PREFIX');
            $opPrefix = env('OP_PREFIX');

            // Registration Number Calculation
            $count_reg = DB::table('ops')->count();
    
            if ($count_reg > 0) {
                $max_reg_id = DB::table('ops')->max('id') + 1;
            } else {
                $max_reg_id = 1;
            }
    
            $MaxRegNum = $RegPrefix . Str::padLeft($max_reg_id, 4, '0');
    
            // OP Number Calculation
            $count_op = DB::table('ops')->count();
    
            if ($count_op > 0) {
                $max_id = DB::table('ops')->max('id') + 1;
            } else {
                $max_id = 1;
            }
    
            $MaxOPNum = $opPrefix . Str::padLeft($max_id, 4, '0');
    
            return [
                'max_reg_no' => $MaxRegNum,
                'max_op_no' => $MaxOPNum
            ];
        } catch (\Exception $e) {
    
        }
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

            $input = $request->all();

            $validator = Validator::make($input, [
                'reg_no' => ['nullable'],
                'op_no' => ['nullable'],
                'op_date' => ['required'],
                'name' => ['required', 'max:50'],
                'age' => ['required'],
                'gender' => ['required'],
                'full_address' => ['max:500'],
                'phone_no' => ['max:15'],
                'mobile_no' => ['required', 'max:15'],
                'occupation' => ['max:100'],
                'marital_status' => ['nullable'],
                'local_address' => ['max:500'],
                'email' => ['max:100'],
                'branch_id' => 'nullable',

            ]);

            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }

            $RegPrefix = env('REGISTRATION_PREFIX');
            $opPrefix = env('OP_PREFIX');
            //Registration Number Calculation
            $count_reg = DB::table('ops')->count();

            if ($count_reg > 0) {
                $max_reg_id = DB::table('ops')->max('id') + 1;
            } else {
                $max_reg_id = 1;
            }

            $input['reg_no'] = $RegPrefix . Str::padLeft($max_reg_id, 4, '0');


            //OP Number Calculation

            $count_op = DB::table('ops')->count();

            if ($count_op > 0) {
                $max_id = DB::table('ops')->max('id') + 1;
            } else {
                $max_id = 1; 
            }

            $input['op_no'] = $opPrefix . Str::padLeft($max_id, 4, '0');

            $id = DB::table('ops')->insertGetId($input);

        } catch (exception $e) {

        }

        return $this->sendResponse("op_id", $id, '1', 'Record created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Op  $Op
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $op = Op::find($id);

        if (is_null($op)) {
            return $this->sendError('Op not found.');
        }

        return $this->sendResponse("ops", $op,'1', 'Record retrieved successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Op  $Op
     * @return \Illuminate\Http\Response
     */
    public function getOpByOpId($opid)
    {
        $op = DB::table('ops')->where('id', $opid)->first();

        if (is_null($op)) {
            return $this->sendError('Op not found.');
        }

        return $this->sendResponse("ops", $op, '1', 'Record retrieved successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Op  $Op
     * @return \Illuminate\Http\Response
     */
    public function edit(Op $Op)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Op  $Op
     * @return \Illuminate\Http\Response
     */


    public function update(Request $request, $id)
    {
       $ops = Op::find($id);

       $input = $request->all();

       $validator = Validator::make($input, [
           
        'reg_no' => ['required'],
        'op_no' => ['required'],
        'op_date' => ['required'],
        'name' => ['required', 'max:50'],
        'age' => ['required'],
        'gender' => ['required'],
        'full_address' => ['max:500'],
        'phone_no' => ['max:15'],
        'mobile_no' => ['required', 'max:15'],
        'occupation' => ['max:100'],
        'marital_status' => ['nullable'],
        'local_address' => ['max:500'],
        'email' => ['max:100'],
        'branch_id' => ['nullable'],

       ]);

       if ($validator->fails()) {
           return $this->sendError('Validation Error', $validator->errors());

       }
       else {

           $ops->reg_no = $input['reg_no'];
           $ops->op_no = $input['op_no'];
           $ops->op_date = $input['op_date'];
           $ops->name = $input['name'];
           $ops->age = $input['age'];
           $ops->gender = $input['gender'];
           $ops->full_address = $input['full_address'];
           $ops->phone_no = $input['phone_no'];
           $ops->mobile_no = $input['mobile_no'];
           $ops->occupation = $input['occupation'];
           $ops->marital_status = $input['marital_status'];
           $ops->local_address = $input['local_address'];
           $ops->email = $input['mobile_no'];
           $ops->branch_id = $input['branch_id'];
           $ops->save();           
           return $this->sendResponse("ops", new OpResource($ops), '1', 'Record Updated successfully');
       }
   }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Op  $Op
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {

            $op = Op::find($id);

            if (is_null($op)) {
                return $this->sendError('Record not found.');
            }
            $CheckConsultationExists = Consultation::select('op_id') -> where( 'op_id', '=' , $id) -> get();
            $CheckBMIExists = BMI::select('op_no_id') -> where( 'op_no_id', '=' , $id) -> get();
            $CheckDietChartExists = DietChart::select('op_no_id') -> where( 'op_no_id', '=' , $id) -> get();
            $CheckCaseSheetExists = CaseSheet::select('op_no_id') -> where( 'op_no_id', '=' , $id) -> get();
            $CheckIPExists = IP::select('op_id') -> where( 'op_id', '=' , $id) -> get();

            if (count($CheckConsultationExists)  > 0  || count($CheckBMIExists ) > 0 || count($CheckDietChartExists ) > 0 || count($CheckCaseSheetExists ) > 0 || count($CheckIPExists ) > 0) {
                return $this->sendResponse("deleted_rows_count", 'Exists' , '0', 'Can`t delete this record because it is in use');
            } else {  
                $deleted = $op->delete();
            }

        } catch (\Exception $e) {

        }
 
        return $this->sendResponse("deleted_rows_count", $deleted, '1', 'Record deleted successfully.');
    }
}
