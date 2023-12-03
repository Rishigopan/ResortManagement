<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use App\Http\Resources\IPDietChartResource;
use App\Models\IPDietChart;
use App\Models\Diet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Helpers\Helper;

class IPDietChartController extends BaseController
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

        $ipipdietchats = IPDietChart::all()->sortDesc();
        return $this->sendResponse("ipdietchats", IPDietChartResource::collection($ipipdietchats),'1', ' Record retrieved successfully.');

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
        $Diets = $request->diet;
        $DietArray = json_decode($Diets);
    
        $insertedRecords = [];
    
        foreach ($DietArray as $DietArrayItems) {
            $IndividualDiets = $DietArrayItems;
            //Diet Cost Calculation
            $dietIds = explode(',', $IndividualDiets->Diets);
            $DietCost = Diet::whereIn('id', $dietIds)->sum('cost');

            $insertedRecord = IPDietChart::create([
                'ip_no_id' => $IndividualDiets->IPNum,
                'consultation_id' => $IndividualDiets->ConNum,
                'date' => $IndividualDiets->Date,
                'time' => $IndividualDiets->Time,
                'diet_id' => $IndividualDiets->Diets,
                'diet_cost' => $DietCost,
            ]);
    
            $insertedRecords[] = $insertedRecord;
        }
    
        return $this->sendResponse("dietcharts", new IPDietChartResource($insertedRecords), '1', 'Records created successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\IPDietChart  $ipdietchats
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ipdietchats = IPDietChart::find($id);

        if (is_null($ipdietchats)) {
            return $this->sendError('Record not found.');
        }

        return $this->sendResponse("ipdietchats", new IPDietChartResource($ipdietchats), '1', 'Record Retreived successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\IPDietChart  $ipdietchats
     * @return \Illuminate\Http\Response
     */
    public function edit(IPDietChart $ipdietchats)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\IPDietChart  $ipdietchats
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $ipdietchats = IPDietChart::find($id);

        $input = $request->all();

        $validator = Validator::make($input, [
            'ip_no_id' => ['required', 'max:100'],
            'consultation_id' => ['nullable', 'max:100'],
            'date' => ['nullable', 'max:50'],
            'time' => ['nullable', 'max:50'],
            'diet_id' => ['max:50'],
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error', $validator->errors());

        }
       else {
            $ipdietchats->ip_no_id = $input['ip_no_id'];
            $ipdietchats->consultation_id = $input['consultation_id'];
            $ipdietchats->date = $input['date'];
            $ipdietchats->time = $input['time'];
            $ipdietchats->diet_id = $input['diet_id'];
            $ipdietchats->save();          
            return $this->sendResponse("ipdietchats", new IPDietChartResource($ipdietchats), '1', 'Record Updated successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\IPDietChart  $ipdietchats
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ipdietchats = IPDietChart::find($id);

        if (is_null($ipdietchats)) {
            return $this->sendError(' Record not found.');
        }
        
        $ipdietchats->delete();

        return $this->sendResponse("ipdietchats", new IPDietChartResource($ipdietchats),'1', 'Record Deleted successfully.');
    }
}
