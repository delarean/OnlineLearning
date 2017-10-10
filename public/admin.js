
$(window).ready(function () {

//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!                 По загрузке документа                            !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    var site = window.location.origin;
    var selected_course;
    $('.paymentsoutSelect').each(function(i,elem){
        changeColorOfSelect($(this));
    });
    $('.payoutsSelect').each(function(i,elem){
        changeColorOfPayoutsSelect($(this));
    });

    var href  =window.location.href;
    var sectors = href.split("?");
    var sectors = sectors[0].split("/");
    var currentSector  = sectors[sectors.length - 1];


    if($('.menuButtonActive').length !== 0 ){
        $('.menuButtonActive').children().css('background-image', $('.menuButtonActive').children().css('background-image').replace('light', ''));
        $('.menuButtonActive').removeClass('menuButtonActive');
    }

    if(~href.lastIndexOf('lesson=previous')){
        $('.urokiChooseSelector').stop().animate({'left':53 + '%'}, 200);
    }

        $('.selector').stop().animate({'top':$('#'+currentSector).position().top-18 + 'px'}, 200);
        $('#'+currentSector).addClass('menuButtonActive');
        $('#'+currentSector).children().css('background-image', $('#'+currentSector).children().css('background-image').replace('.png', 'light.png'));

    //!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!                 События                            !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


    $('.headerAvatar, .headerName, .headerDown').click(function (e) {
        e.preventDefault();
        if ($('.headerSettings').css('display')=='none') {
            $('.headerSettings').css('display', 'block');
            $('.headerSettings').animate({
                'top':'65px',
                'opacity':'1'
            }, 200);
        } else {
            $('.headerSettings').animate({
                'top':'100px',
                'opacity':'0'
            }, 200, function () {
                $('.headerSettings').css('display', 'none');
            });
        }
    });

    $('.menuButton').click(function (e) {
        e.preventDefault();
        var newPath = this.id;
        if(
            newPath !== 'lessons'
            && newPath !== 'admin'
            && currentSector !== newPath
        )
            window.location.href = site + '/admin/'+newPath;
        else if(newPath !== 'lessons' && newPath === 'admin' && currentSector !== newPath) window.location.href = site + '/'+newPath;
        else if( currentSector !== newPath && newPath === 'lessons') window.location.href = site + '/admin/'+newPath+'?lesson=next';
        //else if(newPath === 'oplatit_but') window.location = site + '/admin/buylessons';
    });

    $('#addpupilButton').click(function (e) {
        e.preventDefault();
        $('.ucenikiAddpupilHidden').css('display','block');
        $('.ucenikiAddpupil').css('display','block');
    });

    $('.ucenikiAddpupilCross').click(function (e) {
        e.preventDefault();
        $('.ucenikiAddpupil').css('display','none');
        $('.ucenikiAddpupilHidden').css('display','none');
    });

    $('#addTeacherButton').click(function (e) {
        e.preventDefault();
        $('.ucenikiAddpupilHidden').css('display','block');
        $('.ucenikiAddpupil').css('display','block');
    });

    $('.ucenikiAddTeacherCross').click(function (e) {
        e.preventDefault();
        $('.ucenikiAddpupil').css('display','none');
        $('.ucenikiAddpupilHidden').css('display','none');
    });

    $('.paymentsoutAddpaymentoutSelect').click(function (e) {
        $('.paymentsoutAddpaymentoutSelect').css('border-radius', '25px 25px 0px 0px');
        $('.paymentsoutAddpaymentoutSelectList').css('display', 'block');
    });

    $('.paymentsoutAddpaymentoutSelectOption').mousedown(function (e) {
        $('.paymentsoutAddpaymentoutSelect').css('border-radius', '25px');
        $('.paymentsoutAddpaymentoutSelectList').css('display', 'none');
        $('.paymentsoutAddpaymentoutSelectText').html($(this).html());
        var teacher_id = $(this).children('.valueSpan').attr('id');
        $('#selectedTeacher').attr('value',teacher_id);
    });

    $('#addpaymentoutButton').click(function (e) {
        e.preventDefault();
        $('.paymentsoutAddpaymentoutHidden').css('display', 'block');
    });

    $('.paymentsoutAddpaymentoutCross').click(function (e) {
        e.preventDefault();
        $('.paymentsoutAddpaymentout').css('display', 'none');
    });

    $('#addpaymentoutButton').click(function (e) {
        e.preventDefault();
        $('.paymentsoutAddpaymentout').css('display', 'block');
    });


    $('.paymentsoutAddpaymentoutCross').click(function (e) {
        e.preventDefault();
        $('.paymentsoutAddpaymentoutHidden').css('display', 'none');
    });

    $('#next_but').click(function (e) {
        window.location.href = site + '/admin/lessons?lesson=next';
    });

    $('#prev_but').click(function (e) {
        window.location.href = site + '/admin/lessons?lesson=previous';
    });

    $('.paymentsoutSelect').change(function(){
        changeColorOfSelect($(this));
        $(this).parent().submit();
    });

    $('.payoutsSelect').change(function(){
        changeColorOfPayoutsSelect($(this));
        $(this).parent().submit();
    });

    $('.paymentsoutArrow').click(function () {
        $(this).css('rotate', 180);
        $(this).parent().prev().attr('value',1);
        $('#orderPayoutsForm').submit();
    });



    //!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!                 Функции                            !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

    function changeColorOfSelect(ths) {

        var options = ths.children();
        var selectedOption;
        for(var option in options){
            if(!options.hasOwnProperty(option)) continue;
            if(options[option].selected){
                selectedOption = option;
                break;
            }
        }
        switch (selectedOption){

            case '3' :
            case '0' :
                ths.css('color','#2ec47a');
                break;
            case '1' :
                ths.css('color','#adadad');
                break;
            case '2' :
                ths.css('color','#e87e04');
                break;
            case '4' :
                ths.css('color','red');
                break;


        }
    }

    function changeColorOfPayoutsSelect(ths) {
        var options = ths.children();
        var selectedOption;
        for(var option in options){
            if(!options.hasOwnProperty(option)) continue;
            if(options[option].selected){
                selectedOption = option;
                break;
            }
        }
        switch (selectedOption){
            case '0' :
                ths.css('color','#2ec47a');
                break;
            case '1' :
                ths.css('color','#e87e04');
                break;
        }
    }




});