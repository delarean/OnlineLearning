@extends('layouts.main')
@section('content')
    <div class="chgpassBlock">
        <span style="margin-bottom:20px; font-size:16pt; font-weight:bold;">СМЕНИТЬ ПАРОЛЬ</span>
        <form id="form_chps" method="POST" action="{{route('toChangePassword')}}" style="display:flex; flex-direction:column; width:300px;">
            {{ csrf_field() }}
            <input  type="password" name="current_password" placeholder="текущий пароль" style="margin-bottom:20px;">
            @if ($errors->has('current_password'))
                <p style="margin-bottom: 10px">{{ $errors->first('current_password') }}</p>
            @endif
            <input type="password" name="new_password" placeholder="новый пароль" style="margin-bottom:20px;">
            @if ($errors->has('new_password'))
                <p style="margin-bottom: 10px">{{ $errors->first('new_password') }}</p>
            @endif
            <button type="submit" style="padding:10px; margin-top:0px; width:200px;">СОХРАНИТЬ</button>
        </form>
        @isset($message)
        <p>{{$message}}</p>
        @endisset
        {{--@if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif--}}
    </div>
    @endsection