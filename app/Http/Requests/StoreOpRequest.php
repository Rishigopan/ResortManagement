<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOpRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'reg_no' => ['nullable'],
            'op_no' => ['nullable'],
            'op_date' => ['required'],
            'name' => ['required', 'max:50'],
            'age' => ['required'],
            'gender' => ['required'],
            'full_address' => ['max:500'],
            'phone_no' => ['max:15'],
            'mobile_no' => ['required', 'max:15'],
            'occupation' => ['max:100'],
            'marital_status' => ['nullable'],
            'local_address' => ['max:500'],
            'email' => ['max:100'],
            'branch_id' => 'nullable',
        ];
    }
}
