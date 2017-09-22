{{date("D M j G:i:s T Y")}}
@extends('layouts.main')
@section('content')
    <div class="content" id="dop-content">
        <div class="profileAvatar"></div>
        <div class="profileText">
            <span class="profileName">{{$teacher_name}}</span>
            <hr class="profileHr">
            <div class="profileString">
                <div class="profileImage" style="background-image:url(../../public/img/profile/datarojdeniya.png);"></div>
                <span style="color:#999999;padding-top: 5px;">Дата рождения:&nbsp;<p class="inline_p">{{$teacher_birthday}}</p></span>
            </div>
            <div class="profileString" style="margin-top: 8px;">
                <div class="profileImage" style="background-image:url(../../public/img/profile/pocta.png);"></div>
                <span style="color:#999999;padding-top: 1px;">Email:&nbsp;<p class="inline_p">{{$teacher_mail}}</p></span>
            </div>
            <div class="profileString">
                <div class="profileImage" style="background-image:url(../../public/img/profile/skype.png);"></div>
                <span style="color:#999999;padding-top: 3px;">Skype:&nbsp;<p class="inline_p">{{$teacher_skype}}</p></span>
            </div>
            <div class="profileString">
                <div class="profileImage" style="background-image:url(../../public/img/profile/strana.png);"></div>
                <span style="color:#999999;padding-top: 3px;">Страна:&nbsp;<p class="inline_p">{{$teacher_country}}</p></span>
            </div>
            <div class="profileString">
                <div class="profileImage" style="background-image:url(../../public/img/profile/staj.png);"></div>
                <span style="color:#999999;padding-top: 4px;">Стаж:&nbsp;<p class="inline_p">{{$teacher_experience}} лет</p></span>
            </div>
        </div>
    </div>
@endsection