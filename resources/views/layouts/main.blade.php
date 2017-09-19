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
</main>
<footer>
    <div class="headerIn"><div class="headerText" style="border:none; line-height:2.7;padding-left: 0;border:none;line-height:2.7;margin-left: 0;padding-top: 10px;">
            © Онлайн школа английского языка. Все права защищены.</div></div>
</footer>
</html>
@show