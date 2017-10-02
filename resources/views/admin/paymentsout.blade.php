@extends('layouts.admin')
@section('pop-up')
    <div class="paymentsoutAddpaymentout">
        <div class="ucenikiAddpupilWindow">
            <div class="paymentsoutAddpaymentoutCross"></div>
            <span class="ucenikiAddpupilTitle">ДОБАВИТЬ ВЫПЛАТУ</span>
            <hr width="70" style="margin-bottom:25px;">
            <form action="" class="ucenikiAddpupilForm">
                <div class="paymentsoutAddpaymentoutSelect">
                    <div class="paymentsoutAddpaymentoutSelectText">
                        <div class="urokiAvatar" style="background-image:url(../../../public/img/noAvatar.png);"></div><span style="margin-left:10px;">Имя</span>
                    </div>
                    <div class="paymentsoutAddpaymentoutSelectImage"></div>
                    <div class="paymentsoutAddpaymentoutSelectList">
                        <div class="paymentsoutAddpaymentoutSelectOption">
                            <div class="urokiAvatar" style="background-image:url(../../../public/img/noAvatar.png);"></div><span style="margin-left:10px;">Алёна</span>
                        </div>
                        <div class="paymentsoutAddpaymentoutSelectOption">
                            <div class="urokiAvatar" style="background-image:url(../../../public/img/noAvatar.png);"></div><span style="margin-left:10px;">Катя</span>
                        </div>
                        <div class="paymentsoutAddpaymentoutSelectOption">
                            <div class="urokiAvatar" style="background-image:url(../../../public/img/noAvatar.png);"></div><span style="margin-left:10px;">Даша</span>
                        </div>
                        <div class="paymentsoutAddpaymentoutSelectOption">
                            <div class="urokiAvatar" style="background-image:url(../../../public/img/noAvatar.png);"></div><span style="margin-left:10px;">Имя</span>
                        </div>
                        <div class="paymentsoutAddpaymentoutSelectOption">
                            <div class="urokiAvatar" style="background-image:url(../../../public/img/noAvatar.png);"></div><span style="margin-left:10px;">Имя</span>
                        </div>
                        <div class="paymentsoutAddpaymentoutSelectOption">
                            <div class="urokiAvatar" style="background-image:url(../../../public/img/noAvatar.png);"></div><span style="margin-left:10px;">Имя</span>
                        </div>
                        <div class="paymentsoutAddpaymentoutSelectOption">
                            <div class="urokiAvatar" style="background-image:url(../../../public/img/noAvatar.png);"></div><span style="margin-left:10px;">Имя</span>
                        </div>
                        <div class="paymentsoutAddpaymentoutSelectOption">
                            <div class="urokiAvatar" style="background-image:url(../../../public/img/noAvatar.png);"></div><span style="margin-left:10px;">Имя</span>
                        </div>
                    </div>
                </div>
                <input name="name" type="text" style="width:85%; height:60px; margin-bottom:20px;" placeholder="Сумма">
                <button type="submit" style="width:85%; margin:0px; margin-bottom:20px; padding:15px 0px;">ПРИНЯТЬ</button>
            </form>
        </div>
    </div>
    @endsection
@section('content')

    <div class="urokiMain">
        <div></div>
        <button id="addpaymentoutButton" style="margin:0; margin-bottom:20px;">ДОБАВИТЬ</button>
        <div class="urokiTable">
            <div class="urokiHead">
                <div class="urokiTitle">ПРЕПОДАВАТЕЛЬ<div class="paymentsoutArrow"></div></div>
                <div class="urokiTitle">СТРАНА<div class="paymentsoutArrow"></div></div>
                <div class="urokiTitle">E-MAIL<div class="paymentsoutArrow"></div></div>
                <div class="urokiTitle">СУММА, Р<div class="paymentsoutArrow"></div></div>
                <div class="urokiTitle">СТАТУС<div class="paymentsoutArrow"></div></div>
            </div>
            <div class="urokiContent">
                <div class="urokiString">
                    <div class="urokiCell"><div class="urokiAvatar" style="background-image:url(../../../public/img/noAvatar.png);"></div><div class="urokiName">Имя</div></div>
                    <div class="urokiCell">Россия</div>
                    <div class="urokiCell">pocta1234567890@mail.ru</div>
                    <div class="urokiCell">10000</div>
                    <div class="urokiCell"><select class="paymentsoutSelect">
                            <option class="paymentsoutOption" style="color:#2ec47a;">Выплачено</option>
                            <option class="paymentsoutOption" style="color:#e87e04;">Запрос</option>
                        </select></div>
                </div>
            </div>
        </div>
    </div>

@endsection