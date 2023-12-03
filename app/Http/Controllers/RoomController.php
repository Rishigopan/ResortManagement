<?php

namespace App\Http\Controllers;
use App\Models\Room;
use App\Models\RoomType;
use App\Http\Resources\RoomResource;


use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;
 
class RoomController extends Controller
{
    public function Room(Request $request) {
        
        if ($request->ajax()) {
            $data= Room::select( 'rooms.id','rooms.room_no','room_types.name','rooms.floor_id','rooms.rent_ac','rooms.rent_non_ac','room_types.id AS roomtypeid' )
                            ->join('room_types', 'rooms.room_type_id', '=', 'room_types.id')
                            ->orderBy('id', 'desc')
                            ->get();
            return DataTables::of($data)->addIndexColumn()
            ->addColumn('action', function($row){
                $actionBtn = '<div class="text-center actions text-nowrap"> <button class="view btn btn_view me-2" value="'.$row["id"].'"><i class="ri-eye-line"></i></button><button class="edit btn btn_edit me-2" value="'.$row["id"].'"><i class="ri-pencil-line"></i></button> <button class="delete btn btn_delete"value="'.$row["id"].'"><i class="ri-delete-bin-6-line"></i></button></div>';
                return $actionBtn;
            })
            ->rawColumns(['action'])
            ->make(true);
        }
        $ListRoomTypes['room'] = RoomType::select('id','name')->get();

        return view('RoomMaster',$ListRoomTypes);
    }


    
    public function roommaintain(Request $request) {
        return view('RoomMaintenance');
    }
   
}
