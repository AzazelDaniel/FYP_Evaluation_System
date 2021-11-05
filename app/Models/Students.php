<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Students extends Model
{
    use HasFactory;

    public $table = 'students';
    
    protected $fillable = [
        'no_matrix',
        'programme',
        'code_subject',
        'name',
        'email',
        'current_sem',
        'session',
        'project_category',
        'project_title',
        'project_description',
        'supervisor',
        'examiner1',
        'examiner2',
        'supervisor_mark',
        'examiner1_mark',
        'examiner2_mark',
        'total_mark',
        'isEvaluated',
        'grade_fyp',
    ];

    protected static function boot() {
        parent::boot();
    
        static::saving(function($model){
            $model->total_mark = $model->supervisor_mark + $model->examiner1_mark + $model->examiner2_mark;
        }); 
    }
}
