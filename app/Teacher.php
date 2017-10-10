<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = [
        'id'
    ];

    public function lessons()
    {
        return $this->hasMany('App\Lesson','teacher_id', 'id');
    }

    public function user()
    {
        return $this->hasOne('App\User');
    }
    public function payout(){
        return $this->hasOne('App\Payout');
    }
}
