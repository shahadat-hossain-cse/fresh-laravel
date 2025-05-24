<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
class FormController extends Controller
{
    public function create()
    {
        //echo "got it";
        return view("form.create");
    }
    public function save(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'std_id' => 'required',
        ]);
        echo $request->first_name;
        echo "<br>";
        echo $request->last_name;
        echo "<br>";
        echo $request->email;
        echo "<br>";
        echo $request->std_id;
        //return $request;

        $student = new Student();
        
        $student->std_id = $request->std_id;
        $student->first_name = $request->first_name;
        $student->last_name = $request->last_name;
        $student->email = $request->email;

        //var_dump($student);
        $student->save();
    }

    public function edit($id)
    {
       //echo $id;
    //    $student = Student::find($id);
    //    echo $student->first_name;
    //    echo $student->full_name();
    //     echo "<pre>";
       $students = Student::all();
       //print_r($students);
       return view('edit',["students"=>$students]);
    //    echo "<pre>";
    //    print_r($student);
        // $student->first_name = "Shahadat";
        // $student->last_name = "Hossain";
        // $student->save();
    }
}
