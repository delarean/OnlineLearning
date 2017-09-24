@extends('layouts.main')
@section('content')
<div class="oplaturokiContent">
    <div class="oplaturokiBox">
        <div class="oplaturokiVygodno" style="display:none;"><div class="oplaturokiVygodnoText" "="">ВЫГОДНО</div></div>
    <div class="oplaturokiTitle">2 УРОКА</div>
    <div class="oplaturokiSubTitle">&nbsp;</div>
    <button id="1" class="oplaturokiButton">
        <div class="oplaturokiImage" style="background-image:url(../../public/img/profile/russia.png);"></div><span style="font-weight:bold">1360 Руб</span>&nbsp;(680 Р./урок)
    </button>
    <button id="2" class="oplaturokiButton">
        <div class="oplaturokiImage" style="background-image:url(../../public/img/profile/angliya.png);"></div><span style="font-weight:bold">2180 Руб</span>&nbsp;(1090 Р./урок)
    </button>
</div>
<div class="oplaturokiBox">
    <div class="oplaturokiVygodno" style="display:none;"><div class="oplaturokiVygodnoText" "="">ВЫГОДНО</div></div>
<div class="oplaturokiTitle">8 УРОКОВ</div>
<div class="oplaturokiSubTitle">-5%</div>
<button id="11" class="oplaturokiButton">
    <div class="oplaturokiImage" style="background-image:url(../../public/img/profile/russia.png);"></div><span style="font-weight:bold">5200 Руб</span>&nbsp;(650 Р./урок)
</button>
<button id="12" class="oplaturokiButton">
    <div class="oplaturokiImage" style="background-image:url(../../public/img/profile/angliya.png);"></div><span style="font-weight:bold">8320 Руб</span>&nbsp;(1040 Р./урок)
</button>
</div>
<div class="oplaturokiBox">
    <div class="oplaturokiVygodno"><div class="oplaturokiVygodnoText" "="">ВЫГОДНО</div></div>
<div class="oplaturokiTitle">12 УРОКОВ</div>
<div class="oplaturokiSubTitle">-10%</div>
<button id="21" class="oplaturokiButton">
    <div class="oplaturokiImage" style="background-image:url(../../public/img/profile/russia.png);"></div><span style="font-weight:bold">7440 Руб</span>&nbsp;(620 Р./урок)
</button>
<button id="22" class="oplaturokiButton">
    <div class="oplaturokiImage" style="background-image:url(../../public/img/profile/angliya.png);"></div><span style="font-weight:bold">11880 Руб</span>&nbsp;(990 Р./урок)
</button>
</div>
<div class="oplaturokiButtonWrap"><button id="buy_lesson">ПЕРЕЙТИ К ОПЛАТЕ</button></div>
</div>
    @endsection