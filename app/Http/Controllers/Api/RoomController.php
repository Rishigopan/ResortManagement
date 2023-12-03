<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use App\Http\Resources\RoomResource;
use App\Models\Room;
use App\Models\IP;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Helpers\Helper;


class RoomController extends BaseController
{


    /**
     * Display a listing o$roomsf the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // if (!auth()->user()) {
        //    return $this->sendError('Access Denied.', ["You dont have privilege to access this page . Sorry Contact Administrator"]);
        // }

        $rooms = Room::all()->sortDesc();
        return $this->sendResponse("rooms", RoomResource::collection($rooms),'1', 'Record retrieved successfully.');

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
            'room_no' => ['required', 'max:5'],
            'room_type_id' => ['required'],
            'floor_id' => ['nullable'],
            'rent_ac' => ['max:8'],
            'rent_non_ac' => ['max:8'],
            //'is_maintenence' => ['max:8'],

        ]);
        $validatedValues = $validator->validated();

        $InputArray = ([
            'room_no' => $validatedValues['room_no'],
            'room_type_id' => $validatedValues['room_type_id'],
            'floor_id' => $validatedValues['floor_id'],
            'rent_ac' => $validatedValues['rent_ac'],
            'rent_non_ac' => $validatedValues['rent_non_ac'],
            'is_maintenence' => 0
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error', $validator->errors());

        }
        $CheckExists = Room::select('room_no')->where(['room_no' => $input['room_no']])->get();
        if (count($CheckExists) > 0) {
            return $this->sendResponse("room", 'Exists' , '0', 'Record Already Exists');
        } else {
            $room = Room::create($InputArray);
            return $this->sendResponse("room", new RoomResource($room), '1', 'Record created successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $room = Room::find($id);

        if (is_null($room)) {
            return $this->sendError('Record  not found.');
        }

        return $this->sendResponse("rooms", new RoomResource($room), '1', 'Record  Retrieved Successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit(Room $room)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $room = Room::find($id);

        $input = $request->all();

        $validator = Validator::make($input, [
            'room_no' => ['required', 'max:5'],
            'room_type_id' => ['required'],
            'floor_id' => ['nullable'],
            'rent_ac' => ['max:8'],
            'rent_non_ac' => ['max:8'],
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error', $validator->errors());

        }
        $CheckExists = Room::select('room_no')->where(['room_no' => $input['room_no']])->where('id','<>',$id)->get();
        if (count($CheckExists) > 0) {
            return $this->sendResponse("room", 'Exists' , '0', 'Record  Already Exists');
        } else {
            $room->room_no = $input['room_no'];
            $room->room_type_id = $input['room_type_id'];
            $room->floor_id = $input['floor_id'];
            $room->rent_ac = $input['rent_ac'];
            $room->rent_non_ac = $input['rent_non_ac'];
            $room->save();
             
            return $this->sendResponse("room", new RoomResource($room), '1', 'Record  Updated successfully');
        }        
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $room = Room::find($id);

        if (is_null($room)) {
            return $this->sendError('Room not found.');
        }

        $CheckIPExists = IP::select('Room_id') -> where( 'Room_id', '=' , $id) -> get();
        if (count($CheckIPExists)  > 0 ) {
            return $this->sendResponse("room", 'Exists' , '0', 'Can`t delete this record because it is in use');
        } else {  
            $room->delete();
            return $this->sendResponse("room", new RoomResource($room), '1', 'Record  Deleted successfully.');
        }       
    }





    

    public function updateroom($id)
    {
        $room = Room::find($id);
        $room->update(['is_maintenence' => !$room->is_maintenence]);
        return response()->json(['success' => true]);
    }

}
