﻿$(document).ready(function(){	
	var i = 0;
	
	var g_page = 1;
	var g_maxpage = parseInt($('#maxpage').val());
	$('.result').hide();
	$('.result').each(function(){
		i ++;
		if (i < 10)
			$(this).show();
	});
	
	$('a.page').click(function(){
		g_page = parseInt($(this).html(), 10);
		var endpage = g_page * 10;
		var startpage = endpage - 10;
		
		i = 0;
		$('.result').hide();
		$('.result').each(function(){
			if (startpage <= i && i <= endpage)
				$(this).show();
			i ++;
		});
		$('a.page').removeClass('active_page');
		$(this).addClass('active_page');
		
	});
	
	$('a.nextpage').click(function(e){
		g_page ++;
		
		if (g_page > g_maxpage){
			g_page = g_maxpage;
			e.preventDefault();
		}
		else {
			var endpage = g_page * 10;
			var startpage = endpage - 10;
			
			i = 0;
			$('.result').hide();
			$('.result').each(function(){
				i ++;
				if (startpage <= i && i <= endpage)
					$(this).show();
			});
		}
		$('a.page').removeClass('active_page');
		$('a.page:contains('+g_page+')').addClass('active_page');
		
	});
	
	$('a.prevpage').click(function(e){
		g_page --;
		
		if (0 == g_page) {
			g_page = 1;
			e.preventDefault();
		}
		else {
			var endpage = g_page * 10;
			var startpage = endpage - 10;
			
			i = 0;
			$('.result').hide();
			$('.result').each(function(){
				i ++;
				if (startpage <= i && i <= endpage)
					$(this).show();
			});
		}
		$('a.page').removeClass('active_page');
		$('a.page:contains('+g_page+')').addClass('active_page');
	});
	
});