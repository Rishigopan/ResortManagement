<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use App\Http\Resources\RoomTypeResource;
use App\Models\RoomType;
use App\Models\Room;
use App\Models\RoomBook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RoomTypeController extends BaseController
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

        $roomTypes = RoomType::all()->sortDesc();
        return $this->sendResponse("roomTypes", RoomTypeResource::collection($roomTypes),'1', 'Records retrieved successfully.');

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
           
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error', $validator->errors());

        }

        $CheckExists = RoomType::select('name')->where(['name' => $input['name']])->get();
        if (count($CheckExists) > 0) {
            return $this->sendResponse("roomType", 'Exists' , '0', 'Record Already Exists');
        } else {
            $roomType = RoomType::create($input);
            return $this->sendResponse("roomType", new RoomTypeResource($roomType), '1', 'Record created successfully');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  App\Models\RoomType  $RoomType
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $roomType = RoomType::find($id);

        if (is_null($roomType)) {
            return $this->sendError('Record not found.');
        }

        return $this->sendResponse("roomType", new RoomTypeResource($roomType), '1', 'Record Retrieved Successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\RoomType  $RoomType
     * @return \Illuminate\Http\Response
     */
    public function edit(RoomType $roomType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  App\Models\RoomType  $RoomType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $roomType = RoomType::find($id);

        $input = $request->all();

        $validator = Validator::make($input, [
            'name' => ['required', 'max:25'],
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error', $validator->errors());

        }
        $CheckExists = RoomType::select('name')->where(['name' => $input['name']])->where('id','<>',$id)->get();
        if (count($CheckExists) > 0) {
            return $this->sendResponse("roomType", 'Exists' , '0', 'Record Already Exists');
        } else {
            $roomType->name = $input['name'];
            $roomType->save();            
            return $this->sendResponse("roomType", new RoomTypeResource($roomType), '1', 'Record Updated successfully');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  App\Models\RoomType  $RoomType
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $roomType = RoomType::find($id);

        if (is_null($roomType)) {
            return $this->sendError('Record not found.');
        }
        $CheckRoomExists = Room::select('room_type_id') -> where( 'room_type_id', '=' , $id) -> get();
        $CheckRoombookExists = RoomBook::select('RoomType_id') -> where( 'RoomType_id', '=' , $id) -> get();

        if (count($CheckRoomExists) > 0 || count($CheckRoombookExists ) > 0) {
            return $this->sendResponse("department", 'Exists' , '0', 'Can`t delete this record because it is in use');
        } else {  
            $roomType->delete();
            return $this->sendResponse("roomType", new RoomTypeResource($roomType), '1', 'Record Deleted successfully.');
        }
        
    }
}
 