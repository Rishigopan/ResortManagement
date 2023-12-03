<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use App\Http\Resources\DiagnosisResource;
use App\Models\Diagnosis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DiagnosisController extends BaseController
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

        $diagnoses = Diagnosis::all()->sortDesc();
        return $this->sendResponse("diagnoses", DiagnosisResource::collection($diagnoses),'1', 'Record retrieved successfully.');

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
        $CheckExists = Diagnosis::select('name')->where(['name' => $input['name']])->get();
        if (count($CheckExists) > 0) {
            return $this->sendResponse("department", 'Exists' , '0', 'Record Already Exists');
        } else {
            $diagnosis = Diagnosis::create($input);
            return $this->sendResponse("diagnosis", new DiagnosisResource($diagnosis), '1', 'Record created successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Diagnosis  $Diagnosis
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $diagnosis = Diagnosis::find($id);

        if (is_null($diagnosis)) {
            return $this->sendError('Record not found.');
        }

        return $this->sendResponse("diagnosis", new DiagnosisResource($diagnosis), '1', 'Record Retreived successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Diagnosis  $Diagnosis
     * @return \Illuminate\Http\Response
     */
    public function edit(Diagnosis $diagnosis)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Diagnosis  $Diagnosis
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $diagnosis = Diagnosis::find($id);

        $input = $request->all();

        $validator = Validator::make($input, [
            'name' => ['required', 'max:25'],
            'remarks' => ['max:250'],
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error', $validator->errors());

        }
        $CheckExists = Diagnosis::select('name')->where(['name' => $input['name']])->where('id','<>',$id)->get();
        if (count($CheckExists) > 0) {
            return $this->sendResponse("roomType", 'Exists' , '0', 'Department Already Exists');
        } else {
            $diagnosis->name = $input['name'];
            $diagnosis->remarks = $input['remarks'];
            $diagnosis->save();          
            return $this->sendResponse("diagnosis", new DiagnosisResource($diagnosis), '1', 'Record Updated successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Diagnosis  $Diagnosis
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $diagnosis = Diagnosis::find($id);

        if (is_null($diagnosis)) {
            return $this->sendError('Record not found.');
        }
        
        $diagnosis->delete();

        return $this->sendResponse("diagnosis", new DiagnosisResource($diagnosis),'1', 'Record Deleted successfully.');
    }
}
