<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoomTypeController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DiagnosisController;
use App\Http\Controllers\ItemCategoryController;
use App\Http\Controllers\TreatmentController;
use App\Http\Controllers\DietController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\LabInvestigationController;
use App\Http\Controllers\OPController;
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\TokenController;
use App\Http\Controllers\DietChartController;
use App\Http\Controllers\CaseSheetController;
use App\Http\Controllers\BMIController;
use App\Http\Controllers\RoomMaintenanceController;
use App\Http\Controllers\DoctorConsultationController;
use App\Http\Controllers\PatientrecordController;
use App\Http\Controllers\IPController;
use App\Http\Controllers\RoomBookController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CollectionSummaryController;
use App\Http\Controllers\CollectionDetailController;
use App\Http\Controllers\UnitsController;
use App\Http\Controllers\IpPatientRecordController;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\PatientHistoryController;
use App\Http\Controllers\ReportController;



use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('index');
// })->middleware(['auth', 'verified'])->name('index');

Route::get('/', function () {
    return redirect()->route('login');
});  


Route::middleware('auth')->group(function () {
    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

       
    Route::get('/resetpw', function () {
        return view('ResetPassword');
    });
    Route::get('/branch', function () {
        return view('Branch');
    });
    Route::get('/basicsettings', function () {
        return view('settings/BasicSettings');
    });



    
    Route::get('/dashboard', [DashboardController::class, 'viewdashboard'] )->middleware(['auth', 'verified'])->name('index');
    Route::get('/RoomType', [RoomTypeController::class, 'viewRoomType'] )->name('RoomType.viewRoomType');
    Route::get('/Department', [DepartmentController::class, 'dept'] )->name('Department.dept');
    Route::get('/Diagnosis', [DiagnosisController::class, 'Diagnosis'] )->name('Diagnosis.dignosis');
    Route::get('/ItemCategory', [ItemCategoryController::class, 'ItemCat'] )->name('ItemCategory.itemcat');
    Route::get('/Treatment', [TreatmentController::class, 'treatment'] )->name('Treatment.treatment');
    Route::get('/Diet', [DietController::class, 'diet'] )->name('Diet.diet');
    Route::get('/Room', [RoomController::class, 'Room'] )->name('Room.room');
    Route::get('/Item', [ItemController::class, 'item'] )->name('Item.item');
    Route::get('/Doctor', [DoctorController::class, 'doctor'] )->name('Doctor.doctor');
    Route::get('/Staff', [StaffController::class, 'Staff'] )->name('Staff.staff');
    Route::get('/lab', [LabInvestigationController::class, 'lab'] )->name('Lab.lab');
    Route::get('/OP', [OPController::class, 'op'] )->name('OP.op');
    Route::get('/Token', [TokenController::class, 'tokens'] )->name('Token.tokens');
    Route::get('/DietChart', [DietChartController::class, 'dietchart'] )->name('DietChart.dietchart');
    Route::get('/BmI', [BMIController::class, 'bmi'] )->name('BMI.bmi');
    Route::get('/IP', [IPController::class, 'ip'] )->name('IP.ip');
    Route::get('/RoomBooking', [RoomBookController::class, 'RoomBook'] )->name('RoomBooking.RoomBook');
    Route::get('/collectionsummary', [CollectionSummaryController::class, 'cashcollection'] )->name('Cash.Collection');
    Route::get('/collectiondetailed', [CollectionDetailController::class, 'collectDetail'] )->name('Colection.collectDetail');
    Route::get('/IPdietchart', [DietChartController::class, 'ipdietchart'] )->name('IPdietchart.ipdietchart');
    Route::get('/IPBMI', [BMIController::class, 'ipbmi'] )->name('IPBMI.ipbmi');
    Route::get('/RoomMaintenance', [RoomController::class, 'roommaintain'] );
    Route::get('/units', [UnitsController::class, 'unit'] )->name('units.unit');
    Route::get('/templates', [TemplateController::class, 'Template'] )->name('templates.Template');

    //IP Details
    Route::get('/IPDetails', [IPController::class, 'Ipdetails'] )->name('IPDetails.Ipdetails');

    //Case Sheet 
    Route::get('/CaseSheet', [CaseSheetController::class, 'casesheet'] )->name('CaseSheet.casesheet');
    Route::get('/IPcasesheet', [CaseSheetController::class, 'ipcasesheet'] )->name('IPcasesheet.ipcasesheet');
    Route::get('/casesheettreatmentbill/{id}', [CaseSheetController::class, 'treatmentbills'] );
    Route::get('/iptreatmentbill/{id}', [CaseSheetController::class, 'iptreatmentbills'] );
    
    //Consultation
    Route::get('/IpConsultation', [ConsultationController::class, 'Ipconsultations'] )->name('IpConsultation.Ipconsultations');
    Route::get('/consultationprint/{id}', [ConsultationController::class, 'consulprint'] );
    Route::get('/Consultation', [ConsultationController::class, 'consultation'] )->name('Consultation.consultation');
    Route::get('/ipconsultationprint/{id}', [ConsultationController::class, 'ipconsulprint'] );

    //Consultation Fees
    Route::get('/DoctorFees', [DoctorConsultationController::class, 'docconfee'] )->name('DoctorFees.docconfee');
    Route::get('/feesadd', [DoctorConsultationController::class, 'feesAdd'] )->name('feesadd.feesAdd');

    //Token
    Route::get('/DietChartById/{id}/{op_id}', [DietChartController::class, 'dietchartId'] )->name('DietCharts.dietcharts'); 
    Route::get('/CaseSheets/{id}/{op_id}', [CaseSheetController::class, 'casesheetId'] )->name('CaseSheets.casesheets');
    Route::get('/PatientRecordId/{id}/{op_id}', [PatientrecordController::class, 'patientrecId'] )->name('PatientRecordId.patientrecId');
    Route::get('/BMIId/{id}/{op_id}', [BMIController::class, 'BmiId'] )->name('BMIId.BmiId');

    //Branch
    Route::get('/Branchtable', [BranchController::class, 'branchtable'] )->name('Branch.branch');
    Route::get('/branchEdit/{id}',[BranchController::class, 'BranchEdit'] )->name('branchEdit.BranchEdit');

    //Patient Record
    Route::get('/PatientRecord', [PatientrecordController::class, 'patientrecord'] );
    Route::get('/PatientRecordView', [PatientrecordController::class, 'recordsView'] )->name('PatientRecordView.recordsView');
    Route::get('/PatientRecordEdit/{id}', [PatientrecordController::class, 'recordsEdit'] );
    Route::get('/PatientRecordShow/{id}', [PatientrecordController::class, 'recordsShow'] );

    //IP Patient Record
    Route::get('/IpPatientRecord', [IpPatientRecordController::class, 'ippatientrecord'] );
    Route::get('/IpPatientRecordView', [IpPatientRecordController::class, 'IprecordsView'] )->name('IpPatientRecordView.IprecordsView');
    Route::get('/IPPatientRecordEdit/{id}', [IpPatientRecordController::class, 'iprecordsEdit'] );
    Route::get('/IPPatientRecordShow/{id}', [IpPatientRecordController::class, 'iprecordsShow'] );

    //Reports
    Route::get('/patienthistory', [ReportController::class, 'PatientHistory'] );
    Route::get('/TreatmentReport', [ReportController::class, 'treatmentreport'] );
    Route::get('/DietReport', [ReportController::class, 'dietreport'] );
    Route::get('/dailyopreport', [ReportController::class, 'DailyOpReport'] );

    //Print
    Route::get('/OptreatPrint', [ReportController::class, 'optreatPrint'] );
    Route::get('/IptreatPrint', [ReportController::class, 'IptreatPrint'] );
    Route::get('/OpDietPrint', [ReportController::class, 'OpDietPrint'] );
    Route::get('/IpdietPrint', [ReportController::class, 'IpdietPrint'] );

    //Therapist Shedule
    Route::get('/therapist', [CaseSheetController::class, 'therapist'] );
    Route::get('/dietitian', [DietChartController::class, 'dietitian'] );

    //IP To Records
    Route::get('/IpPatientRecId/{id}', [IpPatientRecordController ::class, 'IpPatientRecId'] ); 
    Route::get('/IPCaseSheetId/{id}', [CaseSheetController::class, 'IPCaseSheetId'] )->name('IPCaseSheetId.casesheets');
    Route::get('/IPDietChartId/{id}', [DietChartController::class, 'IPDietChartId'] )->name('IPDietChartId.dietcharts');
    Route::get('/IPBMIId/{id}', [BMIController::class, 'IPBMIId'] )->name('IPBMIId.BmiId');
    Route::get('/IpPatientRecordByIdView/{id}', [IpPatientRecordController ::class, 'IpPatientRecordByIdView'] )->name('IpPatientRecId.patientrecId'); 


});

require __DIR__.'/auth.php';




