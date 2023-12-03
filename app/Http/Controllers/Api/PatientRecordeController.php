<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use App\Http\Resources\PatientResource;
use App\Models\PatientRecordTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PatientRecordeController extends BaseController
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

        $patientrecords = PatientRecordTable::all()->sortDesc();
        return $this->sendResponse("patientrecords", PatientResource::collection($patientrecords),'1', 'Patient Record retrieved successfully.');

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
            'op_id' => ['required', 'max:25'],
            'date' => ['required'],
            'records' => ['required'],
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error', $validator->errors());

        }
       
        $patientrecords = PatientRecordTable::create($input);
        return $this->sendResponse("patientrecords", new PatientResource($patientrecords), '1', 'Record created successfully');
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PatientRecordTable  $patientrecords
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $patientrecords = PatientRecordTable::find($id);

        if (is_null($patientrecords)) {
            return $this->sendError('Record not found.');
        }

        return $this->sendResponse("patientrecords", new PatientResource($patientrecords), '1', 'Record Retreived successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PatientRecordTable  $patientrecords
     * @return \Illuminate\Http\Response
     */
    public function edit(PatientRecordTable $patientrecords)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PatientRecordTable  $patientrecords
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $patientrecords = PatientRecordTable::find($id);

        $input = $request->all();

        $validator = Validator::make($input, [
            'op_id' => ['required', 'max:25'],
            'date' => ['required'],
            'records' => ['required'],
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error', $validator->errors());

        }
        
        $patientrecords->op_id = $input['op_id'];
        $patientrecords->date = $input['date'];
        $patientrecords->records = $input['records'];
        $patientrecords->save();          
        return $this->sendResponse("patientrecords", new PatientResource($patientrecords), '1', 'Record Updated successfully');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PatientRecordTable  $patientrecords
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $patientrecords = PatientRecordTable::find($id);

        if (is_null($patientrecords)) {
            return $this->sendError('Record not found.');
        }
        
        $patientrecords->delete();

        return $this->sendResponse("patientrecords", new PatientResource($patientrecords),'1', 'Record Deleted successfully.');
    }
}
