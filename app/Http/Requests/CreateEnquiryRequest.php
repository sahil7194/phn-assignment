<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateEnquiryRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'email_id' => 'required|email',
            'mobile_number' => 'required|unique:enquiries,mobile_number|max:10|min:10',
            'district_id' => 'required',
            'state_id' => 'required',
            'g-recaptcha-response' => 'required|captcha'

        ];
    }
}
