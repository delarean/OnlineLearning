@extends('layouts.teacher')
@section('content')

    <div class="urokiMain">
        <div class="urokiTable">
            <div class="urokiHead">
                <div class="urokiTitle" style="width:33.3333%;">УЧЕНИК</div>
                <div class="urokiTitle" style="width:33.3333%;">КУРС</div>
                <div class="urokiTitle" style="width:33.3333%;">ОСТАЛОСЬ УРОКОВ</div>
            </div>
            <div class="urokiContent">
                <div class="urokiString">
                    <div class="urokiCell" style="width:33.3333%;"><div class="urokiAvatar" style="background-image:url(../../../public/img/noAvatar.png);"></div><div class="urokiName">Имя</div></div>
                    <div class="urokiCell" style="width:33.3333%;">Базовый английский</div>
                    <div class="urokiCell" style="width:33.3333%;">0</div>
                </div>
                <div class="urokiString">
                    <div class="urokiCell" style="width:33.3333%;"><div class="urokiAvatar" style="background-image:url(../../../public/img/noAvatar.png);"></div><div class="urokiName">Имя</div></div>
                    <div class="urokiCell" style="width:33.3333%;">Базовый английский</div>
                    <div class="urokiCell" style="width:33.3333%;">0</div>
                </div>
                <div class="urokiString">
                    <div class="urokiCell" style="width:33.3333%;"><div class="urokiAvatar" style="background-image:url(../../../public/img/noAvatar.png);"></div><div class="urokiName">Имя</div></div>
                    <div class="urokiCell" style="width:33.3333%;">Базовый английский</div>
                    <div class="urokiCell" style="width:33.3333%;">0</div>
                </div>
            </div>
        </div>
    </div>

@endsection