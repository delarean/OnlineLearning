@foreach ($next_lessons as $next_lesson)
    <p>{{ $next_lesson->date.' '.$next_lesson->time }}</p>
@endforeach
@extends('layouts.main')
@section('content')
    <div class="urokiMain">
        <div class="urokiChoose">
            <div class="urokiChooseSelector"></div>
            <div class="urokiChooseCell">Предстоящие</div>
            <div class="urokiChooseCell">Прошедшие</div>
        </div>
        <div class="urokiLeft">
            Осталось уроков:
            <div class="urokiLeftCell"><div class="urokiLeftImage" style="background-image:url(../../public/img/profile/russia.png);"></div>5</div>
            <div class="urokiLeftCell"><div class="urokiLeftImage" style="background-image:url(../../public/img/profile/angliya.png);"></div>5</div>
        </div>
        <div class="urokiTable">
            <div class="urokiHead">
                <div class="urokiTitle">ДАТА</div>
                <div class="urokiTitle">ВРЕМЯ</div>
                <div class="urokiTitle">ПРЕПОДАВАТЕЛЬ</div>
                <div class="urokiTitle">СТАТУС</div>
            </div>
            <div class="urokiContent">
                <div class="urokiString">
                    <div class="urokiCell">01.01.2000</div>
                    <div class="urokiCell">20:00</div>
                    <div class="urokiCell"><div class="urokiAvatar" style="background-image:url(../../public/img/noAvatar.png);"></div><div class="urokiName">Имя</div></div>
                    <div class="urokiCell"><span style="color:green;">По расписанию</span></div>
                </div>
                <div class="urokiString">
                    <div class="urokiCell">01.01.2000</div>
                    <div class="urokiCell">20:00</div>
                    <div class="urokiCell"><div class="urokiAvatar" style="background-image:url(img/noavatar.png);"></div><div class="urokiName">Имя</div></div>
                    <div class="urokiCell"><span style="color:green;">По расписанию</span></div>
                </div>
                <div class="urokiString">
                    <div class="urokiCell">01.01.2000</div>
                    <div class="urokiCell">20:00</div>
                    <div class="urokiCell"><div class="urokiAvatar" style="background-image:url(img/noavatar.png);"></div><div class="urokiName">Имя</div></div>
                    <div class="urokiCell"><span style="color:green;">По расписанию</span></div>
                </div>
            </div>
        </div>
    </div>
    @endsection