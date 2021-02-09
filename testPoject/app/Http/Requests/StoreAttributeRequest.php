<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAttributeRequest extends FormRequest
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
        'name' => 'required|string|max:256',
        'company' => 'required|string|max:256',
        'representative_name' => 'required|string|max:256',
        'nr_telephone_representative' => 'required|alpha_num|max:10',
        'validity_start_date' => 'required|date',
        'expiration_date' => 'required|date',
        ];
    }
}
