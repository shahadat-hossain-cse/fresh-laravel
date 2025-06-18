<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\Student;
class StudentController extends Controller
{
    function get_students()
    {
        $students = DB::select("SELECT * FROM `students`");
        return response()->json($students);
    }

    function get_student_by_id($id=0)
    {
        $student = Student::find($id);
        if(!empty($student))
        {
            return response()->json($student, 200);
        }
        else{
            return response()->json($student, 404);
        }
        
    }
    function add(Request $request)
    {
        $validator = Validator::make(request()->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:students',
            'std_id' => 'required|unique:students',
        ]);
        if($validator->fails())
        {
            return response()->json($validator->messages()->toArray(), 400);
        }
        $student = new Student();        
        $student->std_id = $request->std_id;
        $student->first_name = $request->first_name;
        $student->last_name = $request->last_name;
        $student->email = $request->email;
        if($student->save())
        {
            return response()->json(["message"=>"success"], 200); 
        }
        else
        {
            return response()->json(["message"=>"fail"], 400); 
        }
    }
}
