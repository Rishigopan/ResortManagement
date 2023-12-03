<?php

namespace App\Http\Controllers;
use App\Models\Branch;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    public function branchtable(Request $request) {

        if ($request->ajax()) {
            $data = Branch::select( 'id','branch_name','code','permanent_address','permanent_mobile_no',
                            'permanent_lan_line_no','permanent_email','permanent_post_office',
                            'permanent_lan_mark','communication_address','communication_mobile_no',
                            'communication_lan_line_no','communication_email','communication_post_office',
                            'communication_lan_mark','gst_no','pan_no','website','country','state','location',
                            'headding','subheading')->orderBy('id', 'desc')
                            ->get();
            return Datatables::of($data)->addIndexColumn()
            ->addColumn('action', function($row){
                $actionBtn = "<div class='text-center px-0  actions text-nowrap'><a class='edit btn update_hover me-2' href='branchEdit/".$row["id"]."'><i class='ri-pencil-line'></i></a> <button class='delete btn btn_delete' value=".$row["id"]."><i class='ri-delete-bin-6-line'></i></button></div>";
            return $actionBtn;
            })
            ->rawColumns(['action'])
            ->make(true);
        }
        return view('BranchTable');      
        
    }

    public function BranchEdit(Request $request , $id) {
      
        $branch = Branch::find($id);
        return view('BranchEdit', compact('branch'));      
        
    }
}
