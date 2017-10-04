@extends('layouts.main')
@section('content')
<div class="besplurokiContent">
    <div class="besplurokiHagi">
        <div class="besplurokiHagiTextWrap">
            <div class="besplurokiHagiText">Отправьте ссылку<br>другу</div>
            <div class="besplurokiHagiText">Оплатите каждый по<br>пакету занятий</div>
            <div class="besplurokiHagiText">Получите каждый<br><span style="color:#2ec47a;">+ 2 урока</span></div>
        </div>
    </div>
    <div class="besplurokiLink">
        <div class="besplurokiLinkText" style="width: 150px;">Прямая ссылка:</div>
        <div class="besplurokiLinkLink">http://mysocnet/student/98654</div>
        <div class="besplurokiLinkText">Поделиться:</div>
        <div class="besplurokiPodelitsya">
            <div class="besplurokiPodelitsyaLink"><img style="margin-left:10px; margin-top:14px;" src="../../../public/img/vkicon.png"></div>
            <div class="besplurokiPodelitsyaLink"><img style="margin-left:14px; margin-top:11px;" src="../../../public/img/fbicon.png"></div>
            <div class="besplurokiPodelitsyaLink"><img style="margin-left:13px; margin-top:10px;" src="../../../public/img/okicon.png"></div>
        </div>
    </div>
    <div class="punkty">
        <b>Условия акции:</b>
        <div class="punktyString"><div class="punktyImage"></div>Вы оплачивали хотя бы один раз уроки.</div>
        <div class="punktyString"><div class="punktyImage"></div>Вы и Ваш друг должны оплатить 8 или 12 уроков.</div>
        <div class="punktyString"><div class="punktyImage"></div>Денежнные эквиваленты вознаграждений не предусмотрены.</div>

    </div>
</div>
    @endsection