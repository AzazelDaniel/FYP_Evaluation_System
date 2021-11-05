<?php

namespace App\Http\Controllers\Lecturer;

use App\Http\Controllers\Controller;
use App\Http\Requests\Examiner1EvaluateRequest;
use Illuminate\Http\Request;
use App\Models\Students;

class Examiner1Controller extends Controller
{
    public function index()
    {
        $id = auth()->user()->id;

        $students = Students::orderBy('no_matrix', 'asc')->where('examiner1','=', $id)->where('isEvaluated','=', 0)->paginate(7);
        
        return view('lecturer.examiner1', compact('students'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Students $student)
    {

        return view('lecturer.Examiner1Evaluate', compact('student'));
  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Examiner1EvaluateRequest  $request
     * @param  \App\Models\Students  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Examiner1EvaluateRequest $request, Students $student)
    {

        $student->update($request->all());
        $student->total_mark;
        $student->save();

        return redirect()->route('lecturer.examiner1.index')
            ->with('success', 'Student successfully evaluated.');
    }
}
