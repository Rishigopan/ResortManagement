<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Resources\IPBMIResource;
use App\Models\IPBMI;

class IPBMIController extends BaseController
{
       /**
     * Display a listing o$bmi of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // if (!auth()->user()) {
        //    return $this->sendError('Access Denied.', ["You dont have privilege to access this page . Sorry Contact Administrator"]);
        // }

        $ipbmis = IPBMI::all()->sortDesc();
        return $this->sendResponse("ipbmis", IPBMIResource::collection($ipbmis),'1', ' Record retrieved successfully.');

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
            'date' => ['required'],
            'ip_no_id' => ['required'],
            'consultation_id' => ['nullable'],
            'temp_mrng' => ['nullable'],
            'temp_evng' => ['nullable'],
            'b_P_mrng' => ['nullable'],
            'b_P_evng' => ['nullable'],
            'weight' => ['required'],
            'remarks' => ['nullable'],
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error', $validator->errors());
        }
       else {
            $ipbmis = IPBMI::create($input);
            return $this->sendResponse("ipbmis", new IPBMIResource($ipbmis), '1', 'Record created successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  App\Models\IPBMI  $bmi
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ipbmis = IPBMI::find($id);

        if (is_null($ipbmis)) {
            return $this->sendError('BMI  not found.');
        }

        return $this->sendResponse("ipbmis", new IPBMIResource($ipbmis), '1', 'Record  Retrieved Successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\IPBMI  $bmi
     * @return \Illuminate\Http\Response
     */
    public function edit(IPBMI $ipbmis)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  App\Models\IPBMI  $bmi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $ipbmis = IPBMI::find($id);

        $input = $request->all();

        $validator = Validator::make($input, [
            'date' => ['required'],
            'ip_no_id' => ['required'],
            'consultation_id' => ['nullable'],
            'temp_mrng' => ['nullable'],
            'temp_evng' => ['nullable'],
            'b_P_mrng' => ['nullable'],
            'b_P_evng' => ['nullable'],
            'weight' => ['required'],
            'remarks' => ['nullable'],
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error', $validator->errors());

        }
        else {

            $ipbmis->date = $input['date'];
            $ipbmis->ip_no_id = $input['ip_no_id'];
            $ipbmis->consultation_id = $input['consultation_id'];
            $ipbmis->temp_mrng = $input['temp_mrng'];
            $ipbmis->temp_evng = $input['temp_evng'];
            $ipbmis->b_P_mrng = $input['b_P_mrng'];
            $ipbmis->b_P_evng = $input['b_P_evng'];
            $ipbmis->weight = $input['weight'];
            $ipbmis->remarks = $input['remarks'];
            $ipbmis->save();
                
            return $this->sendResponse("bmi", new IPBMIResource($ipbmis), '1', 'Record Updated successfully');
        }        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  App\Models\IPBMI  $bmi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ipbmis = IPBMI::find($id);

        if (is_null($ipbmis)) {
            return $this->sendError('Record not found.');
        }

        $ipbmis->delete();

        return $this->sendResponse("bmi", new IPBMIResource($ipbmis), '1', 'Record  Deleted successfully.');
    }
}
