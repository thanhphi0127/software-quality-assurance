$(document).ready(function(){	
	// load ban đầu: quận ninhkieu, phường xuankhanh. Ẩn detail
	
	$('#quan option[value=NK]').prop('selected', true);
	$('#phuong option[value=NK-XK]').prop('selected', true);
	$('#phuong option').each(function(){
		if ($(this).val().substr(0,3) != 'NK-')
			$(this).hide();
	});
	var g_quan = $('#quan').val();
	var g_phuong = $('#phuong').val();
	
	
	$('td.street table').hide();
	$('td.street table.'+g_phuong).show();
	
	$('div.btnDetail').hide();
	//
	
	
	//thay đổi option quận
	$('#quan').change(function(){
		
		g_quan = $(this).val();
		$('#phuong option').show();
		$('#phuong option').each(function(){
			if ($(this).val().substr(0,2) != g_quan )
				$(this).hide();
			else g_phuong = $(this).val();
		});
		
		$('#phuong option[value=' + g_phuong+']').prop('selected', true);
		g_phuong = $('#phuong').val();
		
		$('td.street table').hide();
		$('td.street table.'+g_phuong).show();	
		$('#allofdistrict').attr('href', 'http://localhost/timkiemnhatro/search/result/area/' + g_phuong +'-0');
	});
	//
	
	//thay đổi option phường
	$('#phuong').change(function(){
		
		g_phuong = $(this).val();
		$('td.street table').hide();
		$('td.street table.'+g_phuong).show();		
		$('#allofdistrict').attr('href', 'http://localhost/timkiemnhatro/search/result/area/' + g_phuong +'-0');
	});
	//
	
	
	//hiện detail
	$('a.btnDetail').click(function(){
		$('div.btnDetail').fadeToggle();
	});
	//
	
	
	
	
	
	//giới hạn quận
	$('section.district.limit div ul li').click(function(){
		$('*.activequan').removeClass('activequan');
		$(this).addClass('activequan');
		var MA_HUYEN = $(this).children('input').val();
		
		// xóa giá trị cho phường của huyện khác
		
		$('section.ward.limit div ul li input').prop('checked', false);
		// đặt giá trị cho mã huyện
		$('#district_limit').attr('value', MA_HUYEN);
		//
		
		$('section.ward.limit > div.ward > ul').hide();
		$('section.ward.limit > div.ward > ul.'+MA_HUYEN).show();
		$('section.ward.limit').show();
		 
		
		
	});
	//
	
	
	//không giới hạn
	$('.btnSelectall').click(function(){
		$('*.activequan').removeClass('activequan');
		$('#district_limit').attr('value', '0');
		$('section.ward.limit').hide();
	});
	//
	
	
	
});