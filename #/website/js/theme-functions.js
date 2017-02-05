/*=========== Main Nav ===============*/
/*function mainmenu(){
$(" #nav ul ").css({display: "none"}); // Opera Fix
$(" #nav li").hover(function(){
		$(this).find('ul:first').css({visibility: "visible",display: "none"}).show(400);
		},function(){
		$(this).find('ul:first').css({visibility: "hidden"});
		});
} 
$(document).ready(function(){					
	mainmenu();
});*/
$(function() {
	var pull 		= $('#pull');
		menu 		= $('#nav');
		menuHeight	= menu.height();

	$(pull).on('click', function(e) {
		e.preventDefault();
		menu.slideToggle();
	});

	$(window).resize(function(){
		var w = $(window).width();
		if(w > 320 && menu.is(':hidden')) {
			menu.removeAttr('style');
		}
	});
});

/*=========== scrollbar ===============*/
$(function(){
	// scroll for the html, body tags
	$('html').niceScroll({
		cursorcolor:"#f9f9f9",
		background: "#d7d7d7",
		cursorborder:"1px solid #d7d7d7",
		cursoropacitymin : 0,
		cursorwidth : 8,
		cursorborderradius :0
	});
});

/*=========== fancyBox ===============*/
$(document).ready(function() {
	$('.fancybox').fancybox();	
});

function chooseFile() {
  $("#fileInput").click();
};

function chooseFile2() {
  $("#files").click();  
};
















