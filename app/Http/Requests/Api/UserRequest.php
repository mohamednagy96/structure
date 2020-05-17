<?php

namespace App\Http\Requests\Api;

use App\Http\Requests\BaseFormRequest;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends BaseFormRequest
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
        $id=auth()->user()->id;
        return [
            'first_name' => 'required',
            'middle_name'=>"required",
            'last_name' => 'required',
            'mobile'=>'required',
            'email'=>"required|email|unique:users,email,{$id}",
            'password' => 'nullable|min:8',
            // 'is_active' => 'required'
        ];
    }
}
