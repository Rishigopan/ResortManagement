<?php

use App\Http\Controllers\Api\ConsultationController;
use App\Http\Controllers\Api\DepartmentController;
use App\Http\Controllers\Api\DiagnosisController;
use App\Http\Controllers\Api\DietController;
use App\Http\Controllers\Api\DoctorController;
use App\Http\Controllers\Api\OpController;
use App\Http\Controllers\Api\RoomController;
use App\Http\Controllers\Api\RoomTypeController;
use App\Http\Controllers\Api\StaffController;
use App\Http\Controllers\Api\TreatmentController;
use App\Http\Controllers\Api\ItemCategoryController;
use App\Http\Controllers\Api\ItemController;
use App\Http\Controllers\Api\ExaminationController;
use App\Http\Controllers\Api\LabInvestigationController;
use App\Http\Controllers\Api\DietChartController;
use App\Http\Controllers\Api\CaseSheetController;
use App\Http\Controllers\Api\SettingsController;
use App\Http\Controllers\Api\BMIController;
use App\Http\Controllers\Api\DoctorConsultationController;
use App\Http\Controllers\Api\IPController;
use App\Http\Controllers\Api\RoomBookController;
use App\Http\Controllers\Api\IPCaseSheetController;
use App\Http\Controllers\Api\IPDietChartController;
use App\Http\Controllers\Api\IPBMIController;
use App\Http\Controllers\Api\PatientRecordeController;
use App\Http\Controllers\Api\UnitsController;
use App\Http\Controllers\Api\IpPatientRecordController;
use App\Http\Controllers\Api\TemplateController;
use App\Http\Controllers\Api\BranchController;
use App\Http\Controllers\Api\IpConsultationController;
use App\Http\Controllers\Api\ReportController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

//public routes//
Route::get('/departments', [DepartmentController::class, 'index']);
Route::get('/department/{id}', [DepartmentController::class, 'show']);

Route::get('/diagnoses', [DiagnosisController::class, 'index']);
Route::get('/diagnosis/{id}', [DiagnosisController::class, 'show']);

Route::get('/treatments', [TreatmentController::class, 'index']);
Route::get('/treatment/{id}', [TreatmentController::class, 'show']);

Route::get('/diets', [DietController::class, 'index']);
Route::get('/diet/{id}', [DietController::class, 'show']); 

Route::get('/doctors', [DoctorController::class, 'index']);
Route::get('/doctor/{id}', [DoctorController::class, 'show']);

Route::get('/examinations', [ExaminationController::class, 'index']);
Route::get('/examination/{id}', [ExaminationController::class, 'show']);

Route::get('/staffs', [StaffController::class, 'index']);
Route::get('/staff/{id}', [StaffController::class, 'show']);

Route::get('/room-types', [RoomTypeController::class, 'index']);
Route::get('/room-type/{id}', [RoomTypeController::class, 'show']);

Route::get('/rooms', [RoomController::class, 'index']);
Route::get('/room/{id}', [RoomController::class, 'show']);

Route::get('/ops', [OpController::class, 'index']);
Route::get('/op/{id}', [OpController::class, 'show']);

Route::get('/consultations', [ConsultationController::class, 'index']);
Route::get('/consultation/{id}', [ConsultationController::class, 'show']);

Route::get('/item-categories', [ItemCategoryController::class, 'index']);
Route::get('/item-category/{id}', [ItemCategoryController::class, 'show']);

Route::get('/items', [ItemController::class, 'index']);
Route::get('/item/{id}', [ItemController::class, 'show']);

Route::get('/labs', [LabInvestigationController::class, 'index']);
Route::get('/lab/{id}', [LabInvestigationController::class, 'show']);

Route::get('/dietcharts', [DietChartController::class, 'index']);
Route::get('/dietchart/{id}', [DietChartController::class, 'show']);

Route::get('/casesheets', [CaseSheetController::class, 'index']);
Route::get('/casesheet/{id}', [CaseSheetController::class, 'show']);

Route::get('/bmis', [BMIController::class, 'index']);
Route::get('/bmi/{id}', [BMIController::class, 'show']);

Route::get('/ips', [IPController::class, 'index']);
Route::get('/ip/{id}', [IPController::class, 'show']);

Route::get('/roombook', [RoomBookController::class, 'index']);
Route::get('/roombook/{id}', [RoomBookController::class, 'show']);

Route::get('/ipcasesheets', [IPCaseSheetController::class, 'index']);
Route::get('/ipcasesheet/{id}', [IPCaseSheetController::class, 'show']);

Route::get('/ipdietcharts', [IPDietChartController::class, 'index']);
Route::get('/ipdietchart/{id}', [IPDietChartController::class, 'show']);

Route::get('/ipbmis', [IPBMIController::class, 'index']);
Route::get('/ipbmi/{id}', [IPBMIController::class, 'show']);

Route::get('/patients', [PatientRecordeController::class, 'index']);
Route::get('/patient/{id}', [PatientRecordeController::class, 'show']);

Route::get('/units', [UnitsController::class, 'index']);
Route::get('/unit/{id}', [UnitsController::class, 'show']);

Route::get('/ippatients', [IpPatientRecordController::class, 'index']);
Route::get('/ippatient/{id}', [IpPatientRecordController::class, 'show']);

Route::get('/templates', [TemplateController::class, 'index']);
Route::get('/template/{id}', [TemplateController::class, 'show']);

Route::get('/branches', [BranchController::class, 'index']);
Route::get('/branch/{id}', [BranchController::class, 'show']);

Route::get('/ipconsultations', [IpConsultationController::class, 'index']);
Route::get('/ipconsultation/{id}', [IpConsultationController::class, 'show']);

//Protected routes-Only authenticated users can have access to protected routes//
//Route::group(['middleware' => ['auth:sanctum']], function () {

//departments
Route::post('/department', [DepartmentController::class, 'store']);
Route::put('/department/{id}', [DepartmentController::class, 'update']);
Route::delete('/department/{id}', [DepartmentController::class, 'destroy']);

//diagnoses
Route::post('/diagnosis', [DiagnosisController::class, 'store']);
Route::put('/diagnosis/{id}', [DiagnosisController::class, 'update']);
Route::delete('/diagnosis/{id}', [DiagnosisController::class, 'destroy']);

//treatments
Route::post('/treatment', [TreatmentController::class, 'store']);
Route::put('/treatment/{id}', [TreatmentController::class, 'update']);
Route::delete('/treatment/{id}', [TreatmentController::class, 'destroy']);

//diets
Route::post('/diet', [DietController::class, 'store']);
Route::put('/diet/{id}', [DietController::class, 'update']);
Route::delete('/diet/{id}', [DietController::class, 'destroy']);

//doctors
Route::post('/doctor', [DoctorController::class, 'store']);
Route::put('/doctor/{id}', [DoctorController::class, 'update']);
Route::delete('/doctor/{id}', [DoctorController::class, 'destroy']);

//room-types
Route::post('/room-type', [RoomTypeController::class, 'store']);
Route::put('/room-type/{id}', [RoomTypeController::class, 'update']);
Route::delete('/room-type/{id}', [RoomTypeController::class, 'destroy']);

//room
Route::post('/room', [RoomController::class, 'store']);
Route::put('/room/{id}', [RoomController::class, 'update']);
Route::delete('/room/{id}', [RoomController::class, 'destroy']);
Route::put('/roommain/{id}', [RoomController::class, 'updateroom']);

//staffs
Route::post('/staff', [StaffController::class, 'store']);
Route::put('/staff/{id}', [StaffController::class, 'update']);
Route::delete('/staff/{id}', [StaffController::class, 'destroy']);

//item-categories
Route::post('/item-category', [ItemCategoryController::class, 'store']);
Route::put('/item-category/{id}', [ItemCategoryController::class, 'update']);
Route::delete('/item-category/{id}', [ItemCategoryController::class, 'destroy']);

//item
Route::post('/item', [ItemController::class, 'store']);
Route::put('/item/{id}', [ItemController::class, 'update']);
Route::delete('/item/{id}', [ItemController::class, 'destroy']);

//item
Route::post('/lab', [LabInvestigationController::class, 'store']);
Route::put('/lab/{id}', [LabInvestigationController::class, 'update']);
Route::delete('/lab/{id}', [LabInvestigationController::class, 'destroy']);

//ops
Route::post('/op', [OpController::class, 'store']);
Route::put('/op/{id}', [OpController::class, 'update']);
Route::delete('/op/{id}', [OpController::class, 'destroy']);
Route::get('/maxOP', [OpController::class, 'maxop']);
Route::get('/op/by/op-id/{opid}', [OpController::class, 'getOpByOpId']);

//->where(['opid' => "[\w\/]+"]);

//consultations
Route::post('/consultation', [ConsultationController::class, 'store']);
Route::put('/consultation/{id}', [ConsultationController::class, 'update']);
Route::delete('/consultation/{id}', [ConsultationController::class, 'destroy']);
Route::get('/max/consultation', [ConsultationController::class, 'maxconsultation']);
Route::get('/getConsultationByDateandDoctor', [ConsultationController::class, 'getConsultationByDateandDoctor']);
Route::get('/calculateFees', [ConsultationController::class, 'calculateFees']);

//examinations
Route::post('/examinations', [ExaminationController::class, 'store']);
Route::put('/examinations/{id}', [ExaminationController::class, 'update']);
Route::delete('/examinations/{id}', [ExaminationController::class, 'destroy']);
Route::get('/getExaminationsByHeader/{headertext}', [ExaminationController::class, 'getExaminationsByHeader']);

//Diet Chart
Route::post('/dietchart', [DietChartController::class, 'store']);
Route::put('/dietchart/{id}', [DietChartController::class, 'update']);
Route::delete('/dietchart/{id}', [DietChartController::class, 'destroy']);

//Case Sheet
Route::post('/casesheet', [CaseSheetController::class, 'store']);
Route::put('/casesheet/{id}', [CaseSheetController::class, 'update']);
Route::delete('/casesheet/{id}', [CaseSheetController::class, 'destroy']);
Route::post('/therapistmrngshedule', [CaseSheetController::class, 'checkTherapist']);
Route::get('/casesheetConsultation/{opId}', [CaseSheetController::class, 'getConsultations']);
Route::get('/therapists/{gender}', [CaseSheetController::class, 'getTherapists']);
Route::get('/getoplastConsultation/{opId}', [CaseSheetController::class, 'getlastConsultations']);

//BMI
Route::post('/bmi', [BMIController::class, 'store']);
Route::put('/bmi/{id}', [BMIController::class, 'update']);
Route::delete('/bmi/{id}', [BMIController::class, 'destroy']);

//Consultation Fees
Route::put('/docconfeeupdate', [DoctorConsultationController::class, 'update']);

//Reset Password


// IP
Route::post('/ip', [IPController::class, 'store']);
Route::put('/ip/{id}', [IPController::class, 'update']);
Route::delete('/ip/{id}', [IPController::class, 'destroy']);
Route::get('/max/ip', [IPController::class, 'maxip']);
Route::get('/ip/by/ip-id/{ipid}', [IPController::class, 'getIpByIpId']);

//RoomBooking
Route::post('/roombook', [RoomBookController::class, 'store']);
Route::put('/roombook/{id}', [RoomBookController::class, 'update']);
Route::delete('/roombook/{id}', [RoomBookController::class, 'destroy']);
Route::post('/calculation', [RoomBookController::class, 'calculateRent']);
Route::get('/RoomNumByType/{RoomId}', [RoomBookController::class, 'getroomsbytype']);

//IP Case Sheet
Route::post('/ipcasesheet', [IPCaseSheetController::class, 'store']);
Route::put('/ipcasesheet/{id}', [IPCaseSheetController::class, 'update']);
Route::delete('/ipcasesheet/{id}', [IPCaseSheetController::class, 'destroy']);
Route::post('/iptherapistshedule', [IPCaseSheetController::class, 'checkTherapist']);
Route::get('/IpCasesheetConsultation/{IpNum}', [IPCaseSheetController::class, 'getIPConsultations']);
Route::get('/iptherapists/{gender}', [IPCaseSheetController::class, 'getTherapists']);
Route::get('/IpCasesheetlastConsultation/{IpNum}', [IPCaseSheetController::class, 'getIPlastConsultations']);

//IP Consultation
Route::post('/ipconsultation', [IpConsultationController::class, 'store']);
Route::put('/ipconsultation/{id}', [IpConsultationController::class, 'update']);
Route::delete('/ipconsultation/{id}', [IpConsultationController::class, 'destroy']);
Route::get('/calculateIPFees', [IpConsultationController::class, 'calculateFees']);

//IP Diet Chart
Route::post('/ipdietchart', [IPDietChartController::class, 'store']);
Route::put('/ipdietchart/{id}', [IPDietChartController::class, 'update']);
Route::delete('/ipdietchart/{id}', [IPDietChartController::class, 'destroy']);

//IP BMI
Route::post('/ipbmi', [IPBMIController::class, 'store']);
Route::put('/ipbmi/{id}', [IPBMIController::class, 'update']);
Route::delete('/ipbmi/{id}', [IPBMIController::class, 'destroy']);

//Patient Record
Route::post('/patient', [PatientRecordeController::class, 'store']);
Route::put('/patient/{id}', [PatientRecordeController::class, 'update']);
Route::delete('/patient/{id}', [PatientRecordeController::class, 'destroy']);

//IP Patient Record
Route::post('/ippatient', [IpPatientRecordController::class, 'store']);
Route::put('/ippatient/{id}', [IpPatientRecordController::class, 'update']);
Route::delete('/ippatient/{id}', [IpPatientRecordController::class, 'destroy']);

//Unit Master
Route::post('/unit', [UnitsController::class, 'store']);
Route::put('/unit/{id}', [UnitsController::class, 'update']);
Route::delete('/unit/{id}', [UnitsController::class, 'destroy']);

//Template Master
Route::post('/template', [TemplateController::class, 'store']);
Route::put('/template/{id}', [TemplateController::class, 'update']);
Route::delete('/template/{id}', [TemplateController::class, 'destroy']);

//Branch
Route::post('/branch', [BranchController::class, 'store']);
Route::put('/branch/{id}', [BranchController::class, 'update']);
Route::delete('/branch/{id}', [BranchController::class, 'destroy']);

//****************************************Reports Start***********************************************************//

//Treatment
Route::get('/Optreatmentreportdata', [ReportController::class, 'getoptreatmentreport']);
Route::get('/Iptreatmentreportdata', [ReportController::class, 'getiptreatmentreport']);

//Diet
Route::get('/OpDietreportdata', [ReportController::class, 'getopdietreport']);
Route::get('/IpDietreportdata', [ReportController::class, 'getipdietreport']);

//Patient History
Route::get('/Patienthistorydata', [ReportController::class, 'getpatienthistoryport']);

//Daily op Report
Route::get('/dailyopreport', [ReportController::class, 'getdailyopreport']);

//****************************************Reports End***********************************************************//

//Therapist Schedule
Route::get('/gettherapistschedule', [CaseSheetController::class, 'gettherapistschedule']);

//Dietition Shedule
Route::get('/getdietschedule', [DietChartController::class, 'getdietschedule']);

//Settings
Route::put('/resetpw/{id}', [SettingsController::class, 'reset']);
Route::post('/prefixSettting', [SettingsController::class, 'prefixsetting']);
