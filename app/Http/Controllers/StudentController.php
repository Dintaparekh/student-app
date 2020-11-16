<?php

namespace App\Http\Controllers;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::paginate(10);
        return view('Student.index',compact('students'));
    }

   
    public function create()
    {
        return view('Student.create');
    }

   
    public function store(Request $request)
    {
        // Validate the Field
        $this->validate($request,[
            'student_number'=>'required',
            'first_name'=>'required',
            'last_name'=>'required',
            'classroom'=>'required',
           
        ]);
        $student = new Student();
        $student->student_number=$request->student_number;
        $student->first_name=$request->first_name;
        $student->last_name=$request->last_name;
        $student->classroom=$request->classroom;
        $student->save();
        return redirect()->route('laravel-simple-crud.index')->with('message','New Student Created Successfull !');

    }

    
    public function show($id)
    {
        $student = Student::find($id);
        return view('Student.read',compact('student'));
    }

   
    public function edit($id)
    {
        $student = Student::find($id);
        return view('Student.edit',compact('student'));
    }

   
    public function update(Request $request, $id)
    {
        // Validate the Field
        $this->validate($request,[
            'student_number'=>'required',
            'first_name'=>'required',
            'last_name'=>'required',
            'classroom'=>'required',
        ]);
        $student = Student::find($id);
        $student->student_number=$request->student_number;
        $student->first_name=$request->first_name;
        $student->last_name=$request->last_name;
        $student->classroom=$request->classroom;
        $student->save();
        return redirect()->route('laravel-simple-crud.index')->with('message','Student Updated Successfull !');
    }

  
    public function destroy($id)
    {
        $student = Student::find($id)->delete();
        return back()->with('message','Student Deleted Successfull !');
    }

}
