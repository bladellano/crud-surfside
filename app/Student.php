<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{

    public $rules = [
        'name' => 'required|min:3|max:100',
        'file' => 'required'
    ];
    
    protected $table = "students";
}
