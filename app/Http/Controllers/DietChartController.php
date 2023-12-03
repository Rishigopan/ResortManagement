<?php

namespace App\Http\Controllers;
use App\Models\DietChart;
use App\Models\Diet;
use App\Models\Consultation;
use App\Models\Op;
use App\Models\IP;
use App\Models\IPDietChart;
use App\Models\IpConsultation; 
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;

class DietChartController extends Controller
{
    public function dietchart(Request $request) {
        if ($request->ajax()) {
          
            $FinalDataArray = array();
            $FindData = DietChart::select('diet_charts.id','ops.op_no','consultations.consultation_no','diet_charts.date','diet_charts.time','diet_charts.diet_id')
                                            ->join('ops', 'diet_charts.op_no_id', '=', 'ops.id')
                                            ->leftJoin('consultations','diet_charts.consultation_id','=','consultations.id')
                                            ->orderBy('id', 'desc')
                                            ->get();
            foreach($FindData as $FindDatas){
    
                $DietsName = '';
                $DietsId = explode(',', $FindDatas['diet_id']);
                foreach($DietsId as $DietsIds){
                    $FindDiets = Diet::select('name')->where('id','=',$DietsIds)->first();
                    $DietsName .= $FindDiets->name;
                    $DietsName .= ' + ';
                }
    
                $DietsName = rtrim($DietsName, ' + ');
    
                $DataArray = [
                    'id' => $FindDatas['id'],
                    'op_no' => $FindDatas['op_no'],
                    'consultation_no' => $FindDatas['consultation_no'],
                    'date' => $FindDatas['date'],
                    'time' => $FindDatas['time'],
                    'name' => $DietsName,
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
        $ListOp['opno'] = Op::select('id','op_no')->get();
        $ListDiet['diet'] = Diet::select('id','name')->get();
        $ListConsult['cono'] = Consultation::select('id','consultation_no')->get();
        
        $data = array_merge($ListOp, $ListConsult, $ListDiet);

        return view('DietChart', $data);    
    }



    //Token to Diet Chart Link 
    public function dietchartId(Request $request) {
        $op_id = $request -> op_id;
        $id = $request -> id;

        

        if ($request->ajax()) {
          
            $FinalDataArray = array();
            $FindData = DietChart::select('diet_charts.id','ops.op_no','consultations.consultation_no','diet_charts.date','diet_charts.time','diet_charts.diet_id')
                                            ->join('ops', 'diet_charts.op_no_id', '=', 'ops.id')
                                            ->leftJoin('consultations','diet_charts.consultation_id','=','consultations.id')
                                            ->where('diet_charts.op_no_id', $op_id)
                                            ->where('consultations.id', $id)
                                            ->get();
            foreach($FindData as $FindDatas){
    
                $DietsName = '';
                $DietsId = explode(',', $FindDatas['diet_id']);
                foreach($DietsId as $DietsIds){
                    $FindDiets = Diet::select('name')->where('id','=',$DietsIds)->first();
                    $DietsName .= $FindDiets->name;
                    $DietsName .= ' + ';
                }
    
                $DietsName = rtrim($DietsName, ' + ');
    
                $DataArray = [
                    'id' => $FindDatas['id'],
                    'op_no' => $FindDatas['op_no'],
                    'consultation_no' => $FindDatas['consultation_no'],
                    'date' => $FindDatas['date'],
                    'time' => $FindDatas['time'],
                    'name' => $DietsName,
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
      
        $ListDiet['diet'] = Diet::select('id','name')->get();
        $DisplyOP['dispop'] = Consultation::select('consultations.id','consultations.consultation_no','ops.op_no','consultations.op_id')
                                                ->join('ops', 'consultations.op_id', '=', 'ops.id')
                                                ->where('consultations.op_id', $op_id)
                                                ->where('consultations.id', $id) ->get();



        $data = array_merge($ListDiet, $DisplyOP, ['op_id' => $op_id , 'id' => $id]);

        return view('DietChartById', $data );    
    }

    //IP Diet Chart
    public function ipdietchart(Request $request) {
        if ($request->ajax()) {
          
            $FinalDataArray = array();
            $FindData = IPDietChart::select('i_p_diet_charts.id','ips.ip_no','ip_consultations.ip_consultation_no','i_p_diet_charts.date','i_p_diet_charts.time','i_p_diet_charts.diet_id')
                                            ->join('ips', 'i_p_diet_charts.ip_no_id', '=', 'ips.id')
                                            ->leftJoin('ip_consultations','i_p_diet_charts.consultation_id','=','ip_consultations.id')
                                            ->orderBy('id', 'desc')
                                            ->get();
            foreach($FindData as $FindDatas){
    
                $DietsName = '';
                $DietsId = explode(',', $FindDatas['diet_id']);
                foreach($DietsId as $DietsIds){
                    $FindDiets = Diet::select('name')->where('id','=',$DietsIds)->first();
                    $DietsName .= $FindDiets->name;
                    $DietsName .= ' + ';
                }
    
                $DietsName = rtrim($DietsName, ' + ');
    
                $DataArray = [
                    'id' => $FindDatas['id'],
                    'ip_no' => $FindDatas['ip_no'],
                    'ip_consultation_no' => $FindDatas['ip_consultation_no'],
                    'date' => $FindDatas['date'],
                    'time' => $FindDatas['time'],
                    'name' => $DietsName,
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
        $ListIp['ipno'] = IP::select('id','ip_no')->get();
        $ListDiet['diet'] = Diet::select('id','name')->get();
        $ListConsult['cono'] = IpConsultation::select('id','ip_consultation_no')->get();
        $data = array_merge($ListIp, $ListConsult, $ListDiet);

        return view('IPDietChart', $data);    
    }

    //Dietitian
    public function dietitian(Request $request) {
      

        $ListIp['ipno'] = IP::select('id','ip_no')->get();

        return view('Dietitian', $ListIp );    
    }


    //IP Diet Chart By Id
    public function IPDietChartId(Request $request) {

        $id = $request -> id;

        if ($request->ajax()) {
            
            $FinalDataArray = array();
            $FindData = IPDietChart::select('i_p_diet_charts.id','ips.ip_no','ip_consultations.ip_consultation_no','i_p_diet_charts.date','i_p_diet_charts.time','i_p_diet_charts.diet_id')
                                            ->join('ips', 'i_p_diet_charts.ip_no_id', '=', 'ips.id')
                                            ->leftJoin('ip_consultations','i_p_diet_charts.consultation_id','=','ip_consultations.id')
                                            ->where('i_p_diet_charts.ip_no_id', $id)
                                            ->orderBy('id', 'desc')
                                            ->get();
            foreach($FindData as $FindDatas){
    
                $DietsName = '';
                $DietsId = explode(',', $FindDatas['diet_id']);
                foreach($DietsId as $DietsIds){
                    $FindDiets = Diet::select('name')->where('id','=',$DietsIds)->first();
                    $DietsName .= $FindDiets->name;
                    $DietsName .= ' + ';
                }
    
                $DietsName = rtrim($DietsName, ' + ');
    
                $DataArray = [
                    'id' => $FindDatas['id'],
                    'ip_no' => $FindDatas['ip_no'],
                    'ip_consultation_no' => $FindDatas['ip_consultation_no'],
                    'date' => $FindDatas['date'],
                    'time' => $FindDatas['time'],
                    'name' => $DietsName,
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
        $ListIp['ipno'] = IP::select('id','ip_no')
                                ->where('id', $id)
                                ->get();
        $ListDiet['diet'] = Diet::select('id','name')->get();
        $ListConsult['cono'] = IpConsultation::select('id','ip_consultation_no')->where('ip_id', $id)
                                                ->orderBy('id', 'desc')
                                                ->get();
        $data = array_merge($ListIp, $ListConsult, $ListDiet);

        return view('IpRecords/IPDietchartById',compact('id'), $data);    
    }

}
