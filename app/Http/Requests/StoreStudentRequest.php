<?php

namespace App\Http\Requests;

use App\Models\Students;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest
{   
    /**
    * Get the validation rules that apply to the request.
    ** @return array
    */
   public function rules()
   {
       return [
           'no_matrix' => [
               'required','string', 'min:3' , 'unique:students'
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
               'required', 'email', 'unique:students'
           ],
           'current_sem' => [
               'required', 
           ],
           'session' => [
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
           ]

       ];
   }
}