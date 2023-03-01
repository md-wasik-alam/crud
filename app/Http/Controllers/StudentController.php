<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request):View
    {
        $data['students']=Student::paginate(20);
        if($request->search != ""){
            $search=$request->search;
            $data['students']=Student::where("name","LIKE","%$search%")->paginate(20);
            
        }
        $data['studentCount']=Student::count();
        return view("home",$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create():View
    {
        return view("incert");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request):RedirectResponse
    {
        $data=$request->validate([
            'name'=>'required',
            'father_name'=>'required',
            'contact'=>'required|integer|digits:10|unique:App\Models\Student,contact',
            'email'=>'required|email|unique:App\Models\Student,email',
            'city'=>'required',
            'pincode'=>'required',
        ]);

        Student::create($data);
        return redirect()->route('student.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student):View
    {   
        $fetchData = $student;
        return view('edit',compact("fetchData"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student):RedirectResponse
    {
        $data=$request->validate([
            'name'=>'required',
            'father_name'=>'required',
            'contact'=>'required|integer|digits:10',
            'email'=>'required|email',
            'city'=>'required',
            'pincode'=>'required',
        ]);

        $student->update($data);
        return redirect()->route('student.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route("student.index");
    }
}
