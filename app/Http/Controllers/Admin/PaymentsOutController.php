<?php

namespace App\Http\Controllers\Admin;

use App\Payment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaymentsOutController extends LessonsController
{
    public function show(){

        return view('admin.payments',[

        'payments' => $this->getPayments(),

        ]);

    }

    public function getPayments(){
        $payments = Payment::orderBy('date')
            ->get();

        $payments_arr = [];
        foreach ($payments as $payment){
            $payment_info = [];

            $payment_info['date'] = $this->setRusDateFormat($payment->date);
            $payment_info['student_name'] = $payment->student->name;
            $payment_info['status'] = $payment->status;

            $course_model = $payment->course;

            $payment_info['amount'] = $course_model->amount;
            $payment_info['is_native'] = $course_model->is_native;
            $payment_info['cost'] = $course_model->cost;

            array_push($payments_arr,$payment_info);

        }

        return $payments_arr;


    }

}
