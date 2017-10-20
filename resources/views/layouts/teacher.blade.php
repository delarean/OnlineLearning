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
    <script src="../../../public/teacher.js" type="text/javascript"></script>
</head>
<body>
<header>
    <div class="headerIn">
        <div class="logo"></div>
        <div class="headerText">Онлайн школа английского языка</div>
        <div class="headerProfile">
            <div class="headerAvatar"></div>
            <div class="headerName">Юлия Пестова</div>
            <div class="headerDown"></div>
            <div class="headerSettings" >
                <div class="menuButton settingsButton" style="margin-bottom:15px;"><div class="menuImage" style="background:url(../../../public/img/menu/settings.png) 0 0 no-repeat, url(../../../public/img/menu/settings.png) 20px 0 no-repeat; background-size:contain; margin-right:5px;"></div>
                    Настройки</div>
                <div id="oplatit_but" class="menuButton settingsButton" style="margin-bottom:15px;"><div class="menuImage" style="background:url(../../../public/img/menu/buylessons.png) 0 0 no-repeat, url(../../../public/img/menu/buylessons.png) 20px 0 no-repeat; background-size:contain; margin-right:5px;"></div>
                    Оплатить</div>
                <div id="logout_but" class="settingsButton" style="margin-bottom:0px;"><div class="menuImage" style="background:url(../../../public/img/menu/quit.png) 0 0 no-repeat, url(../../../public/img/menu/quit.png) 20px 0 no-repeat; background-size:contain; margin-right:5px;"></div>
                    <a href="" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        Выход</a></div>
                <div class="headerSettingsArrow"></div>
                <form id="logout-form" action="http://mysocnet/student/logout" method="POST">
                    <input type="hidden" name="_token" value="5dnFx7NIpFwYZn6v0FPzIV2FxLiPhna0fuNEyxEB">
                </form>
            </div>
        </div>
    </div>
</header>
<main>
    <menu>
        <div id="student" class="menuButton">
            <div class="menuImage" style="background:url(../../../public/img/menu/profile.png) 0 0 no-repeat, url(../../../public/img/menu/profilelight.png) 20px 0 no-repeat; background-size:contain;"></div>
            Профиль</div>
        <div id="admin" class="menuButton menuButtonActive" data-a="admin/pupils.php" data-name="pupils">
            <div class="menuImage" style="background: url('/public/img/menu/ucenikilight.png') 0px 0px / contain no-repeat, url('/public/img/menu/uceniki.png') 20px 0px no-repeat;"></div>
            Ученики</div>
        <div id="lessons" class="menuButton" data-a="admin/lessonscoming.php" data-name="lessonscoming">
            <div class="menuImage" style="background: url('/public/img/menu/lessons.png') 0px 0px / contain no-repeat, url('/public/img/menu/lessons.png') 20px 0px no-repeat;"></div>
            Уроки</div>
        <div id="paymentsout" class="menuButton" data-a="admin/paymentsout.php" data-name="paymentsout">
            <div class="menuImage" style="background: url('/public/img/menu/buylessons.png') 0px 0px / contain no-repeat, url('/public/img/menu/buylessons.png') 20px 0px no-repeat;"></div>
            Выплаты</div>
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
