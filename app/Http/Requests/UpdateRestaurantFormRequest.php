<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRestaurantFormRequest extends FormRequest
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
            'name' => 'bail|required|string|min:2|max:30',
            'address' => 'bail|required|string|min:2|max:100',
            'phone' => 'bail|required|string|min:2|max:20',
            'logo' => 'bail|mimetypes:image/jpeg,image/png|max:2048',
            'open' => '',
            'categories' => 'bail|required|max:3'
        ];
    }
}
