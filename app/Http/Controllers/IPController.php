<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\IP;
use App\Models\Room;
use App\Models\RoomType;
use App\Models\Op;
use App\Models\Branch;
use App\Models\Doctor;
use App\Models\ModeOfPay;
use App\Models\Consultation;
use App\Models\User;
use Illuminate\Support\Str; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

 
use Yajra\DataTables\DataTables;
class IPController extends Controller
{
    public function ip(Request $request) {

        if ($request->ajax()) {
            $data = IP::select('id','op_id','ip_no', 'RoomType_id','Room_id','consultation_id','ip_date', 'name', 'age', 'gender', 'full_address',
            'phone_no', 'mobile_no', 'occupation', 'marital_status', 'local_address', 'local_phone_no',
            'local_mobile_no')
            ->orderBy('id', 'desc')->get();
            return Datatables::of($data)->addIndexColumn()
            ->editColumn('gender', function ($row) {
                switch ($row->gender) {
                    case 1:
                        return 'Male';
                    case 2:
                        return 'Female';
                    case 3:
                        return 'Others';
                    default:
                        return '';
                }
            })
            ->addColumn('action', function($row){ 
                $actionBtn = '<div class="text-center actions text-nowrap"> <button class="view btn btn_view me-2" value="'.$row["id"].'"><i class="ri-eye-line"></i></button><button class="edit btn btn_edit me-2" value="'.$row["id"].'"><i class="ri-pencil-line"></i></button> <button class="delete btn btn_delete"value="'.$row["id"].'"><i class="ri-delete-bin-6-line"></i></button></div>';
                return $actionBtn;
            })
            ->rawColumns(['action'])
            ->make(true);
        } 
        
        $ListRoomTypeList['RoomType'] = RoomType::select('id','name')->get();
        $ListOpList['Op'] = Op::select('id','name','op_no')->get();
        $ListConsultation['Con'] = Consultation::select('id','consultation_no')->get();
        $ListUsers['users'] = User::select('id','name')->get();
        $ListBranch['branch'] = Branch::select('id','branch_name')->get();
        $ListDoct['doct'] = Doctor::select('id','name')->get();
        $ListOfPay['modeofpay'] = ModeOfPay :: select('id','name')->get();

        //Room Sharing Check

        $roomSharing = env('ROOM_SHARING', 0);

        if ($roomSharing == 1) {
            $listRoomList['Room'] = Room::select('id', 'room_no', 'room_type_id')
                                    ->get();
        } else {
            $listRoomList['Room'] = Room::select('id', 'room_no', 'room_type_id')
                                    ->where('is_maintenence', '=', 0)
                                    ->get();
        }

        //Generate IP Number

        $ipPrefix = env('IP_PREFIX');
        $count_ip = DB::table('ips')->count();
 
        if ($count_ip > 0) {
            $max_id = DB::table('ips')->max('id') + 1;
        } else {
            $max_id = 1;
        } 

        $max_ip = $ipPrefix . Str::padLeft($max_id, 4, '0');

        $datas = array_merge($ListRoomTypeList, $listRoomList, $ListOpList, $ListConsultation, $ListUsers, $ListBranch, $ListDoct, $ListOfPay);
        return view('IPMaster',$datas, compact('max_ip'));      
        
    }


    //Ip Patient Details 
    public function Ipdetails(Request $request)
    {
        if ($request->ajax()) {
            $data = IP::select('id','op_id','ip_no', 'RoomType_id','Room_id','consultation_id','ip_date', 'name', 'age', 'gender', 'full_address',
            'phone_no', 'mobile_no', 'occupation', 'marital_status', 'local_address', 'local_phone_no',
            'local_mobile_no')
            ->orderBy('id', 'desc')->get();
            
            return Datatables::of($data)->addIndexColumn()
            ->editColumn('gender', function ($row) {
                switch ($row->gender) {
                    case 1:
                        return 'Male';
                    case 2:
                        return 'Female';
                    case 3:
                        return 'Others';
                    default:
                        return '';
                }
            })
            ->addColumn('ip_patient_record', function($row) { 
                $IP_PR_Btn = '<div><a class="btn AddBtn" href="IpPatientRecId/'.$row["id"].'">PR</a></div>';
                return $IP_PR_Btn;
            })
            ->addColumn('ip_case_sheet', function($row) { 
                $IP_Casesheet_btn = '<div><a class="btn AddBtn" href="IPCaseSheetId/'.$row["id"].'">CS</a></div>';
                return $IP_Casesheet_btn;
            })
            ->addColumn('ip_diet_chart', function($row) { 
                $IP_DietChart_Btn = '<div><a class="btn AddBtn" href="IPDietChartId/'.$row["id"]. '">DC</a></div>';
                return $IP_DietChart_Btn;
            })
            ->addColumn('ip_bmi', function($row) { 
                $IP_BMI_Btn = '<div><a class="btn AddBtn" href="IPBMIId/'.$row["id"].'">BMI</a></div>';
                return $IP_BMI_Btn;
            })
            ->rawColumns(['ip_patient_record', 'ip_case_sheet', 'ip_diet_chart', 'ip_bmi'])
            ->make(true);
        }
    
        return view('IpPatientDetails'); 
    }
} 
