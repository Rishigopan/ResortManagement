<?php

namespace App\Http\Controllers;
use App\Models\Consultation;
use App\Models\Op;
use App\Models\IPBMI;
use App\Models\IpConsultation;
use App\Models\IP;
use Yajra\DataTables\DataTables;
use App\Models\BMI;

use Illuminate\Http\Request;

class BMIController extends Controller
{
    public function bmi(Request $request) {

        if ($request->ajax()) {
            $data = BMI::select( 'b_m_i_s.id','b_m_i_s.date','ops.op_no','consultations.consultation_no','b_m_i_s.temp_mrng','b_m_i_s.temp_evng','b_m_i_s.b_P_mrng','b_m_i_s.b_P_evng','b_m_i_s.weight','b_m_i_s.remarks')
                            ->join('ops', 'b_m_i_s.op_no_id', '=', 'ops.id')
                            ->leftJoin('consultations', 'b_m_i_s.consultation_id', '=', 'consultations.id')
                            ->orderBy('b_m_i_s.id', 'desc')
                            ->get();
            return Datatables::of($data)->addIndexColumn()
            ->addColumn('action', function($row){
            $actionBtn = '<div class="text-center actions text-nowrap"> <button class="view btn btn_view me-2" value="'.$row["id"].'"><i class="ri-eye-line"></i></button><button class="edit btn btn_edit me-2" value="'.$row["id"].'"><i class="ri-pencil-line"></i></button> <button class="delete btn btn_delete"value="'.$row["id"].'"><i class="ri-delete-bin-6-line"></i></button></div>';
            return $actionBtn;
            })
            ->rawColumns(['action'])
            ->make(true);
        }

        $ListOp['opno'] = Op::select('id','op_no')->get();
        $ListConsult['cono'] = Consultation::select('id','consultation_no')->get();

        $data = array_merge($ListOp, $ListConsult);

        return view('BMI', $data);  
    }

    //Token BMI

    public function BmiId(Request $request) {

        $op_id = $request -> op_id;
        $id = $request -> id;

        if ($request->ajax()) {
            $data = BMI::select( 'b_m_i_s.id','b_m_i_s.date','ops.op_no','consultations.consultation_no','b_m_i_s.temp_mrng','b_m_i_s.temp_evng','b_m_i_s.b_P_mrng','b_m_i_s.b_P_evng','b_m_i_s.weight','b_m_i_s.remarks')
                            ->join('ops', 'b_m_i_s.op_no_id', '=', 'ops.id')
                            ->leftJoin('consultations', 'b_m_i_s.consultation_id', '=', 'consultations.id')
                            ->orderBy('b_m_i_s.id', 'desc')
                            ->get();
            return Datatables::of($data)->addIndexColumn()
            ->addColumn('action', function($row){
            $actionBtn = '<div class="text-center actions text-nowrap"> <button class="view btn btn_view me-2" value="'.$row["id"].'"><i class="ri-eye-line"></i></button><button class="edit btn btn_edit me-2" value="'.$row["id"].'"><i class="ri-pencil-line"></i></button> <button class="delete btn btn_delete"value="'.$row["id"].'"><i class="ri-delete-bin-6-line"></i></button></div>';
            return $actionBtn;
            })
            ->rawColumns(['action'])
            ->make(true);
        }

        $DisplyOP['opno'] = Consultation::select('consultations.id','consultations.consultation_no','ops.op_no','consultations.op_id')
                                            ->join('ops', 'consultations.op_id', '=', 'ops.id')
                                            ->where('consultations.op_id', $op_id)
                                            ->where('consultations.id', $id) ->get();

        $ListConsult['cono'] = Consultation::select('id','consultation_no')->get();

        $data = array_merge($DisplyOP, $ListConsult);

        return view('BMIID', $data);  
    }


    //IP BMI 
    public function ipbmi(Request $request) {

        if ($request->ajax()) {
            $data = IPBMI::select( 'i_p_b_m_i_s.id','i_p_b_m_i_s.date','ips.ip_no','ip_consultations.ip_consultation_no','i_p_b_m_i_s.temp_mrng','i_p_b_m_i_s.temp_evng','i_p_b_m_i_s.b_P_mrng','i_p_b_m_i_s.b_P_evng','i_p_b_m_i_s.weight','i_p_b_m_i_s.remarks')
                                ->join('ips', 'i_p_b_m_i_s.ip_no_id', '=', 'ips.id')
                                ->leftJoin('ip_consultations', 'i_p_b_m_i_s.consultation_id', '=', 'ip_consultations.id')
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

        $ListIp['ipno'] = IP::select('id','ip_no')->get();
        $ListConsult['cono'] = IpConsultation::select('id','ip_consultation_no')->get();

        $data = array_merge($ListIp, $ListConsult);

        return view('IPBMI', $data);  
    }

    //IP Details To IPBMI

    public function IPBMIId(Request $request) {

        $id = $request -> id;

        if ($request->ajax()) {
            $data = IPBMI::select( 'i_p_b_m_i_s.id','i_p_b_m_i_s.date','ips.ip_no','ip_consultations.ip_consultation_no','i_p_b_m_i_s.temp_mrng','i_p_b_m_i_s.temp_evng','i_p_b_m_i_s.b_P_mrng','i_p_b_m_i_s.b_P_evng','i_p_b_m_i_s.weight','i_p_b_m_i_s.remarks')
                                ->join('ips', 'i_p_b_m_i_s.ip_no_id', '=', 'ips.id')
                                ->leftJoin('ip_consultations', 'i_p_b_m_i_s.consultation_id', '=', 'ip_consultations.id')
                                ->where('i_p_b_m_i_s.ip_no_id', $id)
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

        $ListIp['ipno'] = IP::select('id','ip_no')
                                ->where('id', $id)
                                ->get();
        $ListConsult['cono'] = IpConsultation::select('id','ip_consultation_no')
                                ->where('ip_id', $id)
                                ->orderBy('id', 'desc')
                                ->get();

        $data = array_merge($ListIp, $ListConsult);

        return view('IpRecords/IPBMIById',compact('id'), $data);  
    }
}
