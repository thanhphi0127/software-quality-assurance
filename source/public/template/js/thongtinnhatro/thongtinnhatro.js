$(document).ready(function(){

 $('a.gopy').click(function(){
	$('.iframe').fadeIn(300);
	$('img.close').show();
	$('.black').show();
 });
 $('img.close').click(function(){
	$('.iframe').fadeOut(300);
	$('img.close').hide();
	$('.black').hide();
 });
 
});
