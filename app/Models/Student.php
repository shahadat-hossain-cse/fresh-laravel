<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'students';
    public $timestamps = false; // in order to skip timestamp

    public function full_name(){
        //return "Hello Name";
        return $this->first_name." ".$this->last_name;
    }
}
