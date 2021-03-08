<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderFormRequest extends FormRequest
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
            'name' => 'bail|required|string|min:3|max:20',
            'surname' => 'bail|required|string|min:3|max:20',
            'phone' => 'bail|required|string|min:2|max:20',
            'address' => 'bail|required|string|min:2|max:100',
            'information' => 'bail|nullable|string|max:200',
            'email' => 'bail|required|string|min:3|max:50'

        ];
    }
}
