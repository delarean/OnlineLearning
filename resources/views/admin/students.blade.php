@extends('layouts.admin')
@section('content')
    <div class="ucenikiMain">
        <div class="ucenikiSearch">
            <input style="width:100%; padding-right:50px;" placeholder="Поиск...">
            <div class="ucenikiSearchButton"></div>
        </div>
        <button id="addpupilButton" style="margin:0px; margin-bottom:30px;">ДОБАВИТЬ</button>
        <div class="urokiTable">
            <div class="urokiHead">
                <div class="urokiTitle">УЧЕНИК</div>
                <div class="urokiTitle">КУРС</div>
                <div class="urokiTitle">E-MAIL</div>
                <div class="urokiTitle">ОСТАЛОСЬ УРОКОВ</div>
            </div>
            <div class="ucenikiPretable">
                <div class="ucenikiPretitle">
                    <div class="ucenikiImage" style="background-image:url(../../../public/img/profile/russia.png);"></div>
                    <div class="ucenikiImage" style="background-image:url(../../../public/img/profile/angliya.png);"></div>
                </div>
            </div>
            <div class="urokiContent">
                <div class="urokiString">
                    <div class="urokiCell">
                        <a href="pupil.html"><div class="urokiAvatar" style="background-image:url(../../../public/img/noAvatar.png);"></div></a>
                        <a href="pupil.html"><div class="urokiName">Имя</div></a>
                    </div>
                    <div class="urokiCell">Базовый английский</div>
                    <div class="urokiCell">pocta1234567890@mail.ru</div>
                    <div class="urokiCell"><span style="width:50%;">0</span><span style="width:50%;">0</span></div>
                </div>
                <div class="urokiString">
                    <div class="urokiCell">
                        <a href="pupil.html"><div class="urokiAvatar" style="background-image:url(../../../public/img/noAvatar.png);"></div></a>
                        <a href="pupil.html"><div class="urokiName">Имя</div></a>
                    </div>
                    <div class="urokiCell">Базовый английский</div>
                    <div class="urokiCell">pocta1234567890@mail.ru</div>
                    <div class="urokiCell"><span style="width:50%;">0</span><span style="width:50%;">0</span></div>
                </div>
                <div class="urokiString">
                    <div class="urokiCell">
                        <a href="pupil.html"><div class="urokiAvatar" style="background-image:url(../../../public/img/noAvatar.png);"></div></a>
                        <a href="pupil.html"><div class="urokiName">Имя</div></a>
                    </div>
                    <div class="urokiCell">Базовый английский</div>
                    <div class="urokiCell">pocta1234567890@mail.ru</div>
                    <div class="urokiCell"><span style="width:50%;">0</span><span style="width:50%;">0</span></div>
                </div>
            </div>
        </div>
    </div>
    @endsection