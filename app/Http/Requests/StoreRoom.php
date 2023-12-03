<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRoomTypeRequest extends FormRequest
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
            'room_no' => ['required', 'max:5'],
            'room_type_id' => ['required'],
            'floor_id' => ['required'],
            'rent_ac' => ['max:5'],
            'rent_non_ac' => ['max:5'],
        ];
    }
}
