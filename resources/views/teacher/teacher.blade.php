@extends('layouts.teacher')
@section('content')

    <div class="content">
        <div class="profileAvatar"></div>
        <div class="profileText">
            <span class="profileName">ИМЯ</span>
            <hr class="profileHr">
            <div class="profileString">
                <div class="profileImage" style="background-image:url(img/profile/yazyk.png);"></div>
                <span style="color:#999999;">Язык:&nbsp;</span>Русскоязычный
                <div class="profileImage" style="background-image:url(img/profile/russia.png); width:35px; margin-left:5px;"></div>
            </div>
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
                <div class="profileImage" style="background-image:url(img/menu/uceniki.png);"></div>
                <span style="color:#999999;">Учеников:&nbsp;</span>0
            </div>
        </div>
    </div>
    <button id="butt_edit" onclick="getToChangePassword()" style="margin:0px;">РЕДАКТИРОВАТЬ</button>

@endsection