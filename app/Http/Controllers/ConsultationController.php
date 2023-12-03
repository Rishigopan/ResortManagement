<?php

namespace App\Http\Controllers;
use App\Models\Consultation;
use App\Models\IpConsultation;
use App\Models\IP;
use App\Models\Op;
use App\Models\Doctor;
use App\Models\ModeOfPay;
use App\Models\Branch;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class ConsultationController extends Controller
{
    public function consultation(Request $request) {

        if ($request->ajax()) {
            $data = Consultation::select( 'consultations.id','consultations.consultation_date','ops.op_no','doctors.name','consultations.consultation_no')
                                    ->join('ops', 'consultations.op_id', '=', 'ops.id')
                                    ->join('doctors', 'consultations.doctor_id', '=', 'doctors.id')
                                    ->orderBy('id', 'desc')
                                    ->get();
            return Datatables::of($data)->addIndexColumn()
            ->addColumn('action', function($row){
            $actionBtn = '<div class="text-center actions text-nowrap"> <a class=" btn_print conprint me-2" href="consultationprint/'.$row["id"].'"> <i class="ri-printer-line"></i></a>  <button class="view btn btn_view me-2" value="'.$row["id"].'"><i class="ri-eye-line"></i></button><button class="edit btn btn_edit me-2" value="'.$row["id"].'"><i class="ri-pencil-line"></i></button> <button class="delete btn btn_delete"value="'.$row["id"].'"><i class="ri-delete-bin-6-line"></i></button></div>';
            return $actionBtn;
            })
            ->rawColumns(['action'])
            ->make(true);
        }

        $ListDoct['doct'] = Doctor::select('id','name')->get();
        $ListOPNo['opno'] = Op::select('id','op_no')->get();
        $ListOfPay['modeofpay'] = ModeOfPay :: select('id','name')->get();
        $ListBranch['branch'] = Branch::select('id','branch_name')->get();

        $data = array_merge($ListDoct, $ListOPNo, $ListOfPay, $ListBranch);

        $consultationDate = Carbon::now()->toDateString();
        $consultationdisplayDate = Carbon::now()->format('d M y');
        $count_consultation_date = DB::table('consultations')
            ->whereDate('consultation_date', $consultationDate)
            ->count();
            if ($count_consultation_date > 0) {
                $date_id_con =$count_consultation_date + 1;
            } else {
                $date_id_con = 1;
            }
            

        $max_consultation = $consultationdisplayDate . "/". Str::padLeft($date_id_con, 3, '0');


        return view('ConsultationMaster', $data, compact('max_consultation'));  
        
    }

    //IP Consultation 

    public function Ipconsultations(Request $request) {

        if ($request->ajax()) {
            $data = IpConsultation::select( 'ip_consultations.id','ip_consultations.consultation_date','ips.ip_no','doctors.name','ip_consultations.ip_consultation_no')
                                        ->join('ips', 'ip_consultations.ip_id', '=', 'ips.id')
                                        ->join('doctors', 'ip_consultations.doctor_id', '=', 'doctors.id')
                                        ->orderBy('id', 'desc')
                                        ->get();
            return Datatables::of($data)->addIndexColumn()
            ->addColumn('action', function($row){
            $actionBtn = '<div class="text-center actions text-nowrap"> <a class=" btn_print conprint me-2" href="ipconsultationprint/'.$row["id"].'"> <i class="ri-printer-line"></i></a> <button class="view btn btn_view me-2" value="'.$row["id"].'"><i class="ri-eye-line"></i></button><button class="edit btn btn_edit me-2" value="'.$row["id"].'"><i class="ri-pencil-line"></i></button> <button class="delete btn btn_delete"value="'.$row["id"].'"><i class="ri-delete-bin-6-line"></i></button></div>';
            return $actionBtn;
            })
            ->rawColumns(['action'])
            ->make(true);
        }

        $ListDoct['doct'] = Doctor::select('id','name')->get();
        $ListIPNo['ipno'] = IP::select('id','ip_no')->get();
        $ListOfPay['modeofpay'] = ModeOfPay :: select('id','name')->get();
        $ListBranch['branch'] = Branch::select('id','branch_name')->get();

        $data = array_merge($ListDoct, $ListIPNo, $ListOfPay, $ListBranch);

        $consultationDate = Carbon::now()->toDateString();
        $consultationdisplayDate = Carbon::now()->format('d M y');
        $count_consultation_date = DB::table('ip_consultations')
            ->whereDate('consultation_date', $consultationDate)
            ->count();
            if ($count_consultation_date > 0) {
                $date_id_con =$count_consultation_date + 1;
            } else {
                $date_id_con = 1;
            }
        $max_consultation = $consultationdisplayDate . "/". Str::padLeft($date_id_con, 3, '0');

        return view('IpConsultation', $data, compact('max_consultation'));  
        
    }


    //Consultation Print
    public function consulprint(Request $request, $id) { 
   
         
        $data['conbillprint'] = Consultation::select( 'consultations.id','consultations.consultation_date','consultations.token_no',
                                                    'consultations.consultation_fees','ops.op_no','ops.name AS opname','doctors.name',
                                                    'consultations.consultation_no','consultations.consultation_bill_no','consultations.registration_fees')
                                                    ->join('ops', 'consultations.op_id', '=', 'ops.id')
                                                    ->join('doctors', 'consultations.doctor_id', '=', 'doctors.id')
                                                    ->where('consultations.id', $id)
                                                    ->get(); 

        return view('print/ConsultationPrint', $data);  
    
    }

    //IP Consultation Print
    public function ipconsulprint(Request $request, $id) { 
   
         
        $data['conbillprint'] = IpConsultation::select( 'ip_consultations.id','ip_consultations.consultation_date','ip_consultations.token_no',
                                                'ip_consultations.consultation_fees','ips.ip_no','ips.name AS ipname','doctors.name',
                                                'ip_consultations.ip_consultation_no','ip_consultations.ip_consultation_bill_no','ip_consultations.registration_fees')
                                                ->join('ips', 'ip_consultations.ip_id', '=', 'ips.id')
                                                ->join('doctors', 'ip_consultations.doctor_id', '=', 'doctors.id')
                                                ->where('ip_consultations.id', $id)
                                                ->get(); 

    return view('print/IpConsultationPrint', $data);  

    }

}
