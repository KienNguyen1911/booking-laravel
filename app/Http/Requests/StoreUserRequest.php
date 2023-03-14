<?php

namespace App\Http\Requests;

use Dotenv\Validator as DotenvValidator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

class StoreUserRequest extends FormRequest
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
            'name' => 'required | min:3 | max:50',
            'email' => 'required | email | unique:users',
            'password' => 'required | min:6 | max:50',
            're_password' => 'required | same:password',
            'role' => 'required ',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Name is required',
            'name.min' => 'Name must be at least 3 characters',
            'name.max' => 'Name must be at most 50 characters',
            'email.required' => 'Email is required',
            'email.email' => 'Email is invalid',
            'email.unique' => 'Email is already taken',
            'password.required' => 'Password is required',
            'password.min' => 'Password must be at least 6 characters',
            'password.max' => 'Password must be at most 50 characters',
            're_password.required' => 'Re-password is required',
            're_password.same' => 'Re-password must be the same as password',
            'role.required' => 'Role is required',
            'role.in' => 'Role is invalid',
        ];
    }

    public function store(StoreUserRequest $request)
    {
        // dd($request->all());
        // $validated = $request->validated();
        $validated = $request->safe()->only('name');

        return redirect()->route('register.store', $validated)->with('success', 'Register successfully');
    }

    public function withValidator(Validator $validator): void
    {
        $validator->after(function (Validator $validator) {
            if ($validator->errors()->isNotEmpty()) {
                $validator->errors()->add('field', 'Something is wrong with this field!');
                // dd($validator);
            }
        });
    }
}
