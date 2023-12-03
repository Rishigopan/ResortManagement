<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RoomBook;
use App\Models\Op;
use App\Models\User;
use App\Models\Room;
use App\Models\RoomType;

use Yajra\DataTables\DataTables;

class RoomBookController extends Controller
{
    public function RoomBook(Request $request) {
        
        if ($request->ajax()) {
            $data= RoomBook::select( 'roombooking.id', 'ops.name AS patientname','users.name AS username','room_types.name AS rtname','user_id','rooms.room_no', 'Rent', 'fromdate', 'Todate','remarks','room_types.id AS roomtypeid')
                                ->leftJoin('ops', 'roombooking.op_id', '=', 'ops.id')
                                ->leftJoin('users', 'roombooking.user_id', '=', 'users.id')
                                ->join('room_types', 'roombooking.RoomType_id', '=', 'room_types.id')
                                ->join('rooms', 'roombooking.Room_id', '=', 'rooms.id')->orderBy('id', 'desc')
                                ->get();
            return DataTables::of($data)->addIndexColumn()
            ->addColumn('action', function($row){
                $actionBtn = '<div class="text-center actions text-nowrap"> <button class="view btn btn_view me-2" value="'.$row["id"].'"><i class="ri-eye-line"></i></button><button class="edit btn btn_edit me-2" value="'.$row["id"].'"><i class="ri-pencil-line"></i></button> <button class="delete btn btn_delete"value="'.$row["id"].'"><i class="ri-delete-bin-6-line"></i></button></div>';
                return $actionBtn;
            })
            ->rawColumns(['action'])
            ->make(true);
        }
        $ListRoomTypeList['RoomType']=RoomType::select('id','name')->get();
        $ListOpList['Op']=Op::select('id','name')->get();
        $ListUsers['users']=User::select('id','name')->get();

        //Room Sharing Check

        $roomSharing = env('ROOM_SHARING', 0);

        if ($roomSharing == 1) {
            $listRoomList['Room'] = Room::select('id', 'room_no', 'room_type_id')
                                    ->get();
        } else {
            $listRoomList['Room'] = Room::select('id', 'room_no', 'room_type_id')
                                    ->where('is_maintenance', '=', 0)
                                    ->get();
        }

        $data=array_merge($ListOpList,$ListUsers,$listRoomList, $ListRoomTypeList);
        return view('Roombooking',$data);
    }
   
}
