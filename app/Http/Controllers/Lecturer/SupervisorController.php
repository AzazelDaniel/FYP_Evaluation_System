<?php

namespace App\Http\Controllers\Lecturer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\SupervisorEvaluateRequest;
use App\Models\Students;

class SupervisorController extends Controller
{
    public function index()
    {
        $id = auth()->user()->id;

        $students = Students::orderBy('id', 'asc')->where('supervisor','=', $id)->where('isEvaluated','=', 0)->paginate(7);
        
        return view('lecturer.supervisor', compact('students'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Students $student)
    {

        return view('lecturer.supervisorEvaluate', compact('student'));
  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\SupervisorEvaluateRequest  $request
     * @param  \App\Models\Students  $post
     * @return \Illuminate\Http\Response
     */
    public function update(SupervisorEvaluateRequest $request, Students $student)
    {

        $student->update($request->all());
        $student->total_mark;
        $student->save();

        return redirect()->route('lecturer.supervisor.index')
            ->with('success', 'Student successfully evaluated.');
    }
}
