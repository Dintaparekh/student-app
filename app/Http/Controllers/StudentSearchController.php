<?php

namespace App\Http\Controllers;

class StudentSearchController extends Controller
{
    public function type(Request $request, $search = "") {
        $search = Input::get('Student');
        $student =  Student::search($search);
  
        return view ('my-search',compact($student));
      }
}
