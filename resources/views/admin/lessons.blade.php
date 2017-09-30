@extends('layouts.admin')
@section('content')

    <div class="urokiMain">
        <div class="urokiChoose">
            <div class="urokiChooseSelector" style="left: 53%;"></div>
            <div id="next" class="urokiChooseCell">Предстоящие</div>
            <div id="previous" class="urokiChooseCell">Прошедшие</div>
        </div>
        <div class="urokiLeft">
            Осталось уроков:
            <div class="urokiLeftCell"><div class="urokiLeftImage" style="background-image:url(../../../public/img/profile/russia.png);"></div>2</div>
            <div class="urokiLeftCell"><div class="urokiLeftImage" style="background-image:url(../../../public/img/profile/angliya.png);"></div>8</div>
        </div>
        <div class="urokiTable">
            <div class="urokiHead">
                <div class="urokiTitle">ДАТА</div>
                <div class="urokiTitle">ВРЕМЯ</div>
                <div class="urokiTitle">УЧЕНИК</div>
                <div class="urokiTitle">СТАТУС</div>
            </div>
            <div class="urokiContent">
                <div class="urokiString">
                    <div class="urokiCell">2017-09-20</div>
                    <div class="urokiCell">15:00:00</div>
                    <div class="urokiCell"><div class="urokiAvatar" style="background-image:url(../../../public/img/noAvatar.png);"></div>
                        <div class="urokiName">
                            Мария
                        </div>
                    </div>
                    <div class="urokiCell"><span style="color:green;">Урок ожидается</span></div>
                </div>
                <div class="urokiString">
                    <div class="urokiCell">2017-09-20</div>
                    <div class="urokiCell">16:00:00</div>
                    <div class="urokiCell"><div class="urokiAvatar" style="background-image:url(../../../public/img/noAvatar.png);"></div>
                        <div class="urokiName">
                            Мария
                        </div>
                    </div>
                    <div class="urokiCell"><span style="color:green;">Урок ожидается</span></div>
                </div>
                <div class="urokiString">
                    <div class="urokiCell">2017-09-20</div>
                    <div class="urokiCell">18:00:00</div>
                    <div class="urokiCell"><div class="urokiAvatar" style="background-image:url(../../../public/img/noAvatar.png);"></div>
                        <div class="urokiName">
                            Мария
                        </div>
                    </div>
                    <div class="urokiCell"><span style="color:green;">Урок ожидается</span></div>
                </div>
                <div class="urokiString">
                    <div class="urokiCell">2017-09-21</div>
                    <div class="urokiCell">14:00:00</div>
                    <div class="urokiCell"><div class="urokiAvatar" style="background-image:url(../../../public/img/noAvatar.png);"></div>
                        <div class="urokiName">
                            Мария
                        </div>
                    </div>
                    <div class="urokiCell"><span style="color:green;">Урок ожидется</span></div>
                </div>
                <div class="urokiString">
                    <div class="urokiCell">2017-09-21</div>
                    <div class="urokiCell">17:00:00</div>
                    <div class="urokiCell"><div class="urokiAvatar" style="background-image:url(../../../public/img/noAvatar.png);"></div>
                        <div class="urokiName">
                            Мария
                        </div>
                    </div>
                    <div class="urokiCell"><span style="color:green;">Урок ожидется</span></div>
                </div>
                <p></p><ul class="pagination">

                    <li class="disabled"><span>«</span></li>





                    <li class="active"><span>1</span></li>
                    <li><a href="http://mysocnet/student/lessons?lesson=previous&amp;page=2">2</a></li>
                    <li><a href="http://mysocnet/student/lessons?lesson=previous&amp;page=3">3</a></li>


                    <li><a href="http://mysocnet/student/lessons?lesson=previous&amp;page=2" rel="next">»</a></li>
                </ul>
                <p></p>
            </div>
        </div>
    </div>

@endsection