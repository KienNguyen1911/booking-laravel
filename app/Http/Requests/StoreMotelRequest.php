<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMotelRequest extends FormRequest
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
            // 'name' => 'required| min: 5 | max: 255 | string',
            // 'address' => 'required | min: 5 | max: 255 | string',
            // 'province_id' => 'required | numeric',
            // 'district_id' => 'required | numeric',
            // 'ward_id' => 'required | numeric',
            // 'price' => 'required | numeric',
            // 'acreage' => 'required | numeric',
            // 'description' => 'required ',
            // 'attr' => 'required | array',
            // 'attr.*' => 'required | numeric',
        ];
    }
}
