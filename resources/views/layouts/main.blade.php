@section('layout')
<!doctype html>
<html>
<head>
    <title>SPEAX</title>
    <meta charset="utf-8">
    <meta name="robots" content="all">
    <meta name="keywords" content="онлайн школа английского языка">
    <meta name="description" content="Онлайн школа английского языка.">
    <link rel="shortcut icon" href="img/favicon.png" type="image/png">
    <link href="../../../public/index.css" rel="stylesheet">
    <script src="../../../public/jquery.js" type="text/javascript"></script>
    <script src="../../../public/index.js" type="text/javascript"></script>
</head>
<body>
<header>
    <div class="headerIn">
        <div class="logo"></div>
        <div class="headerText">Онлайн школа английского языка</div>
        <div class="headerProfile">
            <div class="headerAvatar"></div>
            <div class="headerName">Имя Фамилия</div>
            <div class="headerDown"></div>
        </div>
    </div>
</header>
<main>
    <div class="nextLesson">
        <span style="color:#999999;">СЛЕДУЮЩИЙ УРОК:</span> ВТОРНИК 10 ИЮНЯ, 19:00 (ПО МСК)
    </div>
    <menu>
        <div id="student" class="menuButton">
            <div class="menuImage" style="background:url(../../../public/img/menu/profile.png) 0 0 no-repeat, url(../../../public/img/menu/profilelight.png) 20px 0 no-repeat; background-size:contain;"></div>
            Профиль</div>
        <div id="teacher" class="menuButton">
            <div class="menuImage" style="background:url(../../../public/img/menu/tutor.png) 0 0 no-repeat, url(../../../public/img/menu/tutorlight.png) 30px 0 no-repeat; background-size:contain; margin-left:-5px; margin-right:10px; width:30px;"></div>
            Преподаватель</div>
        <div id="lessons" class="menuButton">
            <div class="menuImage" style="background:url(../../../public/img/menu/lessons.png) 0 0 no-repeat, url(../../../public/img/menu/lessonslight.png) 20px 0 no-repeat; background-size:contain;"></div>
            Уроки</div>
        <div id="payments" class="menuButton">
            <div class="menuImage" style="background:url(../../../public/img/menu/payments.png) 0 0 no-repeat, url(../../../public/img/menu/paymentslight.png) 20px 0 no-repeat; background-size:contain;"></div>
            Платежи</div>
        <div id="buylessons" class="menuButton">
            <div class="menuImage" style="background:url(../../../public/img/menu/buylessons.png) 0 0 no-repeat, url(../../../public/img/menu/buylessonslight.png) 20px 0 no-repeat; background-size:contain;"></div>
            Оплатить уроки</div>
        <div id="freelessons" class="menuButton">
            <div class="menuImage" style="background:url(../../../public/img/menu/freelessons.png) 0 0 no-repeat, url(../../../public/img/menu/freelessonslight.png) 20px 0 no-repeat; background-size:contain;"></div>
            Бесплатные уроки</div>
        <div id="writetoadmin" class="menuButton" id="writetoadministrator">
            <div class="menuImage" style="background:url(../../../public/img/menu/writetoadministrator.png) 0 0 no-repeat, url(../../../public/img/menu/writetoadministratorlight.png) 20px 0 no-repeat; background-size:contain;"></div>
            Написать<br>администратору</div>
        <div class="selector"></div>
    </menu>
    @yield('content')
    {{--@section('content')
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
        @endsection--}}
</main>
<footer>
    <div class="headerIn"><div class="headerText" style="border:none; line-height:2.7;padding-left: 0;border:none;line-height:2.7;margin-left: 0;padding-top: 10px;">
            © Онлайн школа английского языка. Все права защищены.</div></div>
</footer>
</html>
@show