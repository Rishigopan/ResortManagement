<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use App\Models\Doctor;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;

class TokenController extends Controller
{
    public function tokens(Request $request) {

        $ListDoct['doct'] = Doctor::select('id','name')->get();


        return view('TokenMaster',$ListDoct); 
    }

}
