@extends('layouts.admin')
@section('pop-up')
    @if ($errors->any())
        <div class="paymentsoutAddpaymentout">
            @else
                <div class="paymentsoutAddpaymentoutHidden">
                    @endif

        <div class="ucenikiAddpupilWindow">
            <div class="paymentsoutAddpaymentoutCross"></div>
            <span class="ucenikiAddpupilTitle">ДОБАВИТЬ ВЫПЛАТУ</span>
            <hr width="70" style="margin-bottom:25px;">
            <form action="" method="post" class="ucenikiAddpupilForm">
                {{csrf_field()}}
                <input name="teacher" id="selectedTeacher" type="hidden">
                <div class="paymentsoutAddpaymentoutSelect">
                    <div class="paymentsoutAddpaymentoutSelectText">
                        <span style="margin-left:10px;">Выберите учителя</span>
                    </div>
                    <div class="paymentsoutAddpaymentoutSelectImage"></div>
                    <div class="paymentsoutAddpaymentoutSelectList">
                        @isset($teachers)
                        @foreach($teachers as $teacher)
                        <div class="teacherSelectOption paymentsoutAddpaymentoutSelectOption">
                            <div class="urokiAvatar" style="background-image:url(../../../public/img/noAvatar.png);"></div>
                            <span class="valueSpan" id="{{$teacher['id']}}" style="margin-left:10px;">{{$teacher['name'].' '.$teacher['surname']}}</span>
                        </div>
                        @endforeach
                        @endisset
                    </div>
                </div>
                @if($errors->has('teacher'))
                    @foreach($errors->get('teacher') as $message)
                        <p>{{$message}}</p>
                    @endforeach
                @endif
                <input name="summ" value="{{old('summ')}}" type="text" style="width:85%; height:60px; margin-top: 10px; margin-bottom:10px;" placeholder="Сумма">
                @if($errors->has('summ'))
                    @foreach($errors->get('summ') as $message)
                        <p>{{$message}}</p>
                    @endforeach
                @endif
                <button type="submit" style="width:85%; margin:0px; margin-bottom:10px; margin-top: 10px; padding:15px 0px;">ПРИНЯТЬ</button>
            </form>
        </div>
    </div>
    @endsection
@section('content')

    <div class="urokiMain">
        <div></div>
        <button id="addpaymentoutButton" style="margin:0; margin-bottom:20px;">ДОБАВИТЬ</button>
        <div class="urokiTable">
            <form id="orderPayoutsForm" action="{{route('setOrder')}}" method="post">
                {{csrf_field()}}
            <div class="urokiHead">
                    <input type="hidden" name="name" value="0">
                <div class="urokiTitle">ПРЕПОДАВАТЕЛЬ
                    <div @if($orderBy == 'name')style="transform: rotate(180deg);" @endif class="paymentsoutArrow"></div>
                </div>
                    <input type="hidden" name="country" value="0">
                <div class="urokiTitle">СТРАНА
                    <div @if($orderBy == 'country')style="transform: rotate(180deg);" @endif class="paymentsoutArrow"></div>
                </div>
                        <input type="hidden" name="e-mail" value="0">
                <div class="urokiTitle">E-MAIL
                    <div @if($orderBy == 'e-mail')style="transform: rotate(180deg);" @endif class="paymentsoutArrow"></div>
                </div>
                            <input type="hidden" name="summ" value="0">
                <div class="urokiTitle">СУММА, Р
                    <div @if($orderBy == 'summ')style="transform: rotate(180deg);" @endif class="paymentsoutArrow"></div>
                </div>
                                <input type="hidden" name="status" value="0">
                <div class="urokiTitle">СТАТУС
                    <div @if($orderBy == 'status')style="transform: rotate(180deg);" @endif class="paymentsoutArrow"></div>
                </div>
            </div>
            </form>
            <div class="urokiContent">
                @isset($payments)
                @foreach($payments as $payment)
                <div class="urokiString">
                    <div class="urokiCell"><div class="urokiAvatar" style="background-image:url(../../../public/img/noAvatar.png);"></div><div class="urokiName">{{$payment['teacher_name']}}</div></div>
                    <div class="urokiCell">{{$payment['teacher_country']}}</div>
                    <div class="urokiCell">{{$payment['teacher_email']}}</div>
                    <div class="urokiCell">{{$payment['summ']}}</div>
                    <div class="urokiCell">
                        <form action="{{route('changePayoutsStatus')}}" method="post">
                            {{csrf_field()}}
                        <select class="payoutsSelect" name="status">
                            <option class="paymentsoutOption" style="color:#2ec47a;" value="{{$payment['id'].'|Выплачено'}}" @if($payment['status'] === 'Выплачено')selected @endif>Выплачено</option>
                            <option class="paymentsoutOption" style="color:#e87e04;" value="{{$payment['id'].'|Запрос'}}" @if($payment['status'] === 'Запрос')selected @endif>Запрос</option>
                        </select>
                        </form>
                    </div>
                </div>
                    @endforeach
                @endisset
            </div>
        </div>
    </div>

@endsection