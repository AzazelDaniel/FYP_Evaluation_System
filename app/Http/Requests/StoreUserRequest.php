<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id_staff' => [
                'required','numeric', 'digits_between:4,4' , 'unique:users'
            ],
            'department' => [
                'required','string', 'max:100'
            ],
            'name' => [
                'required','string', 'min:6'
            ],
            'email' => [
                'required', 'email', 'unique:users'
            ],
            'password' => [
                $this->route()->user ? 'nullable' : 'required', 'confirmed', 'min:6'
            ]
        ];
    }
}
