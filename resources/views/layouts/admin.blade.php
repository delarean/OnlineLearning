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
    <script src="../../../public/admin.js" type="text/javascript"></script>
</head>
<body>
@yield('pop-up')
<header>
    <div class="headerIn">
        <div class="logo"></div>
        <div class="headerText">Онлайн школа английского языка</div>
        <div class="headerProfile">
            <div class="headerAvatar"></div>
            <div class="headerName">{{Auth::user()->admin->name.' '.Auth::user()->admin->surname}}</div>
            <div class="headerDown"></div>
            <div class="headerSettings" >
                <div class="menuButton settingsButton" style="margin-bottom:15px;"><div class="menuImage" style="background:url(../../../public/img/menu/settings.png) 0 0 no-repeat, url(../../../public/img/menu/settings.png) 20px 0 no-repeat; background-size:contain; margin-right:5px;"></div>
                    Настройки</div>
                <div id="logout_but" class="settingsButton" style="margin-bottom:0px;"><div class="menuImage" style="background:url(../../../public/img/menu/quit.png) 0 0 no-repeat, url(../../../public/img/menu/quit.png) 20px 0 no-repeat; background-size:contain; margin-right:5px;"></div>
                    <a href="" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        Выход</a></div>
                <div class="headerSettingsArrow"></div>
                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    {{ csrf_field() }}
                </form>
            </div>
        </div>
    </div>
</header>
<main>
    <menu>
        <div id="admin" class="menuButton menuButtonActive" data-a="admin/pupils.php" data-name="pupils">
            <div class="menuImage" style="background: url(&quot;https://speax.000webhostapp.com/img/menu/ucenikilight.png&quot;) 0px 0px / contain no-repeat, url(&quot;https://speax.000webhostapp.com/img/menu/uceniki.png&quot;) 20px 0px no-repeat;"></div>
            Ученики</div>
        <div id="teachers" class="menuButton" data-a="admin/tutors.php" data-name="tutors">
            <div class="menuImage" style="background: url(&quot;https://speax.000webhostapp.com/img/menu/tutor.png&quot;) 0px 0px / contain no-repeat, url(&quot;https://speax.000webhostapp.com/img/menu/tutor.png&quot;) 30px 0px no-repeat; margin-left: -5px; margin-right: 10px; width: 30px;"></div>
            Преподаватели</div>
        <div id="lessons" class="menuButton" data-a="admin/lessonscoming.php" data-name="lessonscoming">
            <div class="menuImage" style="background: url(&quot;https://speax.000webhostapp.com/img/menu/lessons.png&quot;) 0px 0px / contain no-repeat, url(&quot;https://speax.000webhostapp.com/img/menu/lessons.png&quot;) 20px 0px no-repeat;"></div>
            Уроки</div>
        <div id="payments" class="menuButton" data-a="admin/paymentsin.php" data-name="paymentsin">
            <div class="menuImage" style="background: url(&quot;https://speax.000webhostapp.com/img/menu/payments.png&quot;) 0px 0px / contain no-repeat, url(&quot;https://speax.000webhostapp.com/img/menu/payments.png&quot;) 20px 0px no-repeat;"></div>
            Оплаты</div>
        <div id="paymentsout" class="menuButton" data-a="admin/paymentsout.php" data-name="paymentsout">
            <div class="menuImage" style="background: url(&quot;https://speax.000webhostapp.com/img/menu/buylessons.png&quot;) 0px 0px / contain no-repeat, url(&quot;https://speax.000webhostapp.com/img/menu/buylessons.png&quot;) 20px 0px no-repeat;"></div>
            Выплаты</div>
        <div class="selector" style="top: 12px;"></div>
    </menu>
    @yield('content')
</main>

{{--<div class="ucenikiAddpupil">
    <div class="ucenikiAddpupilWindow">
        <div class="ucenikiAddpupilCross"></div>
        <span class="ucenikiAddpupilTitle">ДОБАВИТЬ УЧЕНИКА</span>
        <hr width="70" style="margin-bottom:25px;">
        <form action="" class="ucenikiAddpupilForm">
            <input name="name" type="text" style="width:85%; margin-bottom:20px;" placeholder="Введите имя">
            <input name="family" type="text" style="width:85%; margin-bottom:20px;" placeholder="Введите фамилию">
            <input name="email" type="email" style="width:85%; margin-bottom:20px;" placeholder="Введите email">
            <input name="pass" type="password" style="width:85%; margin-bottom:20px;" placeholder="Введите пароль">
            <button type="submit" style="width:85%; margin:0px; margin-bottom:20px; padding:15px 0px;">ЗАРЕГИСТРИРОВАТЬ И ОТПРАВИТЬ</button>
        </form>
    </div>
</div>--}}
<footer>
    <div class="headerIn"><div class="headerText" style="border:none; line-height:2.7;padding-left: 0;border:none;line-height:2.7;margin-left: 0;padding-top: 10px;">
            © Онлайн школа английского языка. Все права защищены.</div></div>
</footer>
</html>
@show