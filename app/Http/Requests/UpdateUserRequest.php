<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
                'required','numeric', 'digits_between:4,4' , Rule::unique('users')->ignore($this->lecturer)
            ],
            'department' => [
                'required','string', 'max:100'
            ],
            'name' => [
                'required','string', 'min:6'
            ]
        ];
    }
}
