$(document).ready(function(){

	$('div.form > h2').html("CHỨNG THỰC NGƯỜI DÙNG");
	
	/* iframe notification */

	$('span.manipulation').click(function() {
		$('section.manipulation').fadeIn(1000);
		
		$('img.manipulation').show();
		if ($(this).hasClass('btnAddgrouptemplate')){
			$('#addgrouptemplate').show();
			$('#modifygrouptemplate').hide();
		}
		else if ($(this).hasClass('btnModifygrouptemplate')) {
		
			$('#addgrouptemplate').hide();
			$('#modifygrouptemplate').show();
			
					
			var subname = $(this).parent().siblings('.TEN_MH').html();
			var subcode = $(this).parent().siblings('.MA_MH').html();
			var sln_toida = $(this).parent().siblings('.SLN_TOIDA').html();
			var sltv_toida = $(this).parent().siblings('.SLTV_TOIDA').html();
			var mota = $(this).parent().siblings('.MOTA').html();
			$('#modifygrouptemplate > form > h1 > span').html('<br/>' + subname);
			$('#modifygrouptemplate > form input.MA_MH').attr('value', subcode);
			$('#modifygrouptemplate > form input.SLN_TOIDA').attr('value', sln_toida);
			$('#modifygrouptemplate > form input.SLTV_TOIDA').attr('value', sltv_toida);
			$('#modifygrouptemplate > form input.MOTA').attr('value', mota);
		}
		else if ($(this).hasClass('btnDeletegrouptemplate')) {
			$('#iframe_login').slideDown();
			var subcode = $(this).parent().siblings('.MA_MH').html();
			$('#iframe_login input[type=text]:nth-child(1)').attr('value', subcode);
			
		}
		
	});
	/* end ----------------*/
	
	/* img manipulation           */
	$('img.manipulation').click(function (){
		$('section.manipulation').hide(500);
		$('#iframe_login').slideUp(500);
		$(this).hide();
	});
	
	$('#iframe_login div.iframe_login_up img').click(function(){
		$('#iframe_login').slideUp(500);
		
		$('section.manipulation').hide(500);
	});
	/*end ------------------*/
	
	/*  group detail*/
	

	
	/* end ------------------*/
	
	

	
	

});

