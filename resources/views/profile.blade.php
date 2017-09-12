@extends('layouts.main')
@section('content')
    <div class="content">
        <div class="profileAvatar"></div>
        <div class="profileText">
            <span class="profileName">ИМЯ ФАМИЛИЯ</span>
            <hr class="profileHr">
            <div class="profileString">
                <div class="profileImage" style="background-image:url(img/profile/datarojdeniya.png);"></div>
                <span style="color:#999999;">Дата рождения:&nbsp;</span>01.01.2000
            </div>
            <div class="profileString">
                <div class="profileImage" style="background-image:url(img/profile/pocta.png);"></div>
                <span style="color:#999999;">Email:&nbsp;</span>email@mail.ru
            </div>
            <div class="profileString">
                <div class="profileImage" style="background-image:url(img/profile/telefon.png);"></div>
                <span style="color:#999999;">Телефон:&nbsp;</span>+7(111)111-11-11
            </div>
            <div class="profileString">
                <div class="profileImage" style="background-image:url(img/profile/skype.png);"></div>
                <span style="color:#999999;">Skype:&nbsp;</span>skype
            </div>
            <div class="profileString">
                <div class="profileImage" style="background-image:url(img/profile/strana.png);"></div>
                <span style="color:#999999;">Страна:&nbsp;</span>Россия
            </div>
            <div class="profileString">
                <div class="profileImage" style="background-image:url(img/profile/zanyatiya.png);"></div>
                <span style="color:#999999;">Занятия:&nbsp;</span>Пн-20:00, Вт-20:00 (ПО МСК)
            </div>
            <div class="profileString">
                <div class="profileImage" style="background-image:url(img/profile/kurs.png);"></div>
                <span style="color:#999999;">Курс:&nbsp;</span>Базовый английский
            </div>
            <div class="profileString">
                <div class="profileImage" style="background-image:url(img/profile/prepod.png); width:30px; margin-left:-3px; margin-right:10px;"></div>
                <span style="color:#999999;">Преподаватель:&nbsp;</span> <span class="profileTutor">Имя</span>
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
                Уроков с русскоязычным преподавателем: 0
            </div>
            <div class="profileString">
                <div class="profileImage" style="background-image:url(img/profile/angliya.png); width:35px; margin-left:-5px; margin-right:10px;"></div>
                Уроков с носителем языка: 0
            </div>
            <button>ПОПОЛНИТЬ</button>
        </div>
    </div>
    <button style="margin:0px;">РЕДАКТИРОВАТЬ</button>
@endsection