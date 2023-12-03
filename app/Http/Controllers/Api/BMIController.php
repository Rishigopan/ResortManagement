<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Api\BaseController;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Resources\BMIResource;
use App\Models\BMI;

class BMIController extends BaseController
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

        $bmis = BMI::all()->sortDesc();
        return $this->sendResponse("bmis", BMIResource::collection($bmis),'1', 'Record retrieved successfully.');

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
            'op_no_id' => ['required'],
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
            $bmi = BMI::create($input);
            return $this->sendResponse("bmi", new BMIResource($bmi), '1', 'Record created successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  App\Models\BMI  $bmi
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bmi = BMI::find($id);

        if (is_null($bmi)) {
            return $this->sendError('Record  not found.');
        }

        return $this->sendResponse("bmis", new BMIResource($bmi), '1', 'Record  Retrieved Successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\BMI  $bmi
     * @return \Illuminate\Http\Response
     */
    public function edit(BMI $bmi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  App\Models\BMI  $bmi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $bmi = BMI::find($id);

        $input = $request->all();

        $validator = Validator::make($input, [
            'date' => ['required'],
            'op_no_id' => ['required'],
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

            $bmi->date = $input['date'];
            $bmi->op_no_id = $input['op_no_id'];
            $bmi->consultation_id = $input['consultation_id'];
            $bmi->temp_mrng = $input['temp_mrng'];
            $bmi->temp_evng = $input['temp_evng'];
            $bmi->b_P_mrng = $input['b_P_mrng'];
            $bmi->b_P_evng = $input['b_P_evng'];
            $bmi->weight = $input['weight'];
            $bmi->remarks = $input['remarks'];
            $bmi->save();
                
            return $this->sendResponse("bmi", new BMIResource($bmi), '1', 'Record Updated successfully');
        }        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  App\Models\BMI  $bmi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bmi = BMI::find($id);

        if (is_null($bmi)) {
            return $this->sendError('Record not found.');
        }

        $bmi->delete();

        return $this->sendResponse("bmi", new BMIResource($bmi), '1', 'Record  Deleted successfully');
    }
}
