@section('content')
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
@show
