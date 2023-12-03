<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use App\Http\Resources\UnitsResource;
use App\Models\Units;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UnitsController extends BaseController
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

        $units = Units::all()->sortDesc();
        return $this->sendResponse("units", UnitsResource::collection($units),'1', 'Record retrieved successfully.');

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
        $CheckExists = Units::select('name')->where(['name' => $input['name']])->get();
        if (count($CheckExists) > 0) {
            return $this->sendResponse("units", 'Exists' , '0', 'Record Already Exists');
        } else {
            $units = Units::create($input);
            return $this->sendResponse("units", new UnitsResource($units), '1', 'Record created successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  App\Models\Units  $units
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $units = Units::find($id);

        if (is_null($units)) {
            return $this->sendError('Record not found.');
        }

        return $this->sendResponse("units", new UnitsResource($units), '1', 'Record retrieved successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Units  $units
     * @return \Illuminate\Http\Response
     */
    public function edit(Units $units)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  App\Models\Units  $units
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $units = Units::find($id);

        $input = $request->all();

        $validator = Validator::make($input, [
            'name' => ['required', 'max:25'],
            'remarks' => ['max:250'],
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error', $validator->errors());
 
        }
        $CheckExists = Units::select('name')->where(['name' => $input['name']])->where('id','<>',$id)->get();
        if (count($CheckExists) > 0) {
            return $this->sendResponse("units", 'Exists' , '0', 'Record Already Exists');
        } else {
            $units->name = $input['name'];
            $units->remarks = $input['remarks'];
            $units->save();           
            return $this->sendResponse("units", new UnitsResource($units), '1', 'Record Updated successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  App\Models\Units  $units
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $units = Units::find($id);

        if (is_null($units)) {
            return $this->sendError('Record not found.');
        }
        
        $CheckUniExists = Item::select('unit') -> where( 'unit', '=' , $id) -> get();
        if (count($CheckUniExists)  > 0 ) {
            return $this->sendResponse("units", 'Exists' , '0', 'Can`t delete this record because it is in use');
        } else {  
            $units->delete();
            return $this->sendResponse("units", new UnitsResource($units), '1', 'Record Deleted successfully');
        }
    }
}
