<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreIPCasesheetRequest extends FormRequest
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
            'date' => ['required', 'max:100'],
            'ip_no_id' => ['required', 'max:100'],
            'consultation_id' => ['nullable', 'max:50'],
            'morning_session' => ['nullable', 'max:50'],
            'afternoon_session' => ['nullable', 'max:50'],
            'vital_dates' => ['nullable','max:500'],
        ];
    }
}
