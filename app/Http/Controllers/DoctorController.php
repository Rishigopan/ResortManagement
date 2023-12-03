<?php

namespace App\Http\Controllers;
use App\Models\Doctor;
use App\Models\Department;
use App\Models\Branch;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function doctor(Request $request) {
        if ($request->ajax()) {
            $data = Doctor::select( 'doctors.id','doctors.name','doctors.email','doctors.password','doctors.confirm_password','doctors.mobile_no','doctors.remarks','doctors.department_id','departments.id AS depid','departments.name AS depname' )
                                ->join('departments', 'doctors.department_id', '=', 'departments.id')
                                ->orderBy('id', 'desc')
                                ->get(); 
            return Datatables::of($data)->addIndexColumn()
            ->addColumn('action', function($row){
                $actionBtn = '<div class="text-center actions text-nowrap"> <button class="view btn btn_view me-2" value="'.$row["id"].'"><i class="ri-eye-line"></i></button><button class="edit btn btn_edit me-2" value="'.$row["id"].'"><i class="ri-pencil-line"></i></button> <button class="delete btn btn_delete"value="'.$row["id"].'"><i class="ri-delete-bin-6-line"></i></button></div>';
                return $actionBtn;
            })
            ->rawColumns(['action'])
            ->make(true);
        }
        $ListDept['dept'] = Department::select('id','name')->get();
        $ListBranch['branch'] = Branch::select('id','branch_name')->get();

        return view('DoctorMaster',$ListDept, $ListBranch);      
    
    }
}
