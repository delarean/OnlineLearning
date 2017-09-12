$(window).ready(function () {
	var site = window.location.origin;

    var sectors = window.location.href.split("/");
    var currentSector  = sectors[sectors.length - 1];

    if($('.menuButtonActive').length !== 0 ){
        $('.menuButtonActive').children().css('background-image', $('.menuButtonActive').children().css('background-image').replace('light', ''));
        $('.menuButtonActive').removeClass('menuButtonActive');
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
		if(newPath !== 'student' && currentSector !== newPath) window.location.href = site + '/student/'+newPath;
		else if(newPath === 'student' && currentSector !== newPath) window.location.href = site + '/'+newPath;
		/*if (this.id == 'writetoadministrator') {$('.selector').stop().animate({'top':$(this).position().top-18 + 'px'}, 200);}
		 else {$('.selector').stop().animate({'top':$(this).position().top-10 + 'px'}, 200);}
		 $('.menuButton').each(function (id, elem) {
		 $(elem).removeClass('menuButtonActive');
		 $(elem).children().css('background-image', $(elem).children().css('background-image').replace('light', ''));
		 });
		 $(this).addClass('menuButtonActive');
		 $(this).children().css('background-image', $(this).children().css('background-image').replace('.png', 'light.png'));*/


	});

	/*$('.urokiChooseCell').click(function (e) {
		$('.urokiChooseSelector').stop().animate({'left':$(this).position().left + 'px'}, 200);
	});

	$('.menuButton, .headerName').mousedown(function (e) {
		e.preventDefault();
	});*/

	//$('.menuImage').first().css('background-image', $('.menuImage').first().css('background-image').replace('.png', 'light.png'));

});