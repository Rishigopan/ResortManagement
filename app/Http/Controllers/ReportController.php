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
use App\Models\Doctor;
use Illuminate\Http\Request;

class ReportController extends Controller
{

    // Treatment Report Page Load
    public function treatmentreport(Request $request) { 
        $ListOp['opno'] = Op::select('id','op_no','gender')->get();
        $ListConsult['cono'] = Consultation::select('id','consultation_no')->get();
        $ListIP['ipno'] = IP::select('id','ip_no','gender')->get();
        $ListConsult['cono'] = IpConsultation::select('id','ip_consultation_no')->get();
        $data = array_merge($ListOp, $ListConsult, $ListIP, $ListConsult);
        return view('reports/TreatmentReport',$data); 
    }


    //OP Treatment Print
    public function optreatPrint(Request $request)
    {
        // Retrieve the data from the request query parameters
        $opNumber = $request->query('OpNumber');
        $conNumber = $request->query('ConNumber');
        $date = $request->query('Date');
        $dataCount = $request->query('DataCount');
        // Pass the data to the view and render the page
        return view('print/OpTreatmentReportPrint', compact('opNumber', 'conNumber', 'date', 'dataCount'));
    }

    //IP Treatment Print
    public function IptreatPrint(Request $request)
    {
        // Retrieve the data from the request query parameters
        $ipNumber = $request->query('IpNumber');
        $ipconNumber = $request->query('ConNumber');
        $date = $request->query('Date');
        $dataCount = $request->query('DataCount');
        // Pass the data to the view and render the page
        return view('print/IpTreatmentReportPrint', compact('ipNumber', 'ipconNumber', 'date', 'dataCount'));
    }

    // Diet Report Page Load
    public function dietreport(Request $request) { 
        $ListOp['opno'] = Op::select('id','op_no','gender')->get();
        $ListConsult['cono'] = Consultation::select('id','consultation_no')->get();
        $ListIP['ipno'] = IP::select('id','ip_no','gender')->get();
        $ListConsult['cono'] = IpConsultation::select('id','ip_consultation_no')->get();
        $data = array_merge($ListOp, $ListConsult, $ListIP, $ListConsult);
        return view('reports/DietReport',$data); 
    }

    //OP Diet Print
    public function OpDietPrint(Request $request)
    {
        // Retrieve the data from the request query parameters
        $opNumber = $request->query('OpNumber');
        $conNumber = $request->query('ConNumber');
        $date = $request->query('Date');
        $dataCount = $request->query('DataCount');
        // Pass the data to the view and render the page
        return view('print/OpDietPrint', compact('opNumber', 'conNumber', 'date', 'dataCount'));
    }

    //Ip Diet Print
    public function IpdietPrint(Request $request)
    {
        // Retrieve the data from the request query parameters
        $ipNumber = $request->query('IpNumber');
        $ipconNumber = $request->query('ConNumber');
        $date = $request->query('Date');
        $dataCount = $request->query('DataCount');
        // Pass the data to the view and render the page
        return view('print/IpDietPrint', compact('ipNumber', 'ipconNumber', 'date', 'dataCount'));
    }

    //Patient History
    public function PatientHistory(Request $request) {
        
        $ListIP['ipno'] = IP::select('id','ip_no')->get();
        $ListOp['opno'] = Op::select('id','op_no')->get();

        $data = array_merge($ListIP,$ListOp);
        return view('reports/PatientHistory',$data);
    }

    //Daily OP Report 
    public function DailyOpReport(Request $request) {
        
        $ListDoctor['doctors'] = Doctor::select('id','name')->get();
        $ListOp['opno'] = Op::select('id','op_no')->get();

        $data = array_merge($ListOp,$ListDoctor);
        return view('reports/DailyOpReport',$data);
    }
}
