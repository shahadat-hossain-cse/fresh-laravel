<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\Student;

class TestController extends Controller
{
    function get_students()
    {
        $students = DB::select("SELECT * FROM `students`");
        return response()->json($students);
    }
}
