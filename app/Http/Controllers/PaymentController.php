<?php

namespace App\Http\Controllers;

use App\All_Course;
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

    public function sendStudentPayment(Request $request){


        $request->validate([
            'id' => 'required',
        ]);

        $course_id = $request->input('id');

        $course = [];

        $course_model = All_Course::where('id',$course_id)->first();


        $course_amount =$course_model->amount;

        //return 'Всё норм';

        $lessons_str = $course_amount === 2 ? 'урока c ' : 'уроков c ';
        $teacher_type = $course_model->is_native ? 'носителем языка' : 'русскоязычным преподавателем';
        $description = $course_amount.' '.$lessons_str.' '.$teacher_type;


        $course['LMI_PAYMENT_AMOUNT'] = $course_model->cost;
        $course['LMI_CURRENCY'] = 'RUB';
        $course['LMI_MERCHANT_ID'] = env('LMI_MERCHANT_ID', false);
        $course['LMI_PAYMENT_DESC'] = $description;
        //$course['LMI_SIM_MODE'] = 1;

        return json_encode($course);

    }

    public function successPayment(){
        return view('payments');
    }

    public function failurePayment(){
        return view('buylessons');
    }
}
