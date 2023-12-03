<?php

namespace App\Http\Controllers;
use App\Models\Staff;
use App\Models\Department;
use App\Models\Branch;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function Staff(Request $request) {
        
        if ($request->ajax()) {
            $data = Staff::select( 'staffs.id','staffs.name','staffs.email','staffs.password','staffs.confirm_password','staffs.mobile_no','staffs.remarks','staffs.department_id','departments.id AS deptid','departments.name AS deptname' )
                            ->join('departments', 'staffs.department_id', '=', 'departments.id')
                            ->orderBy('id', 'desc')
                            ->get();
            return DataTables::of($data)->addIndexColumn()
            ->addColumn('action', function($row){
                $actionBtn = '<div class="text-center actions text-nowrap"> <button class="view btn btn_view me-2" value="'.$row["id"].'"><i class="ri-eye-line"></i></button><button class="edit btn btn_edit me-2" value="'.$row["id"].'"><i class="ri-pencil-line"></i></button> <button class="delete btn btn_delete"value="'.$row["id"].'"><i class="ri-delete-bin-6-line"></i></button></div>';
                return $actionBtn;
            })
            ->rawColumns(['action'])
            ->make(true);
        }
        $ListDept['dept'] = Department::select('id','name')->get();
        $ListBranch['branch'] = Branch::select('id','branch_name')->get();

        return view('StaffMaster',$ListDept, $ListBranch);  
    }
}
