<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use App\Models\Consultation;
use App\Models\Doctor;
use App\Models\Op;
use App\Models\IP;
use App\Models\Treatment;
use App\Models\CaseSheet;
use App\Models\Templates;
use App\Models\IPCasesheet;
use App\Models\IpConsultation;
use App\Models\Diet;
use App\Models\DietChart;
use App\Models\IPDietChart;
use Yajra\DataTables\DataTables;
use Carbon\Carbon;

use Illuminate\Http\Request;

class ReportController extends BaseController
{

    // OP Treatment Details
    public function getoptreatmentreport(Request $request)
    {
        $OpNumber = $request['OpNumber'];
        $ConNumber = $request['ConNumber'];
        $Date = $request['Date'];
        $DataCount = $request['DataCount'];

         // Check if any condition is selected
        if (!$OpNumber && !$ConNumber) {
            return $this->sendResponse("OPtreatmentreports", [], '0', 'Please select at least one condition.');
        }
        $TreatmentreportQuery = CaseSheet::select(
            'case_sheets.id',
            'ops.name',
            'ops.op_no',
            'ops.age',
            'ops.gender',
            'ops.mobile_no',
            'consultations.consultation_no',
            'case_sheets.morning_session',
            'case_sheets.afternoon_session',
            'case_sheets.date',
            'case_sheets.treatment_cost'
        )
            ->leftJoin('ops', 'case_sheets.op_no_id', '=', 'ops.id')
            ->leftJoin('consultations', 'case_sheets.consultation_id', '=', 'consultations.id');

        if ($OpNumber) {
            $TreatmentreportQuery->where('case_sheets.op_no_id', $OpNumber);
        }
        if ($ConNumber) {
            $TreatmentreportQuery->where('case_sheets.consultation_id', $ConNumber);
        }
        if ($Date) {
            $TreatmentreportQuery->whereDate('case_sheets.date', '<=', $Date);
        }

        $OPtreatmentreport = $TreatmentreportQuery->take($DataCount)->get();

        $morningSessionIds = [];
        foreach ($OPtreatmentreport as $report) {
            $morningSessionIds = array_merge($morningSessionIds, explode(',', $report->morning_session));
        }
        $morningSessions = Treatment::whereIn('id', $morningSessionIds)->pluck('name', 'id');

        $afternoonSessionIds = [];
        foreach ($OPtreatmentreport as $report) {
            $afternoonSessionIds = array_merge($afternoonSessionIds, explode(',', $report->afternoon_session));
        }
        $afternoonSessions = Treatment::whereIn('id', $afternoonSessionIds)->pluck('name', 'id');

        $OPtreatmentreport = $OPtreatmentreport->map(function ($report) use ($morningSessions, $afternoonSessions) {
            $morningSessionIds = explode(',', $report->morning_session);
            $morningSessionNames = collect([]);
            foreach ($morningSessionIds as $id) {
                if ($morningSessions->has($id)) {
                    $morningSessionNames->push($morningSessions[$id]);
                }
            }
            $report->morning_session_names = $morningSessionNames->implode('+ ');

            $afternoonSessionIds = explode(',', $report->afternoon_session);
            $afternoonSessionNames = collect([]);
            foreach ($afternoonSessionIds as $id) {
                if ($afternoonSessions->has($id)) {
                    $afternoonSessionNames->push($afternoonSessions[$id]);
                }
            }
            $report->afternoon_session_names = $afternoonSessionNames->implode('+ ');

            return $report;
        });

        $response = [
            'OPtreatmentreports' => $OPtreatmentreport
        ];
        return $this->sendResponse("OPtreatmentreports", $response, '1', 'OP Treatment Records retrieved successfully.');
    }


    // IP Treatment Details
    public function getiptreatmentreport(Request $request)
    {
        $IPNumber = $request['IpNumber'];
        $ConNumber = $request['ConNumber'];
        $Date = $request['Date'];
        $DataCount = $request['DataCount'];

        if (!$IPNumber && !$ConNumber) {
            return $this->sendResponse("IPtreatmentreports", [], '0', 'Please select at least one condition.');
        }

        $TreatmentreportQuery = IPCasesheet::select(
            'i_p_casesheets.id',
            'ips.name',
            'ips.ip_no',
            'ips.age',
            'ips.gender',
            'ips.mobile_no',
            'ip_consultations.ip_consultation_no',
            'i_p_casesheets.morning_session',
            'i_p_casesheets.afternoon_session',
            'i_p_casesheets.date',
            'i_p_casesheets.treatment_cost'
        )
            ->leftJoin('ips', 'i_p_casesheets.ip_no_id', '=', 'ips.id')
            ->leftJoin('ip_consultations', 'i_p_casesheets.consultation_id', '=', 'ip_consultations.id');

        if ($IPNumber) {
            $TreatmentreportQuery->where('i_p_casesheets.ip_no_id', $IPNumber);
        }
        if ($ConNumber) {
            $TreatmentreportQuery->where('i_p_casesheets.consultation_id', $ConNumber);
        }
        if ($Date) {
            $TreatmentreportQuery->whereDate('i_p_casesheets.date', '<=', $Date);
        }

        $Iptreatmentreport = $TreatmentreportQuery->take($DataCount)->get();

        $morningSessionIds = [];
        foreach ($Iptreatmentreport as $report) {
            $morningSessionIds = array_merge($morningSessionIds, explode(',', $report->morning_session));
        }
        $morningSessions = Treatment::whereIn('id', $morningSessionIds)->pluck('name', 'id');

        $afternoonSessionIds = [];
        foreach ($Iptreatmentreport as $report) {
            $afternoonSessionIds = array_merge($afternoonSessionIds, explode(',', $report->afternoon_session));
        }
        $afternoonSessions = Treatment::whereIn('id', $afternoonSessionIds)->pluck('name', 'id');

        $Iptreatmentreport = $Iptreatmentreport->map(function ($report) use ($morningSessions, $afternoonSessions) {
            $morningSessionIds = explode(',', $report->morning_session);
            $morningSessionNames = collect([]);
            foreach ($morningSessionIds as $id) {
                if ($morningSessions->has($id)) {
                    $morningSessionNames->push($morningSessions[$id]);
                }
            }
            $report->morning_session_names = $morningSessionNames->implode('+ ');

            $afternoonSessionIds = explode(',', $report->afternoon_session);
            $afternoonSessionNames = collect([]);
            foreach ($afternoonSessionIds as $id) {
                if ($afternoonSessions->has($id)) {
                    $afternoonSessionNames->push($afternoonSessions[$id]);
                }
            }
            $report->afternoon_session_names = $afternoonSessionNames->implode('+ ');

            return $report;
        });

        $response = [
            'Iptreatmentreports' => $Iptreatmentreport
        ];
        return $this->sendResponse("Iptreatmentreports", $response, '1', 'IP Treatment Records retrieved successfully.');
    }



    // OP Diet Details
    public function getopdietreport(Request $request)
    {
        $OpNumber = $request['OpNumber'];
        $ConNumber = $request['ConNumber'];
        $Date = $request['Date'];
        $DataCount = $request['DataCount'];
    
        if (!$OpNumber && !$ConNumber) {
            return $this->sendResponse("OPtreatmentreports", [], '0', 'Please select at least one condition.');
        }

        $DietreportQuery = DietChart::select(
            'diet_charts.id',
            'ops.name',
            'ops.op_no',
            'ops.age',
            'ops.gender',
            'ops.mobile_no',
            'consultations.consultation_no',
            'diet_charts.time',
            'diet_charts.date',
            'diet_charts.diet_cost',
            'diet_charts.diet_id' 
        )
            ->leftJoin('ops', 'diet_charts.op_no_id', '=', 'ops.id')
            ->leftJoin('consultations', 'diet_charts.consultation_id', '=', 'consultations.id');
    
        if ($OpNumber) {
            $DietreportQuery->where('diet_charts.op_no_id', $OpNumber);
        }
        if ($ConNumber) {
            $DietreportQuery->where('diet_charts.consultation_id', $ConNumber);
        }
        if ($Date) {
            $DietreportQuery->whereDate('diet_charts.date', '<=', $Date);
        }
    
        $OPdietreport = $DietreportQuery->take($DataCount)->get();
    
        // Get the names of diets using the DietCharts IDs
        $DietIds = [];
        foreach ($OPdietreport as $report) {
            $DietIds = array_merge($DietIds, explode(',', $report->diet_id));
        }
        $DietByTime = Diet::whereIn('id', $DietIds)->pluck('name', 'id');
    
        // Iterate over the OPdietreport and append the names of diet_id
        $OPdietreport = $OPdietreport->map(function ($report) use ($DietByTime) {
            $DietIds = explode(',', $report->diet_id);
            $DietNames = collect([]);
            foreach ($DietIds as $id) {
                if ($DietByTime->has($id)) {
                    $DietNames->push($DietByTime[$id]);
                }
            }
            $report->Dietnames = $DietNames->implode('+ ');
    
            return $report;
        });
    
        $response = [
            'OPdietreports' => $OPdietreport
        ];
        return $this->sendResponse("OPdietreports", $response, '1', 'OP Diets Records retrieved successfully.');
    }


    // IP Diet Details
    public function getipdietreport(Request $request)
    {
        $IPNumber = $request['IpNumber'];
        $ConNumber = $request['ConNumber'];
        $Date = $request['Date'];
        $DataCount = $request['DataCount'];
    
        if (!$IPNumber && !$ConNumber) {
            return $this->sendResponse("IPtreatmentreports", [], '0', 'Please select at least one condition.');
        }
        $DietreportQuery = IPDietChart::select(
            'i_p_diet_charts.id',
            'ips.name',
            'ips.ip_no',
            'ips.age',
            'ips.gender',
            'ips.mobile_no',
            'ip_consultations.ip_consultation_no',
            'i_p_diet_charts.time',
            'i_p_diet_charts.date',
            'i_p_diet_charts.diet_cost',
            'i_p_diet_charts.diet_id' 
        )
            ->leftJoin('ips', 'i_p_diet_charts.ip_no_id', '=', 'ips.id')
            ->leftJoin('ip_consultations', 'i_p_diet_charts.consultation_id', '=', 'ip_consultations.id');
    
        if ($IPNumber) {
            $DietreportQuery->where('i_p_diet_charts.ip_no_id', $IPNumber);
        }
        if ($ConNumber) {
            $DietreportQuery->where('i_p_diet_charts.consultation_id', $ConNumber);
        }
        if ($Date) {
            $DietreportQuery->whereDate('i_p_diet_charts.date', '<=', $Date);
        }
    
        $IPdietreport = $DietreportQuery->take($DataCount)->get();
    
        // Get the names of diets using the DietCharts IDs
        $DietIds = [];
        foreach ($IPdietreport as $report) {
            $DietIds = array_merge($DietIds, explode(',', $report->diet_id));
        }
        $DietByTime = Diet::whereIn('id', $DietIds)->pluck('name', 'id');
    
        // Iterate over the IPdietreport and append the names of diet_id
        $IPdietreport = $IPdietreport->map(function ($report) use ($DietByTime) {
            $DietIds = explode(',', $report->diet_id);
            $DietNames = collect([]);
            foreach ($DietIds as $id) {
                if ($DietByTime->has($id)) {
                    $DietNames->push($DietByTime[$id]);
                }
            }
            $report->Dietnames = $DietNames->implode('+ ');
    
            return $report;
        });
    
        $response = [
            'IPdietreports' => $IPdietreport
        ];
        return $this->sendResponse("IPdietreports", $response, '1', 'IP Diets Records retrieved successfully.');
    }


    // Patient History Details
    public function getpatienthistoryport(Request $request)
    {
        $OpNumber = $request['OpNumber'];
    
        $TreatmentreportQuery = Op::select(
           'name',
            'age',
            'gender',
            'mobile_no',
            'local_address',
            'email',
            'occupation',
            'marital_status'
        );
    
        if ($OpNumber) {
            $TreatmentreportQuery->where('id', $OpNumber);
        }
    
        $PatientHistoryreports = $TreatmentreportQuery->get();
    
        $response = [
            'PatientHistoryreports' => $PatientHistoryreports
        ];
        return $this->sendResponse('PatientHistoryreports',$response, '1', 'OP Treatment Records retrieved successfully.');
    }
    

    public function getdailyopreport(Request $request)
    {
        $data = Consultation::select( 'consultations.id','consultations.consultation_date','ops.op_no','ops.name','ops.age','ops.gender','ops.mobile_no','doctors.name AS Drname','consultations.consultation_no')
        ->join('ops', 'consultations.op_id', '=', 'ops.id')
        ->join('doctors', 'consultations.doctor_id', '=', 'doctors.id');
    
        // Apply filters
        if ($request->has('from_date')) {
            $fromDate = $request->input('from_date');
            $data->whereDate('consultations.consultation_date', '>=', $fromDate);
        }
    
        if ($request->has('to_date')) {
            $toDate = $request->input('to_date');
            $data->whereDate('consultations.consultation_date', '<=', $toDate);
        }
    
        if ($request->has('doctor') && $request->input('doctor') !== '0') {
            // $query->where('name', $request->input('name'));
            $doctorId = $request->input('doctor');
            $data->where('consultations.doctor_id', $doctorId);
        }


        if ($request->has('op_number') && $request->input('op_number') !== '0') {
            $opNumberId = $request->input('op_number');
            $data->where('consultations.op_id', $opNumberId);
        }

    
        // Retrieve the filtered data
        $filteredData = $data->get();
    
        // Return the filtered data as JSON
        return response()->json(['data' => $filteredData]);
    }
        
}
