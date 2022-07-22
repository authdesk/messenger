<?php

namespace App\Http\Requests\Admin\SuperAdmin;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class UpdateRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|email|unique:admins,email,'.Auth::guard('admin')->user()->id,
            'password' => 'nullable|min:8|confirmed',
           
        ];
    }
}
