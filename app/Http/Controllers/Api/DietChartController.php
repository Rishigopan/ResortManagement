<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use App\Http\Resources\DietChartResource;
use App\Models\DietChart;
use App\Models\IPDietChart;
use App\Models\Diet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Helpers\Helper;
use Illuminate\Support\Facades\DB;


class DietChartController extends BaseController
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

        $dietchats = DietChart::all()->sortDesc();
        return $this->sendResponse("dietchats", DietChartResource::collection($dietchats),'1', 'Record retrieved successfully.');

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


            $insertedRecord = DietChart::create([
                'op_no_id' => $IndividualDiets->OPNum,
                'consultation_id' => $IndividualDiets->ConNum,
                'date' => $IndividualDiets->Date,
                'time' => $IndividualDiets->Time,
                'diet_id' => $IndividualDiets->Diets,
                'diet_cost' => $DietCost,

            ]);
    
            $insertedRecords[] = $insertedRecord;
        }
    
        return $this->sendResponse("dietcharts", new DietChartResource($insertedRecords), '1', 'Records created successfully');
    }
    
    





    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DietChart  $dietchats
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dietchats = DietChart::find($id);

        if (is_null($dietchats)) {
            return $this->sendError('Record not found.');
        }

        return $this->sendResponse("dietchats", new DietChartResource($dietchats), '1', 'Record Retreived successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DietChart  $dietchats
     * @return \Illuminate\Http\Response
     */
    public function edit(DietChart $dietchats)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DietChart  $dietchats
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dietchats = DietChart::find($id);

        $input = $request->all();

        $validator = Validator::make($input, [
            'op_no_id' => ['required', 'max:100'],
            'consultation_id' => ['nullable', 'max:100'],
            'date' => ['required', 'max:50'],
            'time' => ['required', 'max:50'],
            'diet_id' => ['required','max:50'],
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error', $validator->errors());

        }
       else {
            $dietchats->op_no_id = $input['op_no_id'];
            $dietchats->consultation_id = $input['consultation_id'];
            $dietchats->date = $input['date'];
            $dietchats->time = $input['time'];
            $dietchats->diet_id = $input['diet_id'];
            $dietchats->save();          
            return $this->sendResponse("dietchats", new DietChartResource($dietchats), '1', 'Record Updated successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DietChart  $dietchats
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dietchats = DietChart::find($id);

        if (is_null($dietchats)) {
            return $this->sendError('Record not found.');
        }
        
        $dietchats->delete();

        return $this->sendResponse("dietchats", new DietChartResource($dietchats),'1', 'Record Deleted successfully.');
    }




    //Get Diet Schedule
    public function getdietschedule(Request $request)
    {
        $date = date('Y-m-d', strtotime($request['date']));
        $time = $request->input('time'); 
        $IPNum = $request['IPNumber'];
    
        $ipdietchart = IPDietChart::select(
            'i_p_diet_charts.id',
            'ips.ip_no',
            'ips.name',
            'ips.age',
            'i_p_diet_charts.time',
            'consultations.consultation_no',
            'i_p_diet_charts.date',
            'i_p_diet_charts.diet_id AS Ipdiets'
        )
            ->join('ips', 'i_p_diet_charts.ip_no_id', '=', 'ips.id')
            ->leftJoin('consultations', 'i_p_diet_charts.consultation_id', '=', 'consultations.id')
            ->where('i_p_diet_charts.ip_no_id', $IPNum);
    
        if ($date) {
            $ipdietchart->whereDate('i_p_diet_charts.date', $date);
        }
        if ($time) { 
            $ipdietchart->where('i_p_diet_charts.time', $time); 
        }
    
        $ipdietchart = $ipdietchart->get(); 
    
        $ipdietchart->transform(function ($item) {
            $dietIds = explode(',', $item->Ipdiets);
            $dietNames = Diet::whereIn('id', $dietIds)->pluck('name')->toArray();
            $item->DietName = implode(', ', $dietNames);
            return $item;
        });
    
        if (is_null($ipdietchart)) {
            return $this->sendError('Record not found.');
        }
    
        $response = [
            'data' => [
                'IpDiets' => $ipdietchart,
            ]
        ];
    
        return $this->sendResponse('data', $response, '1', 'Records retrieved successfully.');
    }
    
     
}
