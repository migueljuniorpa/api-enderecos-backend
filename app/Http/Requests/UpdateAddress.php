<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAddress extends FormRequest
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
            'id'           => 'required|integer',
            'zipcode'      => 'required|min:8|max:8',
            'state'        => 'required|min:2|max:2',
            'city'         => 'required|min:2|max:150',
            'neighborhood' => 'nullable|min:1|max:150',
            'street'       => 'nullable|min:1|max:150',
        ];
    }
}
