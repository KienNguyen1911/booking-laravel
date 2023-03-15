<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

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
            'name' => 'required | min:3 | max:50 | string',
            'price' => 'required | numeric | min:100000',
            'status' => 'required',
            'acreage' => 'required | numeric | min:10 | max:200',
            'province_id' => 'required ',
            'district_id' => 'required ',
            'ward_id' => 'required ',
            'address' => 'required | min:10 | max:100 | string',
            'description' => 'required | min:10 | max:1000 | string',
            'attribute' => 'required',
        ];
    }

    public function withValidator(Validator $validator)
    {
        $validator->after(function (Validator $validator) {
            if ($validator->errors()->isNotEmpty()) {
                // dd($validator->errors()->all());
                $validator->errors()->add('field', 'Something is wrong with this field!');
            }
        });
    }
}
