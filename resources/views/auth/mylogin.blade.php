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
</head>
<body>
<header>
    <div class="headerIn">
        <div class="logo"></div>
        <div class="headerText">Онлайн школа английского языка</div>
    </div>
</header>
<form method="POST" action="{{ route('login') }}" style="margin: 10% auto; display:flex; flex-direction:column; width:300px;">
    {{ csrf_field() }}
    <input type="text" placeholder="логин" style="margin-bottom:20px;" name="id" required autofocus>
    @if ($errors->has('id'))
        <span class="help-block">
          <strong>{{ $errors->first('id') }}</strong>
        </span>
    @endif
    <input type="password" placeholder="пароль" style="margin-bottom:20px;" name="password" required>
    @if ($errors->has('password'))
        <span class="help-block">
          <strong>{{ $errors->first('password') }}</strong>
        </span>
    @endif
    <button type="submit" style="padding:10px; margin-top:0px; width:200px;">ВОЙТИ</button>
</form>
</html>

{{-- @section('content')
    <form method="POST" action="{{ route('login') }}">
        {{ csrf_field() }}
    <div><div>Логин</div><input type="text" name="id" required autofocus></div>
    <div><div>Пароль</div><input id="password" type="password" name="password" required></div>
        <div>
        <button type="submit">
            Войти
        </button>
        </div>
        </form>
@show--}}
