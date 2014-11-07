$(document).ready(function(){
	
	  $( "tr.type" ).hide();
	  $( "tr.type.1st-type" ).show();
	$("#cbLoaiPhong" ).change(function() {
		var optvalue = $("#cbLoaiPhong option:selected").val();
		$( "tr.type" ).hide();
		if ('1' == optvalue)
			$( "tr.type.1st-type" ).show();
		else if ('2' == optvalue){
			$( "tr.type.1st-type" ).show();
			$( "tr.type.2nd-type" ).show();
		}
		else if ('3' == optvalue)
			$( "tr.type" ).show();
		 
			
	});
	$('span.hidethistype').click(function(){
		$(this).parent().parent().siblings().fadeToggle("slow");
	});
	
	$('#sel_quan').change(function(){
		var MA_QUANHUYEN = $(this).val();
			//phuong
		$('#sel_phuong option').show();
		$('#sel_phuong option').each(function(){
			if ($(this).val().substr(0,2) != MA_QUANHUYEN){
				$(this).hide();
			}
			else MA_PHUONG = $(this).val();
		});
		
		$('#sel_phuong option[value='+MA_PHUONG+']').prop('selected', true);
	
		//duong
		$('#sel_duong option').show();
		$('#sel_duong option.'+ MA_PHUONG).show();
		$('#sel_duong option.'+ MA_PHUONG).prop('selected', true);
		$('#sel_duong option').not('.' + MA_PHUONG).hide();
	});
	
	
	$('#sel_phuong').change(function(){
		var MA_PHUONG = $(this).val();
		
		//duong
		
		$('#sel_duong option.'+ MA_PHUONG).show();
		$('#sel_duong option.'+ MA_PHUONG).prop('selected', true);
		$('#sel_duong option').not('.' + MA_PHUONG).hide();
	});
	
	$('#sonha').keyup(function(){
		var SONHA = $('#sonha').val();
		var QUAN = 	$('#sel_quan option:selected').text();
		var PHUONG = 	$('#sel_phuong option:selected').text();
		var DUONG = $('#sel_duong option:selected').text();
		$('p.sonha').html(SONHA + ' đường ' + DUONG + ', phường ' + PHUONG + ', quận ' + QUAN);
	});
	
});
