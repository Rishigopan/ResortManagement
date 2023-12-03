<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use App\Http\Resources\TreatmentResource;
use App\Models\Treatment;
use App\Models\CaseSheet;
use App\Models\IPCasesheet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Helpers\Helper;

class TreatmentController extends BaseController
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

        $treatments = Treatment::all()->sortDesc();
        return $this->sendResponse("treatments", TreatmentResource::collection($treatments), '1', 'Record retrieved successfully.');

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
            'cost' => ['nullable', 'max:10'],
        ]);


        $validatedValues = $validator->validated();

        $InputArray = ([
            'name' => $validatedValues['name'],
            'cost' => Helper::ZeroValue($validatedValues['cost'])
        ]);

        
        if ($validator->fails()) {
            return $this->sendError('Validation Error', $validator->errors());

        }
        $CheckExists = Treatment::select('name')->where(['name' => $input['name']])->get();
        if (count($CheckExists) > 0) {
            return $this->sendResponse("treatment", 'Exists' , '0', 'Treatment Already Exists');
        } else {
            $treatment = Treatment::create($InputArray);
            return $this->sendResponse("treatment", new TreatmentResource($treatment), '1', 'Record created successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Treatment  $Treatment
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $treatment = Treatment::find($id);

        if (is_null($treatment)) {
            return $this->sendError('Record not found.');
        }

        return $this->sendResponse("treatment", new TreatmentResource($treatment), '1', 'Record retrieved successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Treatment  $Treatment
     * @return \Illuminate\Http\Response
     */
    public function edit(Treatment $treatment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Treatment  $Treatment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $treatment = Treatment::find($id);

        $input = $request->all();

        $validator = Validator::make($input, [
            'name' => ['required', 'max:25'],
            'cost' => ['max:10'],
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error', $validator->errors());

        }
        $CheckExists = Treatment::select('name')->where(['name' => $input['name']])->where('id','<>',$id)->get();
        if (count($CheckExists) > 0) {
            return $this->sendResponse("treatment", 'Exists' , '0', 'Record Already Exists');
        } else {
            $treatment->name = $input['name'];
            $treatment->cost = $input['cost'];
            $treatment->save();           
            return $this->sendResponse("treatment", new TreatmentResource($treatment), '1', 'Record Updated successfully');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Treatment  $Treatment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $treatment = Treatment::find($id);

        if (is_null($treatment)) {
            return $this->sendError('Record not found.');
        }
        $CheckCaseSheetExists = CaseSheet::select('morning_session','afternoon_session')
                                            ->where('morning_session', '=', $id)
                                            ->orWhere('afternoon_session', '=', $id)
                                            ->get();
        $CheckIPCaseSheetExists = IPCasesheet::select('morning_session','afternoon_session')
                                                ->where('morning_session', '=', $id)
                                                ->orWhere('afternoon_session', '=', $id)
                                                ->get();
        if (count($CheckCaseSheetExists)  > 0  || count($CheckIPCaseSheetExists ) > 0) {
            return $this->sendResponse("treatment", 'Exists' , '0', 'Can`t delete this record because it is in use');
        } else {  
            $treatment->delete();
            return $this->sendResponse("treatment", new TreatmentResource($treatment), '1', 'Record Deleted successfully');
        }
    }
}
