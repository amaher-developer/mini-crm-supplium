<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
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
            'name_ar' => 'required',
            'name_en' => 'required',
            'logo' => 'required',
            'website' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name_ar.required' => trans('global.error_name_ar'),
            'name_en.required' => trans('global.error_name_en'),
            'logo.required' => trans('global.error_logo'),
            'website.required' => trans('global.error_website'),
        ];
    }
}
