<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\User;
use App\Models\Students;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Students::orderBy('id', 'asc')->paginate(25);
        return view('admin.listStudent', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.registerStudent');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStudentRequest $request)
    { 
        Students::create($request->all());

        return redirect()->route('admin.students.index')
            ->with('success', 'Student added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Students $student)
    {
        $lecturers = User::pluck('name', 'id')->where('id','!=', 1);

        return view('admin.updateStudent', compact('lecturers', 'student'));
  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStudentRequest  $request
     * @param  \App\Models\Students  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStudentRequest $request, Students $student)
    {
        $student->update($request->all());
        $student->total_mark;
        $student->save();

        return redirect()->route('admin.students.index')
            ->with('success', 'Student updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($student)
    {
        $student=Students::findOrFail($student);
        $student->delete();

        return response()->json(['status'=>'Student deleted successfully']);
        
    }
    /**
     * Change the status of specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function changeStatus(Request $request)
    {
        $student = Students::find($request->student_id);
        $student->isEvaluated = $request->isEvaluated;
        $student->save();
  
        return response()->json(['success'=>'Status changed successfully.']);
    }
}
