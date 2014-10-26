

$(document).ready(function() {
	var pre_add = $('#hidden_add').attr('value');
	alert(pre_add);
	if (pre_add == 1) {
		$('#add_Student').show();
	}
	else {
		$('#add_Student').hide();
	}
	
	
	$('#btn_add').click(function() {
		
		$('#active_add').val() = 1;
		$('#add_Student').attr('aria-hidden','false');
	});
	
	$('#btn_cancel').click(function() {
		$('#active_add').val() = 0;
		$('#add_Student').attr('aria-hidden','false');
	});
	
	if (1 == $('#active_add').val()) {
		$('#add_Student').show();
		$('#add_Student').attr('aria-hidden','false');
		
	}
	else {
		$('#add_Student').attr('aria-hidden','true');
	}
	
});