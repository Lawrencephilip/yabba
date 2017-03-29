<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HostelRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'hostelName' => 'required|unique:hostel',
            'caretakerName' => 'required',
            'location' => 'required',
            'image_url' => 'required'
        ];
    }
}
