<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAttrRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            //
            'name' => 'required|string|max:255|unique:attrs' . $this->id,
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Attribute name is required',
            'name.unique' => 'Attribute name already exists',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Attribute name',
        ];
    }
}
