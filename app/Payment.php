<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'id',
    ];

    public function course(){
        return $this->belongsTo('App\All_Course','course_id','id');
    }

    public function student(){
        return $this->belongsTo('App\Student');
    }
}
