<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LessonsController extends Controller
{
    public function show(Request $request){

        if($request->input('lesson') === 'previous'){
            return view('admin.lessons',[
                'previous_lessons' => $this->getPreviousLessons(),
            ]);
        }

        if($request->input('lesson') === 'next'){
            return view('admin.lessons',[
                'next_lessons' => $this->getNextLessons(),
            ]);
        }

    }

    //@return arr
    public function getPreviousLessons(){
        $previous_lessons = 1;
        return $previous_lessons;
    }

    //@return arr
    public function getNextLessons(){
        $next_lessons = 1;
        return $next_lessons;
    }
}
