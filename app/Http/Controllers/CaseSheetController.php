<?php

namespace App\Http\Controllers;
use App\Models\Consultation;
use App\Models\Op;
use App\Models\IP;
use App\Models\Treatment;
use App\Models\CaseSheet;
use App\Models\Templates;
use App\Models\IPCasesheet;
use App\Models\IpConsultation;
use App\Models\Staff;

use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;

class CaseSheetController extends Controller
{
    public function casesheet(Request $request) {

        if ($request->ajax()) {
         
            $FinalDataArray = array();
            $FindData = CaseSheet::select( 'case_sheets.id','ops.op_no','consultations.consultation_no','case_sheets.date',
                                            'case_sheets.vital_dates','case_sheets.morning_session','case_sheets.afternoon_session' )
                                        ->join('ops', 'case_sheets.op_no_id', '=', 'ops.id')
                                        ->leftJoin('consultations','case_sheets.consultation_id','=','consultations.id')
                                        ->orderBy('id', 'desc')
                                        ->get();
            foreach($FindData as $FindDatas){
    
                $MrngTreactmentName = '';
                $MrngTreactmentId = explode(',', $FindDatas['morning_session']);
                foreach ($MrngTreactmentId as $MrngTreactmentIds) {
                    if ($MrngTreactmentIds != 0) { // Check if the value is not 0
                        $FindTreact = Treatment::select('name')->where('id', '=', $MrngTreactmentIds)->first();
                        $MrngTreactmentName .= $FindTreact->name;
                        $MrngTreactmentName .= ' + ';
                    }
                }

                $MrngTreactmentName = rtrim($MrngTreactmentName, ' + ');


                $EvngTreactmentName = '';
                $EvngTreactmentId = explode(',', $FindDatas['afternoon_session']);
                foreach ($EvngTreactmentId as $EvngTreactmentIds) {
                    if ($EvngTreactmentIds != 0) { // Check if the value is not 0
                        $FindTreact = Treatment::select('name')->where('id', '=', $EvngTreactmentIds)->first();
                        $EvngTreactmentName .= $FindTreact->name;
                        $EvngTreactmentName .= ' + ';
                    }
                }
    
                $EvngTreactmentName = rtrim($EvngTreactmentName, ' + ');

    
                $DataArray = [
                    'id' => $FindDatas['id'],
                    'op_no' => $FindDatas['op_no'],
                    'consultation_no' => $FindDatas['consultation_no'],
                    'date' => $FindDatas['date'],
                    'morningtreatment' => $MrngTreactmentName,
                    'afternoontreatment' => $EvngTreactmentName,
                    'vital_dates' => $FindDatas['vital_dates'],                   

                ];
                array_push($FinalDataArray, $DataArray);
            }

            return Datatables::of($FinalDataArray)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $actionBtn = '<div class="text-center actions text-nowrap"> <a class=" btn_print conprint me-2" href="casesheettreatmentbill/'.$row["id"].'"> <i class="ri-printer-line"></i></a> <button class="edit btn btn_edit me-2" value="'.$row["id"].'"><i class="ri-pencil-line"></i></button> <button class="delete btn btn_delete"value="'.$row["id"].'"><i class="ri-delete-bin-6-line"></i></button></div>';
                return $actionBtn;
            })
            ->rawColumns(['action'])
            ->make(true);
        }

        $ListOp['opno'] = Op::select('id','op_no','gender')->get();
        $ListConsult['cono'] = Consultation::select('id','consultation_no')->get();
        $ListTreactment['trect'] = Treatment::select('id','name')->get();
        $listtemplate['templates'] = Templates::select('id','name')
                                    ->where('field_name','=','VitalDatas')
                                    ->get();
        $ListDoct['staff'] = Staff::select('id','name')->get();

        $data = array_merge($ListOp, $ListConsult, $ListTreactment, $listtemplate, $ListDoct);

        return view('CaseSheet', $data);    
    }


    
    //Token To CaseSheet Link
    public function casesheetId(Request $request) {
        $op_id = $request -> op_id;
        $id = $request -> id;

        if ($request->ajax()) {
         
            $FinalDataArray = array();
            $FindData = CaseSheet::select( 'case_sheets.id','ops.op_no','consultations.consultation_no','case_sheets.date',
                                            'case_sheets.vital_dates','case_sheets.morning_session','case_sheets.afternoon_session' )
                                        ->join('ops', 'case_sheets.op_no_id', '=', 'ops.id')
                                        ->leftJoin('consultations','case_sheets.consultation_id','=','consultations.id')
                                        ->where('case_sheets.op_no_id', $op_id)
                                        ->where('consultations.id', $id)->orderBy('id', 'desc')
                                        ->get();

            foreach($FindData as $FindDatas){
    
                $MrngTreactmentName = '';
                $MrngTreactmentId = explode(',', $FindDatas['morning_session']);
                foreach($MrngTreactmentId as $MrngTreactmentIds){
                    if ($MrngTreactmentIds != 0) { // Check if the value is not 0
                        $FindTreact = Treatment::select('name')->where('id', '=', $MrngTreactmentIds)->first();
                        $MrngTreactmentName .= $FindTreact->name;
                        $MrngTreactmentName .= ' + ';
                    }
                }

                $MrngTreactmentName = rtrim($MrngTreactmentName, ' + ');

                $EvngTreactmentName = '';
                $EvngTreactmentId = explode(',', $FindDatas['afternoon_session']);
                foreach($EvngTreactmentId as $EvngTreactmentIds){
                    if ($EvngTreactmentIds != 0) { // Check if the value is not 0
                        $FindTreact = Treatment::select('name')->where('id', '=', $EvngTreactmentIds)->first();
                        $EvngTreactmentName .= $FindTreact->name;
                        $EvngTreactmentName .= ' + ';
                    }
                }
    
                $EvngTreactmentName = rtrim($EvngTreactmentName, ' + ');

    
                $DataArray = [
                    'id' => $FindDatas['id'],
                    'op_no' => $FindDatas['op_no'],
                    'consultation_no' => $FindDatas['consultation_no'],
                    'date' => $FindDatas['date'],
                    'morningtreatment' => $MrngTreactmentName,
                    'afternoontreatment' => $EvngTreactmentName,
                    'vital_dates' => $FindDatas['vital_dates'],                   

                ];
                array_push($FinalDataArray, $DataArray);
            }

            return Datatables::of($FinalDataArray)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $actionBtn = '<div class="text-center actions text-nowrap"> <button class="edit btn btn_edit me-2" value="'.$row["id"].'"><i class="ri-pencil-line"></i></button> <button class="delete btn btn_delete"value="'.$row["id"].'"><i class="ri-delete-bin-6-line"></i></button></div>';
                return $actionBtn;
            })
            ->rawColumns(['action'])
            ->make(true);
        }

        
        // $ListOp['opno'] = Op::select('id','op_no')->get();
        // $ListConsult['cono'] = Consultation::select('id','consultation_no')->get();
        $ListTreatment['trect'] = Treatment::select('id','name')->get();


        $DisplyOP['dispop'] = Consultation::select('consultations.id','consultations.consultation_no','ops.op_no','ops.gender','consultations.op_id')
                                            ->join('ops', 'consultations.op_id', '=', 'ops.id')
                                            ->where('consultations.op_id', $op_id)
                                            ->where('consultations.id', $id) ->get();
        $listtemplate['templates'] = Templates::select('id','name')
                                            ->where('field_name','=','VitalDatas')
                                            ->get();
        $ListDoct['staff'] = Staff::select('id','name')->get();

        $data = array_merge($ListTreatment, $DisplyOP, $listtemplate, $ListDoct, ['op_id' => $op_id , 'id' => $id]);
        return view('CaseSheetById', $data);    
 
    }


    //IP Case Sheet
    public function ipcasesheet(Request $request) {

        if ($request->ajax()) {
         
            $FinalDataArray = array();
            $FindData = IPCasesheet::select( 'i_p_casesheets.id','ips.ip_no','ip_consultations.ip_consultation_no','i_p_casesheets.date',
                                            'i_p_casesheets.vital_dates','i_p_casesheets.morning_session','i_p_casesheets.afternoon_session' )
                                        ->join('ips', 'i_p_casesheets.ip_no_id', '=', 'ips.id')
                                        ->leftJoin('ip_consultations','i_p_casesheets.consultation_id','=','ip_consultations.id')
                                        ->orderBy('id', 'desc')
                                        ->get();
            foreach($FindData as $FindDatas){
    
                $MrngTreactmentName = '';
                $MrngTreactmentId = explode(',', $FindDatas['morning_session']);
                foreach($MrngTreactmentId as $MrngTreactmentIds){
                    if ($MrngTreactmentIds != 0) { // Check if the value is not 0
                        $FindTreact = Treatment::select('name')->where('id', '=', $MrngTreactmentIds)->first();
                        $MrngTreactmentName .= $FindTreact->name;
                        $MrngTreactmentName .= ' + ';
                    }
                }

                $MrngTreactmentName = rtrim($MrngTreactmentName, ' + ');


                $EvngTreactmentName = '';
                $EvngTreactmentId = explode(',', $FindDatas['afternoon_session']);
                foreach($EvngTreactmentId as $EvngTreactmentIds){
                    if ($EvngTreactmentIds != 0) { // Check if the value is not 0
                        $FindTreact = Treatment::select('name')->where('id', '=', $EvngTreactmentIds)->first();
                        $EvngTreactmentName .= $FindTreact->name;
                        $EvngTreactmentName .= ' + ';
                    }
                }
    
                $EvngTreactmentName = rtrim($EvngTreactmentName, ' + ');

    
                $DataArray = [
                    'id' => $FindDatas['id'],
                    'ip_no' => $FindDatas['ip_no'],
                    'ip_consultation_no' => $FindDatas['ip_consultation_no'],
                    'date' => $FindDatas['date'],
                    'morningtreatment' => $MrngTreactmentName,
                    'afternoontreatment' => $EvngTreactmentName,
                    'vital_dates' => $FindDatas['vital_dates'],                   

                ];
                array_push($FinalDataArray, $DataArray);
            }

            return Datatables::of($FinalDataArray)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $actionBtn = '<div class="text-center actions text-nowrap"> <button class="edit btn btn_edit me-2" value="'.$row["id"].'"><i class="ri-pencil-line"></i></button> <button class="delete btn btn_delete"value="'.$row["id"].'"><i class="ri-delete-bin-6-line"></i></button></div>';

                // $actionBtn = '<div class="text-center actions text-nowrap">  <a class=" btn_print conprint me-2" href="iptreatmentbill/'.$row["id"].'"> <i class="ri-printer-line"></i></a> <button class="edit btn btn_edit me-2" value="'.$row["id"].'"><i class="ri-pencil-line"></i></button> <button class="delete btn btn_delete"value="'.$row["id"].'"><i class="ri-delete-bin-6-line"></i></button></div>';
                return $actionBtn;
            })
            ->rawColumns(['action'])
            ->make(true);
        }

        $ListIP['ipno'] = IP::select('id','ip_no','gender')->get();
        $ListConsult['cono'] = IpConsultation::select('id','ip_consultation_no')->get();
        $ListTreactment['trect'] = Treatment::select('id','name')->get();
        $listtemplate['templates'] = Templates::select('id','name')
                                        ->where('field_name','=','VitalDatas')
                                        ->get();
        $ListStaff['staff'] = Staff::select('id','name')->get();

        $data = array_merge($ListIP, $ListConsult, $ListTreactment, $listtemplate, $ListStaff);

        return view('IPCaseSheet', $data);    
    }


    //CaseSheet Treatment Bill Print
    public function treatmentbills(Request $request, $id) { 
        $data['treatmentbillprint'] = CaseSheet::select('case_sheets.id', 'case_sheets.date', 'case_sheets.casesheet_bill_no',
                                                'case_sheets.morning_session', 'case_sheets.afternoon_session',
                                                'case_sheets.treatment_cost', 'ops.op_no','ops.name AS opname',
                                                'consultations.consultation_no')
                                                ->join('ops', 'case_sheets.op_no_id', '=', 'ops.id')
                                                ->join('consultations', 'case_sheets.consultation_id', '=', 'consultations.id')
                                                ->where('case_sheets.id', $id)
                                                ->get();
        foreach ($data['treatmentbillprint'] as $bill) {
            $morningTreatmentIds = explode(',', $bill->morning_session);
            $morningTreatments = Treatment::whereIn('id', $morningTreatmentIds)->pluck('name')->toArray();
        
            $eveningTreatmentIds = explode(',', $bill->afternoon_session);
            $eveningTreatments = Treatment::whereIn('id', $eveningTreatmentIds)->pluck('name')->toArray();
        
            // Combine morning and evening treatments
            $allTreatments = array_merge($morningTreatments, $eveningTreatments);
            $bill->treatments = implode(', ', $allTreatments);
            
        }
    
        return view('print/CasesheetBillPrint', $data); 
    }


    //IP CaseSheet Treatment Bill Print
    public function iptreatmentbills(Request $request, $id) { 
        $data['treatmentbillprint'] = IPCasesheet::select('i_p_casesheets.id', 'i_p_casesheets.date', 'i_p_casesheets.ip_casesheet_bill_no',
                                                'i_p_casesheets.morning_session', 'i_p_casesheets.afternoon_session',
                                                'i_p_casesheets.treatment_cost', 'ips.ip_no','ips.name AS ipname',
                                                'ip_consultations.ip_consultation_no')
                                                ->join('ips', 'i_p_casesheets.ip_no_id', '=', 'ips.id')
                                                ->join('ip_consultations', 'i_p_casesheets.consultation_id', '=', 'ip_consultations.id')
                                                ->where('i_p_casesheets.id', $id)
                                                ->get();
        foreach ($data['treatmentbillprint'] as $bill) {
            $morningTreatmentIds = explode(',', $bill->morning_session);
            $morningTreatments = Treatment::whereIn('id', $morningTreatmentIds)->pluck('name')->toArray();
        
            $eveningTreatmentIds = explode(',', $bill->afternoon_session);
            $eveningTreatments = Treatment::whereIn('id', $eveningTreatmentIds)->pluck('name')->toArray();
        
            // Combine morning and evening treatments
            $allTreatments = array_merge($morningTreatments, $eveningTreatments);
            $bill->treatments = implode(', ', $allTreatments);
            
        }
    
        return view('print/IpCasesheetBillPrint', $data); 
    }

    //Therapist Page
    public function therapist (Request $request) {

        $ListTherapist['therapist'] =  Staff::join('departments', 'departments.id', '=', 'staffs.department_id')
                                        ->where('departments.name', 'Therapist')
                                        ->select('staffs.id', 'staffs.name')
                                        ->get();

        return view('Therapist',$ListTherapist);      
        
    }

    //IP Details To CaseSheet Link
    public function IPCaseSheetId(Request $request) {
        $id = $request -> id;

        if ($request->ajax()) {
         
            $FinalDataArray = array();
            $FindData = IPCasesheet::select( 'i_p_casesheets.id','ips.ip_no','ip_consultations.ip_consultation_no','i_p_casesheets.date',
                                            'i_p_casesheets.vital_dates','i_p_casesheets.morning_session','i_p_casesheets.afternoon_session' )
                                        ->join('ips', 'i_p_casesheets.ip_no_id', '=', 'ips.id')
                                        ->leftJoin('ip_consultations','i_p_casesheets.consultation_id','=','ip_consultations.id')
                                        ->where('i_p_casesheets.ip_no_id', $id)
                                        ->orderBy('id', 'desc')
                                        ->get();
            foreach($FindData as $FindDatas){
    
                $MrngTreactmentName = '';
                $MrngTreactmentId = explode(',', $FindDatas['morning_session']);
                foreach($MrngTreactmentId as $MrngTreactmentIds){
                    if ($MrngTreactmentIds != 0) { // Check if the value is not 0
                        $FindTreact = Treatment::select('name')->where('id', '=', $MrngTreactmentIds)->first();
                        $MrngTreactmentName .= $FindTreact->name;
                        $MrngTreactmentName .= ' + ';
                    }
                }

                $MrngTreactmentName = rtrim($MrngTreactmentName, ' + ');


                $EvngTreactmentName = '';
                $EvngTreactmentId = explode(',', $FindDatas['afternoon_session']);
                foreach($EvngTreactmentId as $EvngTreactmentIds){
                    if ($EvngTreactmentIds != 0) { // Check if the value is not 0
                        $FindTreact = Treatment::select('name')->where('id', '=', $EvngTreactmentIds)->first();
                        $EvngTreactmentName .= $FindTreact->name;
                        $EvngTreactmentName .= ' + ';
                    }
                }
    
                $EvngTreactmentName = rtrim($EvngTreactmentName, ' + ');

    
                $DataArray = [
                    'id' => $FindDatas['id'],
                    'ip_no' => $FindDatas['ip_no'],
                    'ip_consultation_no' => $FindDatas['ip_consultation_no'],
                    'date' => $FindDatas['date'],
                    'morningtreatment' => $MrngTreactmentName,
                    'afternoontreatment' => $EvngTreactmentName,
                    'vital_dates' => $FindDatas['vital_dates'],                   

                ];
                array_push($FinalDataArray, $DataArray);
            }

            return Datatables::of($FinalDataArray)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $actionBtn = '<div class="text-center actions text-nowrap"> <button class="edit btn btn_edit me-2" value="'.$row["id"].'"><i class="ri-pencil-line"></i></button> <button class="delete btn btn_delete"value="'.$row["id"].'"><i class="ri-delete-bin-6-line"></i></button></div>';

                // $actionBtn = '<div class="text-center actions text-nowrap">  <a class=" btn_print conprint me-2" href="iptreatmentbill/'.$row["id"].'"> <i class="ri-printer-line"></i></a> <button class="edit btn btn_edit me-2" value="'.$row["id"].'"><i class="ri-pencil-line"></i></button> <button class="delete btn btn_delete"value="'.$row["id"].'"><i class="ri-delete-bin-6-line"></i></button></div>';
                return $actionBtn;
            })
            ->rawColumns(['action'])
            ->make(true);
        }

        $ListIP['ipno'] = IP::select('id','ip_no','gender')
                                ->where('id', $id)
                                ->get();
        $ListConsult['cono'] = IpConsultation::select('id','ip_consultation_no')
                                                ->where('ip_id', $id)
                                                ->orderBy('id', 'desc')
                                                ->get();

        
        $ListTreactment['trect'] = Treatment::select('id','name')->get();
        $listtemplate['templates'] = Templates::select('id','name')
                                        ->where('field_name','=','VitalDatas')
                                        ->get();
        $ListStaff['staff'] = Staff::select('id','name')->get();

        $data = array_merge($ListIP, $ListConsult, $ListTreactment, $listtemplate, $ListStaff);

        return view('IpRecords/IPCaseSheetId',compact('id'), $data);    
 
    }

}
