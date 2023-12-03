<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use App\Http\Resources\DepartmentResource;
use App\Models\Department;
use App\Models\Doctor;
use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DepartmentController extends BaseController
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

        $departments = Department::all()->sortDesc();
        return $this->sendResponse("departments", DepartmentResource::collection($departments),'1', 'Record retrieved successfully.');

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
        $input = $request->all();

        $validator = Validator::make($input, [
            'name' => ['required', 'max:25'],
            'remarks' => ['max:250'],
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error', $validator->errors());
        }
        $CheckExists = Department::select('name')->where(['name' => $input['name']])->get();
        if (count($CheckExists) > 0) {
            return $this->sendResponse("department", 'Exists' , '0', 'Record Already Exists');
        } else {
            $department = Department::create($input);
            return $this->sendResponse("department", new DepartmentResource($department), '1', 'Record created successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $department = Department::find($id);

        if (is_null($department)) {
            return $this->sendError('Record not found.');
        }

        return $this->sendResponse("department", new DepartmentResource($department), '1', 'Record retrieved successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit(Department $department)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $department = Department::find($id);

        $input = $request->all();

        $validator = Validator::make($input, [
            'name' => ['required', 'max:25'],
            'remarks' => ['max:250'],
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error', $validator->errors());
 
        }
        $CheckExists = Department::select('name')->where(['name' => $input['name']])->where('id','<>',$id)->get();
        if (count($CheckExists) > 0) {
            return $this->sendResponse("department", 'Exists' , '0', 'Record Already Exists');
        } else {
            $department->name = $input['name'];
            $department->remarks = $input['remarks'];
            $department->save();           
            return $this->sendResponse("department", new DepartmentResource($department), '1', 'Record Updated successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $department = Department::find($id);

        if (is_null($department)) {
            return $this->sendError('Record not found.');
        }
        
        $CheckDoctorExists = Doctor::select('department_id') -> where( 'department_id', '=' , $id) -> get();
        $CheckStaffExists = Staff::select('department_id') -> where( 'department_id', '=' , $id) -> get();
        if (count($CheckDoctorExists)  > 0  || count($CheckStaffExists ) > 0) {
            return $this->sendResponse("department", 'Exists' , '0', 'Can`t delete this record because it is in use');
        } else {  
            $department->delete();
            return $this->sendResponse("department", new DepartmentResource($department), '1', 'Record Deleted successfully');
        }
    }
}
