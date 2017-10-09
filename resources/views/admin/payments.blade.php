@extends('layouts.admin')
@section('content')

    <div class="urokiMain">
        <div class="urokiTable">
            <div class="urokiHead">
                <div class="urokiTitle">ДАТА</div>
                <div class="urokiTitle">УЧЕНИК</div>
                <div class="urokiTitle">УРОКОВ</div>
                <div class="urokiTitle">СУММА, Р</div>
                <div class="urokiTitle">СТАТУС</div>
            </div>
            <div class="urokiContent">
                @isset($payments)
                @foreach($payments as $payment)

                    <div class="urokiString">
                        <div class="urokiCell">{{$payment['date']}}</div>
                        <div class="urokiCell"><div class="urokiAvatar" style="background-image:url(../../../public/img/noAvatar.png);"></div><div class="urokiName">{{$payment['student_name']}}</div></div>
                        <div class="urokiCell">
                            @if($payment['is_native'])
                                <div class="platejiAvatar" style="background-image:url(../../../public/img/profile/russia.png);">
                                </div><div style="margin-left:10px;">({{$payment['amount']}})</div></div>
                        @else
                            <div class="platejiAvatar" style="background-image:url(../../../public/img/profile/angliya.png);">
                            </div><div style="margin-left:10px;">({{$payment['amount']}})</div></div>
                    @endif

                    <div class="urokiCell">{{$payment['cost']}}</div>
                    <div class="urokiCell"><span style="color:#2ec47a;">{{$payment['status']}}</span></div>
            </div>
            @endforeach
            @endisset
            </div>
        </div>
    </div>

@endsection