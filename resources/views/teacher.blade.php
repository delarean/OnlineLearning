@extends('layouts.main')
@section('content')
    <div class="content" id="dop-content">
        <div class="profileAvatar"></div>
        <div class="profileText">
            <span class="profileName">ИМЯ</span>
            <hr class="profileHr">
            <div class="profileString">
                <div class="profileImage" style="background-image:url(../../public/img/profile/datarojdeniya.png);"></div>
                <span style="color:#999999;">Дата рождения:&nbsp;</span>01.01.2000
            </div>
            <div class="profileString">
                <div class="profileImage" style="background-image:url(../../public/img/profile/pocta.png);"></div>
                <span style="color:#999999;">Email:&nbsp;</span>email@mail.ru
            </div>
            <div class="profileString">
                <div class="profileImage" style="background-image:url(../../public/img/profile/skype.png);"></div>
                <span style="color:#999999;">Skype:&nbsp;</span>skype
            </div>
            <div class="profileString">
                <div class="profileImage" style="background-image:url(../../public/img/profile/strana.png);"></div>
                <span style="color:#999999;">Страна:&nbsp;</span>Россия
            </div>
            <div class="profileString">
                <div class="profileImage" style="background-image:url(../../public/img/profile/staj.png);"></div>
                <span style="color:#999999;">Стаж:&nbsp;</span>0 лет
            </div>
        </div>
    </div>
@endsection