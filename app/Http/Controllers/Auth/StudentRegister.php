<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStudentRequest;
use App\Models\Students;

class StudentRegister extends Controller
{
    public function register()
    {
        return view('auth.studentRegister');
    }
    public function store(StoreStudentRequest $request)
    { 
        Students::create($request->all());

        return redirect()->route('student.register')
            ->with('success', 'Student registered successfully.');
    }
}
