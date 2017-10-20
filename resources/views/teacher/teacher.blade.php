@extends('layouts.teacher')
@section('content')
        <form class="content" id="changeTeacherInfo" action="http://mysocnet/admin/teacher/1" method="post">
            <input type="hidden" name="_token" value="M9WxvEkY7RIVxaEXMojmfK57TSFNCYCPFZQ8D7w5">
            <div class="profileAvatar"></div>
            <div class="profileText">
                <span class="profileName">Мария Суржанская</span>
                <hr class="profileHr">
                <div class="profileString">
                    <div class="profileImage" style="background-image:url(../../../public/img/profile/yazyk.png);"></div>
                    <span style="margin-top: 3px;">
                <span style="color:#999999;">Язык:&nbsp;</span>
                <p style="display: inline-block">Русскоговорящий</p>
                    <select name="is_native" style="display: none">
                        <option value="0">Русскоговорящий</option>
                        <option value="1">Носитель языка</option>
                    </select>
                </span>
                    <div class="profileImage" style="background-image:url(img/profile/russia.png); width:35px; margin-left:5px;"></div>
                </div>
                <div class="profileString" style="margin-bottom: 10px;">
                    <div class="profileImage" style="background-image:url(../../../public/img/profile/datarojdeniya.png);"></div>
                    <span style="margin-top: 3px;">
                <span style="color:#999999;">Дата рождения:&nbsp;</span>
                <p style="display: inline-block">07.09.1974</p>
                    <input name="birthday" class="chanderInp" type="hidden">
                </span>
                </div>
                <div class="profileString">
                    <div class="profileImage" style="background-image:url(../../../public/img/profile/pocta.png);"></div>
                    <span>
                    <span style="color:#999999;">Email:&nbsp;</span>
                    <p style="display: inline-block">surj@mail.ru</p>
                    <input name="e-mail" class="chanderInp" type="hidden">
                </span>
                </div>
                <div class="profileString">
                    <div class="profileImage" style="background-image:url(../../../public/img/profile/telefon.png);"></div>
                    <span style="margin-top: 3px;">
                <span style="color:#999999;">Телефон:&nbsp;</span>
                <p style="display: inline-block">89265896589</p>
                    <input name="telephone" class="chanderInp" type="hidden">
                </span>
                </div>
                <div class="profileString">
                    <div class="profileImage" style="background-image:url(../../../public/img/profile/skype.png);"></div>
                    <span style="margin-top: 3px;">
                <span style="color:#999999;">Skype:&nbsp;</span>
                <p style="display: inline-block">surj32</p>
                    <input name="skype" class="chanderInp" type="hidden">
                </span>
                </div>
                <div class="profileString">
                    <div class="profileImage" style="background-image:url(../../../public/img/profile/strana.png);"></div>
                    <span style="margin-top: 3px;">
                <span style="color:#999999;">Страна:&nbsp;</span>
                <p style="display: inline-block">Россия</p>
                    <input name="country" class="chanderInp" type="hidden">
                </span>
                </div>
                <div class="profileString">
                    <div class="profileImage" style="background-image:url(../../../public/img/menu/uceniki.png);"></div>
                    <span style="margin-top: 3px;">
                <span style="color:#999999;">Учеников:&nbsp;</span>
                <p style="display: inline-block">8</p>
                </span>
                </div>
            </div>
            <div class="profileMainHr"></div>
            <div style="margin: 0 auto;">
                <div class="profileString" style="display: block;margin-bottom: 5px;">
            <span style="margin-top: 3px;">
                <span style="color:#999999;">Проведено уроков всего:&nbsp;</span>
                <p style="display: inline-block">12</p>
                </span>
                </div>
                <div class="profileString" style="display: block; margin-bottom: 5px;">
            <span style="margin-top: 3px;">
                <span style="color:#999999;">Проведено уроков после выплаты:&nbsp;</span>
                <p style="display: inline-block">3</p>
                </span>
                </div>
                <div class="profileString" style="display: block;margin-bottom: 5px;">
            <span style="margin-top: 3px;">
                <span style="color:#999999;">Номер Яндекс кошелька:&nbsp;</span>
                <p style="display: inline-block">15935789</p>
                <input name="yandex_money" class="chanderInp" type="hidden">
                </span>
                </div>
                <div class="profileString" style="display: block;margin-bottom: 5px;">
            <span style="margin-top: 3px;">
                <span style="color:#999999;">Ставка:&nbsp;</span>
                <p style="display: inline-block">550 (Р)</p>
                <input name="rate" class="chanderInp" type="hidden">
                </span>
                </div>
            </div>
        </form>
        <div>
            <button class="edit_teacher_but" style="display: block; margin:0px;">РЕДАКТИРОВАТЬ</button>
        </div>

@endsection