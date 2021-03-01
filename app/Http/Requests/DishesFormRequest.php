<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DishesFormRequest extends FormRequest
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
          'ingredients' => 'bail|required|string|min:2|max:100',
          'description' => 'bail|nullable|string|min:2|max:200',
          'create_dish_image' => 'bail|required|mimetypes:image/jpeg,image/png|max:4096',
          'price' => 'bail|required|numeric|between:0,9999.99',
          'type' => 'bail|required'
        ];
    }
}
