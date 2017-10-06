@extends('layouts.admin')
@section('pop-up')
    @if ($errors->any())
        <div class="ucenikiAddpupil">
            @else
                <div class="ucenikiAddpupilHidden">
                    @endif
        <div class="ucenikiAddpupilWindow">
            <div class="ucenikiAddTeacherCross"></div>
            <span class="ucenikiAddpupilTitle">ДОБАВИТЬ УЧИТЕЛЯ</span>
            <hr width="70" style="margin-bottom:25px;">
            <form action="{{route('teachers')}}" method="post" class="ucenikiAddpupilForm">
                {{csrf_field()}}
                <input name="name" type="text" style="width:85%; margin-bottom:10px;" placeholder="Введите имя">
                @if($errors->has('name'))
                    @foreach($errors->get('name') as $message)
                        <p>{{$message}}</p>
                    @endforeach
                @endif
                <input name="surname" type="text" style="width:85%;margin-top:10px; margin-bottom:10px;" placeholder="Введите фамилию">
                @if($errors->has('surname'))
                    @foreach($errors->get('surname') as $message)
                        <p>{{$message}}</p>
                    @endforeach
                @endif
                <input name="email" type="email" style="width:85%; margin-top:10px; margin-bottom:10px;" placeholder="Введите email">
                @if($errors->has('email'))
                    @foreach($errors->get('email') as $message)
                        <p>{{$message}}</p>
                    @endforeach
                @endif
                <input name="password" type="password" style="width:85%; margin-top:10px; margin-bottom:10px;" placeholder="Пароль">
                @if($errors->has('password'))
                    @foreach($errors->get('password') as $message)
                        <p>{{$message}}</p>
                    @endforeach
                @endif
                <button type="submit" style="width:85%; margin:0px; margin-top:10px; margin-bottom:20px; padding:15px 0px;">ЗАРЕГИСТРИРОВАТЬ И ОТПРАВИТЬ</button>
            </form>
        </div>
    </div>
@endsection
@section('content')

    <div class="ucenikiMain">
        <div class="ucenikiSearch">
            <form id="seachForm" method="post" action="{{route('searchTeachers')}}">
                {{csrf_field()}}
            <input name="search" value="{{ old('search') }}" style="width:100%; padding-right:50px;" placeholder="Поиск...">
                <div onclick="document.getElementById('seachForm').submit()" class="ucenikiSearchButton"></div>
                </form>
        </div>
        <button id="addTeacherButton" style="margin:0px; margin-bottom:30px;">ДОБАВИТЬ</button>
        <div class="urokiTable">
            <div class="urokiHead">
                <div class="urokiTitle">ПРЕПОДАВАТЕЛЬ</div>
                <div class="urokiTitle">СТРАНА</div>
                <div class="urokiTitle">E-MAIL</div>
                <div class="urokiTitle">УЧЕНИКОВ</div>
            </div>
            <div class="urokiContent">
                @isset($teachers)
                @foreach($teachers as $teacher)
                <div class="urokiString">
                    <div class="urokiCell">
                        <a href="tutor.html"><div class="urokiAvatar" style="background-image:url(../../../public/img/noAvatar.png);"></div></a>
                        <a href="tutor.html"><div class="urokiName">{{$teacher['name'].' '.$teacher['surname']}}</div></a>
                    </div>
                    <div class="urokiCell">{{$teacher['country']}}</div>
                    <div class="urokiCell">{{$teacher['e-mail']}}</div>
                    <div class="urokiCell"><a href="pupilsof.html" style="color:black; text-decoration:none;"><div class="tutorsNumber">{{$teacher['students_amount'] or 0}}</div>
                        </a></div>
                </div>
                    @endforeach
                @endisset
                @isset($not_found)
                <div id="studentsNotFound">Учетилей не найдено</div>
                @endisset
            </div>
        </div>
    </div>

    @endsection