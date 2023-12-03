<?php

namespace App\Http\Controllers;
use App\Models\DoctorConsultation;
use App\Models\Doctor;
use App\Models\Department;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;
 
class DoctorConsultationController extends Controller
{
    public function docconfee(Request $request) {

        if ($request->ajax()) {
            $data = DoctorConsultation::select( 'doctor_consultations.id','doctors.name','doctor_consultations.op_consultation_fees',
                                        'doctor_consultations.ip_consultation_fees','doctor_consultations.op_no_fee_days'
                                        ,'doctor_consultations.ip_no_fee_days')
                                        ->join('doctors', 'doctor_consultations.doctor_id', '=', 'doctors.id')
                                        ->orderBy('id', 'desc')
                                        ->get();
            return Datatables::of($data)->addIndexColumn()
            ->addColumn('action', function($row){
            $actionBtn = '<div class="text-center actions text-nowrap"> <button class="view btn btn_view me-2" value="'.$row["id"].'"><i class="ri-eye-line"></i></button><button class="edit btn btn_edit me-2" value="'.$row["id"].'"><i class="ri-pencil-line"></i></button> <button class="delete btn btn_delete"value="'.$row["id"].'"><i class="ri-delete-bin-6-line"></i></button></div>';
            return $actionBtn;
            })
            ->rawColumns(['action'])
            ->make(true);
        }

        $ListDoct['doct'] = Doctor::select('id','name')->get();


        return view('DoctorFeesMaster',$ListDoct);  
        
    }
    public function feesAdd(Request $request) {

        $doctorfeesdata ['doctfee']  = DoctorConsultation::select( 'doctor_consultations.id','doctors.name', 'doctors.department_id','doctor_consultations.doctor_id', 'doctor_consultations.op_consultation_fees',
            'doctor_consultations.ip_consultation_fees','doctor_consultations.op_no_fee_days'
            ,'doctor_consultations.ip_no_fee_days')
            ->join('doctors', 'doctor_consultations.doctor_id', '=', 'doctors.id')
            ->get();

            $ListDept['dept'] = Department::select('id','name')->get();

        return view('ConsultationFeesAdd',$doctorfeesdata, $ListDept);  
        
    }
}
