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
                <div class="urokiTitle">ПРЕПОДАВАТЕЛЬ</div>
                <div class="urokiTitle">СТРАНА</div>
                <div class="urokiTitle">E-MAIL</div>
                <div class="urokiTitle">УЧЕНИКОВ</div>
            </div>
            <div class="urokiContent">
                <div class="urokiString">
                    <div class="urokiCell">
                        <a href="tutor.html"><div class="urokiAvatar" style="background-image:url(../../../public/img/noAvatar.png);"></div></a>
                        <a href="tutor.html"><div class="urokiName">Имя</div></a>
                    </div>
                    <div class="urokiCell">Россия</div>
                    <div class="urokiCell">pocta1234567890@mail.ru</div>
                    <div class="urokiCell"><a href="pupilsof.html" style="color:black; text-decoration:none;"><div class="tutorsNumber">0</div></a></div>
                </div>
            </div>
        </div>
    </div>

    @endsection