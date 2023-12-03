<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use App\Http\Resources\DoctorConsultationResource;
use App\Models\DoctorConsultation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class DoctorConsultationController extends BaseController
{
    public function update(Request $request)
    {
        $input = $request->all();
        $rowsToUpdate = $input['rows']; // Assuming the rows data is passed as 'rows' in the request

        $validator = Validator::make($rowsToUpdate, [
            '*.id' => ['required'],
            '*.doctor_id' => ['required'],
            '*.op_consultation_fees' => ['required'],
            '*.ip_consultation_fees' => ['required'],
            '*.op_no_fee_days' => ['required'],
            '*.ip_no_fee_days' => ['required'],
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error', $validator->errors());
        }

        foreach ($rowsToUpdate as $rowData) {
            $id = $rowData['id'];
            $doctconfees = DoctorConsultation::find($id);

            $CheckExists = DoctorConsultation::where('doctor_id', $rowData['doctor_id'])
                ->where('id', '<>', $id)
                ->exists();

            if ($CheckExists) {
                return $this->sendResponse("doctconfees", 'Exists', '0', 'Record Already Exists');
            }

            $doctconfees->doctor_id = $rowData['doctor_id'];
            $doctconfees->op_consultation_fees = $rowData['op_consultation_fees'];
            $doctconfees->ip_consultation_fees = $rowData['ip_consultation_fees'];
            $doctconfees->op_no_fee_days = $rowData['op_no_fee_days'];
            $doctconfees->ip_no_fee_days = $rowData['ip_no_fee_days'];

            $doctconfees->save();
        }

        return $this->sendResponse("doctconfees", null, '1', 'Records updated successfully.');
    }

}
