@extends('layouts.admin')
@section('content')
    <div class="content">
        <div class="profileAvatar"></div>
        <div class="profileText">
            <span class="profileName">{{$student->name.' '.$student->surname}} </span>
            <hr class="profileHr">
            <form id="changeStudentInfo" action="{{route('adminStudentInfo',['id' => $student->id])}}" method="post">
                {{csrf_field()}}
            <div class="profileString">
                <div class="profileImage" style="background-image:url(../../../public/img/profile/datarojdeniya.png);"></div>
                <span style="color:#999999;padding-top: 5px;margin-bottom: 6px;">Дата рождения:&nbsp;<p class="inline_p">{{$date_of_birth}}</p><input name="birthday" class="chanderInp" type="hidden">
                </span>
            </div>
            <div class="profileString">
                <div class="profileImage" style="background-image:url(../../../public/img/profile/pocta.png);"></div>
                <span style="color:#999999;">Email:&nbsp;<p class="inline_p">{{$student['e-mail']}}</p><input name="e-mail" class="chanderInp" type="hidden"></span>
            </div>
            <div class="profileString">
                <div class="profileImage" style="background-image:url(../../../public/img/profile/telefon.png);"></div>
                <span style="color:#999999;margin-bottom: 5px;padding-top: 3px;">Телефон:&nbsp;<p class="inline_p">{{$student->telephone}}</p><input name="telephone" class="chanderInp" type="hidden"></span>
            </div>
            <div class="profileString">
                <div class="profileImage" style="background-image:url(../../../public/img/profile/skype.png);"></div>
                <span style="color:#999999;padding-top: 3px;">Skype:&nbsp;<p class="inline_p">{{$student->skype}}</p><input name="skype" class="chanderInp" type="hidden"></span>
            </div>
            <div class="profileString">
                <div class="profileImage" style="background-image:url(../../../public/img/profile/strana.png);"></div>
                <span style="color:#999999;padding-top: 3px;">Страна:&nbsp;<p class="inline_p">{{$student->country}}</p><input name="country" class="chanderInp" type="hidden"></span>
            </div>
            </form>
            <div class="profileString">
                <div class="profileImage" style="background-image:url(../../../public/img/profile/zanyatiya.png);"></div>
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
                <div class="profileImage" style="background-image:url(../../../public/img/profile/prepod.png); width:30px; margin-left:-3px; margin-right:10px;"></div>
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
                <div class="profileImage" style="background-image:url(../../../public/img/profile/russia.png); width:35px; height:30px; margin-left:-5px; margin-right:10px;"></div>
                Уроков с русскоязычным преподавателем: {{$amount_of_russian or 0}}
            </div>
            <div class="profileString">
                <div class="profileImage" style="background-image:url(../../../public/img/profile/angliya.png); width:35px; margin-left:-5px; margin-right:10px;"></div>
                Уроков с носителем языка: {{$amount_of_native or 0}}
            </div>
        </div>
    </div>
    <div>
    <button class="edit_student_but" style="display: block; margin:0px;">РЕДАКТИРОВАТЬ</button>
    <button style="display: block; padding: 15px 30px;margin: 10px 0;">ВОССТАНОВИТЬ ПАРОЛЬ</button>
    </div>
@endsection