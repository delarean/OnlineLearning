<?php

namespace App\Http\Controllers\Admin;

use App\Payout;
use App\Teacher;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PaymentsOutController extends Controller
{
    public function show(){

        $orderBy = NULL;

        if(session()->exists('orderBy')){
            $orderBy = session('orderBy');
        }

        return view('admin.paymentsout',[
         'payments' => $this->getPaymentsOut($orderBy),
            'orderBy' => $orderBy,
            'teachers' => $this->getTeachersNames(),
        ]);

    }

    public function getTeachersNames(){
        $teachers = Teacher::orderBy('surname')
        ->orderBy('name')
        ->get();

        $teacher_arr = [];
        foreach ($teachers as $teacher){

            $teacher_info = [];
            $teacher_info['id'] = $teacher->id;
            $teacher_info['name'] = $teacher->name;
            $teacher_info['surname'] = $teacher->surname;

            array_push($teacher_arr,$teacher_info);

        }

        return $teacher_arr;


    }

    public function getPaymentsOut($orderBy = NULL){

        $payouts = DB::table('payouts')
            ->join('Teachers','payouts.teacher_id','teachers.id')
            ->get();

        if(isset($orderBy) && !empty($orderBy)){

                $payouts = DB::table('payouts')
                        ->join('Teachers','payouts.teacher_id','teachers.id')
                        ->orderBy($orderBy)
                        ->get();

        }


        if($payouts->isEmpty()) return 'Неправильные данные для сортировки';
        $payouts_arr = [];

        foreach ($payouts as $payout){

            $payout_info = [];
            $payout = (array)$payout;

            $payout_info['summ'] = $payout['summ'];
            $payout_info['status'] = $payout['status'];
            $payout_info['id'] = $payout['id'];
            $payout_info['teacher_name'] = $payout['name'];
            $payout_info['teacher_country'] = $payout['country'];
            $payout_info['teacher_email'] = $payout['e-mail'];

            array_push($payouts_arr,$payout_info);


        }

        return $payouts_arr;

    }

    public function changeStatus(Request $request){

        if(!$request->exists('status') || !$request->filled('status')) return back();

        $payout_status = explode('|',$request->input('status'));
        if(empty($payout_status)) return back();
        $payout_id = $payout_status[0];
        $payout_status_name = $payout_status[1];

        $payout = Payout::find($payout_id);
        if(empty($payout)) return back();
        $payout->status = $payout_status_name;
        $payout->save();
        return back()->withInput();



    }

    public function addPayout(Request $request){

        $validator = Validator::make($request->all(), [
            'teacher' => 'required',
            'summ' => 'required',
        ]);

        if ($validator->fails()){

            return back()->withErrors($validator)
                ->withInput();

        }

        $teacher_id = $request->input('teacher');
        $payout_summ = $request->input('summ');

        $payouts = new Payout;
        $payouts->status = 'Выплачено';
        $payouts->summ = $payout_summ;
        $payouts->teacher_id = (int) $teacher_id;
        $payouts->save();

        return back();
    }

    public function setOrder(Request $request){

        $requests = $request->all();

            $validator = Validator::make($requests, [
                'name' => 'required',
                'summ' => 'required',
                'status' => 'required',
                'country' => 'required',
                'e-mail' => 'required',
            ]);

        if ($validator->fails()) return back();

        $orderBy = '';

        foreach ($requests as $orderByValue => $is_set) {

            if ($is_set === '1') {
                $orderBy = $orderByValue;
                break;
            }

        }


        return back()->with('orderBy',$orderBy);

    }


}
