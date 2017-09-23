<?php

namespace App\Http\Controllers;

use App\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    //@return arr
    public function getStudentPayments(){

        //Сюда складываем все нужные данные по платежам
        $payments = [];

       $payments_models = Auth::user()->student->payments()->orderBy('date')->get();

       foreach ($payments_models as $payment_model){
           //Промежуточный массив
           $current_payments = [];

           $course_model = $payment_model->course;

           $current_payments['date'] = $payment_model->date;
           $current_payments['status'] = $payment_model->status;
           $current_payments['amount'] = $course_model->amount;
           $current_payments['is_native'] = $course_model->is_native;
           $current_payments['cost'] = $course_model->cost;

           array_push($payments,$current_payments);

       }

       return $payments;

    }

    public function showStudentPayments(){

        return view('payments',[
            'payments' => $this->getStudentPayments(),
        ]);


    }
}
