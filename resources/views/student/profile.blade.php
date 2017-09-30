@extends('layouts.main')
@section('content')
    <div class="content">
        {{--{{'Данные  - '.json_decode($student_credentials)}}--}}
        <div class="profileAvatar"></div>
        <div class="profileText">
            <span class="profileName">{{Auth::user()->student->name.' '.Auth::user()->student->surname}} </span>
            <hr class="profileHr">
            <div class="profileString">
                <div class="profileImage" style="background-image:url(img/profile/datarojdeniya.png);"></div>
                <span style="color:#999999;padding-top: 5px;margin-bottom: 6px;">Дата рождения:&nbsp;<p class="inline_p">{{Auth::user()->student['birthday']}}</p></span>
            </div>
            <div class="profileString">
                <div class="profileImage" style="background-image:url(../../../public/img/profile/pocta.png);"></div>
                <span style="color:#999999;">Email:&nbsp;<p class="inline_p">{{Auth::user()->student['e-mail']}}</p></span>
            </div>
            <div class="profileString">
                <div class="profileImage" style="background-image:url(img/profile/telefon.png);"></div>
                <span style="color:#999999;margin-bottom: 5px;padding-top: 3px;">Телефон:&nbsp;<p class="inline_p">{{Auth::user()->student->telephone}}</p></span>
            </div>
            <div class="profileString">
                <div class="profileImage" style="background-image:url(img/profile/skype.png);"></div>
                <span style="color:#999999;padding-top: 3px;">Skype:&nbsp;<p class="inline_p">{{Auth::user()->student->skype}}</p></span>
            </div>
            <div class="profileString">
                <div class="profileImage" style="background-image:url(img/profile/strana.png);"></div>
                <span style="color:#999999;padding-top: 3px;">Страна:&nbsp;<p class="inline_p">{{Auth::user()->student->country}}</p></span>
            </div>
            <div class="profileString">
                <div class="profileImage" style="background-image:url(img/profile/zanyatiya.png);"></div>
                <span style="color:#999999;padding-top: 3px;">Занятия:&nbsp;<p class="inline_p">
  {{$first_lesson_time or 'Нет'}} {{$first_lesson_date or 'Уроков'}},  {{$second_lesson_time or 'Нет'}} {{$second_lesson_date or 'Уроков'}} (ПО МСК)
                    </p></span>
            </div>
            <div class="profileString">
                <div class="profileImage" style="background-image:url(../../../public/img/profile/kurs.png);"></div>
                <span style="color:#999999;padding-top: 3px;">Курс:&nbsp;<p class="inline_p">
                        {{$course_name or 'Нет курса'}}
                    </p></span>
            </div>
            <div class="profileString" style="margin-top: 8px;">
                <div class="profileImage" style="background-image:url(img/profile/prepod.png); width:30px; margin-left:-3px; margin-right:10px;"></div>
  <span style="color:#999999;">Преподаватель:&nbsp;</span> <span class="profileTutor"><a href="{{route('teacher')}}">{{$teacher_name or 'Нет учителя'}}</a></span>
            </div>
        </div>
        <div class="profileMainHr"></div>
        <div class="profileText" style="margin-left:180px;">
            <div class="profileString">
                <div class="profileImage" style="width:35px; height:30px; margin-left:-5px; margin-right:10px;"></div>
                <span style="color:#999999;">Баланс:&nbsp;</span>
            </div>
            <div class="profileString">
                <div class="profileImage" style="background-image:url(img/profile/russia.png); width:35px; height:30px; margin-left:-5px; margin-right:10px;"></div>
                Уроков с русскоязычным преподавателем: {{$amount_of_russian or 0}}
            </div>
            <div class="profileString">
                <div class="profileImage" style="background-image:url(img/profile/angliya.png); width:35px; margin-left:-5px; margin-right:10px;"></div>
                Уроков с носителем языка: {{$amount_of_native or 0}}
            </div>
            <button id="popolnit_but">ПОПОЛНИТЬ</button>
        </div>
    </div>
    <button id="butt_edit" onclick="getToChangePassword()" style="margin:0px;">РЕДАКТИРОВАТЬ</button>
@endsection