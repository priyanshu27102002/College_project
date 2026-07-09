<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Studentnosql extends Model
{
    protected $connection = 'mongodb';  // use MongoDB connection
    protected $collection = 'student'; // collection name in MongoDB

    protected $guarded = [];
}
