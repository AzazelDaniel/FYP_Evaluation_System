<?php

namespace App\Http\Requests;

use App\Models\Students;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateStudentRequest extends FormRequest
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
            'no_matrix' => [
                'required','string', 'min:3' ,  Rule::unique('students')->ignore($this->student)
            ],
            'programme' => [
                'required','string', 'max:100'
            ],
            'code_subject' => [
                'required','string', 'max:100'
            ],
            'name' => [
                'required','string', 'min:10'
            ],
            'email' => [
                'required', 'email', Rule::unique('students')->ignore($this->student)
            ],
            'current_sem' => [
                'required', 
            ],
            'project_category' => [
                'required', 
            ],
            'project_title' => [
                'required', 
            ],
            'project_description' => [
                'required', 
            ],
            'supervisor' => [
                'integer','different:examiner1', 'different:examiner2'  
            ],
            'examiner1' => [
                'nullable','integer','different:supervisor', 'different:examiner2' 
            ],
            'examiner2' => [
                'nullable','integer','different:supervisor', 'different:examiner1'
            ],
            'supervisor_mark' => [
                'required','integer','between:0,60'
            ],
            'examiner1_mark' => [
                'required','integer','between:0,20'
            ],
            'examiner2_mark' => [
                'required','integer','between:0,20' 
            ]
        ];
    }
}
