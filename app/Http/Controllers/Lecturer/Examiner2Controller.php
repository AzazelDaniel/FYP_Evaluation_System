<?php

namespace App\Http\Controllers\Lecturer;

use App\Http\Controllers\Controller;
use App\Http\Requests\Examiner2EvaluateRequest;
use Illuminate\Http\Request;
use App\Models\Students;

class Examiner2Controller extends Controller
{
    public function index()
    {
        $id = auth()->user()->id;

        $students = Students::orderBy('no_matrix', 'asc')->where('examiner2','=', $id)->where('isEvaluated','=', 0)->paginate(7);
        
        return view('lecturer.examiner2', compact('students'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Students $student)
    {

        return view('lecturer.Examiner2Evaluate', compact('student'));
  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Examiner2EvaluateRequest  $request
     * @param  \App\Models\Students  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Examiner2EvaluateRequest $request, Students $student)
    {

        $student->update($request->all());
        $student->total_mark;
        $student->save();

        return redirect()->route('lecturer.examiner2.index')
            ->with('success', 'Student successfully evaluated.');
    }
}
