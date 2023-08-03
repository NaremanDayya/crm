<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => ['required','string','max:255', function($attribute,$value ,$fail){
                if ($value == 'admin'){
                   return $fail('This :attribute value is forbidden!');
                }
           }],
            'last_name' => ['required','string','max:255', function($attribute,$value ,$fail){
            if ($value == 'admin'){
               return $fail('This :attribute value is forbidden!');
            }
       }],
           'city' => 'nullable|string|max:255',
           'country' => 'nullable|string|max:255',
           'phone_number' => 'required|string|max:255',

        ];
    }

    public function messages(): array
    {
        return [
            'required' => ' :attribute is important',
            'first_name.required' => 'please enter your :attribute',
            'last_name.required' => 'please enter your :attribute',
            'phone_number.max' => 'phone number should be 9 numbers!',
        ];
    }
}
