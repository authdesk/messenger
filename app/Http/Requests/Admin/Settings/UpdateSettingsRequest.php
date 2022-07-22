<?php

namespace App\Http\Requests\Admin\Settings;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSettingsRequest extends FormRequest
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
            'Name' => 'required',
            'Email' => 'required',
            'Address' => 'string',
            'ContactNumber' => 'string',
            'About' => 'string',
            'Logo' => 'mimes:jpg,jpeg,png,tiff',
        ];
    }
}
