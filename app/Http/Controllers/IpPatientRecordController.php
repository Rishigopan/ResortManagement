<?php

namespace App\Http\Controllers;
use App\Models\Examination;
use App\Models\IP;
use App\Models\IpPatientRecord;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;

class IpPatientRecordController extends Controller
{
    //View Form
    public function ippatientrecord(Request $request) {
        
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
        $opdetail['ipno'] = IP :: select('*')->get();

        $data = array_merge($PR, $GPE, $IED, $SE, $opdetail);


        return view('IPPatientRecord',$data);
    }

    //View Table
    public function IprecordsView(Request $request) {
        
        if ($request->ajax()) {
            $data= IpPatientRecord::select( 'ip_patient_records.id','ip_patient_records.date','ips.ip_no','ips.name','ips.age')
                                        ->join('ips', 'ip_patient_records.ip_id', '=', 'ips.id')
                                        ->orderBy('id', 'desc')
                                        ->get();
            return DataTables::of($data)->addIndexColumn()
            ->addColumn('date', function($row){
                return date('d M Y', strtotime($row->date));
            })
            ->addColumn('action', function($row){
                $actionBtn = '<div class="text-center actions text-nowrap">
                                    <a class="view btn btn_view update_hover" href="IPPatientRecordShow/'.$row["id"].'"><i class="ri-eye-line"></i></a>
                                     <a class="edit btn btn_edit update_hover" href="IPPatientRecordEdit/'.$row["id"].'"><i class="ri-pencil-line"></i></a>
                                      <button class="delete btn btn_delete"value="'.$row["id"].'"><i class="ri-delete-bin-6-line"></i></button></div>';
                return $actionBtn;
            })
            ->rawColumns(['action'])
            ->make(true);
        }
        return view('IpPatientRecordView');
    }

    //Edit
    public function iprecordsEdit(Request $request, $id) {
        

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
        $opdetail['ipno'] = IpPatientRecord :: select('ip_patient_records.id','ip_patient_records.date','ips.ip_no','ips.id AS IPP','ips.name','ips.local_address','ips.age','ips.mobile_no',
                                                     'ips.phone_no','ips.occupation','ips.full_address')
                                                    ->join('ips','ip_patient_records.ip_id', '=', 'ips.id')
                                                    ->where('ip_patient_records.id',$id)
                                                    ->get();


        $result= IpPatientRecord :: select('records')
                                                ->where('id',$id)
                                                ->get();
                                                
        $jsonresult = json_decode($result[0]->records, true);

                                                
        $data = array_merge($PR, $GPE, $IED, $SE, $opdetail);
        
        return view('IpPatientRecordEdit',compact('jsonresult','id'),$data);
    }


     //View
     public function iprecordsShow(Request $request, $id) {
        

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
        $opdetail['ipno'] = IpPatientRecord :: select('ip_patient_records.id','ip_patient_records.date','ips.ip_no','ips.id AS IPP','ips.name','ips.local_address','ips.age','ips.mobile_no',
                                    'ips.phone_no','ips.occupation','ips.full_address')
                                   ->join('ips','ip_patient_records.ip_id', '=', 'ips.id')
                                   ->where('ip_patient_records.id',$id)
                                   ->get();


        $result= IpPatientRecord :: select('records')
                                                ->where('id',$id)
                                                ->get();
                                                
        $jsonresult = json_decode($result[0]->records, true);

                                                
        $data = array_merge($PR, $GPE, $IED, $SE, $opdetail);
        
        return view('IpPatientRecordShow',compact('jsonresult','id'),$data);
    }


    //IPDetails to IP Patient Record By ID

    //View
    public function IpPatientRecId(Request $request) {
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

        $opdetail['ipno'] = IP :: select('*') ->where('id',$id)->get();
                                                
        $data = array_merge($PR, $GPE, $IED, $SE, $opdetail);
        
        return view('IpRecords/IpPatientRecordById',compact('id'),$data);
    }

    //View Table
    public function IpPatientRecordByIdView(Request $request, $id) {
    
        $id = $request -> id;

        if ($request->ajax()) {
            $data= IpPatientRecord::select( 'ip_patient_records.id','ip_patient_records.date','ips.ip_no','ips.name','ips.age')
                                        ->join('ips', 'ip_patient_records.ip_id', '=', 'ips.id')
                                        ->where('ip_patient_records.ip_id',$id)
                                        ->orderBy('id', 'desc')
                                        ->get();
            return DataTables::of($data)->addIndexColumn()
            ->addColumn('date', function($row){
                return date('d M Y', strtotime($row->date));
            })
            ->addColumn('action', function($row){
                $actionBtn = '<div class="text-center actions text-nowrap">
                                    <a class="view btn btn_view update_hover" href="IPPatientRecordShow/'.$row["id"].'"><i class="ri-eye-line"></i></a>
                                        <a class="edit btn btn_edit update_hover" href="IPPatientRecordEdit/'.$row["id"].'"><i class="ri-pencil-line"></i></a>
                                        <button class="delete btn btn_delete"value="'.$row["id"].'"><i class="ri-delete-bin-6-line"></i></button></div>';
                return $actionBtn;
            })
            ->rawColumns(['action'])
            ->make(true);
        }
        return view('IpRecords/IpPatientRecordByIdTable',compact('id'));
    }

}
