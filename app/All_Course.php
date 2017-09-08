<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class All_Course extends Model
{
    protected $fillable = ['name','amount','is_native','cost'];

    protected $table = 'All_Courses';
}
