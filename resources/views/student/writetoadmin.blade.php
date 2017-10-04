@extends('layouts.main')
@section('content')
    <div class="napadministratoru">
        <div class="punkty">
            <b>Напишите администратору если:</b>
            <div class="punktyString"><div class="punktyImage"></div>Вы хотите внести изменения в расписание.</div>
            <div class="punktyString"><div class="punktyImage"></div>Вам что-то не понравилось.</div>
            <div class="punktyString"><div class="punktyImage"></div>У Вас есть предложение.</div>
            <div class="punktyString"><div class="punktyImage"></div>Вы нашли ошибку.</div>
        </div>
        <textarea class="napadministratoruText" placeholder="Напишите Ваш комментарий"></textarea>
        <span style="font-size:14pt; margin:15px 20px;">Или в мессенджерах:</span>
        <div class="besplurokiPodelitsya" style="margin-left:20px; margin-bottom:10px; width:260px;">
            <div class="besplurokiPodelitsyaLink"><img style="margin-left:10px; margin-top:14px;" src="../../../public/img/vkicon.png"></div>
            <div class="besplurokiPodelitsyaLink"><img style="margin-left:14px; margin-top:11px;" src="../../../public/img/fbicon.png"></div>
            <div class="besplurokiPodelitsyaLink"><img style="margin-left:12px; margin-top:12px;" src="../../../public/img/skypeicon.png"></div>
            <div class="besplurokiPodelitsyaLink"><img style="margin-left:12px; margin-top:12px;" src="../../../public/img/whatsappicon.png"></div>
            <div class="besplurokiPodelitsyaLink"><img style="margin-left:11px; margin-top:12px;" src="../../../public/img/vibericon.png"></div>
            <div class="besplurokiPodelitsyaLink"><img style="margin-left:10px; margin-top:14px;" src="../../../public/img/telegramicon.png"></div>
        </div>
    </div>
@endsection