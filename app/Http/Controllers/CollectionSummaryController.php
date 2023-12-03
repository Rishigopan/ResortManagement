<?php

namespace App\Http\Controllers;
use App\Models\Consultation;
use App\Models\ModeOfPay;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CollectionSummaryController extends Controller
{
    public function cashcollection(Request $request) {

        if ($request->ajax()) {
            $data = Consultation::select('mode_of_pays.name',DB::raw('SUM(consultations.consultation_fees) as consultation_fees'))
            ->join('mode_of_pays', 'consultations.mode_of_payment_id', '=', 'mode_of_pays.id')
            ->groupBy('consultations.mode_of_payment_id','mode_of_pays.name' )
            ->get();
            return Datatables::of($data)->addIndexColumn()
            ->make(true);
        }


        return view('CollectionSummary');      
        
    }
}
