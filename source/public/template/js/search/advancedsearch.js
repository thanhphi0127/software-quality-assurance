$(document).ready(function(){
	$('div.btnDetail').hide();
	$('a.btnDetail').click(function(){
		$('div.btnDetail').fadeToggle();
	});
	$("section.search div.district ul li a:contains('Ninh Kiều')").click(function(){
		$('section.search div.ward.ninhkieu').show(300);
		$(this).addClass('active');
	});
	$("section.search div.ward table tr td:contains('Xuân Khánh')").click(function(){
		$('section.search div.street.xuankhanh').show(300);
		$(this).addClass('active');
	});
	$('input.btnSelectall').click(function(){
		$('*').removeClass('active');
		$('section.ward.search > *').hide();
		$('section.street.search > *').hide();
	});
});