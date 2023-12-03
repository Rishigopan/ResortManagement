<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use App\Http\Resources\DoctorResource;
use App\Models\Doctor;
use App\Models\Consultation;
use App\Models\DoctorConsultation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule; 

class DoctorController extends BaseController
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

        $doctors = Doctor::all();

        //  if (!empty($doctors)) {
        //      foreach ($doctors as $doctor) {
        //         $doctor['password'] = Crypt::decryptString($doctor->get('password'));
        //         $doctor['confirm_password'] = Crypt::decryptString("confirm_password");
        //     }
        //  }

        return $this->sendResponse("doctors", DoctorResource::collection($doctors),'1', 'Record retrieved successfully.');

        // return $this->sendResponse("doctors", DoctorResource::collection($doctors), 'Doctors retrieved successfully.');
        // } else {
        //     return $this->sendError('Access Denied.', ["You dont have privilege to access this page . Sorry Contact Administrator"]);
        // }
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
            DB::beginTransaction();
    
            $input = $request->all();
    
            $validator = Validator::make($input, [
                'name' => ['required', 'string', 'max:255'],
                'mobile_no' => 'required',
                'department_id' => 'required',
                'gender' => 'required',
                'remarks' => 'nullable',
                'email' => ['required', 'string', 'email', 'max:255'],
                'password' => 'nullable',
                'confirm_password' => 'required',
                'branch_id' => 'nullable',
            ]);
    
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
    
            $emailExists = User::where('email', $input['email'])->exists();
            if ($emailExists) {
                return $this->sendResponse("doctor_id", null, '3', 'Email already exists.');
            }
    
            $input['password'] = Hash::make($input['password']);
            $input['confirm_password'] = Hash::make($input['confirm_password']);
    
            $userId = DB::table('users')->insertGetId([
                'name' => $input['name'],
                'email' => $input['email'],
                'password' => $input['password'],
            ]);
    
            $id = DB::table('doctors')->insertGetId($input);
    
            DB::table('doctor_consultations')->insertGetId([
                'doctor_id' => $id,
                'op_consultation_fees' => '0.00',
                'ip_consultation_fees' => '0.00',
                'op_no_fee_days' => '0',
                'ip_no_fee_days' => '0',
            ]);
    
            DB::commit();
            return $this->sendResponse("doctor_id", $id, '1', 'Record created successfully.');
        } catch (\Exception $e) {
            DB::rollback();
        }
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $doctor = Doctor::find($id);

        if (is_null($doctor)) {
            return $this->sendError('Record not found.');
        }

        return $this->sendResponse("doctors", $doctor, '1', 'Record retrieved successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function edit(Doctor $doctor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $input = $request->all();

            $validator = Validator::make($input, [
                'name' => ['required', 'string', 'max:255'],
                'mobile_no' => 'required',
                'department_id' => 'required',
                'gender' => 'required',
                'remarks' => 'nullable',
                'email' => ['required', 'string', 'email', 'max:255', Rule::unique('doctors')->ignore($id)],
                'password' => 'nullable',
                'confirm_password' => 'nullable',
                'branch_id' => 'nullable',
            ]);

            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            $CheckExists = Doctor::select('name')->where(['name' => $input['name']])->where('id','<>',$id)->get();
            if (count($CheckExists) > 0) {
                return $this->sendResponse("Doctor", 'Exists' , '0', 'Record Already Exists');
            } else {
                $email = DB::table('doctors')
                ->where('id', '=', $id)
                ->pluck('email');

            DB::table('users')->where('email', $email)->update([
                'name' => $input['name'],
                'email' => $input['email'],
                // 'password' => Crypt::encryptString($input['password']),
            ]);

            $affected = DB::table('doctors')->where('id', $id)->update([
                'name' => $input['name'],
                'email' => $input['email'],
                // 'password' => Crypt::encryptString($input['password']),
                // 'confirm_password' => Crypt::encryptString($input['confirm_password']),
                'mobile_no' => $input['mobile_no'],
                'gender' => $input['gender'],
                'remarks' => $input['remarks'],
                'department_id' => $input['department_id'],
                'branch_id' => $input['branch_id'],

            ]);

            DB::commit();  
            return $this->sendResponse("updated_rows_count", $affected, '1', 'Record updated successfully.');    
            }          
        } catch (exception $e) {
            DB::rollback();
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            DB::beginTransaction();

            $email = DB::table('doctors')
                ->where('id', '=', $id)
                ->pluck('email');

            if (is_null($email)) {
                return $this->sendError('Record not found.');
            }
            $CheckConsultationExists = Consultation::select('doctor_id') -> where( 'doctor_id', '=' , $id) -> get();

            if (count($CheckConsultationExists)  > 0) {
                return $this->sendResponse("deleted_rows_count", 'Exists' , '0', 'Can`t delete this record because it is in use');
            } else {  
                DB::table('users')->where('email', '=', $email)->delete();

                $deleted = DB::table('doctors')->where('id', '=', $id)->delete();
    
                DB::commit();
            }

        } catch (exception $e) {
            DB::rollback();
        }

        return $this->sendResponse("deleted_rows_count", $deleted, '1', 'Record deleted successfully.');
    }
}
