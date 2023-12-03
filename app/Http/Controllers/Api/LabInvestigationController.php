<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController;
use App\Http\Resources\LabInvestigationResource;
use App\Models\LabInvestigation;
use Illuminate\Support\Facades\Validator;

class LabInvestigationController extends BaseController
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

        $labinvestigations = LabInvestigation::all()->sortDesc();
        return $this->sendResponse("labinvestigations", LabInvestigationResource::collection($labinvestigations),'1', 'Record retrieved successfully.');

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
            'cost' => ['max:10'],
            'remarks' => ['max:250'],
        ]);
 
        if ($validator->fails()) {
            return $this->sendError('Validation Error', $validator->errors());

        }
        $CheckExists = LabInvestigation::select('name')->where(['name' => $input['name']])->get();
        if (count($CheckExists) > 0) {
            return $this->sendResponse("department", 'Exists' , '0', 'Record Already Exists');
        } else {
            $labinvestigation = LabInvestigation::create($input);
            return $this->sendResponse("labinvestigation", new LabInvestigationResource($labinvestigation), '1', 'Record created successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LabInvestigation  $labinvestigation
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $labinvestigation = LabInvestigation::find($id);

        if (is_null($labinvestigation)) {
            return $this->sendError('Record not found.');
        }

        return $this->sendResponse("labinvestigation", new LabInvestigationResource($labinvestigation), '1', 'Record retrieved successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LabInvestigation  $labinvestigation
     * @return \Illuminate\Http\Response
     */
    public function edit(LabInvestigation $labinvestigation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LabInvestigation  $labinvestigation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $labinvestigation = LabInvestigation::find($id);

        $input = $request->all();

        $validator = Validator::make($input, [
            'name' => ['required', 'max:25'],
            'cost' => ['max:10'],
            'remarks' => ['max:250'],

        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error', $validator->errors());

        }
        $CheckExists = LabInvestigation::select('name')->where(['name' => $input['name']])->where('id','<>',$id)->get();
        if (count($CheckExists) > 0) {
            return $this->sendResponse("roomType", 'Exists' , '0', 'Department Already Exists');
        } else {
            $labinvestigation->name = $input['name'];
            $labinvestigation->cost = $input['cost'];
            $labinvestigation->remarks = $input['remarks'];
            $labinvestigation->save();
         
            return $this->sendResponse("labinvestigation", new LabInvestigationResource($labinvestigation), '1', 'Record Updated successfully');
        }     
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LabInvestigation  $labinvestigation
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $labinvestigation = LabInvestigation::find($id);

        if (is_null($labinvestigation)) {
            return $this->sendError('Record not found.');
        }

        $labinvestigation->delete();

        return $this->sendResponse("labinvestigation", new LabInvestigationResource($labinvestigation), '1', 'Record Deleted successfully.');
    }
}
