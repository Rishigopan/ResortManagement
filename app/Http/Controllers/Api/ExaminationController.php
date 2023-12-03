<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use App\Http\Resources\ExaminationResource;
use App\Models\Examination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ExaminationController extends BaseController
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

        $examinations = Examination::all();

        return $this->sendResponse("examinations", ExaminationResource::collection($examinations),'1', 'Record retrieved successfully.');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            $input = $request->all();

            $validator = Validator::make($input, [
                'name' => ['required', 'string', 'max:255'],
                'field_name' => ['required', 'string', 'max:255'],
            ]);

            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }

            DB::table('examinations')->insertGetId([
                'name' => $input['name'],
                'field_name' => $input['field_name'],
                'remarks' => $input['remarks'],
            ]);

            $id = DB::table('examinations')->insertGetId($input);

            DB::commit();
        } catch (exception $e) {
            DB::rollback();
        }

        return $this->sendResponse("examination_id", $id, 'Record created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Examination  $Examination
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $examination = Examination::find($id);

        if (is_null($examination)) {
            return $this->sendError('Record not found.');
        }

        return $this->sendResponse("examinations", $examination, 'Record retrieved successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Examination  $Examination
     * @return \Illuminate\Http\Response
     */
    public function edit(Examination $Examination)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Examination  $Examination
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $input = $request->all();

            $validator = Validator::make($input, [
                'name' => ['required', 'string', 'max:255'],
                'field_name' => ['required', 'string', 'max:255'],
            ]);

            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }

            $affected = DB::table('examinations')->where('id', $id)->update([
                'name' => $input['name'],
                'field_name' => $input['name'],
                'remarks' => $input['remarks'],
            ]);

            DB::commit();
        } catch (exception $e) {
            DB::rollback();
        }

        return $this->sendResponse("updated_rows_count", $affected, 'Record updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Examination  $Examination
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            DB::beginTransaction();

            $deleted = DB::table('examinations')->where('id', '=', $id)->delete();

            DB::commit();
        } catch (exception $e) {
            DB::rollback();
        }

        return $this->sendResponse("deleted_rows_count", $deleted, 'Record deleted successfully.');
    }

    public function getExaminationsByHeader($headertext)
    {
       
        $examinations = DB::table('examinations')->where('header_text', $headertext)->get();
     

        if (is_null($examinations)) {
            return $this->sendError('Record not found.');
        }

        return $this->sendResponse("examinations", $examinations, 'Record retrieved successfully.');
    }
}
