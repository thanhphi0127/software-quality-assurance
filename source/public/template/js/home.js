$(document).ready(function(){

  
  
  $('p.quangcao_one').mouseenter(function(){
	$(this).children().get(0).play();
  });
  
  $('p.quangcao_one').mouseleave(function(){
	$(this).children().get(0).pause();
	$(this).children().get(0).currentTime = 0;
  });
  
  
});
