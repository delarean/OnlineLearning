<div class="urokiMain">
    <div class="urokiChoose">
        <div class="urokiChooseSelector" style="left: 204.75px;"></div>
        <div id="next_but" class="urokiChooseCell" data-a="admin/lessonscoming.php" data-name="lessonscoming">Предстоящие</div>
        <div class="urokiChooseCell" data-a="admin/lessonspast.php" data-name="lessonspast">Прошедшие</div>
    </div>
    <div></div>
    <div class="urokiTable"><div class="urokiHead">
            <div class="urokiTitle">ДАТА</div>
            <div class="urokiTitle">ВРЕМЯ</div>
            <div class="urokiTitle">УЧЕНИК</div>
            <div class="urokiTitle">СТАТУС</div>
            <div class="urokiTitle">ИЗМЕНЕНИЕ</div>
            <div class="urokiTitle" style="flex-shrink:0;">ОСТАЛОСЬ УРОКОВ</div>
        </div>
        <div class="ucenikiPretable">
            <div class="ucenikiPretitle">
                <div class="ucenikiImage" style="background-image:url(../../../public/img/profile/russia.png);"></div>
                <div class="ucenikiImage" style="background-image:url(../../../public/img/profile/angliya.png);"></div>
            </div>
        </div>
        <div class="urokiContent">
            @foreach($lessons as $lesson)
            <div class="urokiString">
                <div class="urokiCell">{{$lesson['date']}}</div>
                <div class="urokiCell">{{$lesson['time']}}</div>
                <div class="urokiCell"><div class="urokiAvatar" style="background-image:url(../../../public/img/noAvatar.png);"></div><div class="urokiName">
                        {{$lesson['student_name']}}
                    </div></div>
                <div class="urokiCell"><span style="color:green;">{{$lesson['status_name']}}</span></div>
                <div class="urokiCell">+1 урок</div>
                <div class="urokiCell" style="flex-shrink:0;"><span style="width:50%;">{{$lesson['amount_of_russian']}}</span>
                    <span style="width:50%;">{{$lesson['amount_of_native']}}</span></div>
            </div>
            @endforeach
                @if(method_exists($lessons,'links'))
                    <p>{{ $lessons->appends(['lesson' => $lessons_type])->links() }}</p>
                @endif
        </div></div>
</div>