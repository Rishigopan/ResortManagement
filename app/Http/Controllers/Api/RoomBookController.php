<?php

namespace App\Http\Controllers\Api;
use Carbon\Carbon;
use App\Http\Controllers\Api\BaseController;
use App\Http\Resources\RoomBookresource;
use App\Models\RoomBook;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
class RoomBookController extends BaseController
{
   /**
 * Display a listing of the resource.
 *
 * @return \Illuminate\Http\Response
 */

    public function index()
    {

        $RoomBooks = RoomBook::all();

    
        return $this->sendResponse("RoomBooks", RoomBookresource::collection($RoomBooks), '1', 'Record retrieved successfully.');

        
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

    //RoomType Wise RoomNumber
    public function getroomsbytype($RoomId)
    {
        $roomSharing = env('ROOM_SHARING', 0);

        if ($roomSharing == 1){
        $RoomNum = Room::where('room_type_id', $RoomId)
                            ->select('id', 'room_no') 
                            ->orderBy('id', 'desc')
                            ->get();
        }else{
            $RoomNum = Room::where('room_type_id', $RoomId)
            ->where('is_maintenence', 0)
            ->select('id', 'room_no') 
            ->orderBy('id', 'desc')
            ->get(); 
        }



        return response()->json($RoomNum);
    }


    /**
     * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
  
        try {
            DB::beginTransaction();

            $input = $request->all();

            $validator = Validator::make($input, [
                
                'fromdate' => ['required'],
                'op_id' => ['nullable'],
                'user_id' =>['nullable'], 
                'RoomType_id' =>['required'],
                'Room_id' =>['required'],
                'acnonac' =>['required'],
                'Todate' => ['required'],
                'remarks' => ['max:50'],
            ]);

            if ($validator->fails()) {
                return $this->sendError('Validation Error', $validator->errors());
            }
             else {
                $roomId = request('Room_id');

                DB::table('rooms')->where('id', $roomId)->update([
                    'is_maintenence' => '1',
                ]);
                $id = DB::table('roombooking')->insertGetId($input);
    
                DB::commit();
                return $this->sendResponse("RoomBooks", $id, '1', 'Record created successfully.');
            }
        } catch (\Exception $e) {
            DB::rollback();
        }
    }


        public   function calculateRent(Request $request  ){
            $fromdate=$request["fromdate"];
            $todate=$request["Todate"];
            $AcNonAc = $request["acnonac"];
            $newDate = Carbon::createFromFormat('Y-m-d', $fromdate);
            $newDate1 = Carbon::createFromFormat('Y-m-d', $todate);
           
            $days = $newDate->diffInDays($newDate1);
            
            $roomId = $request["Room_id"];
            $RoomRent = Room::select('rent_ac','rent_non_ac')->where(['id'=>$roomId])->first();
            $AcRoomRent = $RoomRent->rent_ac; 
            $NonAcRoomRent = $RoomRent -> rent_non_ac; 
            $AcRoomRent;
            
            
            if($AcNonAc == 1)///Ac Room
            {
              $Rent= $AcRoomRent * $days;
            }
            else { //nonAc  room
                $Rent= $NonAcRoomRent * $days; 
            }

            //return   $Rent;

            $response =  [
                'RoomRent' => $Rent  
            ] ;
            return response()->json($response, 200);

        }
 
     /**
      * Display the specified resource.
      *
      * @param  \App\Models\RoomBook  $RoomBook
      * @return \Illuminate\Http\Response
      */
     public function show(int $id)
     {
         $RoomBook = RoomBook::find($id);
 
         if (is_null($RoomBook)) {
             return $this->sendError('Record not found.');
         }
 
         return $this->sendResponse("RoomBooks", $RoomBook,'1', 'Record retrieved successfully.');
     }
 
     /**
      * Display the specified resource.
      *
      * @param  \App\Models\RoomBook  $RoomBook
      * @return \Illuminate\Http\Response
      */
     public function getRoomBookByRoomBookId($RoomBookid)
     {
         $RoomBook = DB::table('RoomBooks')->where('id', $RoomBookid)->first();
 
         if (is_null($RoomBook)) {
             return $this->sendError('Record not found.');
         }
 
         return $this->sendResponse("RoomBooks", $RoomBook, '1', 'Record retrieved successfully.');
     }
 
     /**
      * Show the form for editing the specified resource.
      *
      * @param  \App\Models\RoomBook  $RoomBook
      * @return \Illuminate\Http\Response
      */
     public function edit(RoomBook $RoomBook)
     {
         //
     }
 
     /**
      * Update the specified resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @param  \App\Models\RoomBook  $RoomBook
      * @return \Illuminate\Http\Response
      */
     public function update(Request $request, $id)
     {
        $RoomBooks = RoomBook::find($id);

        $input = $request->all();

        $validator = Validator::make($input, [
            'fromdate' => ['required'],
            'op_id' => ['nullable'],
            'user_id' =>['nullable'], 
            'RoomType_id' =>['required'],
            'Room_id' =>['required'],
            'acnonac' =>['required'],
            'Todate' => ['required'],
            'remarks' => ['max:30'],
           
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error', $validator->errors());
 
        }
        else {

            $RoomBooks->op_id = $input['op_id'];
            $RoomBooks->RoomType_id = $input['RoomType_id'];
            $RoomBooks->Room_id = $input['Room_id'];
            $RoomBooks->user_id = $input['user_id'];
            $RoomBooks->acnonac = $input['acnonac'];
            $RoomBooks->fromdate = $input['fromdate'];
            $RoomBooks->Todate = $input['Todate'];
            $RoomBooks->remarks = $input['remarks'];
            
            $RoomBooks->save();           
            return $this->sendResponse("RoomBooks", new RoomBookresource($RoomBooks), '1', 'Record Updated successfully');
        }
    }
     /**
      * Remove the specified resource from storage.
      *
      * @param  \App\Models\RoomBook  $RoomBook
      * @return \Illuminate\Http\Response
      */
     public function destroy($id)
     {
         try {
 
             $RoomBook = RoomBook::find($id);
 
             if (is_null($RoomBook)) {
                 return $this->sendError('Record not found.');
             }
 
             $deleted = $RoomBook->delete();
 
         } catch (\Exception $e) {
 
         }
 
         return $this->sendResponse("deleted_rows_count", $deleted, '1', 'Record deleted successfully.');
     }
 }
 
