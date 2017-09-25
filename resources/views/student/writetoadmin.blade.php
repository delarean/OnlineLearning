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
            <div class="besplurokiPodelitsyaLink"></div>
            <div class="besplurokiPodelitsyaLink"></div>
            <div class="besplurokiPodelitsyaLink"></div>
            <div class="besplurokiPodelitsyaLink"></div>
            <div class="besplurokiPodelitsyaLink"></div>
            <div class="besplurokiPodelitsyaLink"></div>
        </div>
    </div>
@endsection