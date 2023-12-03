<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use App\Http\Resources\DietResource;
use App\Models\Diet;
use App\Models\DietChart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Helpers\Helper;

class DietController extends BaseController
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

        $diets = Diet::all()->sortDesc();
        return $this->sendResponse("diets", DietResource::collection($diets),'1', 'Record retrieved successfully.');

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
        $CheckExists = Diet::select('name')->where(['name' => $input['name']])->get();
        if (count($CheckExists) > 0) {
            return $this->sendResponse("diet", 'Exists' , '0', 'Record Already Exists');
        } else {
            $diets = Diet::create($InputArray);
            return $this->sendResponse("diet", new DietResource($diets), '1', 'Record created successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Diet  $Diet
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $diet = Diet::find($id);

        if (is_null($diet)) {
            return $this->sendError('Record not found.');
        }

        return $this->sendResponse("diet", new DietResource($diet), '1', 'Record retrieved successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Diet  $Diet
     * @return \Illuminate\Http\Response
     */
    public function edit(Diet $Diet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Diet  $Diet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $diet = Diet::find($id);

        $input = $request->all();

       

        $validator = Validator::make($input, [
            'name' => ['required', 'max:25'],
            'cost' => ['max:10'],
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error', $validator->errors());

        }
        $CheckExists = Diet::select('name')->where(['name' => $input['name']])->where('id','<>',$id)->get();
        if (count($CheckExists) > 0) {
            return $this->sendResponse("diet", 'Exists' , '0', 'Diet Already Exists');
        } else {
            $diet->name = $input['name'];
            $diet->cost = $input['cost'];
            $diet->save();          
            return $this->sendResponse("diet", new DietResource($diet), '1', 'Record Updated successfully');
        }
        

        return $this->sendResponse("diet", new DietResource($diet), 'Record Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Diet  $Diet
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $diet = Diet::find($id);

        if (is_null($diet)) {
            return $this->sendError('Record not found.');
        }
        $CheckDietExists = DietChart::whereRaw("FIND_IN_SET($id, diet_id)")
                                        ->get();
        if (count($CheckDietExists) > 0) {
            return $this->sendResponse("diet", 'Exists' , '0', 'Can`t delete this record because it is in use');
        } else {  
            $diet->delete();
            return $this->sendResponse("diet", new DietResource($diet), '1', 'Record Deleted successfully.');
        } 

    }
}
