<?php

namespace App\Http\Controllers;
use App\Models\Consultation;
use App\Models\ModeOfPay;
use App\Models\Op;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;

class CollectionDetailController extends Controller
{
    public function collectDetail(Request $request) {

        if ($request->ajax()) {
            $data = Consultation::select('mode_of_pays.name AS Payname','consultations.consultation_fees','consultations.mode_of_payment_id','ops.op_no',
            'ops.name','ops.age','ops.mobile_no')
            ->join('mode_of_pays', 'consultations.mode_of_payment_id', '=', 'mode_of_pays.id')
            ->join('ops', 'consultations.op_id', '=', 'ops.id')
            ->get();
            return Datatables::of($data)->addIndexColumn()
            ->make(true);
        }

        $ListOfPay['modeofpay'] = ModeOfPay :: select('id','name')->get();


        return view('CollectionDetail',$ListOfPay);      
        
    }
}
