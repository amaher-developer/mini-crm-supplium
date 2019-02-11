<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployRequest extends FormRequest
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
            'first_name_ar' => 'required',
            'first_name_en' => 'required',
            'last_name_ar' => 'required',
            'last_name_en' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'company_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'first_name_ar.required' => trans('global.error_first_name_ar'),
            'first_name_en.required' => trans('global.error_first_name_en'),
            'last_name_ar.required' => trans('global.error_last_name_ar'),
            'last_name_en.required' => trans('global.error_last_name_en'),
            'email.required' => trans('global.error_email'),
            'phone.required' => trans('global.error_phone'),
            'company_id.required' => trans('global.error_company'),
        ];
    }
}
