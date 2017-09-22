@extends('layouts.main')
@section('content')
    <div class="urokiMain">
        <div class="urokiChoose">
            <div class="urokiChooseSelector"></div>
            <div id="next" class="urokiChooseCell">Предстоящие</div>
            <div id="previous" class="urokiChooseCell">Прошедшие</div>
        </div>
        <div class="urokiLeft">
            Осталось уроков:
            <div class="urokiLeftCell"><div class="urokiLeftImage" style="background-image:url(../../public/img/profile/russia.png);"></div>5</div>
            <div class="urokiLeftCell"><div class="urokiLeftImage" style="background-image:url(../../public/img/profile/angliya.png);"></div>5</div>
        </div>
        <div class="urokiTable">
            <div class="urokiHead">
                <div class="urokiTitle">ДАТА</div>
                <div class="urokiTitle">ВРЕМЯ</div>
                <div class="urokiTitle">ПРЕПОДАВАТЕЛЬ</div>
                <div class="urokiTitle">СТАТУС</div>
            </div>
            <div class="urokiContent">
                @foreach ($next_lessons as $next_lesson)
                    <div class="urokiString">
                        <div class="urokiCell">{{$next_lesson->date}}</div>
                        <div class="urokiCell">{{$next_lesson->time}}</div>
                        <div class="urokiCell"><div class="urokiAvatar" style="background-image:url(../../public/img/noAvatar.png);"></div>
                            <div class="urokiName">
                                {{$next_lesson->teacher->name}}
                            </div>
                        </div>
                        <div class="urokiCell"><span style="color:green;">{{$next_lesson->status}}</span></div>
                    </div>
                @endforeach
                        @if(method_exists($next_lessons,'links'))
                    <p>{{ $next_lessons->appends(['lesson' => $lesson_type])->links() }}</p>
                    @endif
            </div>
        </div>
    </div>
    @endsection