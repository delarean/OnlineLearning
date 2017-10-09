<div class="urokiMain">
    <div class="urokiChoose">
        <div class="urokiChooseSelector" style="left: 9.75px;"></div>
        <div class="urokiChooseCell" data-a="admin/lessonscoming.php" data-name="lessonscoming">Предстоящие</div>
        <div id="prev_but" class="urokiChooseCell" data-a="admin/lessonspast.php" data-name="lessonspast">Прошедшие</div>
    </div>
    <div></div>
    <div class="urokiTable"><div class="urokiHead">
            <div class="urokiTitle">ДАТА</div>
            <div class="urokiTitle">ВРЕМЯ</div>
            <div class="urokiTitle">УЧЕНИК</div>
            <div class="urokiTitle">СТАТУС</div>
        </div>
        <div class="urokiContent">
            @foreach($lessons as $lesson)
            <div class="urokiString">
                <div class="urokiCell">{{$lesson['date']}}</div>
                <div class="urokiCell">{{$lesson['time']}}</div>
                <div class="urokiCell"><div class="urokiAvatar" style="background-image:url(../../../public/img/noAvatar.png);"></div><div class="urokiName">{{$lesson['student_name']}}</div></div>
                <div class="urokiCell">
                    <form action="{{route('adminLessons')}}" method="post">
                        {{csrf_field()}}
                    <select class="paymentsoutSelect" name="status">
  <option class="paymentsoutOption" value="{{$lesson['id']."|По расписанию"}}" style="color:#2ec47a;" @if($lesson['status'] === 0)selected @endif>По расписанию</option>
  <option class="paymentsoutOption" value="{{$lesson['id']."|Отменен"}}" style="color:#adadad;" @if($lesson['status'] === 1)selected @endif>Отменен</option>
  <option class="paymentsoutOption" value="{{$lesson['id']."|Перенесён"}}" style="color:#e87e04;" @if($lesson['status'] === 2)selected @endif>Перенесён</option>
  <option class="paymentsoutOption" value="{{$lesson['id']."|Урок ожидается"}}" style="color:#2ec47a;" @if($lesson['status'] === 3)selected @endif>Урок ожидается</option>
  <option class="paymentsoutOption" value="{{$lesson['id']."|Замена преподавателя"}}" style="color:red;" @if($lesson['status'] === 4)selected @endif>Замена преподавателя</option>
                    </select>
                    </form>
                </div>
            </div>
            @endforeach
            @if(method_exists($lessons,'links'))
                <p>{{ $lessons->appends(['lesson' => $lessons_type])->links() }}</p>
            @endif
        </div></div>
</div>