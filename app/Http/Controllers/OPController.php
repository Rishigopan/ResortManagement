<?php

namespace App\Http\Controllers;
use App\Models\Op;
use App\Models\Branch;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class OPController extends Controller
{
    public function op(Request $request) {

        if ($request->ajax()) {
            $data = Op::select( 'id','op_no','name','age','gender','mobile_no','reg_no')->orderBy('id', 'desc')->get();
            return Datatables::of($data)->addIndexColumn()
            ->editColumn('gender', function ($row) {
                switch ($row->gender) {
                    case 1:
                        return 'Male';
                    case 2:
                        return 'Female';
                    case 3:
                        return 'Others';
                    default:
                        return '';
                }
            })
            ->addColumn('action', function($row){ 
                $actionBtn = '<div class="text-center actions text-nowrap"> <button class="view btn btn_view me-2" value="'.$row["id"].'"><i class="ri-eye-line"></i></button><button class="edit btn btn_edit me-2" value="'.$row["id"].'"><i class="ri-pencil-line"></i></button> <button class="delete btn btn_delete"value="'.$row["id"].'"><i class="ri-delete-bin-6-line"></i></button></div>';
                return $actionBtn;
            })
            ->rawColumns(['action'])
            ->make(true);
        }

        //View OP Number
        $count_op = DB::table('ops')->count();
        if ($count_op > 0) {
            $max_id = DB::table('ops')->max('id')+1;
        } else {
            $max_id = 1;
        }
        $max_op = "BNCOP/23/" . Str::padLeft($max_id, 4, '0');

        //View Registration Number
        $count_reg = DB::table('ops')->count();
        if ($count_reg > 0) {
            $max_reg_id = DB::table('ops')->max('id') + 1;
        } else {
            $max_reg_id = 1;
        }
        $max_reg = "BNC/REG/23/" . Str::padLeft($max_reg_id, 4, '0');


        $ListBranch['branch'] = Branch::select('id','branch_name')->get();

        return view('OpMaster', compact('max_op','max_reg'),$ListBranch);      
        
    }
}
