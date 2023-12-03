<?php

namespace App\Http\Controllers;
use App\Models\Doctor;
use App\Models\User;
use App\Models\Room;
use App\Models\RoomType;
use App\Models\IP;
use App\Models\Consultation;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function viewdashboard(Request $request) {

        $doctors = Doctor :: count();
        $Users = User :: count();
        $todayTokens = Consultation::whereDate('created_at', today())->count('token_no');
        $todayCollection = Consultation::whereDate('created_at', today())->sum('consultation_fees');
        $ListRoomTypeList['RoomType'] = RoomType::select('id','name')->get();

        $listRoomList['Room'] = Room::select('rooms.id', 'rooms.room_no', 'rooms.room_type_id', 'ips.name')
                                        ->Leftjoin('ips','ips.Room_id', '=', 'rooms.id')
                                        ->get(); 

        $data = array_merge($ListRoomTypeList, $listRoomList);
        return view('index', compact('doctors','Users','todayTokens','todayCollection'),$data);      
        
    }
}
