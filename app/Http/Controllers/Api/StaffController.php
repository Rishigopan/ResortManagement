<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use App\Http\Resources\StaffResource;
use App\Models\Staff;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class StaffController extends BaseController
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

        $staffs = Staff::all();

        //  if (!empty($Staffs)) {
        //      foreach ($Staffs as $Staff) {
        //         $Staff['password'] = Crypt::decryptString($Staff->get('password'));
        //         $Staff['confirm_password'] = Crypt::decryptString("confirm_password");
        //     }
        //  }

        return $this->sendResponse("staffs", StaffResource::collection($staffs),'1', 'Record retrieved successfully.');

        // return $this->sendResponse("staffs", StaffResource::collection($Staffs), 'Staffs retrieved successfully.');
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
                'remarks' => 'nullable',
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => 'required',
                'confirm_password' => 'required',
                'branch_id' => 'nullable',
                'gender' => 'required',
            ]);
    
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
    
            $emailExists = User::where('email', $input['email'])->exists();
            if ($emailExists) {
                return $this->sendResponse("staff_id", null, '3', 'Email already exists.');
            }
    
            $input['password'] = Hash::make($input['password']);
            $input['confirm_password'] = Hash::make($input['confirm_password']);
    
            $userId = DB::table('users')->insertGetId([
                'name' => $input['name'],
                'email' => $input['email'],
                'password' => $input['password'],
            ]);
    
            $id = DB::table('staffs')->insertGetId($input);
    
            DB::commit();
            return $this->sendResponse("staff_id", $id, '1', 'Record created successfully.');
        } catch (\Exception $e) {
            DB::rollback();
            return $this->sendError('Error', $e->getMessage());
        }
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Staff  $Staff
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $staffs = Staff::find($id);

        if (is_null($staffs)) {
            return $this->sendError('Record not found.');
        }

        return $this->sendResponse("staffs", $staffs, '1', 'Record retrieved successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Staff  $Staff
     * @return \Illuminate\Http\Response
     */
    public function edit(Staff $Staff)
    {
        // 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Staff  $Staff
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
                'remarks' => 'nullable',
                'gender' => 'required',
                'email' => ['required', 'string', 'email', 'max:255', Rule::unique('staffs')->ignore($id)],
                'password' => 'nullable',
                'confirm_password' => 'nullable',
                'branch_id' => 'nullable',
            ]);

            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            $CheckExists = Staff::select('name')->where(['name' => $input['name']])->where('id','<>',$id)->get();
        if (count($CheckExists) > 0) {
            return $this->sendResponse("roomType", 'Exists' , '0', 'Record Already Exists');
        } else {
            $email = DB::table('staffs')
            ->where('id', '=', $id)
            ->pluck('email');

        DB::table('users')->where('email', $email)->update([
            'name' => $input['name'],
            'email' => $input['email'],
            // 'password' => Crypt::encryptString($input['password']),
        ]);

        $affected = DB::table('staffs')->where('id', $id)->update([
            'name' => $input['name'],
            'email' => $input['email'],
            // 'password' => Crypt::encryptString($input['password']),
            // 'confirm_password' => Crypt::encryptString($input['confirm_password']),
            'mobile_no' => $input['mobile_no'],
            'remarks' => $input['remarks'],
            'department_id' => $input['department_id'],
            'branch_id' => $input['branch_id'],
            'gender' => $input['gender'],

        ]);

        DB::commit();     
        return $this->sendResponse("updated_rows_count", $affected, '1', 'Record updated successfully.');
      
        }
        } catch (\Exception $e) {
            DB::rollback();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Staff  $Staff
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            DB::beginTransaction();

            $email = DB::table('staffs')
                ->where('id', '=', $id)
                ->pluck('email');

            if (is_null($email)) {
                return $this->sendError('Record not found.');
            }

            DB::table('users')->where('email', '=', $email)->delete();

            $deleted = DB::table('staffs')->where('id', '=', $id)->delete();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
        }

        return $this->sendResponse("deleted_rows_count", $deleted, '1', 'Record deleted successfully.');
    }
}
