
$(window).ready(function () {


    var site = window.location.origin;
    var selected_course;

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

    /*else if(currentSector === 'writetoadmin' ){
        $('.selector').stop().animate({'top':$('#'+currentSector).position().top-10 + 'px'}, 200);
    }
    else if(currentSector === 'changepassword'){
        $('.selector').stop().animate({'top':$('#'+'student').position().top-18 + 'px'}, 200);
        $('#'+'student').addClass('menuButtonActive');
        $('#'+'student').children().css('background-image', $('#'+'student').children().css('background-image').replace('.png', 'light.png'));
    }
    if(currentSector !== 'changepassword'){
        $('#'+currentSector).addClass('menuButtonActive');
        $('#'+currentSector).children().css('background-image', $('#'+currentSector).children().css('background-image').replace('.png', 'light.png'));
    }*/


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
            newPath !== 'oplatit_but'
            && newPath !== 'admin'
            && currentSector !== newPath
        )
            window.location.href = site + '/admin/'+newPath;
        else if(newPath !== 'oplatit_but' && newPath === 'admin' && currentSector !== newPath) window.location.href = site + '/'+newPath;
        //else if(newPath !== 'oplatit_but' && currentSector !== newPath && newPath === 'lessons') window.location.href = site + '/admin/'+newPath+'?lesson=next';
        //else if(newPath === 'oplatit_but') window.location = site + '/admin/buylessons';
    });


});