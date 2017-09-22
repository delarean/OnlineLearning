$(window).ready(function () {
	var site = window.location.origin;

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

    if(currentSector !== 'writetoadmin') {
        $('.selector').stop().animate({'top':$('#'+currentSector).position().top-18 + 'px'}, 200);
	}
    else {
        $('.selector').stop().animate({'top':$('#'+currentSector).position().top-10 + 'px'}, 200);
	}
    $('#'+currentSector).addClass('menuButtonActive');
    $('#'+currentSector).children().css('background-image', $('#'+currentSector).children().css('background-image').replace('.png', 'light.png'));

	$('.menuButton').click(function (e) {
		e.preventDefault();
        var newPath = this.id;
		if(newPath !== 'student' && currentSector !== newPath && newPath !== 'lessons') window.location.href = site + '/student/'+newPath;
		else if(newPath === 'student' && currentSector !== newPath) window.location.href = site + '/'+newPath;
		else if(currentSector !== newPath && newPath === 'lessons') window.location.href = site + '/student/'+newPath+'?lesson=next';
	});

	$('.urokiChooseCell').click(function (e) {
		window.location.href = site + '/student/lessons?lesson='+this.id;
	});

	/*$('.menuButton, .headerName').mousedown(function (e) {
		e.preventDefault();
	});*/

	//$('.menuImage').first().css('background-image', $('.menuImage').first().css('background-image').replace('.png', 'light.png'));

});