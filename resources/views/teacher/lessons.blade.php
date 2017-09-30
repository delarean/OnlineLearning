@extends('layouts.teacher')
@section('content')

    <div class="urokiMain">
        <div class="urokiChoose">
            <div class="urokiChooseSelector"></div>
            <div class="urokiChooseCell">Предстоящие</div>
            <div class="urokiChooseCell">Прошедшие</div>
        </div>
        <div></div>
        <div class="urokiTable">
            <div class="urokiHead">
                <div class="urokiTitle">ДАТА</div>
                <div class="urokiTitle">ВРЕМЯ</div>
                <div class="urokiTitle">УЧЕНИК</div>
                <div class="urokiTitle">СТАТУС</div>
            </div>
            <div class="urokiContent">
                <div class="urokiString">
                    <div class="urokiCell">01.01.2000</div>
                    <div class="urokiCell">20:00</div>
                    <div class="urokiCell"><div class="urokiAvatar" style="background-image:url(../../../public/img/noAvatar.png);"></div><div class="urokiName">Имя</div></div>
                    <div class="urokiCell"><span style="color:green;">По расписанию</span></div>
                </div>
                <div class="urokiString">
                    <div class="urokiCell">01.01.2000</div>
                    <div class="urokiCell">20:00</div>
                    <div class="urokiCell"><div class="urokiAvatar" style="background-image:url(../../../public/img/noAvatar.png);"></div><div class="urokiName">Имя</div></div>
                    <div class="urokiCell"><span style="color:green;">По расписанию</span></div>
                </div>
                <div class="urokiString">
                    <div class="urokiCell">01.01.2000</div>
                    <div class="urokiCell">20:00</div>
                    <div class="urokiCell"><div class="urokiAvatar" style="background-image:url(../../../public/img/noAvatar.png);"></div><div class="urokiName">Имя</div></div>
                    <div class="urokiCell"><span style="color:green;">По расписанию</span></div>
                </div>
            </div>
        </div>
    </div>

@endsection