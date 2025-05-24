<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function test()
    {
        echo "got it";

        return view("test");
    }
    public function service($id, $cat_id=0)
    {
       // echo "got it ".$id." ".$cat_id;
        $arr = array(
            "username"=>"shahadat",
            "contact"=>"01797550269"
        );

        $arr2 = array(0,1,2,3,4,5);

       return view('service',["arr"=>$arr2,"data"=>$arr,"id"=>$id, "cat"=>$cat_id]);
    }
}
