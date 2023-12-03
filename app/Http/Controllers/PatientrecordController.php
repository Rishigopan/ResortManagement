<?php

namespace App\Http\Controllers;
use App\Models\Examination;
use App\Models\Op;
use App\Models\Consultation;
use App\Models\PatientRecordTable;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;

class PatientrecordController extends Controller
{
    //View Form
    public function patientrecord(Request $request) {
        
        $PR['pr'] = Examination::select('id','name','field_name','input_type')
                                    ->where(['type'=>'PR'])
                                    ->orderBy('order', 'asc')
                                    ->get();
        $GPE['gpe'] = Examination::select('id','name','field_name','input_type')
                                    ->where(['type'=>'GPE'])
                                    ->orderBy('order', 'asc')
                                    ->get();
        $IED['ied'] = Examination::select('id','name','field_name','input_type')
                                    ->where(['type'=>'IED'])
                                    ->orderBy('order', 'asc')
                                    ->get();
        $SE['se'] = Examination::select('id','name','field_name','input_type')
                                    ->where(['type'=>'SE'])
                                    ->orderBy('order', 'asc')
                                    ->get();
        $opdetail['opno'] = Op :: select('*')->get();

        $data = array_merge($PR, $GPE, $IED, $SE, $opdetail);


        return view('PatientRecord',$data);
    }

    //View Table
    public function recordsView(Request $request) {
        
        if ($request->ajax()) {
            $data= PatientRecordTable::select( 'patient_record_tables.id','patient_record_tables.date','ops.op_no','ops.name','ops.age')
                                        ->join('ops', 'patient_record_tables.op_id', '=', 'ops.id')
                                        ->orderBy('id', 'desc')
                                        ->get();
            return DataTables::of($data)->addIndexColumn()
            ->addColumn('date', function($row){
                return date('d M Y', strtotime($row->date));
            })
            ->addColumn('action', function($row){
                $actionBtn = '<div class="text-center actions text-nowrap">
                                    <a class="view btn btn_view update_hover" href="PatientRecordShow/'.$row["id"].'"><i class="ri-eye-line"></i></a>
                                     <a class="edit btn btn_edit update_hover" href="PatientRecordEdit/'.$row["id"].'"><i class="ri-pencil-line"></i></a>
                                      <button class="delete btn btn_delete"value="'.$row["id"].'"><i class="ri-delete-bin-6-line"></i></button></div>';
                return $actionBtn;
            })
            ->rawColumns(['action'])
            ->make(true);
        }
        return view('RecordsView');
    }

    //Edit
    public function recordsEdit(Request $request, $id) {
        

        $PR['pr'] = Examination::select('id','name','field_name','input_type')
                                    ->where(['type'=>'PR'])
                                    ->orderBy('order', 'asc')
                                    ->get();
        $GPE['gpe'] = Examination::select('id','name','field_name','input_type')
                                    ->where(['type'=>'GPE'])
                                    ->orderBy('order', 'asc')
                                    ->get();
        $IED['ied'] = Examination::select('id','name','field_name','input_type')
                                    ->where(['type'=>'IED'])
                                    ->orderBy('order', 'asc')
                                    ->get();
        $SE['se'] = Examination::select('id','name','field_name','input_type')
                                    ->where(['type'=>'SE'])
                                    ->orderBy('order', 'asc')
                                    ->get();
        $opdetail['opno'] = PatientRecordTable :: select('patient_record_tables.id','patient_record_tables.date','ops.op_no','ops.name','ops.local_address','ops.age','ops.mobile_no',
                                                     'ops.phone_no','ops.occupation','ops.full_address')
                                                    ->join('ops','patient_record_tables.op_id', '=', 'ops.id')
                                                    ->where('patient_record_tables.id',$id)
                                                    ->get();


        $result= PatientRecordTable :: select('records')
                                                ->where('id',$id)
                                                ->get();
                                                
        $jsonresult = json_decode($result[0]->records, true);

                                                
        $data = array_merge($PR, $GPE, $IED, $SE, $opdetail);
        
        return view('PatientRecordEdit',compact('jsonresult','id'),$data);
    }


     //View
     public function recordsShow(Request $request, $id) {
        

        $PR['pr'] = Examination::select('id','name','field_name','input_type')
                                    ->where(['type'=>'PR'])
                                    ->orderBy('order', 'asc')
                                    ->get();
        $GPE['gpe'] = Examination::select('id','name','field_name','input_type')
                                    ->where(['type'=>'GPE'])
                                    ->orderBy('order', 'asc')
                                    ->get();
        $IED['ied'] = Examination::select('id','name','field_name','input_type')
                                    ->where(['type'=>'IED'])
                                    ->orderBy('order', 'asc')
                                    ->get();
        $SE['se'] = Examination::select('id','name','field_name','input_type')
                                    ->where(['type'=>'SE'])
                                    ->orderBy('order', 'asc')
                                    ->get();
        $opdetail['opno'] = PatientRecordTable :: select('patient_record_tables.id','patient_record_tables.date','ops.op_no','ops.name','ops.local_address','ops.age','ops.mobile_no',
                                                     'ops.phone_no','ops.occupation','ops.full_address')
                                                    ->join('ops','patient_record_tables.op_id', '=', 'ops.id')
                                                    ->where('patient_record_tables.id',$id)
                                                    ->get();


        $result= PatientRecordTable :: select('records')
                                                ->where('id',$id)
                                                ->get();
                                                
        $jsonresult = json_decode($result[0]->records, true);

                                                
        $data = array_merge($PR, $GPE, $IED, $SE, $opdetail);
        
        return view('PatientRecordShow',compact('jsonresult','id'),$data);
    }

    //View Token To Link Form
    public function patientrecId(Request $request) {

        $op_id = $request -> op_id;
        $id = $request -> id;

        $PR['pr'] = Examination::select('id','name','field_name','input_type')
                                    ->where(['type'=>'PR'])
                                    ->orderBy('order', 'asc')
                                    ->get();
        $GPE['gpe'] = Examination::select('id','name','field_name','input_type')
                                    ->where(['type'=>'GPE'])
                                    ->orderBy('order', 'asc')
                                    ->get();
        $IED['ied'] = Examination::select('id','name','field_name','input_type')
                                    ->where(['type'=>'IED'])
                                    ->orderBy('order', 'asc')
                                    ->get();
        $SE['se'] = Examination::select('id','name','field_name','input_type')
                                    ->where(['type'=>'SE'])
                                    ->orderBy('order', 'asc')
                                    ->get();
        $opdetail['opno'] = Op :: select('*')->get();

        $DisplyOP['dispop'] = Consultation::select('consultations.id','consultations.consultation_no','ops.op_no','ops.name','ops.age'
                                                ,'ops.full_address','ops.mobile_no','ops.phone_no','ops.occupation','ops.local_address'
                                                ,'consultations.op_id')
                                                ->join('ops', 'consultations.op_id', '=', 'ops.id')
                                                ->where('consultations.op_id', $op_id)
                                                ->where('consultations.id', $id) ->get();

        $result= PatientRecordTable :: select('records')
                                                ->where('op_id',$op_id)
                                                ->get();
                                                
        $jsonresult = json_decode($result[0]->records, true);

        $data = array_merge($PR, $GPE, $IED, $SE, $opdetail, $DisplyOP, ['op_id' => $op_id , 'id' => $id]);

        return view('PatientRecordId',compact('jsonresult','id'),$data);
    }


}
