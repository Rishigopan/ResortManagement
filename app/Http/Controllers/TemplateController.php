<?php

namespace App\Http\Controllers;
use App\Models\Templates;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;

class TemplateController extends Controller
{
    public function Template(Request $request) {

        if ($request->ajax()) {
            $data = Templates::select( 'id','field_name','name')
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
        return view('TemplateMaster');      
        
    }

    
}
