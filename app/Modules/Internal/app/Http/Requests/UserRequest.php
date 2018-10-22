<?php

namespace App\Modules\Internal\app\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        if ($this->method() === 'POST') {
            return [
                'name' => 'required',
                'email' => 'required|unique:users',
                'role_id' => 'required_if:type,internal',
                'password' => 'required|confirmed',
            ];
        } elseif ($this->method() === 'PUT') {
            return [
                'name' => 'required',
                'role_id' => 'required_if:type,internal'
            ];
        }
    }
}