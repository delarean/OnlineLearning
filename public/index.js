$(window).ready(function () {
    var buy_lesson = document.getElementById('buy_lesson');
	var site = window.location.origin;
	var selected_course;

	var href  =window.location.href;
    var sectors = href.split("?");
    var sectors = sectors[0].split("/");
    var currentSector  = sectors[sectors.length - 1];
    //if (currentSector === 'changepassword') currentSector =

    if($('.menuButtonActive').length !== 0 ){
        $('.menuButtonActive').children().css('background-image', $('.menuButtonActive').children().css('background-image').replace('light', ''));
        $('.menuButtonActive').removeClass('menuButtonActive');
	}

	if(~href.lastIndexOf('lesson=previous')){
        $('.urokiChooseSelector').stop().animate({'left':53 + '%'}, 200);
	}

    if(currentSector !== 'writetoadmin' && currentSector !== 'changepassword') {
        $('.selector').stop().animate({'top':$('#'+currentSector).position().top-18 + 'px'}, 200);
	}
    else if(currentSector === 'writetoadmin' ){
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
    }


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

    $('#oplatit_but').click(function (e) {
        e.preventDefault();
		window.location = site + '/student/buylessons';
    });

    $('.menuButton').click(function (e) {
		e.preventDefault();
        var newPath = this.id;
		if(
		    newPath !== 'oplatit_but'
            && newPath !== 'student'
            && currentSector !== newPath
            && newPath !== 'lessons'
        )
		    window.location.href = site + '/student/'+newPath;
		else if(newPath !== 'oplatit_but' && newPath === 'student' && currentSector !== newPath) window.location.href = site + '/'+newPath;
		else if(newPath !== 'oplatit_but' && currentSector !== newPath && newPath === 'lessons') window.location.href = site + '/student/'+newPath+'?lesson=next';
		else if(newPath === 'oplatit_but') window.location = site + '/student/buylessons';
	});

	$('.urokiChooseCell').click(function (e) {
		window.location.href = site + '/student/lessons?lesson='+this.id;
	});

	/*$('.menuButton, .headerName').mousedown(function (e) {
		e.preventDefault();
	});*/

	$('.oplaturokiButton').click(function (e) {


        [].forEach.call($('.oplaturokiButton'),function (value) {
            value.style.backgroundColor = '#f2f7fc';
        });

		$(this).css('background-color','#2ec47a');
        selected_course = this.id;

    });

    buy_lesson.onclick = function () {

    	if(!selected_course){
    		alert('Выберите курс !');
    		return;
		}

        var data = {id : selected_course};
    	$.ajax({
    		url : site + '/api/student/sendPayment',
			method : 'POST',
            data : data,
            dataType : 'json'
		}).done(function (values) {

		    //console.log(values);
			var form  = document.createElement('form');
            form.setAttribute('action','https://paymaster.ru/Payment/Init');
            form.setAttribute('method','POST');
            document.body.appendChild(form);
            for(var key in values){
                    var input = document.createElement('input');
                    input.setAttribute('name',key);
                    input.setAttribute('value',values[key]);
                    form.appendChild(input);
			}
            form.submit();
        });

    };



});