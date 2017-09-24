@extends('layouts.main')
@section('content')
    <div class="chgpassBlock">
        <span style="margin-bottom:20px; font-size:16pt; font-weight:bold;">СМЕНИТЬ ПАРОЛЬ</span>
        <form method="POST" action="{{route('toChangePassword')}}" style="display:flex; flex-direction:column; width:300px;">
            {{ csrf_field() }}
            <input type="pass" placeholder="текущий пароль" style="margin-bottom:20px;">
            <input type="pass" placeholder="новый пароль" style="margin-bottom:20px;">
            <button type="submit" style="padding:10px; margin-top:0px; width:200px;">СОХРАНИТЬ</button>
        </form>
    </div>
    @endsection