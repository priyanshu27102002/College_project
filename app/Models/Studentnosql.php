<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent; 

class Studentnosql extends Eloquent
{
    protected $connection = 'college_project';  // use MongoDB connection
    protected $collection = 'students'; // collection name in MongoDB

    protected $fillable = [
        'fname',
        'lname',
        'email',
        'Locality',
        'address',
        'State',
        'City',
        'dob',
        'gender',
        'phone',
        'exam',
        'studentschoolname',
        'studentboard',
        'studentclass10marks',
        'student12schoolname',
        'studentboard12',
        'studentclass12marks',
    ];
}
