<?php

namespace App\Http\Controllers\Lecturer;

use App\Models\Students;
use App\Models\User;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $id_staff = auth()->user()->id_staff;

        $students = Students::orderBy('no_matrix', 'asc')->where('supervisor','=', $id_staff)->paginate(7);
        
        return view('lecturer.supervisor', compact('students'));
    }


}
