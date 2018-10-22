<?php

namespace App\Modules\Internal\app\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'description' => 'required',
            'permissions' => 'required'
        ];
    }
}