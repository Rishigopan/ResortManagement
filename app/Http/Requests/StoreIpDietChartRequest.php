<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreIpDietChartRequest extends FormRequest
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
            'ip_no_id' => ['required', 'max:100'],
            'consultation_id' => ['required', 'max:100'],
            'date' => ['nullable', 'max:50'],
            'time' => ['nullable', 'max:50'],
            'diet_id' => ['nullable'],
        ];
    }
}
