<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        return redirect(url('')."/student/list");
    }
    
    public function edit($id)
    {
       //echo $id;
       $student = Student::find($id);
    //    echo $student->first_name;
    //    echo $student->full_name();
    //     //     echo "<pre>";
        return view('student.edit', ["student" => $student]);
       
    }

    public function update(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'std_id' => 'required',
        ]);
        
        //return $request;

        $student = Student::find($request->id);
        
        $student->std_id = $request->std_id;
        $student->first_name = $request->first_name;
        $student->last_name = $request->last_name;
        $student->email = $request->email;

        //var_dump($student);
        $student->save();

        return redirect(url('')."/student/list");
    }



    public function student_list()
    {
        //echo "Got it";
        $student = Student::find(1);
       // echo $student->first_name;
        // echo "<br>";
        // echo $student->full_name();
        //$students = Student::all();
        $students = DB::select("SELECT *, concat(first_name,' ',last_name) as 'full_name' FROM `students`");
        // echo "<pre>";
        // print_r($students);

        return view('student.list', ["students" => $students]);
    }

    public function delete($id)
    {
       //echo $id;
       DB::table("students")->where('id',$id)->delete();
       //forceDelete()
       return redirect(url('')."/student/list");
       
    }
    public function view($id)
    {
       $student = Student::find($id);
       return view('student.view', ["student" => $student]);
       
    }

    public function remove(Request $req)
    {
       //echo $id;
       DB::table("students")->where('id',$req->input('id'))->delete();
       //forceDelete()
       return redirect(url('')."/student/list");
       
    }

}
